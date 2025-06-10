<?php

namespace Modules\Product\Http\Traits;

use App\Enums\ProductTypeEnum;
use App\Helpers\SanitizeInput;
use App\Http\Services\CustomPaginationService;
use App\Models\Language;
use App\Models\MetaInfo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductAttribute;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Entities\ProductChildCategory;
use Modules\Product\Entities\ProductCreatedBy;
use Modules\Product\Entities\ProductDeliveryOption;
use Modules\Product\Entities\ProductGallery;
use Modules\Product\Entities\ProductInventory;
use Modules\Product\Entities\ProductInventoryDetail;
use Modules\Product\Entities\ProductInventoryDetailAttribute;
use Modules\Product\Entities\ProductShippingReturnPolicy;
use Modules\Product\Entities\ProductSubCategory;
use Modules\Product\Entities\ProductTag;
use Modules\Product\Entities\ProductUom;
use Str;

trait ProductGlobalTrait
{
    private function search($request, $route = 'tenant.admin', $queryType = "admin"): array
    {
        $type = $request->type ?? 'default';
        $multiple_date = $this->is_date_range_multiple();

        // create product model instance
        // $all_products = Product::query()->with("brand", "category", "childCategory", "subCategory", "inventory");
        // first I need to check who is currently want to take data
        // run a condition that will check if vendor is currently login then only vendor product will return

        // create product model instance
        if ($queryType == 'admin') {
            $all_products = Product::query()->with("brand", "category", "childCategory", "subCategory", "inventory");
        } else if ($queryType == 'frontend') {
            $all_products = Product::query()->with('campaign_sold_product', 'subCategory', 'campaign_product', 'inventory', 'badge', 'uom')
                ->withAvg("reviews", "rating")
                ->withCount("reviews");
        } else if ($queryType == 'api') {
            $all_products = Product::query()->with('campaign_sold_product', 'category', 'subCategory', 'childCategory', 'campaign_product', 'inventory', 'badge', 'uom')
                ->withAvg("reviews", "rating")
                ->withCount("reviews")
                ->withSum('taxOptions', 'rate')
                ->where('status_id', 1);
        }

        // search product name
        $all_products->when(!empty($request->name) && $request->has("name"), function ($query) use ($request) {
            $query->where("name", "LIKE", "%" . $request->name . "%");
        })->when(!empty($request->tag) && $request->has("tag"), function ($query) use ($request) {// search by using tag
            $query->whereHas("tag", function ($i_query) use ($request) {
                $i_query->where("tag_name", "like", "%" . $request->tag . "%");
            });
        })->when(!empty($request->category) && $request->has("category"), function ($query) use ($request) { // category
            $query->whereHas("category", function ($i_query) use ($request) {
                $i_query->where("name", "like", "%" . $request->category . "%");
            });
        })->when(!empty($request->brand) && $request->has("brand"), function ($query) use ($request) { // Brand
            $query->whereHas("brand", function ($i_query) use ($request) {
                $i_query->where("name", "like", "%" . $request->brand . "%");
            });
        })->when(!empty($request->sub_category) && $request->has("sub_category"), function ($query) use ($request) { // sub category
            $query->whereHas("subCategory", function ($i_query) use ($request) {
                $i_query->where("name", "like", "%" . $request->sub_category . "%");
            });
        })->when(!empty($request->child_category) && $request->has("child_category"), function ($query) use ($request) { // child category
            $query->whereHas("childCategory", function ($i_query) use ($request) {
                $i_query->where("name", "like", "%" . $request->child_category . "%");
            });
        })->when(!empty($request->category_id) && $request->has("category_id"), function ($query) use ($request) { // category
            $query->whereHas("category", function ($i_query) use ($request) {
                $i_query->where("categories.id", trim(strip_tags($request->category_id)));
            });
        })->when(!empty($request->sub_category_id) && $request->has("sub_category_id"), function ($query) use ($request) { // sub category
            $query->whereHas("subCategory", function ($i_query) use ($request) {
                $i_query->where("sub_categories.id", trim(strip_tags($request->sub_category_id)));
            });
        })->when(!empty($request->child_category_id) && $request->has("child_category_id"), function ($query) use ($request) { // child category
            $query->whereHas("childCategory", function ($i_query) use ($request) {
                $i_query->where("child_categories.id", trim(strip_tags($request->child_category_id)));
            });
        })->when(!empty($request->color) && $request->has("color"), function ($query) use ($request) { // color
            $query->whereHas("color", function ($i_query) use ($request) {
                $i_query->where("name", "like", "%" . $request->color . "%");
            });
        })->when(!empty($request->size) && $request->has("size"), function ($query) use ($request) { // size
            $query->whereHas("size", function ($i_query) use ($request) {
                $i_query->where("name", "like", "%" . $request->size . "%");
            });
        })->when(!empty($request->sku) && $request->has("sku"), function ($query) use ($request) { // sku
            $query->whereHas("inventory", function ($i_query) use ($request) {
                $i_query->where("sku", "like", "%" . $request->sku . "%");
            });
        })->when(!empty($request->delivery_option) && $request->has("delivery_option"), function ($query) use ($request) { // delivery option
            $query->whereHas("productDeliveryOption", function ($i_query) use ($request) {
                $i_query->where("title", "like", "%" . $request->delivery_option . "%");
            });
        })->when(!empty($request->refundable) && $request->has("refundable"), function ($query) use ($request) { // refundable
            $query->where("is_refundable", 1);
        })->when(!empty($request->inventory_warning) && $request->has("inventory_warning"), function ($query) use ($request) { // inventory warning
            $query->where("is_inventory_warn_able", 1);
        })->when(!empty($request->from_price) && $request->has("from_price") && !empty($request->to_price) && $request->has("to_price"), function ($query) use ($request) { // price
            $query->whereBetween("sale_price", [$request->from_price, $request->to_price]);
        })->when($multiple_date[0] && $request->has("date_range"), function ($query) use ($request, $multiple_date) { // Order By
            // make separate to date in a array
            $arr = $multiple_date[1];
            $query->whereBetween("created_at", $arr);
        })->when(!empty($multiple_date[0]) && $request->has("date_range"), function ($query) use ($request, $multiple_date) { // Order By
            // make separate to date in a array
            $date = $multiple_date[1];
            $query->whereDate("created_at", $date);
        })->when(!empty($request->order_by) && $request->has("order_by"), function ($query) use ($request) { // Order By
            $query->orderBy("id", $request->order_by);
        })->when(!$request->has('order'), function ($query) {
            $query->orderBy("id", "DESC");
        });

        $display_item_count = request()->count ?? 10;

        $current_query = request()->all();
        $create_query = http_build_query($current_query);

        return CustomPaginationService::pagination_type($all_products, $display_item_count, "custom", route($route . ".product.search") . '?' . $create_query);
    }

