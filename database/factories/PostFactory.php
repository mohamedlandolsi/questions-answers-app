<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'type_id' => '2',
            'body' => $this->faker->sentence,
        ];
    }
}
