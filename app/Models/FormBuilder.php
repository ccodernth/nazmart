<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FormBuilder extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'form_builders';
    protected $fillable = ['title', 'email', 'button_text', 'fields', 'success_message'];
    public $translatable = [
        'title',
        'button_text',
        'fields',
        'success_message',
    ];
}