    private function is_date_range_multiple(): array
    {
        $date = explode(" to ", request()->date_range);

        if (count($date) > 1 && !empty(request()->date_range)) {
            return [true, $date];
        }

        return [false, request()->date_range];
    }

    private function product_type(): int
    {
        return ProductTypeEnum::PHYSICAL;
    }

    public function ProductData($data): array
    {
        $translate = $this->convertTranslate($data['translate']);

        return [
            "name" => $translate["name"],
            "slug" => $translate["slug"],
            "summary" => $translate["summary"],
            "description" => $translate['description'],
            "image_id" => $data["image_id"],
            "price" => $data["price"],
            "sale_price" => $data["sale_price"],
            "cost" => $data["cost"],
            "is_taxable" => $data["is_taxable"] == 'yes', // yes = 1, no = 0
            "tax_class_id" => $data["tax_class"],
            "badge_id" => $data["badge_id"],
            "brand_id" => $data["brand"],
            "status_id" => 1,
            "product_type" => $this->product_type() ?? 2,
            "min_purchase" => isset($data["min_purchase"]) ? $data["min_purchase"] : '',
            "max_purchase" => $data["max_purchase"],
            "is_inventory_warn_able" => $data["is_inventory_warn_able"] ? 1 : 2,
            "is_refundable" => !empty($data["is_refundable"]),
        ];
    }

