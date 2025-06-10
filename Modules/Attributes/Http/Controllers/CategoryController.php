<?php

namespace Modules\Attributes\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Helpers\SanitizeInput;
use App\Models\Language;
use App\Models\Status;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Attributes\Entities\Category;
use Modules\Attributes\Http\Requests\StoreCategoryRequest;
use Modules\Attributes\Http\Requests\UpdateCategoryRequest;
use Modules\Product\Entities\Product;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:product-category-list|product-category-create|product-category-edit|product-category-delete', ['only', ['index']]);
        $this->middleware('permission:product-category-create', ['only', ['store']]);
        $this->middleware('permission:product-category-edit', ['only', ['update']]);
        $this->middleware('permission:product-category-delete', ['only', ['destroy', 'bulk_action']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
       //   $this->setAllDb();
        $all_category = Category::with(["image:id,path", "status"])->where('status_id', 1)->get();
        return view('attributes::backend.category.all')->with(['all_category' => $all_category]);
    }

    public function setAllDb()
    {
        $langList = Language::all();

        /* Page */
        $categories = Category::get();

        foreach ($categories as $category) {
            $categoryUpdateData = Category::query()
                ->find($category->id);
            $nameList = [];
            $slugList = [];
            $productSummaryList = [];
            $productDescriptionList = [];

            foreach ($langList as $lang) {
                $content = $category->name;
                if (!is_array(json_decode($content, true))) {
                    $nameList[$lang->slug] = $category->name;
                }

                $categoryUpdateData->name = $nameList;

                $content = $category->slug;
                if (!is_array(json_decode($content, true))) {
                    $slugList[$lang->slug] = $category->slug;
                }
                $categoryUpdateData->slug = $slugList;

                $content = $category->description;
                if (!is_array(json_decode($content, true))) {
                    $productDescriptionList[$lang->slug] = $category->description;
                }
            }


            $categoryUpdateData->description = $productDescriptionList;

            $categoryUpdateData->save();

        }
        try {



            /* Blog Category
            $blogCategories = BlogCategory::get();

            foreach ($blogCategories as $blogCategory) {
                $blogCategoryUpdateData = BlogCategory::query()
                    ->find($blogCategory->id);
                $titleList = [];

                foreach ($langList as $lang) {
                    $content = $blogCategory->title;
                    if (!is_array(json_decode($content, true))) {
                        $titleList[$lang->slug] = $blogCategory->title;
                    }

                    $blogCategoryUpdateData->title = $titleList;


                }

                $blogCategoryUpdateData->save();

            }
 */
            /* Blog
            $blogs = Blog::get();

            foreach ($blogs as $blog) {
                $blogUpdateData = Blog::query()
                    ->find($blog->id);
                $titleList = [];
                $slugList = [];
                $pageContentList = [];

                foreach ($langList as $lang) {
                    $content = $blog->title;
                    if (!is_array(json_decode($content, true))) {
                        $titleList[$lang->slug] = $blog->title;
                    }

                    $blogUpdateData->title = $titleList;

                    $content = $blog->slug;
                    if (!is_array(json_decode($content, true))) {
                        $slugList[$lang->slug] = $blog->slug;
                    }

                    $blogUpdateData->slug = $slugList;
                    $content = $blog->blog_content;
                    if (!is_array(json_decode($content, true))) {
                        $blogContentList[$lang->slug] = $blog->blog_content;
                    }
                $blogUpdateData->blog_content = $blogContentList;
                }


                $blogUpdateData->save();

            }
 */
            /* Blog Update
            $blogs = Blog::get();

            foreach ($blogs as $blog) {
                $blogUpdateData = Blog::query()
                    ->find($blog->id);
                $excerptList = [];

                foreach ($langList as $lang) {
                    $content = $blog->excerpt;
                    if (!is_array(json_decode($content, true))) {
                        $excerptList[$lang->slug] = $blog->excerpt;
                    }
                    $blogUpdateData->excerpt = $excerptList;

                }


                $blogUpdateData->save();

            }
*/
            /* Coupon
            $coupons = Coupon::get();

            foreach ($coupons as $coupon) {
                $couponUpdateData = Coupon::query()
                    ->find($coupon->id);
                $nameList = [];
                $descriptionList = [];

                foreach ($langList as $lang) {
                    $content = $coupon->name;
                    if (!is_array(json_decode($content, true))) {
                        $nameList[$lang->slug] = $coupon->name;
                    }

                    $couponUpdateData->name = $nameList;

                    $content = $coupon->description;
                    if (!is_array(json_decode($content, true))) {
                        $descriptionList[$lang->slug] = $coupon->description;
                    }

                    $couponUpdateData->description = $descriptionList;

                }

                $couponUpdateData->save();

            }
*/
            /* PricePlan
            $pricePlans = PricePlan::get();

            foreach ($pricePlans as $pricePlan) {
                $pricePlanUpdateData = PricePlan::query()
                    ->find($pricePlan->id);
                $titleList = [];
                $packageBadgeList = [];
                $descriptionList = [];

                foreach ($langList as $lang) {
                    $content = $pricePlan->title;
                    if (!is_array(json_decode($content, true))) {
                        $titleList[$lang->slug] = $pricePlan->title;
                    }
                    $pricePlanUpdateData->title = $titleList;

                    $content = $pricePlan->package_badge;
                    if (!is_array(json_decode($content, true))) {
                        $packageBadgeList[$lang->slug] = $pricePlan->package_badge;
                    }
                    $pricePlanUpdateData->package_badge = $packageBadgeList;

                    $content = $pricePlan->description;
                    if (!is_array(json_decode($content, true))) {
                        $descriptionList[$lang->slug] = $pricePlan->description;
                    }
                    $pricePlanUpdateData->description = $descriptionList;

                }

                $pricePlanUpdateData->save();

            }
 */
            /* MetaInfo
            $metaInfos = MetaInfo::get();

            foreach ($metaInfos as $metaInfo) {
                $metaInfoUpdateData = MetaInfo::query()
                    ->find($metaInfo->id);
                $titleList = [];
                $descriptionList = [];
                $imageList = [];
                $fbTitleList = [];
                $fbDescriptionList = [];
                $fbImageList = [];
                $twTitleList = [];
                $twDescriptionList = [];
                $twImageList = [];

                foreach ($langList as $lang) {
                    $content = $metaInfo->title;
                    if (!is_array(json_decode($content, true))) {
                        $titleList[$lang->slug] = $metaInfo->title;
                    }
                    $metaInfoUpdateData->title = $titleList;

                    $content = $metaInfo->description;
                    if (!is_array(json_decode($content, true))) {
                        $descriptionList[$lang->slug] = $metaInfo->description;
                    }
                    $metaInfoUpdateData->description = $descriptionList;

                    $content = $metaInfo->image;
                    if (!is_array(json_decode($content, true))) {
                        $imageList[$lang->slug] = $metaInfo->image;
                    }
                    $metaInfoUpdateData->image = $imageList;

                    $content = $metaInfo->fb_title;
                    if (!is_array(json_decode($content, true))) {
                        $fbTitleList[$lang->slug] = $metaInfo->fb_title;
                    }
                    $metaInfoUpdateData->fb_title = $fbTitleList;

                    $content = $metaInfo->fb_description;
                    if (!is_array(json_decode($content, true))) {
                        $fbDescriptionList[$lang->slug] = $metaInfo->fb_description;
                    }
                    $metaInfoUpdateData->fb_description = $fbDescriptionList;

                    $content = $metaInfo->fb_image;
                    if (!is_array(json_decode($content, true))) {
                        $fbImageList[$lang->slug] = $metaInfo->fb_image;
                    }
                    $metaInfoUpdateData->fb_image = $fbImageList;

                    $content = $metaInfo->tw_title;
                    if (!is_array(json_decode($content, true))) {
                        $twTitleList[$lang->slug] = $metaInfo->tw_title;
                    }
                    $metaInfoUpdateData->tw_title = $twTitleList;

                    $content = $metaInfo->tw_description;
                    if (!is_array(json_decode($content, true))) {
                        $twDescriptionList[$lang->slug] = $metaInfo->tw_description;
                    }
                    $metaInfoUpdateData->tw_description = $twDescriptionList;

                    $content = $metaInfo->tw_image;
                    if (!is_array(json_decode($content, true))) {
                        $twImageList[$lang->slug] = $metaInfo->tw_image;
                    }
                    $metaInfoUpdateData->tw_image = $twImageList;
                }

                $metaInfoUpdateData->save();

            }
*/
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {

        $data = $request->validated();
        $translate = $this->convertTranslate($request->input('translate'));
        $data['name'] = $translate['name'];
        $data['description'] = $translate['description'];
        $data['slug'] = $translate['slug'];

        $product_category = Category::create($data);

        return $product_category
            ? back()->with(FlashMsg::create_succeed(__('Product Category')))
            : back()->with(FlashMsg::create_failed(__('Product Category')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateCategoryRequest $request)
    {
        $data = $request->validated();
        $translate = $this->convertTranslate($request->input('translate'));

        $data['name'] = $translate['name'];
        $data['description'] = $translate['description'];
        $data['slug'] = $translate['slug'];


        $updated = Category::find($request->id)->update($data);

        return $updated
            ? back()->with(FlashMsg::update_succeed(__('Product Category')))
            : back()->with(FlashMsg::update_failed(__('Product Category')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $item
     * @return bool|null
     */
    public function destroy(Category $item): ?bool
    {
        return $item->delete();
    }

    public function bulk_action(Request $request): JsonResponse
    {
        Category::WhereIn('id', $request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }



    public function trash(): View
    {
        $all_category = Category::onlyTrashed()->get();
        return view('attributes::backend.category.trash')->with(['all_category' => $all_category]);
    }

    public function trash_restore($id)
    {
        $restored = Category::onlyTrashed()->findOrFail($id)->restore();

        return $restored
            ? back()->with(FlashMsg::restore_succeed(__('Product Category')))
            : back()->with(FlashMsg::restore_failed(__('Product Category')));
    }

    public function trash_delete($id)
    {
        try {
            $deleted = Category::onlyTrashed()->findOrFail($id)->forceDelete();
        } catch (\Exception $exception) {
            return back()->with(FlashMsg::explain('danger',__('The category can not be deleted due to its association with another subcategories, child categories or products. Please delete them first.')));
        }

        return $deleted
            ? back()->with(FlashMsg::delete_succeed(__('Product Category')))
            : back()->with(FlashMsg::delete_failed(__('Product Category')));
    }

    public function trash_bulk_delete(Request $request): JsonResponse
    {
        try {
            Category::onlyTrashed()->WhereIn('id', $request->ids)->forceDelete();
        } catch (\Exception $exception)
        {
            return response()->json(['error_msg' => __('The category can not be deleted due to its association with another subcategories, child categories or products. Please delete them first.')], 550);
        }

        return response()->json(['status' => 'ok']);
    }

    public function getCategory(Request $request)
    {
        if ($request->input('id')) {
            $category = Category::query()->where('id', '=', $request->input('id'))->first();

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
                $slug =  Str::slug($translate[$lang]['name']);
                $slug = create_slug($slug, 'Blog', true, 'Blog');
                $translate[$lang]['slug'] = $slug;
            } else {
                $translate[$lang]['slug'] =  create_slug(Str::slug($translate[$lang]['slug']), 'Blog', true, 'Blog', 'slug');
            }
            foreach ($translate[$lang] as $key => $item) {

                $result[$key][$lang] = SanitizeInput::esc_html($item ?? '');
            }
        }

        return $result;
    }
}
