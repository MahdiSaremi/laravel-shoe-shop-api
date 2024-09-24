<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\Factories\ProductModelFactory;

class ProductModel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_id',
        'color_id',
        'image_id',
        'code',
        'size',
        'stock',
        'discount',
    ];

    protected static function newFactory(): ProductModelFactory
    {
        return ProductModelFactory::new();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
