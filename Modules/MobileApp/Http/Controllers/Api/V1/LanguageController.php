<?php

namespace Modules\MobileApp\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;


class LanguageController extends Controller
{
    public function languageInfo(){

        $language = Language::select('id','name','slug','direction')->where('default',1)->first()->toArray();
		$languages = Language::select('id','name','slug','direction')->get()->toArray();
        if(!is_null($languages)){
            return response()->json([
                'language'=>$language,
				'languages' => $languages 
            ]);
			
        }
		
        return response()->json([
                'language'=> [
                    "slug" => "en_GB",
                    "direction" => "ltr"
                ],
				'languages'=> $languages,
        ]);
    }
	
	public function strlanguage(Request $request){
		 
		 if($request->get('lang')){
				$language = Language::select('id','slug')->where('slug',$request->get('lang'))->first()->toArray();
				if(!empty($language)){

					$slug = $language['slug'];
					
				}else{
					$language = Language::select('id','name','slug','direction')->where('default',1)->first()->toArray();
					if(!empty($language)){
						$slug = $language['slug'];
					}else{
						$slug = 'en_GB';
					}
				}
		 }else{
			 $language = Language::select('id','name','slug','direction')->where('default',1)->first()->toArray();
				if(!empty($language)){
					$slug = $language['slug'];
				}else{
					$slug = 'en_GB';
				}
		 }
		
		
		 if(!file_exists(resource_path('lang/') . $slug . '.json') && !is_dir(resource_path('lang/') . $slug . '.json')){
			
			 
			  $all_word = file_get_contents(resource_path('lang/') . 'default.json');
		 }else{
				$all_word = file_get_contents(resource_path('lang/') . $slug . '.json');
		 }
		
		 
		 $array = json_decode($all_word,TRUE);
		$filteredArray = array_filter($array, function ($key) {
			return strpos($key, 'mobile_') === 0;
		}, ARRAY_FILTER_USE_KEY);
        return response()->json($filteredArray);
		
		
	}	
	 
    public function translateString(Request $request){
        $translatable_array = json_decode($request->get('strings'),true);

        $translated_array = [];
        if($request->has('strings')){
            foreach($translatable_array as $key => $string){
                $translated_array[$key] = __($key);
            }
        }

        return response()->json([
            'strings'=> $translated_array
        ]);
    }
}
