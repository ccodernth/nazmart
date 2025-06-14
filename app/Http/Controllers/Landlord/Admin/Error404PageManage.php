<?php

namespace App\Http\Controllers\Landlord\Admin;

use App\Helpers\SanitizeInput;
use App\Http\Controllers\Controller;

use App\Models\Language;
use Illuminate\Http\Request;

class Error404PageManage extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function error_404_page_settings()
    {
        $all_languages = Language::all();
        return view('landlord.admin.404.404-page-settings')->with(['all_languages' => $all_languages]);
    }

    public function update_error_404_page_settings(Request $request)
    {
            $this->validate($request, [
             //   'error_404_page_subtitle' => 'nullable|string',
              //  'error_404_page_button_text' => 'nullable|string',
            ]);

            $subtitle = 'error_404_page_subtitle';
            $button_text = 'error_404_page_button_text';
            $error_image = 'error_image';
$translate = $this->convertTranslate($request->input('translate'));

            update_static_option($subtitle, $translate[$subtitle]);
            update_static_option($button_text, $translate[$button_text]);
            update_static_option($error_image, $request->$error_image);

        return redirect()->back()->with([
            'msg' => __('Settings Updated ...'),
            'type' => 'success'
        ]);

    }

    private function convertTranslate($requestData): array
    {
        $result = [];

        $translate = $requestData;


        $allLang = get_all_language();
        $defaultLangData = $allLang->where('default', '=', 1)->first();

        foreach ($allLang as $langData) {
            $lang = $langData->slug;

            if (isset($translate[$lang])) {
                foreach ($translate[$lang] as $key => $item) {

                    $result[$key][$lang] = SanitizeInput::esc_html($item ?? '');
                }
            }


        }
        return $result;
    }
}
