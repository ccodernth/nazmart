<?php

namespace Database\Seeders\Tenant;

use App\Helpers\SanitizeInput;
use App\Mail\TenantCredentialMail;
use App\Models\Admin;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PageBuilder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PageSeed extends Seeder
{
    public function generateLanguage($data)
    {
        $allLanguages = Language::query()->get();

        $result = [];
        foreach ($allLanguages as $language) {
            $result[$language->slug] = SanitizeInput::esc_html($data);
        }
        return $result;
    }
    public function run()
    {
        $page_data = new Page();

        $page_data->slug = $this->generateLanguage('home');
        $page_data->title = $this->generateLanguage('Home');
        $page_data->page_content = $this->generateLanguage('Home');
        $page_data->visibility = 0;
        $page_data->status = 1;
        $page_data->navbar_variant = '01';
        $page_data->footer_variant = '01';
        $page_data->page_builder = 1;
        $page_data->breadcrumb = 0;

        $Metas = [
            'title' => $this->generateLanguage(''),
            'description' => $this->generateLanguage('Demo meta desc'),
            'image' => null,
            //twitter
            'tw_image' => null,
            'tw_title' => $this->generateLanguage('tw title'),
            'tw_description' => $this->generateLanguage('tw desc'),
            //facebook
            'fb_image' => null,
            'fb_title' => $this->generateLanguage('fb title'),
            'fb_description' => $this->generateLanguage('fb desc'),
        ];

        $page_data->save();
        $page_data->metainfo()->create($Metas);

        // Uploading page layout
        if (session()->get('theme')) {
            $file_name = session()->get('theme') . '/assets/page_layout/home-layout.json';
        } else {
            $file_name = 'hexfashion/assets/page_layout/home-layout.json';
        }
        $this->upload_layout($file_name, $page_data->id);


        $page_data_2 = new Page();
        $page_data_2->slug = $this->generateLanguage('about');
        $page_data_2->title = $this->generateLanguage('About Us');
        $page_data_2->page_content = $this->generateLanguage('About us content');
        $page_data_2->visibility = 0;
        $page_data_2->status = 1;
        $page_data_2->navbar_variant = '01';
        $page_data_2->footer_variant = '01';
        $page_data_2->page_builder = 1;
        $page_data_2->breadcrumb = 1;

        $Metas_2 = [
            'title' => $this->generateLanguage('Demo meta Title'),
            'description' => $this->generateLanguage('Demo meta desc'),
            'image' => null,
            //twitter
            'tw_image' => null,
            'tw_title' => $this->generateLanguage('tw title'),
            'tw_description' => $this->generateLanguage('tw desc'),
            //facebook
            'fb_image' => null,
            'fb_title' => $this->generateLanguage('fb title'),
            'fb_description' => $this->generateLanguage('fb desc'),
        ];

        $page_data_2->save();
        $page_data_2->metainfo()->create($Metas_2);

        // Uploading page layout
        if (session()->get('theme')) {
            $file_name = session()->get('theme') . '/assets/page_layout/about-layout.json';
        } else {
            $file_name = 'hexfashion/assets/page_layout/about-layout.json';
        }
        $this->upload_layout($file_name, $page_data_2->id);

        $page_data_5 = new Page();
        $page_data_5->slug = $this->generateLanguage('contact');
        $page_data_5->title = $this->generateLanguage('Contact');
        $page_data_5->page_content = $this->generateLanguage('contact content');
        $page_data_5->visibility = 0;
        $page_data_5->status = 1;
        $page_data_5->navbar_variant = '01';
        $page_data_5->footer_variant = '01';
        $page_data_5->page_builder = 1;
        $page_data_5->breadcrumb = 1;

        $Metas_5 = [
            'title' => $this->generateLanguage('Demo meta Title'),
            'description' => $this->generateLanguage('Demo meta desc'),
            'image' => null,
            //twitter
            'tw_image' => null,
            'tw_title' => $this->generateLanguage('tw title'),
            'tw_description' => $this->generateLanguage('tw desc'),
            //facebook
            'fb_image' => null,
            'fb_title' => $this->generateLanguage('fb title'),
            'fb_description' => $this->generateLanguage('fb desc'),
        ];

        $page_data_5->save();
        $page_data_5->metainfo()->create($Metas_5);

        // Uploading page layout
        if (session()->get('theme')) {
            $file_name = session()->get('theme') . '/assets/page_layout/contact-layout.json';
        } else {
            $file_name = 'hexfashion/assets/page_layout/contact-layout.json';
        }

        $this->upload_layout($file_name, $page_data_5->id);

        $page_data_6 = new Page();
        $page_data_6->slug = $this->generateLanguage('shop');
        $page_data_6->title = $this->generateLanguage('Shop');
        $page_data_6->page_content = $this->generateLanguage('contact content');
        $page_data_6->visibility = 0;
        $page_data_6->status = 1;
        $page_data_6->navbar_variant = '01';
        $page_data_6->footer_variant = '01';
        $page_data_6->page_builder = 0;
        $page_data_6->breadcrumb = 1;

        $Metas_6 = [
            'title' => $this->generateLanguage('Demo meta Title'),
            'description' => $this->generateLanguage('Demo meta desc'),
            'image' => null,
            //twitter
            'tw_image' => null,
            'tw_title' => $this->generateLanguage('tw title'),
            'tw_description' => $this->generateLanguage('tw desc'),
            //facebook
            'fb_image' => null,
            'fb_title' => $this->generateLanguage('fb title'),
            'fb_description' => $this->generateLanguage('fb desc'),
        ];

        $page_data_6->save();
        $page_data_6->metainfo()->create($Metas_6);

        $page_data_7 = new Page();
        $page_data_7->title = $this->generateLanguage('Blog');
        $page_data_7->slug = $this->generateLanguage('blog');
        $page_data_7->page_content = $this->generateLanguage('blog content');
        $page_data_7->visibility = 0;
        $page_data_7->status = 1;
        $page_data_7->navbar_variant = '01';
        $page_data_7->footer_variant = '01';
        $page_data_7->page_builder = 0;
        $page_data_7->breadcrumb = 1;

        $Metas_7 = [
            'title' => $this->generateLanguage('Demo meta Title'),
            'description' => $this->generateLanguage('Demo meta desc'),
            'image' => null,
            //twitter
            'tw_image' => null,
            'tw_title' => $this->generateLanguage('tw title'),
            'tw_description' => $this->generateLanguage('tw desc'),
            //facebook
            'fb_image' => null,
            'fb_title' => $this->generateLanguage('fb title'),
            'fb_description' => $this->generateLanguage('fb desc'),
        ];

        $page_data_7->save();
        $page_data_7->metainfo()->create($Metas_7);

        $page_data_8 = new Page();
        $page_data_8->title = $this->generateLanguage('Digital Product');
        $page_data_8->slug = $this->generateLanguage('digital-product');
        $page_data_8->page_content = $this->generateLanguage('Shop content');
        $page_data_8->visibility = 0;
        $page_data_8->status = 1;
        $page_data_8->navbar_variant = '01';
        $page_data_8->footer_variant = '01';
        $page_data_8->page_builder = 0;
        $page_data_8->breadcrumb = 1;

        $Metas_8 = [
            'title' => $this->generateLanguage('Demo meta Title'),
            'description' => $this->generateLanguage('Demo meta desc'),
            'image' => null,
            //twitter
            'tw_image' => null,
            'tw_title' => $this->generateLanguage('tw title'),
            'tw_description' => $this->generateLanguage('tw desc'),
            //facebook
            'fb_image' => null,
            'fb_title' => $this->generateLanguage('fb title'),
            'fb_description' => $this->generateLanguage('fb desc'),
        ];

        $page_data_8->save();
        $page_data_8->metainfo()->create($Metas_8);
    }

    private function upload_layout($file, $page_id)
    {
        DB::beginTransaction();
        try {
            $file_contents = json_decode(file_get_contents('core/resources/views/themes/' . $file));

            $contentArr = [];
            if (current($file_contents)->addon_page_type == 'dynamic_page') {
                foreach ($file_contents as $key => $content) {
                    unset($content->id);
                    $content->addon_page_id = (int)trim($page_id);
                    $content->created_at = now();
                    $content->updated_at = now();

                    foreach ($content as $key2 => $con) {
                        if ($key2 == 'addon_settings') {
                            $titleList = [];
                            $langList = Language::all();

                            foreach ($langList as $lang) {
                                $titleList[$lang->slug] = $con;
                            }
                            $contentArr[$key][$key2] = json_encode($titleList);

                        } else {
                            $contentArr[$key][$key2] = $con;
                        }

                    }
                }

                Page::findOrFail($page_id)->update(['page_builder' => 1]);

                PageBuilder::where('addon_page_id', $page_id)->delete();
                PageBuilder::insert($contentArr);
            } else {
                Page::findOrFail($page_id)->update([
                    'page_builder' => 0,
                    'page_content' => current($file_contents)->text
                ]);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

}
