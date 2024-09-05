<?php

namespace App\Presents;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Rapid\Laplus\Present\Present;

class ProductColorPresent extends Present
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
        $this->text('name');
        $this->text('code');
        $this->timestamps();
    }

}
