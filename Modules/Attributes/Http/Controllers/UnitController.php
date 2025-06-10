<?php

namespace Modules\Attributes\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Helpers\SanitizeInput;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Attributes\Entities\Unit;

class UnitController extends Controller
{
    private const BASE_PATH = 'attributes::backend.';

    public function __construct()
    {
        $this->middleware('auth:admin');

        $this->middleware('permission:product-unit-list|product-unit-create|product-unit-edit|product-unit-delete', ['only', ['index']]);
        $this->middleware('permission:product-unit-create', ['only', ['store']]);
        $this->middleware('permission:product-unit-edit', ['only', ['update']]);
        $this->middleware('permission:product-unit-delete', ['only', ['destroy', 'bulk_action']]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(): Renderable
    {
        $product_units = Unit::all();
        return view(self::BASE_PATH . 'unit.index', compact('product_units'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        $translate = $this->convertTranslate($request->input('translate'));
        $data['name'] = $translate['name'];
        $unit = Unit::create($data);
        return $unit
            ? back()->with(FlashMsg::create_succeed('Product Unit'))
            : back()->with(FlashMsg::create_failed('Product Unit'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $translate = $this->convertTranslate($request->input('translate'));
        $data['name'] = $translate['name'];

        $unit = Unit::findOrFail($request->id)->update($data);

        return $unit
            ? back()->with(FlashMsg::update_succeed('Product Unit'))
            : back()->with(FlashMsg::update_failed('Product Unit'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Unit $item
     * @return RedirectResponse
     */
    public function destroy(Unit $item): RedirectResponse
    {
        return $item->delete()
            ? back()->with(FlashMsg::delete_succeed('Product Unit'))
            : back()->with(FlashMsg::delete_failed('Product Unit'));
    }

    /**
     * Remove all the specified resources from storage.
     * @param Request $request
     * @return boolean
     */
    public function bulk_action(Request $request): bool
    {
        $units = Unit::whereIn('id', $request->ids)->get();
        foreach ($units as $unit) {
            $unit->delete();
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

            foreach ($translate[$lang] as $key => $item) {

                $result[$key][$lang] = SanitizeInput::esc_html($item ?? '');
            }
        }

        return $result;
    }

    public function getUnit(Request $request)
    {
        if ($request->input('id')) {
            $category = Unit::query()->where('id', '=', $request->input('id'))->first();

            return $category;
        } else {
            return false;
        }
    }
}
