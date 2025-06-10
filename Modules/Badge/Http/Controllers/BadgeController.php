<?php

namespace Modules\Badge\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Helpers\SanitizeInput;
use App\Models\Language;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Modules\Badge\Entities\Badge;

class BadgeController extends Controller
{
    private const BASE_PATH = 'badge::tenant.admin.badge.';
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
       // $this->setAllDb();
        $badges = Badge::all();
        return view(self::BASE_PATH.'index', compact('badges'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $translate = $this->convertTranslate($request->input('translate'));
        $request->validate([
          //  'name' => 'required',
            'sale_count' => 'nullable|numeric',
            'badge_type' => 'nullable',
            'status' => 'required',
            'image' => 'required|numeric'
        ],
        [
            'image.required' => 'The badge image is required'
        ]);

        $badge = new Badge();
        $badge->name = $translate['name'];
        $badge->status = $request->status;
        $badge->image = $request->image;
        $badge->save();

        return $badge->id
            ? back()->with(FlashMsg::create_succeed('Badge'))
            : back()->with(FlashMsg::create_failed('Badge'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $translate = $this->convertTranslate($request->input('translate'));

        $request->validate([
           // 'name' => 'required',
            'sale_count' => 'nullable|numeric',
            'badge_type' => 'nullable',
            'status' => 'required',
            'image' => 'required|numeric'
        ],
            [
                'image.required' => 'The badge image is required'
            ]);

        $badge = Badge::findOrFail($id);
        $badge->name = $translate['name'];
        $badge->status = $request->status;
        $badge->image = $request->image;
        $badge->save();

        return $badge->id
            ? back()->with(FlashMsg::update_succeed('Badge'))
            : back()->with(FlashMsg::update_failed('Badge'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $deleted = Badge::findOrFail($id)->delete();

        return $deleted
            ? back()->with(FlashMsg::delete_succeed('Badge'))
            : back()->with(FlashMsg::delete_failed('Badge'));
    }

    public function bulk_action_delete(Request $request): JsonResponse
    {
        $deleted = Badge::whereIn('id', $request->ids)->delete();

        return response()->json(['status' => 'ok']);
    }

    public function trash()
    {
        $badges = Badge::onlyTrashed()->get();
        return view(self::BASE_PATH.'trash', compact('badges'));
    }


    public function trash_restore($id)
    {
        $restored = Badge::withTrashed()->findOrFail($id)->restore();

        return $restored
            ? back()->with(FlashMsg::restore_succeed('Badge'))
            : back()->with(FlashMsg::restore_failed('Badge'));
    }

    public function trash_delete($id)
    {
        $deleted = Badge::withTrashed()->findOrFail($id)->forceDelete();

        return $deleted
            ? back()->with(FlashMsg::delete_succeed('Badge'))
            : back()->with(FlashMsg::delete_failed('Badge'));
    }

    public function trash_bulk_action_delete(Request $request): JsonResponse
    {
        $deleted = Badge::withTrashed()->whereIn('id', $request->ids)->forceDelete();

        return response()->json(['status' => 'ok']);
    }

    public function getBadge(Request $request)
    {
        if ($request->input('id')) {
            $category = Badge::query()->where('id', '=', $request->input('id'))->first();

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
            $pages = Badge::get();

            foreach ($pages as $page) {
                $pageUpdateData = Badge::query()
                    ->find($page->id);
                $designationList = [];

                foreach ($langList as $lang) {
                    $content = $page->name;
                    if (!is_array(json_decode($content, true))) {
                        $designationList[$lang->slug] = $page->name;
                    }
                }
                $pageUpdateData->name = $designationList;

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
