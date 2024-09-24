<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\Factories\GroupFactory;

class Group extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'code',
        'image_id',
        'parent_id',
        'discount',
        'slug',
    ];

    protected static function newFactory(): GroupFactory
    {
        return GroupFactory::new();
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function parent()
    {
        return $this->belongsTo(Group::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
