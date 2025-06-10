<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Widgets extends Model
{
    use HasTranslations;
    protected $table = 'widgets';
    protected $fillable = ['widget_area','widget_order','widget_name','widget_content','widget_location','widget_namespace'];
    protected $translatable = ["widget_content"];

}
