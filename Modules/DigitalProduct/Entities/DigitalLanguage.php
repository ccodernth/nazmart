<?php

namespace Modules\DigitalProduct\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class DigitalLanguage extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['id', 'name', 'slug', 'status', 'image_id'];
    protected $translatable = ["name", "slug"];

    protected static function newFactory()
    {
        return \Modules\DigitalProduct\Database\factories\DigitalLanguageFactory::new();
    }
}
