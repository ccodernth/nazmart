<?php

namespace Modules\DigitalProduct\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class DigitalChildCategories extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [];
    protected $translatable = ["name", "slug", "description"];

    public function category(): BelongsTo
    {
        return $this->belongsTo(DigitalCategories::class);
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(DigitalSubCategories::class, 'sub_category_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\DigitalProduct\Database\factories\DigitalProductChildCategoriesFactory::new();
    }
}
