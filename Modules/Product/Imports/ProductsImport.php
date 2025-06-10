<?php

namespace Modules\Product\Imports;

use App\Models\Language;
use App\Models\MediaUploader;
use App\Models\MetaInfo;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
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
use Modules\TaxModule\Entities\TaxClass;
use Str;

class ProductsImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{

    public function model(array $row)
    {


        // Dil kodlarını belirlemek için gerekli işlemler
        $languages = Language::query()
            ->where('status', '=', 1)
            ->get();


        $product = new Product();
        $productData = [];
        $metas = [];
        $metas = [];
        foreach ($languages as $lang) {

            $strSlug = strtolower($lang->slug);
            $nameKey = "name_{$strSlug}";
            $descriptionKey = "description_{$strSlug}";
            $brandKey = "brand_{$strSlug}";
            $metaKey = "meta_seo_{$strSlug}";
            $policyKey = "policy_description_{$strSlug}";

            $productData['name'][$lang->slug] = $row[$nameKey];

            $productData['slug'][$lang->slug] = Str::slug($row[$nameKey]);
            $productData['description'][$lang->slug] = $row[$descriptionKey];
            $productData['brand'][$lang->slug] = $row[$brandKey];
            $productData['summary'][$lang->slug] = '';

            $productData['metas'][$lang->slug] = $row[$metaKey];
            $productData['policy_description'][$lang->slug] = $row[$policyKey];
        }

        $productInventory = '';
        if (isset($row['sku'])) {
            $productInventory = ProductInventory::query()
                ->where('sku', '=', $row['sku'])
                ->first();

        }


        if ($productInventory) {
            $product = Product::query()->find($productInventory->product_id);
        }

        $product->cost = $row['base_cost'];
        $product->price = $row['regular_price'];
        $product->sale_price = $row['sale_price'];
        $product->name = $productData['name'];
        $product->slug = $productData['slug'];
        $product->description = $productData['description'];
        $product->status_id = 1;

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
            $product->brand_id = $brand->id;
        }

        $product->is_taxable = $row['is_taxable'] ?? 0;

        if (isset($row['tax_classes'])) {
            $taxClass = TaxClass::query()
                ->where('name', '=', $row['tax_classes'])
                ->first();

            if (!$taxClass) {
                $taxClass = TaxClass::query()
                    ->create([
                        'name' => $row['tax_classes']
                    ]);
            }
            $product->tax_class_id = $taxClass->id;
        }

        // Görsel güncelle
        if (!empty($row['feature_image'])) {

            $baseName = basename($row['feature_image']);

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


        $product->save();

        if (!$productInventory) {
            $productInventory = ProductInventory::query()
                ->create([
                    'product_id' => $product->id,
                    'sku' => $row['sku'],
                    'stock_count' => $row['quantity']
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
                    ['metainfoable_id' => $product->id],
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
                    ['product_id' => $product->id],
                    [
                        'shipping_return_description' => $productData['policy_description']
                    ]
                );
        }

        return $product;
    }
}
