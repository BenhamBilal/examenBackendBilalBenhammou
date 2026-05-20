<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'image_path' => 'recipe/' . fake()->uuid() . '.jpg',
            'content' => fake()->paragraph(3,true),
            'ingredients' => implode("\n",fake()->sentences(5)),
            'cooking_time' => fake()->numberBetween(10,180),
            'published_at' => fake()->dateTimeThisYear(),
            'user_id' => 1
        ];
    }
}
