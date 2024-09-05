<?php

namespace App\Presents;

use Illuminate\Database\Eloquent\Model;
use Rapid\Laplus\Present\Present;

class FilePresent extends Present
{

    /**
     * Present the model
     *
     * @return void
     */
    public function present()
    {
        $this->id();
        $this->string('extension');
        $this->string('mime_type');
        $this->text('path')->hidden();
        $this->timestamps();
    }

}
