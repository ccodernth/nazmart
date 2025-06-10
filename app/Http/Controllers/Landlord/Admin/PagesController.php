<?php

namespace App\Http\Controllers\Landlord\Admin;

use App\Helpers\ResponseMessage;
use App\Helpers\SanitizeInput;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageBuilder;
use App\Models\PaymentLogs;
use App\Models\PricePlan;
use Artesaos\SEOTools\SEOMeta;
use Artesaos\SEOTools\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use function GuzzleHttp\Promise\all;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:page-list|page-edit|page-delete', ['only' => ['all_pages', 'page_builder']]);
        $this->middleware('permission:page-create', ['only' => ['create_page', 'store_new_page']]);
        $this->middleware('permission:page-edit', ['only' => ['edit_page', 'update']]);
        $this->middleware('permission:page-delete', ['only' => ['delete']]);
    }

    public function all_pages()
    {
        $all_pages = Page::orderBy('id', 'desc')->get();
        return view('landlord.admin.pages.index', compact('all_pages'));
    }

    public function create_page()
    {
        return view('landlord.admin.pages.create');
    }

    public function page_builder($id)
    {
        $page = Page::with('metainfo')->findOrfail($id);
        return view('landlord.admin.pages.page-builder', compact('page'));
    }

    public function edit_page($id)
    {
        $page = Page::with('metainfo')->findOrfail($id);
        return view('landlord.admin.pages.edit', compact('page'));
    }

    public function store_new_page(Request $request)
    {

        $translate = $this->convertTranslate($request->input('translate'));

        $this->validate($request, [
            'status' => 'required|integer',
            'visibility' => 'required|integer',

            'navbar_variant' => 'nullable|string',
            'footer_variant' => 'nullable|string',
        ]);

        $page_data = new Page();
        $page_data->slug = $translate['slug'];
        $page_data->title = $translate['title'];
        $page_data->page_content = $translate['page_content'];
        $page_data->visibility = $request->visibility;
        $page_data->status = $request->status;

        if (tenant()) {
            $page_data->navbar_variant = $request->navbar_variant;
            $page_data->footer_variant = $request->footer_variant;
        }

        $page_data->page_builder = is_null($request->page_builder) ? 0 : 1;
        $page_data->breadcrumb = is_null($request->breadcrumb) ? 0 : 1;

        $page_data->save();
        if ($request->input('translate_meta')) {
            $meta_data = $this->convertTranslateMetas($request->input('translate_meta'));

            $page_data->metainfo()->create($meta_data);
        }



        return response()->success(ResponseMessage::SettingsSaved());
    }


    public function update(Request $request)
    {
        $translate = $this->convertTranslate($request->input('translate'));

        $this->validate($request, [

            'status' => 'required|integer',
            'visibility' => 'required|integer',
            'navbar_variant' => 'nullable|string',
            'footer_variant' => 'nullable|string',
        ]);

        $page_data = Page::find($request->id);
        \Cache::forget('page_id-' . $page_data->id);

        $page_data->slug = $translate['slug'];
        $page_data->title = $translate['title'];
        $page_data->page_content = $translate['page_content'];
        $page_data->visibility = $request->visibility;
        $page_data->status = $request->status;

        if (tenant()) {
            $page_data->navbar_variant = $request->navbar_variant;
            $page_data->footer_variant = $request->footer_variant;
        }

        $page_data->page_builder = is_null($request->page_builder) ? 0 : 1;
        $page_data->breadcrumb = is_null($request->breadcrumb) ? 0 : 1;
        $page_data->save();

        if ($page_data->id != 1 && $request->input('translate_meta')){
            {
                $meta_data = $this->convertTranslateMetas($request->input('translate_meta'));

                $page_data->metainfo()->updateOrCreate(["metainfoable_id" => $page_data->id], $meta_data);
            }
    }
        return response()->success(ResponseMessage::SettingsSaved());
    }

    public function delete($id)
    {
        $page = Page::find($id);
        $page->metainfo()->delete();
        $page->delete();
        return response()->danger(ResponseMessage::delete());
    }

    public function download($id)
    {
        \Debugbar::disable();

        $page = Page::findorFail($id);

        if ($page->page_builder) {
            $page_contents = PageBuilder::where('addon_page_id', $page->id)->orderBy('id', 'ASC')->get()->toJson();
        } else {
            $array = [
                [
                    'text' => $page->page_content,
                    'addon_page_type' => 'simple_page'
                ]
            ];
            $page_contents = json_encode($array);
        }

        $fileName = $page->slug . '-layout.json';

        header('Content-Disposition: attachment; filename=' . $fileName . '');
        header('Content-Type: application/json');
        echo $page_contents;
    }

    public function upload(Request $request)
    {
        $request->validate([
            'page_layout' => 'required|mimes:json',
            'page_id' => 'required'
        ]);


        DB::beginTransaction();
        try {
            $file_contents = json_decode(file_get_contents($request->file('page_layout')));

            $contentArr = [];
            if (current($file_contents)->addon_page_type == 'dynamic_page') {
                foreach ($file_contents as $key => $content) {
                    unset($content->id);
                    $content->addon_page_id = (int)trim($request->page_id);
                    $content->created_at = now();
                    $content->updated_at = now();

                    foreach ($content as $key2 => $con) {
                        $contentArr[$key][$key2] = $con;
                    }
                }

                Page::findOrFail($request->page_id)->update(['page_builder' => 1]);

                PageBuilder::where('addon_page_id', $request->page_id)->delete();
                PageBuilder::insert($contentArr);
            } else {
                Page::findOrFail($request->page_id)->update([
                    'page_builder' => 0,
                    'page_content' => current($file_contents)->text
                ]);
            }

            DB::commit();
            $type = 'success';
            $message = 'Page layout uploaded successfully.';
        } catch (\Exception $exception) {
            DB::rollBack();
            $type = 'danger';
            $message = 'Please upload correct format of file';
        }

        return back()->with([
            'type' => $type,
            'msg' => $message
        ]);
    }

    private function convertTranslate($requestData): array
    {
        $result = [];

        $translate = $requestData;


        $allLang = get_all_language();
        $defaultLangData = $allLang->where('default', '=', 1)->first();
        $defaultLang = $defaultLangData->slug;

        foreach ($allLang as $langData) {
            $lang = $langData->slug;

            if (!isset($translate[$lang])) {
                $translate[$lang] = $translate[$defaultLang];
            }
            if (!array_key_exists('slug', $translate[$lang]) || $translate[$lang]['slug'] == '') {
                $slug =  Str::slug($translate[$lang]['title']);
                $slug = create_slug($slug, 'Blog', true, 'Blog');
                $translate[$lang]['slug'] = $slug;
            }
            foreach ($translate[$lang] as $key => $item) {

                $result[$key][$lang] = $item;
            }
        }
        return $result;
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

        foreach ($result as $resKey => $res) {
            if ($resKey == 'image' || $resKey == 'tw_image' || $resKey == 'fb_image') {
                $result[$resKey] = json_encode($res, true);
            }
        }

        return $result;
    }
}
