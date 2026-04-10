<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'sku', 'short_description', 'description',
        'price', 'sale_price', 'image', 'gallery', 'brand', 'origin', 'material',
        'certification', 'stock', 'is_featured', 'is_active', 'view_count',
    ];

    protected $casts = [
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:0',
        'sale_price' => 'decimal:0',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 0, ',', '.') . 'đ';
    }

    public function getFormattedSalePriceAttribute(): ?string
    {
        if ($this->sale_price) {
            return number_format($this->sale_price, 0, ',', '.') . 'đ';
        }
        return null;
    }
}
