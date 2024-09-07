<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneRule implements ValidationRule
{

    public string $fixedNumber;

    public function validate(string $attribute, mixed $value, Closure $fail) : void
    {
        if (!preg_match('/^(0098|\+98|98|0|)(9\d{9})$/', $value, $matches))
        {
            $fail("فرمت شماره موبایل اشتباه است");
            return;
        }

        $this->fixedNumber = '0' . $matches[2];
    }

}
