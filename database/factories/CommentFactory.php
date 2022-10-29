<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'body' => $this->faker->realTextBetween($minNbChars = 25, $maxNbChars = 50, $indexSize = 2),
            'user_id' => $this->faker->numberBetween(1,10),
            'post_id' => $this->faker->numberBetween(1,30),
        ];
    }
}