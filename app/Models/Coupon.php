<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Coupon extends Model
{
    use HasTranslations;
    protected $fillable = ['name', 'code', 'description', 'discount_type', 'discount_amount', 'status', 'expire_date'];
    public $translatable = ['name', 'description'];

    public function scopePublished()
    {
        return $this->where('status', 1);
    }

    public function scopeActive()
    {
        return $this->where(function ($query) {
            $query->whereDate('expire_date', '>=', today())->orWhereDate('expire_date', NULL);
        });
    }
}
