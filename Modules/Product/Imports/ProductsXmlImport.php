<?php

namespace Modules\Product\Imports;

use App\Models\Language;
use App\Models\MediaUploader;
use App\Models\MetaInfo;
use Http;
use Modules\Attributes\Entities\Brand;
use Modules\Attributes\Entities\Category;
use Modules\Attributes\Entities\ChildCategory;
use Modules\Attributes\Entities\DeliveryOption;
use Modules\Attributes\Entities\SubCategory;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Entities\ProductChildCategory;
use Modules\Product\Entities\ProductDeliveryOption;
use Modules\Product\Entities\ProductGallery;
use Modules\Product\Entities\ProductInventory;
use Modules\Product\Entities\ProductShippingReturnPolicy;
use Modules\Product\Entities\ProductSubCategory;
use Str;

class ProductsXmlImport
{

    public function import($url)
    {


        $response = Http::get($url);  // URL'yi array'den alıyoruz

        if ($response->failed()) {
            throw new \Exception('XML verisi alınamadı.');
        }

        $xmlContent = $response->body();  // XML içeriğini alıyoruz
        $xml = simplexml_load_string($xmlContent);  // XML verisini çözümleme

        // Dil kodlarını belirlemek için gerekli işlemler
        $languages = Language::query()
            ->where('status', '=', 1)
            ->get();


        $productInsert = new Product();
        $productData = [];
        $metas = [];
        $metas = [];
        dd($xml->ProductList);
        foreach ($xml->ProductList as $product) {

            $productData['id'] = (integer)$product->ProductID;
            foreach ($languages as $lang) {
                $productData['name'][$lang->slug] = (string)$product->ProductName;
                $productData['slug'][$lang->slug] = Str::slug((string)$product->ProductName);
                $productData['description'][$lang->slug] = (string)$product->ProductDescription;
                $productData['brand'][$lang->slug] = (string)$product->Brand;
                $productData['summary'][$lang->slug] = '';
                $productData['metas'][$lang->slug] = '';
                $productData['policy_description'][$lang->slug] = '';
            }

            $productInventory = '';
            if (isset($product->StockCode)) {
                $productInventory = ProductInventory::query()
                    ->where('sku', '=', (string)$product->StockCode)
                    ->first();

            }


            if ($productInventory) {
                $productInsert = Product::query()->find($productInventory->product_id);
            }

            $productInsert->id = $productData['id'];
            $productInsert->cost = (double)$product->OldPrice;
            $productInsert->price = (double)$product->OldPrice;
            $productInsert->sale_price = (double)$product->Price;
            $productInsert->name = $productData['name'];
            $productInsert->slug = $productData['slug'];
            $productInsert->description = $productData['description'];
            $productInsert->status_id = 1;

            if (count($productData['brand']) > 0) {
                $titleBrand = $productData['brand'][$languages[0]->slug];

                $brand = Brand::query()
                    ->where('name', '=', $titleBrand)
                    ->first();

                if (!$brand) {

                    $brand = Brand::query()
                        ->create([
                            'name' => $titleBrand,
                            'description' => $titleBrand,
                            'slug' => Str::slug($titleBrand),
                            'image_id' => 1,
                            'banner_id' => 1,
                            'url' => '#'
                        ]);
                }
                $productInsert->brand_id = $brand->id;
            }

            $productInsert->is_taxable = 0;

            // Görsel güncelle
            if (!empty($row['feature_image'])) {

                $baseName = basename($row['feature_image']);

                dd($baseName);
                $media = MediaUploader::query()
                    ->where('path', 'LIKE', '%' . $baseName . '%')
                    ->first();

                if ($media) {
                    $product->image_id = $media->id;
                }

            }

            // IMAGE GALLERY
            if (!empty($row['image_gallery'])) {
                $childCategoryNames = explode(',', $row['image_gallery']);
                $medias = [];
                foreach ($childCategoryNames as $childCategoryName) {

                    $baseName = basename($row['image_gallery']);

                    $media = MediaUploader::query()
                        ->where('path', 'LIKE', '%' . $baseName . '%')
                        ->first();
                    $medias[] = $media?->id;
                }
                if (count($medias) > 0) {
                    ProductGallery::query()
                        ->where('product_id', '=', $product->id)
                        ->delete();
                    foreach ($medias as $mediaDetail) {
                        $productGallery = new ProductGallery();
                        $productGallery->product_id = $product->id;
                        $productGallery->image_id = $mediaDetail;
                        $productGallery->save();
                    }
                }
            }


            $productInsert->save();

            if (!$productInventory) {
                $productInventory = ProductInventory::query()
                    ->create([
                        'product_id' => $productInsert->id,
                        'sku' => $product->StockCode,
                        'stock_count' => $product->Stock
                    ]);
            }


            // Kategorileri güncelle
            if (!empty($row['category'])) {
                $category = null;
                foreach ($languages as $lang) {
                    $category = Category::query()
                        ->where('name->' . $lang->slug, '=', $row['category'])
                        ->first();
                    if ($category) {

                        break;
                    }
                }

                if (!$category) {
                    $name = [];
                    $slug = [];
                    foreach ($languages as $lang) {
                        $name[$lang->slug] = $row['category'];
                        $slug[$lang->slug] = Str::slug($row['category']);
                    }
                    $category = Category::query()
                        ->create([
                            'name' => $name,
                            'slug' => $slug,
                            'status_id' => 1
                        ]);
                }

                $categories = ProductCategory::query()
                    ->updateOrCreate([
                        'product_id' => $product->id
                    ], [
                        'category_id' => $category->id
                    ]);

            }

            // Alt kategori güncelle
            if (!empty($row['sub_category']) && isset($category)) {

                $subCategory = null;
                foreach ($languages as $lang) {
                    $subCategory = SubCategory::query()
                        ->where('name->' . $lang->slug, '=', $row['sub_category'])
                        ->first();
                    if ($subCategory) {

                        break;
                    }
                }

                if (!$subCategory) {
                    $name = [];
                    $slug = [];
                    foreach ($languages as $lang) {
                        $name[$lang->slug] = $row['sub_category'];
                        $slug[$lang->slug] = Str::slug($row['sub_category']);
                    }

                    $subCategory = SubCategory::query()
                        ->create([
                            'name' => $name,
                            'category_id' => $category->id,
                            'slug' => $slug,
                            'status_id' => 1
                        ]);
                }

                $categories = ProductSubCategory::query()
                    ->updateOrCreate([
                        'product_id' => $product->id
                    ], [
                        'sub_category_id' => $subCategory->id
                    ]);

            }

            // Çocuk kategori güncelle
            if (!empty($row['child_category']) && isset($category) && isset($subCategory)) {
                $childCategoryNames = explode(', ', $row['child_category']);
                foreach ($childCategoryNames as $childCategoryName) {

                    $childCategory = null;

                    foreach ($languages as $lang) {
                        $childCategory = ChildCategory::query()
                            ->where('name->' . $lang->slug, '=', $childCategoryName)
                            ->first();
                        if ($childCategory) {
                            break;
                        }
                    }
                    if (!$childCategory) {
                        $name = [];
                        $slug = [];
                        foreach ($languages as $lang) {
                            $name[$lang->slug] = $childCategoryName;
                            $slug[$lang->slug] = Str::slug($childCategoryName);
                        }
                        $childCategory = SubCategory::query()
                            ->create([
                                'name' => $name,
                                'sub_category_id' => $subCategory->id,
                                'category_id' => $category->id,
                                'slug' => $slug,
                                'status_id' => 1
                            ]);
                    }
                    ProductChildCategory::query()
                        ->where('product_id', '=', $product->id)
                        ->delete();

                    if (!$childCategory) {
                        //   dd($childCategory);
                    }

                    $categories = new ProductChildCategory();
                    $categories->product_id = $product->id;
                    $categories->child_category_id = $childCategory->id;

                    $categories->save();


                }
            }

            // Delivery Option güncelle
            if (!empty($row['delivery_option'])) {
                $delivery_options = json_decode($row['delivery_option']);

                foreach ($delivery_options as $delivery_option) {


                    $option = null;
                    foreach ($languages as $lang) {
                        $option = DeliveryOption::query()
                            ->where('title->' . $lang->slug, '=', $delivery_option->title)
                            ->first();
                        if ($option) {
                            break;
                        }
                    }

                    if (!$option) {
                        $title = [];
                        $subTitle = [];
                        foreach ($languages as $lang) {
                            $title[$lang->slug] = $delivery_option->title;
                            $subTitle[$lang->slug] = $delivery_option->subtitle;
                        }
                        $option = DeliveryOption::query()
                            ->create([
                                'title' => $title,
                                'sub_title' => $subTitle,
                                'icon' => 'las la-gift'
                            ]);
                    }


                    ProductDeliveryOption::query()
                        ->where('product_id', '=', $product->id)
                        ->delete();

                    $productDeliveryOption = new ProductDeliveryOption();
                    $productDeliveryOption->product_id = $product->id;
                    $productDeliveryOption->delivery_option_id = $option->id;
                    $productDeliveryOption->save();


                }
            }

            // Metas güncelle
            if (!empty($productData['metas'])) {

                $titleLang = [];
                $descriptionLang = [];
                $fb_titleLang = [];
                $fb_descriptionLang = [];
                $tw_titleLang = [];
                $tw_descriptionLang = [];
                foreach ($productData['metas'] as $key => $meta) {
                    $metasList = json_decode($meta);

                    $titleLang[$key] = $metasList->title ?? '';
                    $descriptionLang[$key] = $metasList->description ?? '';
                    $fb_titleLang[$key] = $metasList->fb_title ?? '';
                    $fb_descriptionLang[$key] = $metasList->fb_description ?? '';
                    $tw_titleLang[$key] = $metasList->tw_title ?? '';
                    $tw_descriptionLang[$key] = $metasList->tw_description ?? '';


                }
                $productMeta = MetaInfo::query()
                    ->updateOrCreate(
                        ['metainfoable_id' => $productInsert->id],
                        [
                            'metainfoable_type' => 'Modules\Product\Entities\Product',
                            'title' => $titleLang,
                            'description' => $descriptionLang,
                            'fb_title' => $fb_titleLang,
                            'fb_description' => $fb_descriptionLang,
                            'tw_title' => $tw_titleLang,
                            'tw_description' => $tw_descriptionLang,
                        ]
                    );
            }


            // policy_description güncelle
            if (!empty($productData['policy_description'])) {

                $titleLang = [];
                $descriptionLang = [];
                $fb_titleLang = [];
                $fb_descriptionLang = [];
                $tw_titleLang = [];
                $tw_descriptionLang = [];

                $productMeta = ProductShippingReturnPolicy::query()
                    ->updateOrCreate(
                        ['product_id' => $productInsert->id],
                        [
                            'shipping_return_description' => $productData['policy_description']
                        ]
                    );
            }

            return $product;
        }
    }
}