    public function CloneData($data): array
    {
        $nameData = $data->getTranslations();
        $newData = [];
        foreach ($nameData as $key1 => $title) {
        foreach ($title as $key2 => $language) {
            $newData[$key1][$key2] = str_replace(
                ['&amp;', 'amp;', '&quot;', '#039;', '&lt;', '&gt;'],
                ['', '', '"', "'", '<', '>'],
                $language
            );
        }
    }
        return [
            "name" => $newData['name'],
            "slug" => $newData['slug'],
            "summary" => $newData['summary'],
            "description" =>  $newData['description'],
            "image_id" => $data->image_id,
            "price" => $data->price,
            "sale_price" => $data->sale_price,
            "cost" => $data->cost,
            "badge_id" => $data->badge_id,
            "brand_id" => $data->brand_id,
            "status_id" => 2,
            "product_type" => $this->product_type() ?? 2,
            "min_purchase" => $data->min_purchase,
            "max_purchase" => $data->max_purchase,
            "is_inventory_warn_able" => $data->is_inventory_warn_able ? 1 : 2,
            "is_refundable" => !empty($data->is_refundable)
        ];
    }

    public function prepareProductInventoryDetailsAndInsert($data, $product_id, $inventory_id, $type = "create"): bool
    {
        if ($type == "update") {
            // get all product inventory detail id
            $prd_in_detail = ProductInventoryDetail::where([
                "product_id" => $product_id,
                "product_inventory_id" => $inventory_id
            ])->select("id")?->pluck("id")?->toArray();


            // delete product inventory detail attribute
            ProductInventoryDetailAttribute::where([
                "product_id" => $product_id
            ])->whereIn("inventory_details_id", $prd_in_detail)->delete();

            // delete all product inventory detail
            ProductInventoryDetail::where([
                "product_id" => $product_id,
                "product_inventory_id" => $inventory_id
            ])->delete();
        }

        // count item stock for getting array length
        $len = count($data["item_stock_count"] ?? []);
        for ($i = 0; $i < $len; $i++) {
            $arr = [
                "product_id" => $product_id,
                "product_inventory_id" => $inventory_id,
                "color" => $data["item_color"][$i],
                "size" => $data["item_size"][$i],
                "hash" => "",
                "additional_price" => $data["item_additional_price"][$i],
                "add_cost" => $data["item_extra_cost"][$i],
                "image" => $data["item_image"][$i],
                "stock_count" => $data["item_stock_count"][$i],
                "sold_count" => 0
            ];

            $productDetailId = ProductInventoryDetail::create($arr);


            $detailAttr = [];

            if (isset($data["item_attribute_name"][$i])) {

                $languages = Language::query()->where('status', '=', 1)->get();
                $attributeValue = [];


                foreach ($languages as $language) {

                    $attributeValue[$language->slug] = $data["item_attribute_value"][$i][0];
                }
                $productAttribute = ProductAttribute::query()->where('title->' . app()->getLocale(), '=', $data["item_attribute_name"][$i][0])->first();
              if ($productAttribute) {
                  $detailAttr[] = [
                      "product_id" => $product_id,
                      "inventory_details_id" => $productDetailId->id,
                      "attribute_name" => json_encode($productAttribute->getTranslations()['title'], true) ?? "",
                      "attribute_value" => json_encode($attributeValue, true) ?? ""
                  ];
              }

            }

            ProductInventoryDetailAttribute::insert($detailAttr);
        }

        return true;
    }

    private function productCategoryData($data, $id, $arrKey = "category_id", $column = "category_id"): array
    {
        return [
            $arrKey => $data[$column],
            "product_id" => $id
        ];
    }

    private function childCategoryData($data, $id): array
    {
        $cl_category = [];
        foreach ($data["child_category"] ?? [] as $item) {
            $cl_category[] = ["child_category_id" => $item, "product_id" => $id];
        }

        return $cl_category;
    }

    private function prepareDeliveryOptionData($data, $id): array
    {
        // explode string to array
        $arr = [];
        $exp_delivery_option = $this->separateStringToArray($data["delivery_option"], " , ") ?? [];

        foreach ($exp_delivery_option as $option) {
            $arr[] = [
                "product_id" => $id,
                "delivery_option_id" => $option
            ];
        }

        return $arr;
    }

