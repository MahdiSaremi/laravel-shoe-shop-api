<?php

namespace App\Presents;

use Illuminate\Database\Eloquent\Model;
use Rapid\Laplus\Present\Present;

class ProductPresent extends Present
{

    /**
     * Present the model
     *
     * @return void
     */
    public function present()
    {
        $this->id();
        $this->text('title');
        $this->text('slug')->unique();
        $this->text('description');
        $this->text('content');
        $this->text('keywords');
        $this->unsignedBigInteger('price');
        $this->float('offer')->default(0);
        $this->timestamps();
    }

}
