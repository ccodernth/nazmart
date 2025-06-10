<?php

namespace Modules\MobileApp\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class StartingMobile
{
    public function handle(Request $request, Closure $next){
                $language_default = 'en_GB';
            	$language_select = 'en_GB';
            	
                if($request->get('lang')){
    				$language = \App\Models\Language::select('id','slug')->where('slug',$request->get('lang'))->first();
    				if(!empty($language)){
            				        $language_select = $language->slug;
            	                    $language = \App\Models\Language::select('id','name','slug','direction')->where('default',1)->first();
            	                    if(!empty($language)){
            						    $language_default = $language->slug;
            	                    }
            				}else{
            					$language = \App\Models\Language::select('id','name','slug','direction')->where('default',1)->first();
            					if(!empty($language)){
            							$language_default = $language->slug;
            					        $language_select = $language->slug;
            					}
            				}
            				
            		 }else{
        			     $language = \App\Models\Language::select('id','name','slug','direction')->where('default',1)->first();
        				if(!empty($language)){
        					$language_default = $language->slug;
        					$language_select = $language->slug;
        				}
        		 }
        		
        		session(['language_default' => $language_default, 'language_select' => $language_select, 'mobile_app' => true ]);
 
              return $next($request);
   }
   
   
}
