<?php

namespace App\Http\Controllers\Landlord\Admin;

use App\Helpers\SanitizeInput;
use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class MaintainsPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:page-settings-maintain-page-manage');
    }

    public function maintains_page_settings()
    {
        return view('landlord.admin.maintain-page.maintain-page-index');
    }

    public function update_maintains_page_settings(Request $request)
    {
        $this->validate($request, [
            'maintenance_logo' => 'nullable|string|max:191',
            'maintenance_bg_image' => 'nullable|string|max:191',
        ]);

        $this->validate($request, [
         //   'maintains_page_title' => 'nullable|string',
         //   'maintains_page_description' => 'nullable|string'
        ]);
        $title = 'maintains_page_title';
        $description = 'maintains_page_description';
        $date = 'mentenance_back_date';
        $translate = $this->convertTranslate($request->input('translate'));

        update_static_option($title, $translate[$title]);
        update_static_option($description, $translate[$description]);
        update_static_option($date, $request->$date);


        if (!empty($request->maintenance_logo)) {
            update_static_option('maintenance_logo', $request->maintenance_logo);
        }

        if (!empty($request->maintenance_bg_image)) {
            update_static_option('maintenance_bg_image', $request->maintenance_bg_image);
        }

        return redirect()->back()->with(['msg' => __('Settings Updated....'), 'type' => 'success']);
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
