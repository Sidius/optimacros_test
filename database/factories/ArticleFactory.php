<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(1, true),
            'content' => $this->faker->text(500),
            'image' => 'https://catherineasquithgallery.com/uploads/posts/2021-03/1615815699_17-p-stilnii-fon-25.jpg',
//            'image' => $this->faker->image(public_path('storage\images'), 640, 480, null, false),
        ];
    }
}
