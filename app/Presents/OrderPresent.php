<?php

namespace App\Presents;

use App\Enums\OrderStatus;
use App\Models\Offer;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Rapid\Laplus\Present\Present;

class OrderPresent extends Present
{

    /**
     * Present the model
     *
     * @return void
     */
    public function present()
    {
        $this->id();
        $this->foreignTo(User::class)->cascadeOnDelete();
        $this->foreignTo(Product::class)->cascadeOnDelete();
        $this->foreignTo(ProductColor::class, 'color_id')->nullOnDelete();
        $this->foreignTo(ProductSize::class, 'size_id')->nullOnDelete();
        $this->unsignedBigInteger('paid_price');
        $this->foreignTo(Offer::class, 'used_offer_id')->nullOnDelete();
        $this->enum('status', OrderStatus::class);
        $this->timestamps();
    }

}