    private function prepareProductGalleryData($data, $id): array
    {
        // explode string to array
        $arr = [];
        $galleries = $this->separateStringToArray($data["product_gallery"], "|");

        foreach ($galleries as $image) {
            $arr[] = [
                "product_id" => $id,
                "image_id" => $image
            ];
        }

        return $arr;
    }

    private function prepareProductTagData($data, $id): array
    {
        $tagsConvert = [];
        if (isset($data['translate_tags'])) {
            $tagsConvert = $this->convertTranslateTag($data['translate_tags']) ?? [];
        }
        // explode string to array
        $arr = [];

        if (count($tagsConvert) > 0) {
            foreach ($tagsConvert as $tag) {
                $arr[] = [
                    "product_id" => $id,
                    "tag_name" => json_encode($tag)
                ];
            }
        } else {
            if ($data['tags']) {
                $arr[] = [
                    "product_id" => $id,
                    "tag_name" => $data['tags']
                ];
            } else {
                $arr[] = [
                    "product_id" => $id,
                    "tag_name" => ''
                ];
            }

        }


        return $arr;
    }

    private function prepareInventoryData($data, $id = null): array
    {
        $inventoryStockCount = $data["item_stock_count"];
        $stock_count = array_sum($inventoryStockCount ?? []);

        $arr = [
            "sku" => SanitizeInput::esc_html($data["sku"]),
            "stock_count" => $stock_count ? $stock_count : $data["quantity"],
        ];

        return $id ? $arr + ["product_id" => $id] : $arr;
    }

    private function separateStringToArray(string|null $string, string $separator = " , "): array|bool
    {
        if (empty($string)) return [];
        return explode($separator, $string);
    }

    public function prepareMetaData($data): array
    {

        return [
            'title' => $data["general_title"] ?? '',
            'description' => $data["general_description"] ?? '',
            'fb_title' => $data["facebook_title"] ?? '',
            'fb_description' => $data["facebook_description"] ?? '',
            'fb_image' => $data["facebook_image"] ?? '',
            'tw_title' => $data["twitter_title"] ?? '',
            'tw_description' => $data["twitter_description"] ?? '',
            'tw_image' => $data["twitter_image"] ?? ''
        ];
    }

    private function userId()
    {
        return \Auth::guard("admin")->check() ? \Auth::guard("admin")->user()->id : '';
    }

    private function getGuardName(): string
    {
        return \Auth::guard("admin")->check() ? "admin" : "vendor";
    }


    private function createArrayCreatedBy($product_id, $type)
    {
        $arr = [];

        if ($type == 'create') {
            $arr = [
                "product_id" => $product_id,
                "created_by_id" => $this->userId(),
                "guard_name" => $this->getGuardName(),
            ];
        } elseif ($type == 'update') {
            $arr = [
                "product_id" => $product_id,
                "updated_by" => $this->userId(),
                "updated_by_guard" => $this->getGuardName(),
            ];
        } elseif ($type == 'delete') {
            $arr = [
                "product_id" => $product_id,
                "deleted_by" => $this->userId(),
                "deleted_by_guard" => $this->getGuardName(),
            ];
        }

        return $arr;
    }

    public function createdByUpdatedBy($product_id, $type = "create"): ProductCreatedBy
    {
        if (!ProductCreatedBy::where('product_id', $product_id)->exists()) {
            ProductCreatedBy::create([
                "product_id" => $product_id,
                "created_by_id" => $this->userId(),
                "guard_name" => $this->getGuardName(),
            ]);
        }

        return ProductCreatedBy::updateOrCreate(
            [
                "product_id" => $product_id
            ],
            $this->createArrayCreatedBy($product_id, $type)
        );
    }

    private function prepareUomData($data, $product_id): array
    {
        return [
            "product_id" => $product_id,
            "unit_id" => $data["unit_id"],
            "quantity" => $data["uom"] ?? 0
        ];
    }

