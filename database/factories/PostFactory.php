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
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'body' => $this->faker->realTextBetween($minNbChars = 15, $maxNbChars = 25, $indexSize = 1),
        ];
    }

    public function untitled()
    {
        return $this->state([
            'title' => 'untitled'
        ]);
    }
}
