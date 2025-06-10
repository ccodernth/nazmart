<?php

namespace Modules\Badge\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Badge extends Model
{
    use HasFactory, SoftDeletes;
    use HasTranslations;

    protected $fillable = ['name', 'image', 'for', 'sale_count', 'type', 'status'];
    protected $table = 'badges';
    protected $translatable = ["name"];

    protected static function newFactory()
    {
        return \Modules\Badge\Database\factories\BadgeFactory::new();
    }
	
	public function getNameAttribute($value)
    {
	
		$validation = session('mobile_app', false);
		if(!$validation){
			return $value;
		}
		
		
		$language_select = session('language_select', 'en_GB');
        $language_default = session('language_default', 'en_GB');
		
       
        $nameArray = json_decode( $this->attributes['name'], true);

        
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
