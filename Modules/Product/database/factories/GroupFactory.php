<?php

namespace Modules\Product\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Product\Models\Group::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $name = substr($this->faker->word, 0, 20),
            'code' => substr($this->faker->word, 0, 10),
            'image_id' => null,
            'parent_id' => null,
            'discount' => 0,
            'slug' => Str::slug($name),
        ];
    }
}

