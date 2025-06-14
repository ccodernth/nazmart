<?php

namespace Modules\Campaign\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Helpers\SanitizeInput;
use App\Models\Language;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Campaign\Entities\Campaign;
use Modules\Campaign\Entities\CampaignProduct;
use Modules\Campaign\Entities\CampaignSoldProduct;
use Modules\Product\Entities\Product;
use Razorpay\Api\Resource;
use Sabberworm\CSS\Renderable;

class CampaignController extends Controller
{
    const BASE_URL = 'campaign::backend.';

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:campaign-list|campaign-create|campaign-edit|campaign-delete', ['only', ['index']]);
        $this->middleware('permission:campaign-create', ['only', ['store']]);
        $this->middleware('permission:campaign-edit', ['only', ['update']]);
        $this->middleware('permission:campaign-delete', ['only', ['destroy', 'bulk_action']]);
    }

    public function index()
    {
        //  $this->setAllDb();
        $all_campaigns = Campaign::with("campaignImage")->get();
        return view(self::BASE_URL . 'all', compact('all_campaigns'));
    }

    public function create()
    {
        $all_campaign_products = CampaignProduct::select('product_id')->pluck('product_id')->toArray();
        $all_products = Product::with('inventory')->where('status_id', '1')->whereNotIn('id', $all_campaign_products)->get();
        return view(self::BASE_URL . 'new', compact('all_products'));
    }

    public function store(Request $request)
    {
        $translate = $this->convertTranslate($request->input('translate'));

        $request->validate([
            //'campaign_name' => 'required|string|max:191',
            //  'campaign_subtitle' => 'required|string',
            'campaign_start_date' => 'required',
            'campaign_end_date' => 'required',
            'product_id.*' => 'required',
        ],
            [
                'product_id.*.required' => __('Products are required')
            ]);

        $validated_product_data = $this->getValidatedCampaignProducts($request);

        try {
            DB::beginTransaction();
            $campaign = Campaign::create([
                    'title' => $translate['campaign_name'],
                    'subtitle' => $translate['campaign_subtitle'],
                    'image' => $request->image,
                    'status' => $request->status,
                    'start_date' => $request->campaign_start_date,
                    'end_date' => $request->campaign_end_date,
                ] + $this->how_is_the_owner());

            if ($campaign->id && !empty($validated_product_data)) {
                $this->insertCampaignProducts($campaign->id, $validated_product_data);
            }

            DB::commit();
            return back()->with(FlashMsg::create_succeed('Campaign'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with(FlashMsg::create_failed('Campaign'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Campaign\Campaign $campaign
     * @return Response
     */
    public function show(Campaign $campaign)
    {
        //
    }


    public function edit(Campaign $item)
    {
        $campaign = Campaign::with(['products', 'products.product', 'admin'])->findOrFail($item->id);
        $other_campaign_products = CampaignProduct::select('product_id')->where('campaign_id', '!=', $campaign->id)->pluck('product_id')->toArray();
        $all_products = Product::with('inventory')->where('status_id', 1)->whereNotIn('id', $other_campaign_products)->get();

        return view(self::BASE_URL . 'edit', compact('campaign', 'all_products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $translate = $this->convertTranslate($request->input('translate'));

        $data = $request->validate([
            // 'campaign_name' => 'required|string|max:191',
            //  'campaign_subtitle' => 'required|string',
            'image' => 'required|string',
            'status' => 'required|string',
            'campaign_start_date' => 'required',
            'campaign_end_date' => 'required',
            'product_id.*' => 'required'
        ], [
            'product_id.*.required' => __('Products are required')
        ]);

        $validated_product_data = $this->getValidatedCampaignProducts($request);

        DB::beginTransaction();
        try {
            Campaign::findOrFail($request->id)->update([
                    'title' => $translate['campaign_name'],
                    'subtitle' => $translate['campaign_subtitle'],
                    'image' => $request->image,
                    'status' => $request->status,
                    'start_date' => $request->campaign_start_date,
                    'end_date' => $request->campaign_end_date,
                ] + $this->how_is_the_owner());

            $this->updateCampaignProducts($request->id, $request, $validated_product_data);

            DB::commit();
            return back()->with(FlashMsg::update_succeed('Campaign'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with(FlashMsg::update_failed('Campaign'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Campaign\Campaign $campaign
     * @return Response
     */
    public function destroy(Campaign $item)
    {
        try {
            DB::beginTransaction();
            $products = $item->products;
            if ($products->count()) {
                foreach ($products as $product) {
                    $product->delete();
                }
            }
            $item_deleted = $item->delete();
            DB::commit();

            return back()->with(FlashMsg::delete_succeed('Campaign'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function bulk_action(Request $request)
    {
        try {
            DB::beginTransaction();
            $all_campaigns = Campaign::whereIn('id', $request->ids)->delete();
            $campaign_products = CampaignProduct::whereIn('campaign_id', $request->ids)->delete();
            DB::commit();
            return 'ok';
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function getProductPrice(Request $request)
    {
        $price = Product::findOrFail($request->id)->price;
        return response()->json(['price' => $price], 200);
    }

    public function deleteProductSingle(Request $request)
    {
        return (bool)CampaignProduct::findOrFail($request->id)->delete();
    }

    /**====================================================================
     *                  CAMPAIGN PRODUCT FUNCTIONS
     * ==================================================================== */
    public function updateCampaignProducts($campaign_id, $request, $validated_product_data)
    {
//        try {
//            DB::beginTransaction();

        $pastCampaignProducts = CampaignProduct::where('campaign_id', $campaign_id)->pluck('product_id')->toArray() ?? [];
        if (!empty($pastCampaignProducts)) {
            $unused_product = array_diff($pastCampaignProducts, $validated_product_data['product_id']);
            if (!empty($unused_product)) {
                CampaignSoldProduct::whereIn('product_id', $unused_product)->delete();
            }
        }

        $delete = $this->deleteCampaignProducts($campaign_id);
        if (!empty($validated_product_data)) {
            $campaign_products = $this->insertCampaignProducts($campaign_id, $validated_product_data, $request->campaign_start_date, $request->campaign_end_date);
        }

//            DB::commit();
//        }catch(\Throwable $th) {
//            DB::rollBack();
//
//            return false;
//        }
    }

    public function getValidatedCampaignProducts(Request $request): array
    {
        return $request->validate([
            'product_id' => 'nullable|array',
            'campaign_price' => 'nullable|array',
            'units_for_sale' => 'nullable|array',
            'start_date' => 'nullable|array',
            'end_date' => 'nullable|array',
            'product_id.*' => 'nullable|exists:products,id',
            'campaign_price.*' => 'nullable|string',
            'units_for_sale.*' => 'nullable|string',
            'start_date.*' => 'nullable|date',
            'end_date.*' => 'nullable|date',
        ]);
    }

    public function insertCampaignProducts($campaign_id, $products_data, $start_date = null, $end_date = null): bool
    {
        $insert_data = [];

        foreach ($products_data['product_id'] as $key => $value) {
            $insert_data[$products_data['product_id'][$key]] = [
                'campaign_id' => $campaign_id,
                'product_id' => $products_data['product_id'][$key],
                'campaign_price' => $products_data['campaign_price'][$key],
                'units_for_sale' => $products_data['units_for_sale'][$key],
                'start_date' => $products_data['start_date'][$key] ?? $start_date,
                'end_date' => $products_data['end_date'][$key] ?? $end_date,
            ];
        }

        return (bool)CampaignProduct::insert($insert_data);
    }

    public function deleteCampaignProducts($all_product_id): bool
    {
        return (bool)CampaignProduct::where('campaign_id', $all_product_id)->delete();
    }

    private function userId()
    {
        return \Auth::guard("admin")->check() ? \Auth::guard("admin")->user()->id : '';
    }

    private function getGuardName(): string
    {
        return \Auth::guard("admin")->check() ? "admin" : "";
    }


    private function how_is_the_owner(): array
    {
        $arr = [];
        if ($this->getGuardName() == "admin") {
            $arr = [
                "admin_id" => $this->userId(),
                "type" => $this->getGuardName(),
            ];
        }

        return $arr;
    }

    public function getCampaign(Request $request)
    {
        if ($request->input('id')) {
            $category = Campaign::query()->where('id', '=', $request->input('id'))->first();

            return $category;
        } else {
            return false;
        }
    }

    public function setAllDb()
    {
        try {
            $langList = Language::all();

            /* Page */
            $pages = Campaign::get();

            foreach ($pages as $page) {
                $pageUpdateData = Campaign::query()
                    ->find($page->id);
                $titleList = [];
                $subTitleList = [];

                foreach ($langList as $lang) {
                    $content = $page->title;
                    if (!is_array(json_decode($content, true))) {
                        $titleList[$lang->slug] = $page->title;
                    }
                }
                $pageUpdateData->title = $titleList;

                foreach ($langList as $lang) {
                    $content = $page->subtitle;
                    if (!is_array(json_decode($content, true))) {
                        $subTitleList[$lang->slug] = $page->subtitle;
                    }
                }
                $pageUpdateData->subtitle = $subTitleList;

                $pageUpdateData->save();

            }


        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    private function convertTranslate($requestData): array
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

                if ($key == 'terms') {
                    $terms = [];
                    if (is_array($item)) {
                        foreach ($item as $key2 => $term) {
                            $terms[] = SanitizeInput::esc_html($term);
                        }
                        $result[$key][$lang] = json_encode($terms);
                    } else {
                        $result[$key] = SanitizeInput::esc_html($item);
                    }

                } else {
                    $result[$key][$lang] = SanitizeInput::esc_html($item ?? '');
                }
            }
        }

        return $result;
    }
}
