<?php

namespace App\Presents;

use App\Models\File;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Database\Eloquent\Model;
use Rapid\Laplus\Present\Present;

class ProductImagePresent extends Present
{

    /**
     * Present the model
     *
     * @return void
     */
    public function present()
    {
        $this->id();
        $this->foreignTo(Product::class)->cascadeOnDelete();
        $this->foreignTo(File::class)->cascadeOnDelete();
        $this->foreignTo(ProductColor::class, 'color_id')->nullOnDelete();
        $this->foreignTo(ProductSize::class, 'size_id')->nullOnDelete();
        $this->timestamps();
    }

}
