<?php

namespace Modules\Product\Entities;

use App\Models\MediaUploader;
use App\Models\MetaInfo;
use App\Models\ProductReviews;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Attributes\Entities\Brand;
use Modules\Attributes\Entities\Category;
use Modules\Attributes\Entities\ChildCategory;
use Modules\Attributes\Entities\Color;
use Modules\Attributes\Entities\DeliveryOption;
use Modules\Attributes\Entities\Size;
use Modules\Attributes\Entities\SubCategory;
use Modules\Badge\Entities\Badge;
use Modules\Campaign\Entities\CampaignProduct;
use Modules\Campaign\Entities\CampaignSoldProduct;
use Modules\RefundModule\Entities\RefundProduct;
use Modules\TaxModule\Entities\TaxClass;
use Modules\TaxModule\Entities\TaxClassOption;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
      use HasTranslations;
    use SoftDeletes;

    protected $withCount = ['inventoryDetail'];
    protected $fillable = [
        "name",
        "slug",
        "summary",
        "description",
        "brand_id",
        "status_id",
        "cost",
        "price",
        "sale_price",
        "image_id",
        "badge_id",
        "min_purchase",
        "max_purchase",
        "is_refundable",
        "is_inventory_warn_able",
        "is_in_house",
        "is_taxable",
        "tax_class_id"
    ];
    public $translatable = ['name', 'slug', 'summary', 'description'];

    public function scopePublished()
    {
        return $this->where('status_id', 1);
    }

    public function category(): HasOneThrough
    {
        return $this->hasOneThrough(Category::class, ProductCategory::class, 'product_id', 'id', 'id', 'category_id');
    }

    public function subCategory(): HasOneThrough
    {
        return $this->hasOneThrough(SubCategory::class, ProductSubCategory::class, "product_id", "id", "id", "sub_category_id");
    }

    public function childCategory(): hasManyThrough
    {
        return $this->hasManyThrough(ChildCategory::class, ProductChildCategory::class, "product_id", "id", "id", "child_category_id");
    }

    public function brand(): hasOne
    {
        return $this->hasOne(Brand::class, "id", "brand_id");
    }

    public function status(): hasOne
    {
        return $this->hasOne(Status::class, "id", "status_id");
    }

    public function badge(): hasOne
    {
        return $this->hasOne(Badge::class, "id", "badge_id");
    }

    public function metaData(): MorphOne
    {
        return $this->morphOne(MetaInfo::class, "metainfoable");
    }

    public function inventory(): hasOne
    {
        return $this->hasOne(ProductInventory::class, "product_id", "id");
    }

    public function inventoryDetail(): hasMany
    {
        return $this->hasMany(ProductInventoryDetail::class, "product_id", "id");
    }

    public function product_category()
    {
        return $this->hasOne(ProductCategory::class, "product_id", "id");
    }

    public function product_sub_category(): HasOne
    {
        return $this->hasOne(ProductSubCategory::class, "product_id", "id");
    }

    public function delivery_option(): hasMany
    {
        return $this->hasMany(ProductDeliveryOption::class, "product_id", "id");
    }

    public function product_child_category(): hasMany
    {
        return $this->hasMany(ProductChildCategory::class, "product_id", "id");
    }

    public function product_gallery(): hasMany
    {
        return $this->hasMany(ProductGallery::class, "product_id", "id");
    }

    public function uom(): hasOne
    {
        return $this->hasOne(ProductUom::class, "product_id", "id");
    }

    public function tag(): hasMany
    {
        return $this->hasMany(ProductTag::class, "product_id", "id");
    }

    public function gallery_images(): HasManyThrough
    {
        return $this->hasManyThrough(MediaUploader::class, ProductGallery::class, "product_id", "id", "id", "image_id");
    }

    public function campaign_sold_product(): HasOne
    {
        return $this->hasOne(CampaignSoldProduct::class, "product_id", "id");
    }

    public function campaign_product(): BelongsTo
    {
        return $this->belongsTo(CampaignProduct::class, 'id', 'product_id');
    }

    public function color(): HasManyThrough
    {
        return $this->hasManyThrough(Color::class, ProductInventoryDetail::class, "product_id", "id", "id", "color");
    }

    public function sizes(): HasManyThrough
    {
        return $this->hasManyThrough(Size::class, ProductInventoryDetail::class, "product_id", "id", "id", "size");
    }

    public function size(): HasOneThrough
    {
        return $this->hasOneThrough(Size::class, ProductInventoryDetail::class, "product_id", "id", "id", "size");
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReviews::class);
    }

    public function ratings()
    {
        return $this->reviews()->avg("rating");
    }

    public function return_policy(): HasOne
    {
        return $this->hasOne(ProductShippingReturnPolicy::class);
    }

    public function product_delivery_option(): HasManyThrough
    {
        return $this->hasManyThrough(DeliveryOption::class, ProductDeliveryOption::class, 'product_id', 'id', 'id', 'delivery_option_id');
    }

    public function product_tax_class(): HasOne
    {
        return $this->hasOne(TaxClass::class, 'id', 'tax_class_id');
    }

    public function refunded_product(): HasOne
    {
        return $this->hasOne(RefundProduct::class);
    }

    public function taxOptions(): HasManyThrough
    {
        return $this->hasManyThrough(TaxClassOption::class, TaxClass::class, 'id', 'class_id', 'tax_class_id', 'id');
    }
	
    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::created(function () {
            \Log::info("working from product");
        });

        static::updated(function () {
            \Log::info("working from update event in product model");
        });
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
	
	public function getSummaryAttribute($value)
    {
		$validation = session('mobile_app', false);
		if(!$validation){
			return $value;
		}
		
		
		$language_select = session('language_select', 'en_GB');
        $language_default = session('language_default', 'en_GB');
		
       
        $nameArray = json_decode( $this->attributes['summary'], true);

        
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