    public function updateStatus($productId, $statusId): JsonResponse
    {
        $product = Product::find($productId)->update(["status_id" => $statusId]);
        $this->createdByUpdatedBy($productId, "update");

        $response_status = $product ? ["success" => true, "msg" => __("Successfully updated status")] : ["success" => false, "msg" => __("Failed to update status")];
        return response()->json($response_status)->setStatusCode(200);
    }

    /**
     * @param array $data
     * @param $id
     * @param $product
     * @return bool
     */
    public function insert_product_data(array $data, $id, $product): bool
    {
        $inventory = ProductInventory::create($this->prepareInventoryData($data, $id));
        $inventoryDetail = false;

        if (!empty($data["item_stock_count"][0])) {
            $inventoryDetail = $this->prepareProductInventoryDetailsAndInsert($data, $id, $inventory->id);
        }
        $category = ProductCategory::create($this->productCategoryData($product, $id));
        $subcategory = ProductSubCategory::create($this->productCategoryData($product, $id, "sub_category_id", "sub_category"));
        $childCategory = ProductChildCategory::insert($this->childCategoryData($product, $id));
        $deliveryOptions = ProductDeliveryOption::insert($this->prepareDeliveryOptionData($product, $id));
        $productGallery = ProductGallery::insert($this->prepareProductGalleryData($product, $id));

        ProductTag::insert($this->prepareProductTagData($product, $id));

        $productUom = ProductUom::create($this->prepareUomData($data, $id));

        $productPolicy = ProductShippingReturnPolicy::create([
            'product_id' => $id,
            'shipping_return_description' => $data['policy_description'] ?? ''
        ]);

        return true;
    }

    protected function productInstance($type): Builder
    {
        $product = Product::query();
        if ($type == "edit") {
            $product->with(["product_category", "tag", "uom", "product_sub_category", "product_child_category", "inventory", "delivery_option"]);
        } elseif ($type == "single") {
            $product->with(["category", "gallery_images", "tag", "uom", "subCategory", "childCategory", "image", "inventory", "delivery_option"]);
        } elseif ($type == "list") {
            $product->with(["category", "uom", "subCategory", "childCategory", "brand", "badge", "image", "inventory"]);
        } elseif ($type == "search") {
            $product->with(["category", "uom", "subCategory", "childCategory", "brand", "badge", "image", "inventory"]);
        } else {
            $product = Product::query()->with(["category", "subCategory", "childCategory", "brand", "badge", "image", "inventory"]);
        }

        return $product;
    }

    private function get_product($type = "single", $id=null): Model|Builder|null
    {
       
        // get product instance
        $product = $this->productInstance($type);
        return $product->with("brand")->where("id", $id)->first();
    }

    public function productStore($data)
    {
        $product_data = self::ProductData($data);
        $product = Product::create($product_data);
        $id = $product->id;
        $product->metaData()->updateOrCreate(["metainfoable_id" => $id], $this->convertTranslateMetas($data['translate_meta']));
        // store created by info in product created by table
        $this->createdByUpdatedBy($id);
        return $this->insert_product_data($data, $id, $data);
    }

    public function productUpdate($data, $id)
    {
        $product_data = self::ProductData($data);
        $product = Product::find($id);



        $product->update($product_data);
       // dd($product, $product2);
        $product->metaData()->updateOrCreate(["metainfoable_id" => $id], $this->convertTranslateMetas($data['translate_meta']));
        $product?->inventory?->updateOrCreate(["product_id" => $id], $this->prepareInventoryData($data));
        // updated by info in product created by table
        $this->createdByUpdatedBy($id, "update");
        // check item stock count is empty or not
        $inventoryDetail = false;
        if (!empty($data["item_stock_count"][0])) {
            $inventoryDetail = $this->prepareProductInventoryDetailsAndInsert($data, $id, $product?->inventory?->id, "update");
        }
        $category = $product?->product_category?->updateOrCreate(["product_id" => $id], $this->productCategoryData($data, $id));

        if (!$category) {
            $category = ProductCategory::create($this->productCategoryData($data, $id));
        }
        $subcategory = $product?->product_sub_category?->updateOrCreate(["product_id" => $id], $this->productCategoryData($data, $id, "sub_category_id", "sub_category"));
        if (!$subcategory) {
            $subcategory = ProductSubCategory::create($this->productCategoryData($data, $id, "sub_category_id", "sub_category"));
        }
        // delete product child category
        ProductChildCategory::where("product_id", $id)->delete();
        ProductDeliveryOption::where("product_id", $id)->delete();
        ProductGallery::where("product_id", $id)->delete();
        ProductTag::where("product_id", $id)->delete();

        $product?->uom?->update($this->prepareUomData($data, $id));
        $childCategory = ProductChildCategory::insert($this->childCategoryData($data, $id));
        $deliveryOptions = ProductDeliveryOption::insert($this->prepareDeliveryOptionData($data, $id));
        $productGallery = ProductGallery::insert($this->prepareProductGalleryData($data, $id));
        $productTag = ProductTag::insert($this->prepareProductTagData($data, $id));

        $productPolicy = ProductShippingReturnPolicy::updateOrCreate(
            ['product_id' => $id],
            [
                'product_id' => $id,
                'shipping_return_description' => $data['translate_policy_description']
            ]);

        return true;
    }

