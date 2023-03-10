<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
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
            'type_id' => Type::factory(),
            'slug' => $this->faker->slug,
            'body' => $this->faker->sentence,
        ];
    }
}
