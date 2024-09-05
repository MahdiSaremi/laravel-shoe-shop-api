<?php

namespace App\Presents;

use Illuminate\Database\Eloquent\Model;
use Rapid\Laplus\Present\Present;

class OfferPresent extends Present
{

    /**
     * Present the model
     *
     * @return void
     */
    public function present()
    {
        $this->id();
        $this->string('code');
        $this->unsignedInteger('max_use');
        $this->unsignedInteger('use_count')->default(0);
        $this->float('offer');
        $this->timestamps();
    }

}
