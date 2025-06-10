<?php

namespace Modules\Attributes\Entities;

use App\Models\MediaUploader;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ChildCategory extends Model
{
    use HasFactory, SoftDeletes;
    use HasTranslations;

    protected $fillable = ["category_id", "sub_category_id", "name", "slug", "description", "image_id", "status_id"];
    public $translatable = ['name', 'slug', 'description'];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }

    public function sub_category(): HasOne
    {
        return $this->hasOne(SubCategory::class, "id", "sub_category_id");
    }

    public function image(): HasOne
    {
        return $this->hasOne(MediaUploader::class, "id", "image_id");
    }

    public function status(): HasOne
    {
        return $this->hasOne(Status::class, "id", "status_id");
    }

    protected static function newFactory()
    {
        return \Modules\Attributes\Database\factories\ChildCategoryFactory::new();
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
	
	public function getSlugAttribute($value)
    {
		$validation = session('mobile_app', false);
		if(!$validation){
			return $value;
		}
		
		
		$language_select = session('language_select', 'en_GB');
        $language_default = session('language_default', 'en_GB');
		
       
        $nameArray = json_decode( $this->attributes['slug'], true);

        
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
	
	
	public function getDescriptionAttribute($value)
    {
		$validation = session('mobile_app', false);
		if(!$validation){
			return $value;
		}
		
		
		$language_select = session('language_select', 'en_GB');
        $language_default = session('language_default', 'en_GB');
		
       
        $nameArray = json_decode( $this->attributes['description'], true);

        
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
