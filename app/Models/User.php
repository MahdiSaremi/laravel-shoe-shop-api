<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Rapid\Laplus\Present\HasPresent;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasPresent;
}
