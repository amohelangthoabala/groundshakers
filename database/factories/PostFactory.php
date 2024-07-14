<?php

namespace Database\Factories;

use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;
    public function definition(): array
    {
        return [
            'img' => $this->faker->image,
            'tag' => $this->faker->sentence,
            'title' => $this->faker->sentence,
            'label' => $this->faker->text(100),
            'content' => $this->faker->paragraphs(3, true),

        ];
    }
}
