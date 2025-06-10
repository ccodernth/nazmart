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

class ProductsExportExampleVariant implements FromCollection, WithHeadings, WithMapping
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
        $product = Product::query()
            ->pluck('id')
            ->take(3)
            ->toArray();

        return ProductInventoryDetail::query()
            ->whereIn('product_id', $product)
            ->get();
    }

    public function headings(): array
    {

        // ID
        $headings[] = 'ID';

        // Color
        $headings[] = 'Color';

        // Size
        $headings[] = 'Size';

        // Additional Price
        $headings[] = 'Additional Price';

        // Add Cost
        $headings[] = 'Add Cost';

        // Stock Count
        $headings[] = 'Stock Count';

        // Attributes
        $headings[] = 'Attributes';

        return $headings;
    }

    public function map($productInventories): array
    {

        // ID
        $mapped[] = $productInventories->product_id;

        // Color
        if (!empty($productInventories->color)) {
            $color = Color::query()->find($productInventories->color);
            $mapped[] = $color->getTranslation('name', app()->getLocale());
        } else {
            $mapped[] = '';
        }

        // Size
        if (!empty($productInventories->size)) {
            $size = Size::query()->find($productInventories->size);
            $mapped[] = $size->getTranslation('name', app()->getLocale());
        } else {
            $mapped[] = '';
        }


        // Additional Price
        $mapped[] = $productInventories->additional_price ?? '';

        // Add Cost
        $mapped[] = $productInventories->add_cost ?? '';

        // Stock Count
        $mapped[] = $productInventories->stock_count ?? '';

        // Attributes
        $productInventoryAttributes = ProductInventoryDetailAttribute::query()
            ->where('product_id', '=', $productInventories->product_id)
            ->where('inventory_details_id', '=', $productInventories->id)
            ->get();
        if (count($productInventoryAttributes) > 0) {
            $attributes = [];
            foreach ($productInventoryAttributes as $productInventoryAttribute) {

                $attributes [] = [
                    'attribute_name' => $productInventoryAttribute->attribute_name,
                    'attribute_value' => $productInventoryAttribute->attribute_value
                ];
            }
            $mapped[] = $attributes;
        } else {

            $mapped[] = '';

        }
        return $mapped;
    }
}
