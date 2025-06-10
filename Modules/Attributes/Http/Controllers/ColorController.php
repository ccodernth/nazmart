<?php

namespace Modules\Attributes\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Helpers\SanitizeInput;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Attributes\Entities\Color;

class ColorController extends Controller
{
    private const BASE_PATH = 'attributes::backend.color.';

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:product-color-list|product-color-create|product-color-edit|product-color-delete', ['only', ['index']]);
        $this->middleware('permission:product-color-create', ['only', ['store']]);
        $this->middleware('permission:product-color-edit', ['only', ['update']]);
        $this->middleware('permission:product-color-delete', ['only', ['destroy', 'bulk_action']]);
    }

    /**
     * Display a listing of the resource.
     * @return View|Factory
     */
    public function index(): Factory|View
    {
        $product_colors = Color::all();
        return view(self::BASE_PATH . 'all-color', compact('product_colors'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
         //   'name' => 'required|string|max:191',
            'color_code' => 'required|string|max:191',
        //    'slug' => 'nullable|string|max:191',
        ]);
        $translate = $this->convertTranslate($request->input('translate'));

        $data['name'] = $translate['name'];
        $data['slug'] = $translate['slug'];

        $product_color = Color::create([
            'name' => $data['name'],
            'color_code' => $request->color_code,
            'slug' => $data['slug'],
        ]);

        return $product_color
            ? back()->with(FlashMsg::create_succeed('Product Color'))
            : back()->with(FlashMsg::create_failed('Product Color'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            // 'name' => 'required|string|max:191',
            'color_code' => 'required|string|max:191',
            //  'slug' => 'nullable|string|max:191',
        ]);

        $translate = $this->convertTranslate($request->input('translate'));
        $product_color = Color::findOrFail($request->id);


        $product_color = $product_color->update([
            'name' => $translate['name'],
            'slug' => $translate['slug'],
            'color_code' => $request->color_code,
        ]);

        return $product_color
            ? back()->with(FlashMsg::update_succeed('Product Color'))
            : back()->with(FlashMsg::update_failed('Product Color'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $product_color = Color::findOrFail($id);

        return $product_color->delete()
            ? back()->with(FlashMsg::delete_succeed('Product Color'))
            : back()->with(FlashMsg::delete_failed('Product Color'));
    }

    public function bulk_action(Request $request): JsonResponse
    {
        $all_product_colors = Color::whereIn('id', $request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function getColor(Request $request)
    {
        if ($request->input('id')) {
            $category = Color::query()->where('id', '=', $request->input('id'))->first();

            return $category;
        } else {
            return false;
        }
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
                $slug = Str::slug($translate[$lang]['name']);
                $slug = create_slug($slug, 'Blog', true, 'Blog');
                $translate[$lang]['slug'] = $slug;
            } else {
                $translate[$lang]['slug'] = create_slug(Str::slug($translate[$lang]['slug']), 'Blog', true, 'Blog', 'slug');
            }
            foreach ($translate[$lang] as $key => $item) {

                $result[$key][$lang] = SanitizeInput::esc_html($item ?? '');
            }
        }

        return $result;
    }
}
