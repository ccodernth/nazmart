<?php

namespace Modules\DigitalProduct\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class DigitalProductRefundPolicies extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'digital_product_refund_policies';
    protected $fillable = ["product_id","refund_description"];
    protected $translatable = ["refund_description"];

    protected static function newFactory()
    {
        return \Modules\DigitalProduct\Database\factories\DigitalProductRefundPoliciesFactory::new();
    }
}
