<?php

namespace Modules\Product\Exports;

use App\Models\Language;
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

class ProductsExportExample implements FromCollection, WithHeadings, WithMapping
{

    protected $locales;

    public function __construct()
    {
        $languages = Language::query()
            ->where('status', '=', 1)
            ->get();

        $this->locales = $languages;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::with('category', 'subCategory', 'childCategory', 'inventory', 'inventoryDetail', 'uom', 'product_delivery_option', 'tag', 'color', 'size')
            ->get()
            ->take(3);
    }

    public function headings(): array
    {

        // NAME
        foreach ($this->locales as $locale) {
            $headings[] = 'Name' . " ($locale->slug)";
        }
        // DESCRIPTION
        foreach ($this->locales as $locale) {
            $headings[] = 'Description' . " ($locale->slug)";
        }

        // BRAND
        foreach ($this->locales as $locale) {
            $headings[] = 'Brand' . " ($locale->slug)";
        }

        // BASE COST
        $headings[] = 'Base Cost';

        // REGULAR PRICE
        $headings[] = 'Regular Price';

        // SALE PRICE
        $headings[] = 'Sale Price';

        // TAX
        $headings[] = 'Tax';

        // TAX CLASSES
        $headings[] = 'Tax Classes';

        // FEATURE IMAGE
        $headings[] = 'Feature Image';

        // IMAGE GALLERY
        $headings[] = 'Image Gallery';

        // SKU
        $headings[] = 'SKU';

        // QUANTITY
        $headings[] = 'Quantity';

        // UNIT
        $headings[] = 'Unit';

        // UNIT OF MEASUREMENT
        $headings[] = 'Unit of Measurement';

        // CATEGORY
        $headings[] = 'Category';

        // SUBCATEGORY
        $headings[] = 'Sub Category';

        // CHILD CATEGORY
        $headings[] = 'Child Category';

        // DELIVERY OPTION
        $headings[] = 'Delivery Option';

        // META SEO
        foreach ($this->locales as $locale) {
            $headings[] = 'Meta SEO' . " ($locale->slug)";
        }

        // POLICY DESCRIPTION
        foreach ($this->locales as $locale) {
            $headings[] = 'Policy Description' . " ($locale->slug)";
        }
        return $headings;
    }

    public function map($product): array
    {
        $mapped = [];

        // NAME
        foreach ($this->locales as $locale) {
            $mapped[] = $product->getTranslation('name', $locale->slug);
        }

        // DESCRIPTION
        foreach ($this->locales as $locale) {
            $mapped[] = $product->getTranslation('description', $locale->slug);
        }

        // BRAND
        $brand = Brand::query()
            ->find($product->brand_id);
        foreach ($this->locales as $locale) {
            if ($brand) {
                $mapped[] = $brand->name;
            } else {
                $mapped[] = '';
            }
        }

        // BASE COST
        $mapped[] = $product->cost;

        // REGULAR PRICE
        $mapped[] = $product->price;

        // SALE PRICE
        $mapped[] = $product->sale_price;

        // TAX
        $mapped[] = $product->is_taxable;

        // TAX CLASSES
        $taxClass = TaxClass::query()
            ->find($product->tax_class_id);
        if ($taxClass) {
            $mapped[] = $taxClass->name;
        } else {
            $mapped[] = '';
        }

        // FEATURE IMAGE
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

        // IMAGE GALLERY
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

        $imageLinksAsString = implode(", ", $images);
        $mapped[] = $imageLinksAsString;

        // SKU
        $productInventory = ProductInventory::query()
            ->where('product_id', '=', $product->id)
            ->first();
        if ($productInventory) {

            $mapped[] = $productInventory->sku;
        } else {
            $mapped[] = '';
        }

        // QUANTITY
        if ($productInventory) {
            $mapped[] = $productInventory->stock_count;
        } else {
            $mapped[] = '';
        }

        // UNIT
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

        // UNIT OF MEASUREMENT
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

        // CATEGORY
        $mapped[] = $product->category->name;


        // SUBCATEGORY
        $mapped[] = $product->subCategory->name;

        // CHILD CATEGORY
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


        // DELIVERY OPTION
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


        // META SEO
        $metas = [];
        foreach ($this->locales as $locale) {
            $metas['title'] = $product->metaData && $product->metaData->getTranslation('title', $locale->slug) ? $product->metaData->getTranslation('title', $locale->slug) : '';
            $metas['description'] = $product->metaData && $product->metaData->getTranslation('description', $locale->slug) ? $product->metaData->getTranslation('description', $locale->slug) : '';
            $metas['fb_title'] = $product->metaData && $product->metaData->getTranslation('fb_title', $locale->slug) ? $product->metaData->getTranslation('fb_title', $locale->slug) : '';
            $metas['fb_description'] = $product->metaData && $product->metaData->getTranslation('fb_description', $locale->slug) ? $product->metaData->getTranslation('fb_description', $locale->slug) : '';
            $metas['tw_title'] = $product->metaData && $product->metaData->getTranslation('tw_title', $locale->slug) ? $product->metaData->getTranslation('tw_title', $locale->slug) : '';
            $metas['tw_description'] = $product->metaData && $product->metaData->getTranslation('tw_description', $locale->slug) ? $product->metaData->getTranslation('tw_description', $locale->slug) : '';

            $mapped[] = $metas;
        }

        // POLICY DESCRIPTION
        foreach ($this->locales as $locale) {
            $mapped[] = $product->return_policy->getTranslation('shipping_return_description', $locale->slug);

        }

        return $mapped;
    }
}
