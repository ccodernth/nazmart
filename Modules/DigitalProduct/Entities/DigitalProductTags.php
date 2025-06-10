<?php

namespace Modules\DigitalProduct\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class DigitalProductTags extends Model
{
    use HasFactory;

    use HasTranslations;

    protected $fillable = ["product_id", "tag_name"];
    protected $translatable = ["tag_name"];
    protected static function newFactory()
    {
        return \Modules\DigitalProduct\Database\factories\DigitalProductTagsFactory::new();
    }
}
