<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class ProductAttribute extends Model
{
    use HasFactory;
    use HasTranslations;


    protected $fillable = ["title","terms"];
    protected $translatable = ["title","terms"];

    protected $table = "product_attributes";

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductAttributeFactory::new();
    }
	
	
	
}