    public function productClone($id): bool
    {

        $data = array();
        $product = Product::query()->where('id', '=', $id)->first();
        $product_data = self::CloneData($product);
        $newProduct = $product->create($product_data);
        $id = $newProduct->id;

        $metaData = [];
        if ($product?->metaData != null) {

            $metaData = [
                'title' => $product?->metaData?->getTranslations()['title'] ?? null,
                'description' => $product?->metaData?->getTranslations()['description'] ?? null,
                'fb_title' => $product?->metaData?->getTranslations()['fb_title'] ?? null,
                'fb_description' => $product?->metaData?->getTranslations()['fb_description'] ?? null,
                'fb_image' => $product?->metaData?->getTranslations()['fb_image'] ?? null,
                'tw_title' => $product?->metaData?->getTranslations()['tw_title'] ?? null,
                'tw_description' => $product?->metaData?->getTranslations()['tw_description'] ?? null,
                'tw_image' => $product?->metaData?->getTranslations()['tw_image'] ?? null,
            ];

            $newData = [];
            foreach ($metaData as $key1 => $title) {
                foreach ($title as $key2 => $language) {
                    $newData[$key1][$key2] = str_replace(
                        ['&amp;', 'amp;', '&quot;', '#039;', '&lt;', '&gt;'],
                        ['', '', '"', "'", '<', '>'],
                        $language
                    );
                }
            }
             MetaInfo::query()
                ->create([
                    'metainfoable_id' => $id,
                    'title' => $newData['title'] ?? null,
                    'description' => $newData['description'] ?? null,
                    'fb_title' => $newData['fb_title'] ?? null,
                    'fb_description' => $newData['fb_description'] ?? null,
                    'fb_image' => $newData['fb_image'] ?? null,
                    'tw_title' => $newData['tw_title'] ?? null,
                    'tw_description' => $newData['tw_description'] ?? null,
                    'tw_image' => $newData['tw_image'] ?? null,
                    'metainfoable_type' => 'Modules\Product\Entities\Product'
                ]);
        }

        $this->createdByUpdatedBy($id);

        $data["sku"] = create_slug(optional($product->inventory)->sku, 'ProductInventory', true, 'Product', 'sku');
        $inventoryQuantity = $product?->inventory?->stock_count;

        $product->category_id = optional($product->category)->id;
        $product->sub_category = optional($product->subCategory)->id;
        $product->child_category = current(optional($product->childCategory)->pluck('id'));

        $delivery_option = current(optional($product->delivery_option)->pluck('delivery_option_id'));
        $product->delivery_option = implode(' , ', $delivery_option);

        $product_gallery = current(optional($product->product_gallery)->pluck('image_id'));
        $product->product_gallery = implode('|', $product_gallery);

        $product_tags = current(optional($product->tag)->pluck('tag_name'));
        $product->tags = implode(',', $product_tags);

        $data["unit_id"] = optional($product->uom)->unit_id;
        $data["uom"] = optional($product->uom)->quantity;

        // product attributes
        $data['item_stock_count'] = count(optional($product->inventory)->inventoryDetails);
        $data['item_stock_count'] = \Arr::wrap($data['item_stock_count']);
        $quantity = null;
        if ($data['item_stock_count'] > 0) {
            $data['item_stock_count'] = array();
            foreach (optional($product->inventory)->inventoryDetails ?? [] as $i => $details) {

                $data['item_color'][$i] = $details->color;
                $data['item_size'][$i] = $details->size;
                $data['item_additional_price'][$i] = $details->additional_price;
                $data['item_extra_cost'][$i] = $details->add_cost;
                $data['item_image'][$i] = $details->image;
                $data['item_stock_count'][$i] = $details->stock_count;
                $quantity += $details->stock_count;
                foreach ($details->attribute ?? [] as $j => $attribute) {
                    $data['item_attribute_name'][$i][$j] = $attribute->attribute_name;
                    $data['item_attribute_value'][$i][$j] = $attribute->attribute_value;
                }
            }
        }
        $data["quantity"] = !empty($quantity) ? $quantity : $inventoryQuantity;
        $data['policy_description'] = $product?->return_policy?->getTranslations()['shipping_return_description'] ?? '';


        return $this->insert_product_data($data, $id, $product);
    }

