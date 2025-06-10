<?php

namespace Modules\DigitalProduct\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class DigitalProductType extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'digital_product_types';
    protected $fillable = ['name', 'slug', 'product_type', 'extensions', 'image_id', 'status'];
    protected $translatable = ["name", "slug"];

    protected static function newFactory()
    {
        return \Modules\DigitalProduct\Database\factories\DigitalProductTypeFactory::new();
    }
}
