<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SupportDepartment extends Model
{
    use HasTranslations;
    protected $table = 'support_departments';
    protected $fillable = ['name','status'];
    public $translatable = [
        'name',
    ];
}
