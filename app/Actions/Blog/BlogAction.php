<?php

namespace App\Actions\Blog;

use App\Facades\GlobalLanguage;
use App\Models\MetaInfo;
use Modules\Blog\Entities\Blog;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogAction
{
    public function store_execute(Request $request): void
    {
        $blog = new Blog();
        $translate = $this->convertTranslate($request->input('translate'));

        $blog->title = $translate['title'];
        $blog->blog_content = $translate['blog_content'];
        $blog->slug = $translate['slug'];
        $blog->excerpt = SanitizeInput::esc_html($request->excerpt);

        $blog->category_id = $request->category_id;
        $blog->featured = $request->featured;
        $blog->visibility = $request->visibility;
        $blog->status = $request->status;
        $blog->admin_id = Auth::guard('admin')->user()->id;
        $blog->user_id = null;
        $blog->author = Auth::guard('admin')->user()->name;
        $blog->image = $request->image;
        $blog->image_gallery = $request->image_gallery;
        $blog->views = 0;
        $blog->tags = SanitizeInput::esc_html($request->tags);
        $blog->video_url = SanitizeInput::esc_html($request->video_url);
        $blog->created_by = 'admin';

        $metas = $this->convertTranslateMetas($request->input('translate_meta'));


        $blog->save();
        $blog->metainfo()->create($metas);
    }


    public function update_execute(Request $request, $id): void
    {
        $blog_update = Blog::findOrFail($id);
        $translate = $this->convertTranslate($request->input('translate'));

        $metas = $this->convertTranslateMetas($request->input('translate_meta'));
        $blog_update->title = $translate['title'];
        $blog_update->blog_content = $translate['blog_content'];
        $blog_update->slug = $translate['slug'];

        $blog_update->category_id = $request->category_id;
        $blog_update->featured = $request->featured;
        $blog_update->visibility = $request->visibility;
        $blog_update->status = $request->status;
        $blog_update->image = $request->image;
        $blog_update->image_gallery = $request->image_gallery;
        $blog_update->views = 0;
        $blog_update->tags = SanitizeInput::esc_html($request->tags);
        $blog_update->video_url = $request->video_url;
        $blog_update->save();

        $blog_update->metainfo()->updateOrCreate(["metainfoable_id" => $blog_update->id], $metas);

    }

    public function clone_blog_execute(Request $request)
    {

        $blog_details = Blog::findOrFail($request->item_id);

        $slug = !empty($blog_details->slug) ? $blog_details->slug : Str::slug($blog_details->title);
        $slug = create_slug($slug, 'Blog', true, 'Blog');

        $cloned_data = Blog::create([
            'category_id' => $blog_details->category_id,
            'slug' => $slug,
            'blog_content' => $blog_details->blog_content ?? 'draft blog content',
            'title' => $blog_details->title,
            'status' => 0,
            'excerpt' => $blog_details->excerpt,
            'image' => $blog_details->image,
            'image_gallery' => $blog_details->image,
            'views' => 0,
            'tags' => $blog_details->tags,
            'user_id' => null,
            'admin_id' => Auth::guard('admin')->user()->id,
            'author' => Auth::guard('admin')->user()->name,
            'featured' => $blog_details->featured,
            'video_url' => $blog_details->video_url,
            'created_by' => $blog_details->created_by,
        ]);


        $meta_object = optional($blog_details->meta_info);
        $Metas = [
            'title' => $meta_object->meta_title,
            'description' => $meta_object->meta_description,
            'image' => $meta_object->meta_image,
            //twitter
            'tw_image' => $meta_object->tw_image,
            'tw_title' => $meta_object->meta_tw_title,
            'tw_description' => $meta_object->meta_tw_description,
            //facebook
            'fb_image' => $meta_object->fb_image,
            'fb_title' => $meta_object->meta_fb_title,
            'fb_description' => $meta_object->meta_fb_description,
        ];

        $cloned_data->metainfo()->create($Metas);
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
            if (!array_key_exists('slug', $translate[$lang])) {
                $slug =  Str::slug($translate[$lang]['title']);
                $slug = create_slug($slug, 'Blog', true, 'Blog');
                $translate[$lang]['slug'] = $slug;
            }
            foreach ($translate[$lang] as $key => $item) {

                $result[$key][$lang] = $item ?? '';
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
