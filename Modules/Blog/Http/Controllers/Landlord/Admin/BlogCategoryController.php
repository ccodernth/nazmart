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

class BlogCategoryController extends Controller
{
    public $languages = null;
    private const BASE_PATH = 'blog::landlord.admin.blog.';

    public function __construct()
    {

        $this->middleware('permission:blog-category-list|blog-category-create|blog-category-edit|blog-category-delete', ['only' => ['index']]);
        $this->middleware('permission:blog-category-create', ['only' => ['new_category']]);
        $this->middleware('permission:blog-category-edit', ['only' => ['update_category']]);
        $this->middleware('permission:blog-category-delete', ['only' => ['delete_category', 'bulk_action', 'delete_category_all_lang']]);
    }

    public function index(Request $request)
    {
        $all_category = BlogCategory::all();
        return view(self::BASE_PATH . 'category')->with([
            'all_blog_category' => $all_category
        ]);
    }

    public function new_category(Request $request)
    {
        $request->validate([
            // 'title' => 'required|string|max:191|unique:blog_categories',
            'status' => 'required|string|max:191',
        ]);

        $translate = $this->convertTranslate($request->input('translate'));

        $category = new BlogCategory();
        $category->title = $translate['title'];
        $category->slug = $translate['slug'];
        $category->status = $request->status;
        $category->save();
        return response()->success(ResponseMessage::SettingsSaved());
    }

    public function update_category(Request $request)
    {
        $request->validate([
            // 'title' => 'required|string|max:191',
            'status' => 'required|string|max:191',
        ]);

        $category = BlogCategory::findOrFail($request->id);

        $translate = $this->convertTranslate($request->input('translate'));

        $category->title = $translate['title'];
        $category->slug = $translate['slug'];

        $category->status = $request->status;
        $category->save();

        return response()->success(ResponseMessage::SettingsSaved());
    }

    public function delete_category_all_lang(Request $request, $id)
    {

        if (Blog::where('category_id', $id)->first()) {
            return redirect()->back()->with([
                'msg' => __('You can not delete this category, It is already associated with a post...'),
                'type' => 'danger'
            ]);
        }
        $category = BlogCategory::where('id', $id)->first();
        $category->delete();

        return response()->danger(ResponseMessage::delete());
    }


    public function bulk_action(Request $request)
    {
        BlogCategory::whereIn('id', $request->ids)->delete();
        return response()->json(['status' => 'ok']);
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
