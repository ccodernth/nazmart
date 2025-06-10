<?php

namespace Modules\DigitalProduct\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class DigitalSubCategories extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [];
    protected $table = 'digital_sub_categories';
    protected $translatable = ["name", "slug", "description"];

    public function category(): BelongsTo
    {
        return $this->belongsTo(DigitalCategories::class);
    }

    protected static function newFactory()
    {
        return \Modules\DigitalProduct\Database\factories\DigitalProductSubCategoriesFactory::new();
    }
}
