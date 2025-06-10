<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class ProductInventoryDetailAttribute extends Model
{
    use HasTranslations;
    use HasFactory;

    protected $fillable = ["product_id", "inventory_details_id", "attribute_name", "attribute_value"];
    public $translatable = ['attribute_name', 'attribute_value'];

    public function inventory_details(): BelongsTo
    {
        return $this->belongsTo(ProductInventoryDetail::class, "inventory_details_id", "id");
    }

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductInventoryDetailAttributeFactory::new();
    }
	
	public function getAttributeNameAttribute($value)
    {
		$validation = session('mobile_app', false);
		if(!$validation){
			return $value;
		}
		
		
		$language_select = session('language_select', 'en_GB');
        $language_default = session('language_default', 'en_GB');
		
       
        $nameArray = json_decode( $this->attributes['attribute_name'], true);

        
        if ($nameArray === null) {
            $nameArray = '';
        }

      
        if (isset($nameArray[$language_select])) {
            return $nameArray[$language_select];
        } elseif (isset($nameArray[$language_default])) {
            return $nameArray[$language_default];
        }

        
        return $value;
	}
	
	
	public function getAttributeValueAttribute($value)
    {
		$validation = session('mobile_app', false);
		if(!$validation){
			return $value;
		}
		
		
		$language_select = session('language_select', 'en_GB');
        $language_default = session('language_default', 'en_GB');
		
       
        $nameArray = json_decode( $this->attributes['attribute_value'], true);

        
        if ($nameArray === null) {
            $nameArray = '';
        }

      
        if (isset($nameArray[$language_select])) {
            return $nameArray[$language_select];
        } elseif (isset($nameArray[$language_default])) {
            return $nameArray[$language_default];
        }

        
        return $value;
	}
}
