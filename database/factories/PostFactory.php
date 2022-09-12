<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
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
            'title' => $this->faker->sentence(),
            'slug' => str($this->faker->sentence())->slug(),
            'excerpt' => $this->faker->paragraph(1),
            'content' => $this->faker->paragraph(5),
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'state' => 'draft',
        ];
    }
}