    protected function destroy($id)
    {
        return Product::find($id)->delete();
    }

    protected function trash_destroy($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        ProductUom::where('product_id', $product->id)->delete();
        ProductTag::where('product_id', $product->id)->delete();
        ProductGallery::where('product_id', $product->id)->delete();
        ProductDeliveryOption::where('product_id', $product->id)->delete();
        ProductChildCategory::where('product_id', $product->id)->delete();
        ProductSubCategory::where('product_id', $product->id)->delete();
        ProductCategory::where('product_id', $product->id)->delete();
        ProductInventoryDetailAttribute::where('product_id', $product->id)->delete();
        ProductInventoryDetail::where('product_id', $product->id)->delete();
        ProductInventory::where('product_id', $product->id)->delete();
        $product->forceDelete();

        return (bool)$product;
    }

    protected function bulk_delete($ids)
    {
        $product = Product::whereIn('id', $ids)->delete();
        return (bool)$product;
    }

    protected function trash_bulk_delete($ids)
    {
        try {
            ProductUom::whereIn('product_id', $ids)->delete();
            ProductTag::whereIn('product_id', $ids)->delete();
            ProductGallery::whereIn('product_id', $ids)->delete();
            ProductDeliveryOption::whereIn('product_id', $ids)->delete();
            ProductChildCategory::whereIn('product_id', $ids)->delete();
            ProductSubCategory::whereIn('product_id', $ids)->delete();
            ProductCategory::whereIn('product_id', $ids)->delete();
            ProductInventoryDetailAttribute::whereIn('product_id', $ids)->delete();
            ProductInventoryDetail::whereIn('product_id', $ids)->delete();
            ProductInventory::whereIn('product_id', $ids)->delete();
            $products = Product::onlyTrashed()->whereIn('id', $ids)->forceDelete();
        } catch (\Exception $exception) {
            return false;
        }

        return (bool)$products;
    }

    public function updateInventory($data, $id)
    {
        $product = Product::find($id);

        $product?->inventory?->updateOrCreate(["product_id" => $id], $this->prepareInventoryData($data));
        // updated by info in product created by table
        $this->createdByUpdatedBy($id, "update");
        // check item stock count is empty or not
        $inventoryDetail = false;
        if (!empty($data["item_stock_count"][0])) {
            $inventoryDetail = $this->prepareProductInventoryDetailsAndInsert($data, $id, $product?->inventory?->id, "update");
        }

        return true;
    }


