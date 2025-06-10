<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = ['title','page_content','slug','visibility','page_builder','status','breadcrumb','navbar_variant','footer_variant'];
    public $translatable = ['title', 'slug', 'page_content'];


    public function metainfo()
    {
        return $this->morphOne(MetaInfo::class, 'metainfoable');
    }

    public function changeTranslate()
    {
    //    dd('geldi');

    }

    protected $casts = [
        'visibility' => 'integer',
        'page_builder' => 'integer',
        'breadcrumb' => 'integer',
        'status' => 'integer'
    ];
}
