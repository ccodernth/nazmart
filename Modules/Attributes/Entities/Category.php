<?php

namespace Modules\Attributes\Entities;

use App\Enums\StatusEnums;
use App\Models\MediaUploader;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductCategory;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory , SoftDeletes;
    use HasTranslations;
    protected $table = 'categories';
    protected $fillable = ["name","slug","description","image_id","status_id"];
    public $translatable = ['name', 'slug', 'description'];
    public function scopePublished()
    {
        return $this->where('status_id', StatusEnums::PUBLISH);
    }

    public function image(): HasOne
    {
        return $this->hasOne(MediaUploader::class,"id","image_id");
    }

    public function subCategory(){
        return $this->hasMany(SubCategory::class, "category_id", "id");
    }

    public function status(): HasOne
    {
        return $this->hasOne(Status::class,"id","status_id");
    }

    public function product_categories(): HasMany
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function product(): HasManyThrough
    {
        return $this->hasManyThrough(Product::class,ProductCategory::class,"category_id","id","id","product_id");
    }

    protected static function newFactory()
    {
        return \Modules\Attributes\Database\factories\CategoryFactory::new();
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
