<?php

namespace App\Presents;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Rapid\Laplus\Present\Present;

class UserPresent extends Present
{

    /**
     * Present the model
     *
     * @return void
     */
    public function present()
    {
        $this->id();
        $this->string('first_name');
        $this->string('last_name');
        $this->string('phone')->unique();
        $this->string('referral_code')->unique();
        $this->foreignTo(User::class, 'invited_by_id')->nullOnDelete();
        $this->unsignedInteger('club_score')->default(0);
        $this->password();
        $this->rememberToken();
        $this->timestamps();
    }

}
