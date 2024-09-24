<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\Factories\ProductRelatedFactory;

class ProductRelated extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_id',
        'related_product_id',
    ];

    protected static function newFactory(): ProductRelatedFactory
    {
        return ProductRelatedFactory::new();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function relatedProduct()
    {
        return $this->belongsTo(Product::class, 'related_product_id');
    }
}
