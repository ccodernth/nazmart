<?php

namespace App\Http\Controllers\Landlord\Admin;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Helpers\ResponseMessage;
use App\Helpers\SanitizeInput;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete',['only' => ['index']]);
        $this->middleware('permission:testimonial-create',['only' => ['store']]);
        $this->middleware('permission:testimonial-edit',['only' => ['update','clone']]);
        $this->middleware('permission:testimonial-delete',['only' => ['delete','bulk_action']]);
    }
    public function index(Request $request){

       // $this->setAllDb();
        $all_testimonials = Testimonial::all();

        return view('landlord.admin.testimonial.index')->with([
            'all_testimonials' => $all_testimonials,
            'default_lang'=> $request->lang ?? GlobalLanguage::default_slug()
        ]);
    }

    public function getTestimonial(Request $request)
    {
        if ($request->input('id')) {
            $category = Testimonial::query()->where('id', '=', $request->input('id'))->first();

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
            $pages = Testimonial::get();

            foreach ($pages as $page) {
                $pageUpdateData = Testimonial::query()
                    ->find($page->id);
                $designationList = [];
                $descriptionList = [];

                foreach ($langList as $lang) {
                    $content = $page->designation;
                    if (!is_array(json_decode($content, true))) {
                        $designationList[$lang->slug] = $page->designation;
                    }
                }
                $pageUpdateData->designation = $designationList;

                foreach ($langList as $lang) {
                    $content = $page->description;
                    if (!is_array(json_decode($content, true))) {
                        $descriptionList[$lang->slug] = $page->description;
                    }
                }
                $pageUpdateData->description = $descriptionList;

                $pageUpdateData->save();

            }


        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
    public function store(Request $request){
        $data = $this->convertTranslate($request->input('translate'));
        $this->validate($request,[
            'name' => 'required|string|max:191',
         //   'description' => 'required',
         //   'designation' => 'string|max:191',
            'company' => 'string|nullable|max:191',
            'image' => 'nullable|string|max:191',
        ]);

        $testimonial = new Testimonial();
        $testimonial->name =  SanitizeInput::esc_html($request->name);
        $testimonial->description = $data['description'];
        $testimonial->designation = $data['designation'];
        $testimonial->company = SanitizeInput::esc_html($request->company);
        $testimonial->image = $request->image;
        if (tenant()){
            $testimonial->rating = 5;
        }
        $testimonial->status = $request->status;
        $testimonial->save();

        return response()->success(ResponseMessage::SettingsSaved());
    }

    public function update(Request $request){
        $data = $this->convertTranslate($request->input('translate'));

        $this->validate($request,[
            'name' => 'required|string|max:191',
          //  'description' => 'required',
          //  'designation' => 'string|max:191',
            'company' => 'string|max:191',
            'image' => 'nullable|string|max:191',
        ]);


        $testimonial = Testimonial::find($request->id);
        $testimonial->name = SanitizeInput::esc_html($request->name);
        $testimonial->description = $data['description'];
        $testimonial->designation = $data['designation'];
        $testimonial->company = SanitizeInput::esc_html($request->company);
        $testimonial->image = $request->image;
        if (tenant())
        {
            $testimonial->rating = 5;
        }
        $testimonial->status = $request->status;
        $testimonial->save();

        return response()->success(ResponseMessage::SettingsSaved());
    }

    public function clone(Request $request){
        $testimonial = Testimonial::find($request->item_id);

        $new_testimonial = new Testimonial();
        $new_testimonial->name = SanitizeInput::esc_html($testimonial->name);
        $new_testimonial->description = SanitizeInput::esc_html($testimonial->description);
        $new_testimonial->designation = SanitizeInput::esc_html($testimonial->designation);
        $new_testimonial->company = SanitizeInput::esc_html($testimonial->company);
        $new_testimonial->image = $testimonial->image;
        if (tenant())
        {
            $new_testimonial->rating = 5;
        }
        $new_testimonial->status = $testimonial->status;
        $new_testimonial->save();

        return response()->success(ResponseMessage::SettingsSaved());
    }

    public function delete(Request $request,$id){
        Testimonial::find($id)->delete();
        return response()->danger(ResponseMessage::delete('Testimonial Deleted'));
    }

    public function bulk_action(Request $request){
        $all = Testimonial::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
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
