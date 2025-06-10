<?php

namespace Modules\DigitalProduct\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\Translatable\HasTranslations;

class DigitalCategories extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'digital_categories';
    protected $fillable = ['name', 'slug', 'description', 'digital_product_type', 'image_id'];
    protected $translatable = ["name", "slug", "description"];

    public function product_type()
    {
        return $this->hasOne(DigitalProductType::class, 'id', 'digital_product_type');
    }

    public function product(): HasManyThrough
    {
        return $this->hasManyThrough(DigitalProduct::class,DigitalProductCategories::class,"category_id","id","id","product_id");
    }
}
