<?php

namespace App\Rules;

use App\Models\User;
use Closure;

class NewPhoneRule extends PhoneRule
{

    public function __construct(
        public string $model = User::class,
        public string $column = 'phone',
        public $except = null,
    )
    {
    }

    public function validate(string $attribute, mixed $value, Closure $fail) : void
    {
        parent::validate($attribute, $value, $fail);

        if (!isset($this->fixedNumber))
        {
            return;
        }

        if (
            $this->model::query()
                ->when($this->except)
                ->where('id', '!=', $this->except)
                ->where($this->column, $this->fixedNumber)
                ->exists()
        )
        {
            $fail("این شماره موبایل قبلا ثبت نام کرده است");
            return;
        }
    }

}
