<?php

namespace App\Enums;

enum OrderStatus : string
{

    case Queue = 'Queue';

    case Completed = 'Completed';

}
