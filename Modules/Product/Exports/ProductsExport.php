<?php

namespace Modules\Product\Exports;

use App\Models\Language;
use App\Models\MediaUploader;
use App\Models\Status;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\Attributes\Entities\Brand;
use Modules\Attributes\Entities\Color;
use Modules\Attributes\Entities\DeliveryOption;
use Modules\Attributes\Entities\Size;
use Modules\Attributes\Entities\Unit;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductGallery;
use Modules\Product\Entities\ProductInventory;
use Modules\Product\Entities\ProductInventoryDetail;
use Modules\Product\Entities\ProductInventoryDetailAttribute;
use Modules\Product\Entities\ProductUom;
use Modules\TaxModule\Entities\TaxClass;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{

    protected $locales;
    protected $request;

    public function __construct($request)
    {
        $languages = Language::query()
            ->where('status', '=', 1)
            ->get();

        $this->locales = $languages;
        $this->request = $request;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::with('category', 'subCategory', 'childCategory', 'inventory', 'inventoryDetail', 'uom', 'product_delivery_option', 'tag', 'color', 'size')
            ->get();
    }

    public function headings(): array
    {

        $request = $this->request;
        $headings = [];
        // ID
        if (isset($request['id']) && $request['id'] == 'on') {
            $headings = ['ID'];
        }

        // NAME
        if (isset($request['name'])) {
            foreach ($this->locales as $locale) {
                if (isset($request['name'][$locale->slug]) && $request['name'][$locale->slug] == 'on') {
                    $headings[] = __('Name') . " ($locale->name)";
                }
            }
        }

        // DESCRIPTION
        if (isset($request['description'])) {
            foreach ($this->locales as $locale) {
                if (isset($request['description'][$locale->slug]) && $request['description'][$locale->slug] == 'on') {
                    $headings[] = __('Description') . " ($locale->name)";
                }
            }
        }

        // SLUG
        if (isset($request['slug'])) {
            foreach ($this->locales as $locale) {
                if (isset($request['slug'][$locale->slug]) && $request['slug'][$locale->slug] == 'on') {
                    $headings[] = __('Slug') . " ($locale->name)";
                }
            }
        }

        // URL
        if (isset($request['url'])) {
            foreach ($this->locales as $locale) {
                if (isset($request['url'][$locale->slug]) && $request['url'][$locale->slug] == 'on') {
                    $headings[] = __('URL') . " ($locale->name)";
                }
            }
        }

        // BRAND
        if (isset($request['brand'])) {
            foreach ($this->locales as $locale) {
                if (isset($request['brand'][$locale->slug]) && $request['brand'][$locale->slug] == 'on') {
                    $headings[] = __('Brand') . " ($locale->name)";
                }
            }
        }

        // STATUS
        if (isset($request['status']) && $request['status'] == 'on') {
            $headings[] = __('Status');
        }

        // BASE COST
        if (isset($request['base_cost']) && $request['base_cost'] == 'on') {
            $headings[] = __('Base Cost');
        }
        // REGULAR PRICE
        if (isset($request['regular_price']) && $request['regular_price'] == 'on') {
            $headings[] = __('Regular Price');
        }

        // SALE PRICE
        if (isset($request['sale_price']) && $request['sale_price'] == 'on') {
            $headings[] = __('Sale Price');
        }

        // TAX
        if (isset($request['tax']) && $request['tax'] == 'on') {
            $headings[] = __('Tax');
        }

        // TAX CLASSES
        if (isset($request['tax_classes']) && $request['tax_classes'] == 'on') {
            $headings[] = __('Tax Classes');
        }

        // FEATURE IMAGE
        if (isset($request['feature_image']) && $request['feature_image'] == 'on') {
            $headings[] = __('Feature Image');
        }

        // IMAGE GALLERY
        if (isset($request['image_gallery']) && $request['image_gallery'] == 'on') {
            $headings[] = __('Image Gallery');
        }

        // SKU
        if (isset($request['sku']) && $request['sku'] == 'on') {
            $headings[] = __('SKU');
        }

        // QUANTITY
        if (isset($request['quantity']) && $request['quantity'] == 'on') {
            $headings[] = __('Quantity');
        }

        // UNIT
        if (isset($request['unit']) && $request['unit'] == 'on') {
            $headings[] = __('Unit');
        }

        // UNIT OF MEASUREMENT
        if (isset($request['unit_of_measurement']) && $request['unit_of_measurement'] == 'on') {
            $headings[] = __('Unit of Measurement');
        }

        // VARIANT
        if (isset($request['variant']) && $request['variant'] == 'on') {
            $headings[] = __('Variant');
        }

        // CATEGORY
        if (isset($request['category']) && $request['category'] == 'on') {
            $headings[] = __('Category');
        }

        // SUBCATEGORY
        if (isset($request['sub_category']) && $request['sub_category'] == 'on') {
            $headings[] = __('Sub Category');
        }

        // CHILD CATEGORY
        if (isset($request['child_category']) && $request['child_category'] == 'on') {
            $headings[] = __('Child Category');
        }

        // DELIVERY OPTION
        if (isset($request['delivery_option']) && $request['delivery_option'] == 'on') {
            $headings[] = __('Delivery Option');
        }

        // META SEO
        if (isset($request['meta_seo'])) {
            foreach ($this->locales as $locale) {
                if (isset($request['meta_seo'][$locale->slug]) && $request['meta_seo'][$locale->slug] == 'on') {
                    $headings[] = __('Meta SEO') . " ($locale->name)";
                }
            }
        }

        // POLICY DESCRIPTION
        if (isset($request['policy_description'])) {
            foreach ($this->locales as $locale) {
                if (isset($request['policy_description'][$locale->slug]) && $request['policy_description'][$locale->slug] == 'on') {
                    $headings[] = __('Policy Description') . " ($locale->name)";
                }
            }
        }
        return $headings;
    }

    public function map($product): array
    {
        $request = $this->request;
        $mapped = [];

        // ID
        if (isset($request['id']) && $request['id'] == 'on') {
            $mapped = [$product->id];
        }

        // NAME
        if (isset($request['name'])) {
            foreach ($this->locales as $locale) {
                if (isset($request['name'][$locale->slug]) && $request['name'][$locale->slug] == 'on') {

                    $mapped[] = $product->getTranslation('name', $locale->slug);
                }
            }
        }

        // DESCRIPTION
        if (isset($request['description'])) {
            foreach ($this->locales as $locale) {
                if (isset($request['description'][$locale->slug]) && $request['description'][$locale->slug] == 'on') {
                    $mapped[] = $product->getTranslation('description', $locale->slug);
                }
            }
        }

        // SLUG
        if (isset($request['slug'])) {
            foreach ($this->locales as $locale) {
                if (isset($request['slug'][$locale->slug]) && $request['slug'][$locale->slug] == 'on') {
                    $mapped[] = $product->getTranslation('slug', $locale->slug);
                }
            }
        }

        // URL
        if (isset($request['url'])) {
            foreach ($this->locales as $locale) {
                if (isset($request['url'][$locale->slug]) && $request['url'][$locale->slug] == 'on') {
                    $mapped[] = route(route_prefix() . 'shop.product.details', $product->getTranslation('slug', $locale->slug));
                }
            }
        }

        // BRAND
        if (isset($request['brand'])) {
            $brand = Brand::query()
                ->find($product->brand_id);
            foreach ($this->locales as $locale) {
                if (isset($request['brand'][$locale->slug]) && $request['brand'][$locale->slug] == 'on') {
                    if ($brand) {
                        $mapped[] = $brand->name;
                    } else {
                        $mapped[] = '';
                    }

                }
            }
        }

        // STATUS
        if (isset($request['status']) && $request['status'] == 'on') {
            $status = Status::query()
                ->find($product->status_id);
            if ($status) {
                $mapped[] = lcfirst($status->name);
            } else {
                $mapped[] = '';
            }

        }

        // BASE COST
        if (isset($request['base_cost']) && $request['base_cost'] == 'on') {
            $mapped[] = $product->cost;
        }

        // REGULAR PRICE
        if (isset($request['regular_price']) && $request['regular_price'] == 'on') {
            $mapped[] = $product->price;
        }

        // SALE PRICE
        if (isset($request['sale_price']) && $request['sale_price'] == 'on') {
            $mapped[] = $product->sale_price;
        }

        // TAX
        if (isset($request['tax']) && $request['tax'] == 'on') {
            $mapped[] = $product->is_taxable == 1 ? __('Yes') : __('No');
        }

        // TAX CLASSES
        if (isset($request['tax_classes']) && $request['tax_classes'] == 'on') {
            $taxClass = TaxClass::query()
                ->find($product->tax_class_id);
            if ($taxClass) {
                $mapped[] = $taxClass->name;
            } else {
                $mapped[] = '';
            }

        }

        // FEATURE IMAGE
        if (isset($request['feature_image']) && $request['feature_image'] == 'on') {

            $signature_img = get_attachment_image_by_id($product->image_id);
            if (!empty($signature_img)) {
                if (!empty($signature_img['img_url'])) {
                    $mapped[] = $signature_img['img_url'];
                } else {
                    $mapped[] = '';
                }
            } else {
                $mapped[] = '';
            }
        }

        // IMAGE GALLERY
        if (isset($request['image_gallery']) && $request['image_gallery'] == 'on') {
            $productGallery = ProductGallery::query()
                ->where('product_id', '=', $product->id)
                ->get();
            $images = [];

            foreach ($productGallery as $productImage) {
                $signature_img = get_attachment_image_by_id($productImage->image_id);

                if (!empty($signature_img)) {
                    if (!empty($signature_img['img_url'])) {
                        $images[] = $signature_img['img_url'];
                    }
                }
            }
            $mapped[] = $images;

        }

        // SKU
        if (isset($request['sku']) && $request['sku'] == 'on') {
            $productInventory = ProductInventory::query()
                ->where('product_id', '=', $product->id)
                ->first();
            if ($productInventory) {
                $mapped[] = $productInventory->sku;
            } else {
                $mapped[] = '';
            }
        }

        // QUANTITY
        if (isset($request['quantity']) && $request['quantity'] == 'on') {
            $productInventory = ProductInventory::query()
                ->where('product_id', '=', $product->id)
                ->first();
            if ($productInventory) {
                $mapped[] = $productInventory->stock_count;
            } else {
                $mapped[] = '';
            }
        }

        // UNIT
        if (isset($request['unit']) && $request['unit'] == 'on') {
            $uom = ProductUom::query()
                ->where('product_id', '=', $product->id)
                ->first();
            if ($uom) {

                $unit = Unit::query()
                    ->find($uom->unit_id);
                if ($unit) {
                    $mapped[] = $unit->name;
                } else {
                    $mapped[] = '';
                }
            } else {
                $mapped[] = '';
            }
        }

        // UNIT OF MEASUREMENT
        if (isset($request['unit_of_measurement']) && $request['unit_of_measurement'] == 'on') {
            $uom = ProductUom::query()
                ->where('product_id', '=', $product->id)
                ->first();
            if ($uom) {

                $unit = Unit::query()
                    ->find($uom->unit_id);
                if ($unit) {
                    $mapped[] = $unit->quantity;
                } else {
                    $mapped[] = '';
                }
            } else {
                $mapped[] = '';
            }
        }

        // VARIANT
        if (isset($request['variant']) && $request['variant'] == 'on') {
            $productInventoryDetails = ProductInventoryDetail::query()
                ->where('product_id', '=', $product->id)
                ->get();

            if (count($productInventoryDetails) > 0) {
                $variants = [];
                foreach ($productInventoryDetails as $key => $productInventoryDetail) {
                    $variantArray = [];
                    $variantArray['additional_price'] = $productInventoryDetail['additional_price'];
                    $variantArray['add_cost'] = $productInventoryDetail['add_cost'];
                    $variantArray['stock_count'] = $productInventoryDetail['stock_count'];
                    $variantArray['sold_count'] = $productInventoryDetail['sold_count'];

                    $size = Size::query()
                        ->find($productInventoryDetail['size']);

                    if ($size) {
                        $variantArray['size'] = $size['name'];
                    }

                    $color = Color::query()
                        ->find($productInventoryDetail['color']);

                    if ($size) {
                        $variantArray['color'] = $color['name'];
                    }

                    $signature_img = get_attachment_image_by_id($productInventoryDetail['image']);
                    if (!empty($signature_img)) {
                        if (!empty($signature_img['img_url'])) {
                            $variantArray['image'] = $signature_img['img_url'];
                        } else {
                            $variantArray['image'] = '';
                        }
                    } else {
                        $variantArray['image'] = '';
                    }

                    $productInventoryDetailAttrs = ProductInventoryDetailAttribute::query()
                        ->where('inventory_details_id', '=', $productInventoryDetail->id)
                        ->get();
                    if (count($productInventoryDetailAttrs) > 0) {
                        foreach ($productInventoryDetailAttrs as $productInventoryDetailAttr) {
                            $variantArray[$productInventoryDetailAttr['attribute_name']] = $productInventoryDetailAttr['attribute_value'];
                        }
                    }
                    $variants[] = $variantArray;
                }
                $mapped[] = $variants;

            } else {
                $mapped[] = '';
            }
        }

        // CATEGORY
        if (isset($request['category']) && $request['category'] == 'on') {
            $mapped[] = $product->category->name;
        }


        // SUBCATEGORY
        if (isset($request['sub_category']) && $request['sub_category'] == 'on') {

            $mapped[] = $product->subCategory->name;
        }

        // CHILD CATEGORY
        if (isset($request['child_category']) && $request['child_category'] == 'on') {
            if (count($product->childCategory) > 0) {
                $childTemp = '';
                foreach ($product->childCategory as $key => $childCategory) {
                    if ($key == 0) {
                        $childTemp = $childCategory->name;
                    } else {
                        $childTemp .= ', ' . $childCategory->name;
                    }

                }
                $mapped[] = $childTemp;
            } else {
                $mapped[] = '';
            }
        }


        // DELIVERY OPTION
        if (isset($request['delivery_option']) && $request['delivery_option'] == 'on') {
            if (count($product->delivery_option) > 0) {
                $option = [];
                foreach ($product->delivery_option as $key => $deliveryOption) {
                    $optionEntity = DeliveryOption::query()
                        ->find($deliveryOption->delivery_option_id);
                    $option[] = [
                        'title' => $optionEntity->title,
                        'subtitle' => $optionEntity->sub_title
                    ];

                }
                $mapped[] = $option;
            } else {
                $mapped[] = '';
            }

        }


        // META SEO
        if (isset($request['meta_seo'])) {
            $metas = [];
            foreach ($this->locales as $locale) {
                if (isset($request['meta_seo'][$locale->slug]) && $request['meta_seo'][$locale->slug] == 'on') {
                    $metas['title'] = $product->metaData && $product->metaData->getTranslation('title', $locale->slug) ? $product->metaData->getTranslation('title', $locale->slug) : '';
                    $metas['description'] = $product->metaData && $product->metaData->getTranslation('description', $locale->slug) ? $product->metaData->getTranslation('description', $locale->slug) : '';
                    $metas['fb_title'] = $product->metaData && $product->metaData->getTranslation('fb_title', $locale->slug) ? $product->metaData->getTranslation('fb_title', $locale->slug) : '';
                    $metas['fb_description'] = $product->metaData && $product->metaData->getTranslation('fb_description', $locale->slug) ? $product->metaData->getTranslation('fb_description', $locale->slug) : '';
                    $metas['tw_title'] = $product->metaData && $product->metaData->getTranslation('tw_title', $locale->slug) ? $product->metaData->getTranslation('tw_title', $locale->slug) : '';
                    $metas['tw_description'] = $product->metaData && $product->metaData->getTranslation('tw_description', $locale->slug) ? $product->metaData->getTranslation('tw_description', $locale->slug) : '';


                }
                $mapped[] = $metas;
            }

        }

        // POLICY DESCRIPTION
        if (isset($request['policy_description'])) {
            foreach ($this->locales as $locale) {
                if (isset($request['policy_description'][$locale->slug]) && $request['policy_description'][$locale->slug] == 'on') {
                    $mapped[] = $product->return_policy->getTranslation('shipping_return_description', $locale->slug);
                }
            }
        }

        return $mapped;
    }
}
