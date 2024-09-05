<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rapid\Laplus\Present\HasPresent;

class Product extends Model
{
    use HasFactory, HasPresent;
}