    private function convertTranslate($requestData): array
    {
        $result = [];

        // dd($requestData);
        $translate = $requestData;

        $allLang = get_all_language();
        $defaultLangData = $allLang->where('default', '=', 1)->first();
        $defaultLang = $defaultLangData->slug;
        foreach (get_all_language() as $langData) {
            $lang = $langData->slug;


            if (!isset($translate[$lang])) {
                $translate[$lang] = $translate[$defaultLang];
            }
            if (!array_key_exists('slug', $translate[$lang]) || $translate[$lang]['slug'] == '') {
                $slug = \Illuminate\Support\Str::slug($translate[$lang]['name']);
                $slug = create_slug($slug, 'Blog', true, 'Blog');
                $translate[$lang]['slug'] = $slug;
            } else {
                $translate[$lang]['slug'] = create_slug(Str::slug($translate[$lang]['slug']), 'Product', true, 'Product', 'slug');
            }
            foreach ($translate[$lang] as $key => $item) {

                if ($key == 'description') {
                    $result[$key][$lang] = $item ?? '';

                } else {
                    $result[$key][$lang] = SanitizeInput::esc_html($item ?? '');
                }
            }
        }
        $newData = [];
        foreach ($result as $key1 => $title) {
            foreach ($title as $key2 => $language) {
                $newData[$key1][$key2] = str_replace(
                    ['&amp;', 'amp;', '&quot;', '#039;', '&lt;', '&gt;'],
                    ['', '', '"', "'", '<', '>'],
                    $language
                );
            }
        }
        return $newData;
    }


    private function convertTranslateMetas($requestData): array
    {
        $result = [];
        $translate = $requestData;


        $allLang = get_all_language();
        $defaultLangData = $allLang->where('default', '=', 1)->first();
        $defaultLang = $defaultLangData->slug;
        foreach (get_all_language() as $langData) {
            $lang = $langData->slug;
            if (!isset($translate[$lang])) {
                $translate[$lang] = $translate[$defaultLang];
            }
            foreach ($translate[$lang] as $key => $item) {

                if ($key == 'image' || $key == 'tw_image' || $key == 'fb_image') {
                    $result[$key][$key] = $item ?? '';
                } else {
                    $result[$key][$lang] = SanitizeInput::esc_html($item ?? '');
                }
            }
        }

        $newData = [];
        foreach ($result as $key1 => $title) {
            foreach ($title as $key2 => $language) {
                $newData[$key1][$key2] = str_replace(
                    ['&amp;', 'amp;', '&quot;', '#039;', '&lt;', '&gt;'],
                    ['', '', '"', "'", '<', '>'],
                    $language
                );
            }
        }
        return $newData;
    }

    private function convertTranslateTag($requestData): array
    {
        $result = [];

        // dd($requestData);
        $translate = $requestData;

        $allLang = get_all_language();
        $defaultLangData = $allLang->where('default', '=', 1)->first();
        $defaultLang = $defaultLangData->slug;
        foreach (get_all_language() as $langData) {
            $lang = $langData->slug;


            if (!isset($translate[$lang])) {
                $translate[$lang] = $translate[$defaultLang];
            }

            foreach ($translate[$lang] as $key => $item) {

                $result[$key][$lang] = SanitizeInput::esc_html($item ?? '');
            }
        }

        $newData = [];
        foreach ($result as $key1 => $title) {
            foreach ($title as $key2 => $language) {
                $newData[$key1][$key2] = str_replace(
                    ['&amp;', 'amp;', '&quot;', '#039;', '&lt;', '&gt;'],
                    ['', '', '"', "'", '<', '>'],
                    $language
                );
            }
        }
        return $newData;
    }

    private function convertTranslateReturnPolicy($requestData): array
    {
        $result = [];

        // dd($requestData);
        $translate = $requestData;

        $allLang = get_all_language();
        $defaultLangData = $allLang->where('default', '=', 1)->first();
        $defaultLang = $defaultLangData->slug;
        foreach (get_all_language() as $langData) {
            $lang = $langData->slug;


            if (!isset($translate[$lang])) {
                $translate[$lang] = $translate[$defaultLang];
            }

            foreach ($translate[$lang] as $key => $item) {

                $result[$key][$lang] = SanitizeInput::esc_html($item ?? '');
            }
        }

        $newData = [];
        foreach ($result as $key1 => $title) {
            foreach ($title as $key2 => $language) {
                $newData[$key1][$key2] = str_replace(
                    ['&amp;', 'amp;', '&quot;', '#039;', '&lt;', '&gt;'],
                    ['', '', '"', "'", '<', '>'],
                    $language
                );
            }
        }
        return $newData;
    }
}
