<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class ProductShippingReturnPolicy extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = ["product_id","shipping_return_description"];

    protected $table = 'product_shipping_return_policies';
    protected $translatable = ["shipping_return_description"];
	
	public function getShippingReturnDescriptionAttribute($value)
    {

		$validation = session('mobile_app', false);
		if(!$validation){
			return $value;
		}
		
		
		$language_select = session('language_select', 'en_GB');
        $language_default = session('language_default', 'en_GB');
		
       
        $nameArray = json_decode( $this->attributes['shipping_return_description'], true);

        
        if ($nameArray === null) {
            $nameArray = '';
        }

      
        if (isset($nameArray[$language_select])) {
            return $nameArray[$language_select];
        } elseif (isset($nameArray[$language_default])) {
            return $nameArray[$language_default];
        }

        
        return '';
	}
}
