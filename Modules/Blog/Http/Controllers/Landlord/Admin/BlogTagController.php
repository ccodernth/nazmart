<?php

namespace Modules\Blog\Http\Controllers\Landlord\Admin;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Helpers\ResponseMessage;
use App\Helpers\SanitizeInput;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Entities\BlogTag;

class BlogTagController extends Controller
{
    public $languages = null;
    private const BASE_PATH = 'blog::landlord.admin.blog.';

    public function __construct()
    {
        $this->middleware('permission:blog-tag-list|blog-tag-create|blog-tag-edit|blog-tag-delete', ['only' => ['index']]);
        $this->middleware('permission:blog-tag-create', ['only' => ['new_tag']]);
        $this->middleware('permission:blog-tag-edit', ['only' => ['update_tag']]);
        $this->middleware('permission:blog-tag-delete', ['only' => ['delete_tag', 'bulk_action', 'delete_category_all_lang']]);
    }

    public function index()
    {
        $all_tag = BlogTag::select(['id', 'title', 'slug'])->get();
        return view(self::BASE_PATH . 'tag')->with([
            'all_tag' => $all_tag
        ]);
    }

    public function new_tag(Request $request)
    {

        $translate = $this->convertTranslate($request->input('translate'));


        $tag = new BlogTag();
        $tag->title = $translate['title'];
        $tag->slug = $translate['slug'];

        $tag->save();
        return response()->success(ResponseMessage::SettingsSaved());
    }

    public function update_tag(Request $request)
    {


        $translate = $this->convertTranslate($request->input('translate'));


        $tag = BlogTag::findOrFail($request->id);
        $tag->title = $translate['title'];
        $tag->slug = $translate['slug'];
        $tag->save();

        return response()->success(ResponseMessage::SettingsSaved());
    }

    public function delete_tag_all_lang(Request $request, $id)
    {
        $category = BlogTag::where('id', $id)->first();
        $category->delete();

        return response()->danger(ResponseMessage::delete());
    }


    public function bulk_action(Request $request)
    {
        BlogTag::whereIn('id', $request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }


    public function get_tags_by_ajax(Request $request)
    {
        $query = $request->get('query');
        $filterResult = BlogTag::Where('title', 'LIKE', '%' . $query . '%')->get();
        $html_markup = '';
        $result = [];
        foreach ($filterResult as $data) {
            array_push($result, $data->title);
        }

        return response()->json(['result' => $result]);
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
                $slug = Str::slug($translate[$lang]['title']);
                $slug = create_slug($slug, 'Blog', true, 'Blog');
                $translate[$lang]['slug'] = $slug;
            }
            foreach ($translate[$lang] as $key => $item) {

                $result[$key][$lang] = SanitizeInput::esc_html($item ?? '');
            }
        }
        return $result;
    }

    public function getCategory(Request $request)
    {
        if ($request->input('id')) {
            $category = BlogCategory::query()->where('id', '=', $request->input('id'))->first();

            return $category;
        } else {
            return false;
        }
    }
}
