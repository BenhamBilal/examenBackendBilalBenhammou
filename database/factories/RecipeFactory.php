<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'image_path' => 'recipes/' . fake()->uuid() . '.jpg',
            'content' => fake()->paragraphs(3, true),
            'ingredients' => implode("\n", fake()->sentences(5)),
            'cooking_time' => fake()->numberBetween(10, 180),
            'published_at' => fake()->dateTimeThisYear(),
            'user_id' => User::factory(),
        ];
    }
}
