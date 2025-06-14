<?php

namespace App\Http\Middleware\Tenant;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Models\Language;
use App\Models\Menu;
use App\Models\StaticOption;
use App\Models\TopbarInfo;
use Closure;

class GlobalVariableMiddleware
{

    public function handle($request, Closure $next)
    {
        $lang = GlobalLanguage::user_lang_slug();
        $primary_menu = Menu::where(['status' => 'default'])->first();
        $all_social_icons =  TopbarInfo::all();
        $all_language = Language::where('status', 1)->get();

        //make a function to call all static option by home page
        $static_option_arr = [
            'site_white_logo',
            'og_meta_image_for_site',
            'site_color',
            'site_logo',
            'site_third_party_tracking_code',
            'site_favicon',
            'item_license_status',
            'site_script_unique_key',
            'site_title',
            'site_tag_line',
//            meta info
            'site_meta_title',
            'site_meta_tags',
            'site_meta_keywords',
            'site_meta_description',
//            og meta
            'site_og_meta_title',
            'site_og_meta_description',
            'site_og_meta_image',
            //color variable
            'main_color_one',
            'main_color_two',
            'secondary_color',
            'heading_color',
            'paragraph_color',
            'gradient_one_color',
            'gradient_two_color',
        ];

        $static_field_data = StaticOption::whereIn('option_name',$static_option_arr)->get()->mapWithKeys(function ($item) {
            return [$item->option_name => $item->option_value];
        })->toArray();

        $all_data = [
             'global_static_field_data' => $static_field_data,
             'user_select_lang_slug'=> $lang,
             'primary_menu' => $primary_menu->id,
             'all_social_icons' => $all_social_icons,
             'all_language' => $all_language,
        ];


        view()->composer([
            'tenant/frontend/*',
            'components/*',
        ], function ($view) use ($all_data){
            $view->with($all_data);
        });

        return $next($request);
    }
}
