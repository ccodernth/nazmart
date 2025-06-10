<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StaticOption extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $fillable = ['option_name','option_value'];
    public $translatable = ['option_value'];

}
