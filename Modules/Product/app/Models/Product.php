<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\Factories\ProductFactory;
use Modules\Product\Repositories\ProductRepository;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'group_id',
        'image_id',
        'name',
        'code',
        'description',
        'features',
        'price',
        'slug',
        'rating',
        'discount',
    ];

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, ProductImage::class);
    }

    public function models()
    {
        return $this->hasMany(ProductModel::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    public function updateRating()
    {
        $this->rating = app(ProductRepository::class)->getRating($this);
    }

}
