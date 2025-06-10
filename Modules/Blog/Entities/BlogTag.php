<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class BlogTag extends Model
{
    use HasTranslations;

    use HasFactory;

    protected $fillable = ['title', 'slug'];
    public $translatable = ['title', 'slug'];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\BlogtagFactory::new();
    }
}
