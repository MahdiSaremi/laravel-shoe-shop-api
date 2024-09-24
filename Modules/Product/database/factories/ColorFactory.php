<?php

namespace Modules\Product\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Product\Models\Color::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => substr($this->faker->word, 0, 10),
            'code' => substr($this->faker->word, 0, 10),
            'hex_code' => $this->fakeColor(),
        ];
    }

    public function fakeColor()
    {
        return "#" .
            $this->hex(rand(0, 255)) .
            $this->hex(rand(0, 255)) .
            $this->hex(rand(0, 255));
    }

    public function hex(int $number)
    {
        return str_pad(dechex($number), 2, "0", STR_PAD_LEFT);
    }
}

