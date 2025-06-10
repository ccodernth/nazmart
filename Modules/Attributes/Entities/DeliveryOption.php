<?php

namespace Modules\Attributes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class DeliveryOption extends Model
{
    use HasFactory, SoftDeletes;
    use HasTranslations;


    protected $fillable = ["icon","title","sub_title"];
    public $translatable = ['title','sub_title'];


    protected static function newFactory()
    {
        return \Modules\Attributes\Database\factories\DeliveryOptionFactory::new();
    }
}
