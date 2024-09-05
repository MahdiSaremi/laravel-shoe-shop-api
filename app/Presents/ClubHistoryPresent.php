<?php

namespace App\Presents;

use App\Enums\ClubHistoryCause;
use App\Models\User;
use App\Models\Order;
use Rapid\Laplus\Present\Present;

class ClubHistoryPresent extends Present
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
        $this->enum('cause', ClubHistoryCause::class);
        $this->bigInteger('amount');
        $this->foreignTo(Order::class)->nullOnDelete();
        $this->timestamps();
    }

}
