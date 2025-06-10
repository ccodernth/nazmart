<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PageBuilder extends Model
{
    use HasTranslations;

    protected $table = 'page_builders';
    protected $fillable = [
      'addon_name',
      'addon_type',
      'addon_location',
      'addon_order',
      'addon_page_id',
      'addon_page_type',
      'addon_settings',
      'addon_namespace',
    ];
    public $translatable = ['addon_settings'];

}
