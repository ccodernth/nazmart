<?php

namespace Modules\Attributes\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Helpers\SanitizeInput;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\ProductAttribute;

class AttributesController extends Controller
{
    private const BASE_PATH = 'attributes::backend.attribute.';

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $all_attributes = ProductAttribute::all();

        return view(self::BASE_PATH . "all-attribute", compact('all_attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view(self::BASE_PATH . 'new-attribute');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $translate = $this->convertTranslate($request->input('translate'));

        $product_attribute = ProductAttribute::create([
            'title' => $translate['title'],
            'terms' => $translate['terms']
        ]);

        return $product_attribute->id
            ? back()->with(FlashMsg::create_succeed('Product Attribute'))
            : back()->with(FlashMsg::create_failed('Product Attribute'));
    }

    /**
     * Display the specified resource.
     *
     * @param ProductAttribute $productAttribute
     * @return void
     */
    public function show(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductAttribute $item
     * @return Application|Factory|View
     */
    public function edit(ProductAttribute $item)
    {
        return view(self::BASE_PATH . 'edit-attribute')->with(['attribute' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ProductAttribute $productAttribute
     * @return RedirectResponse
     */
    public function update(Request $request, ProductAttribute $productAttribute): RedirectResponse
    {
        $translate = $this->convertTranslate($request->input('translate'));


        $updated = ProductAttribute::find($request->id)->update([
            'title' => $translate['title'],
            'terms' => $translate['terms']
        ]);

        return $updated
            ? back()->with(FlashMsg::update_succeed('Product Attribute'))
            : back()->with(FlashMsg::update_failed('Product Attribute'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductAttribute $item
     * @return bool|null
     */
    public function destroy(ProductAttribute $item): ?bool
    {
        return $item->delete();
    }

    /**
     * Bulk delete
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function bulk_action(Request $request)
    {
        ProductAttribute::whereIn('id', $request->ids)->delete();
        return back()->with(FlashMsg::item_delete());
    }

    /**
     * Get product attribute detail in JSON format
     *
     * @param Request $request (id)
     * @return JsonResponse
     */
    public function get_details(Request $request): JsonResponse
    {
        $variant = ProductAttribute::findOrFail($request->id);
        return response()->json($variant);
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
