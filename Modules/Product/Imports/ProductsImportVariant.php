<?php

namespace Modules\Product\Imports;

use App\Models\Language;
use App\Models\MetaInfo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Attributes\Entities\Brand;
use Modules\Attributes\Entities\Category;
use Modules\Attributes\Entities\ChildCategory;
use Modules\Attributes\Entities\Color;
use Modules\Attributes\Entities\DeliveryOption;
use Modules\Attributes\Entities\Size;
use Modules\Attributes\Entities\SubCategory;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Entities\ProductChildCategory;
use Modules\Product\Entities\ProductDeliveryOption;
use Modules\Product\Entities\ProductInventory;
use Modules\Product\Entities\ProductInventoryDetail;
use Modules\Product\Entities\ProductInventoryDetailAttribute;
use Modules\Product\Entities\ProductShippingReturnPolicy;
use Modules\Product\Entities\ProductSubCategory;
use Modules\TaxModule\Entities\TaxClass;
use Str;

class ProductsImportVariant implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        if (!$row['id'] || !$row['color'] || !$row['size']) {

            return;
        }

        // Dil kodlarını belirlemek için gerekli işlemler
        $languages = Language::query()
            ->where('status', '=', 1)
            ->get();


        $product = new Product();
        $productData = [];
        $color = '';
        $size = '';
        $inventoryId = null;
        foreach ($languages as $lang) {

            // ID
            $id = $row['id'];

            // Color
            $colorTemp = Color::query()
                ->where('name->' . $lang->slug, '=', $row['color'])
                ->first();

            if (empty($color) && $colorTemp) {
                $color = $colorTemp->id;
            }

            // Size
            $sizeTemp = Size::query()
                ->where('name->' . $lang->slug, '=', $row['size'])
                ->first();

            if (empty($size) && $sizeTemp) {
                $size = $sizeTemp->id;
            }
        }

        if (empty($color)) {
            $colorArray = [];
            $colorSlugArray = [];
            foreach ($languages as $lang) {
                $colorArray[$lang->slug] = $row['color'];
                $colorSlugArray[$lang->slug] = Str::slug($row['color']);
            }
            $colorTemp2 = Color::query()
                ->create([
                    'name' => $colorArray,
                    'slug' => $colorSlugArray,
                ]);
            $color = $colorTemp2->id;
        }
        if (empty($size)) {
            $sizeArray = [];
            $sizeSlugArray = [];
            foreach ($languages as $lang) {
                $sizeArray[$lang->slug] = $row['size'];
                $sizeSlugArray[$lang->slug] = Str::slug($row['size']);
            }
            $sizeTemp2 = Size::query()
                ->create([
                    'name' => $sizeArray,
                    'slug' => $sizeSlugArray,
                    'size_code' => $row['size'],

                ]);
            $size = $sizeTemp2->id;
        }
        $inventories = ProductInventoryDetail::query()
            ->where('product_id', '=', $id)
            ->where('size', '=', $size)
            ->where('color', '=', $color)
            ->get();


        if (count($inventories) > 0) {
            if ($row['attributes']) {
                $attributes = json_decode($row['attributes']);

                $inventoryDetail = '';
                foreach ($inventories as $inventory) {

                    foreach ($languages as $lang) {
                        $inventoryDetail = ProductInventoryDetailAttribute::query()
                            ->where('inventory_details_id', '=', $inventory->id)
                            ->where('product_id', '=', $id)
                            ->where('attribute_name->' . $lang->slug, '=', $attributes[0]->attribute_name)
                            ->where('attribute_value->' . $lang->slug, '=', $attributes[0]->attribute_value)
                            ->first();
                        if ($inventoryDetail) {
                            break;
                        }
                    }

                    if ($inventoryDetail) {
                        break;
                    }

                }

                if ($inventoryDetail) {
                    $inventoryId = $inventoryDetail->inventory_details_id;
                }

            } else {
                $inventoryId = $inventories[0]->id;
            }
        }

        if ($inventoryId) {
            $inventoryUpdate = ProductInventoryDetail::query()
                ->update([
                    'additional_price' => $row['additional_price'] ?? 0,
                    'add_cost' => $row['add_cost'] ?? 0,
                    'stock_count' => $row['stock_count'] ?? 0,
                ]);

        } else {
            $productInventory = ProductInventory::query()
                ->where('product_id', '=', $id)
                ->first();

            if (!$productInventory) {
                return;
            }

            $inventoryUpdate = ProductInventoryDetail::query()
                ->create([
                    'product_id' => $id,
                    'size' =>$size,
                    'color' => $color,
                    'product_inventory_id' => $productInventory->id,
                    'additional_price' => $row['additional_price'] ?? 0,
                    'add_cost' => $row['add_cost'] ?? 0,
                    'stock_count' => $row['stock_count'] ?? 0,
                ]);
        }

    }
}
