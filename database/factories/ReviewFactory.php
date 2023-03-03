<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\Hotel;
use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       return [
            'title' => $this->faker->realTextBetween($minNbChars = 25, $maxNbChars = 50, $indexSize = 2),
            'description' => $this->faker->realTextBetween($minNbChars = 25, $maxNbChars = 50, $indexSize = 2),
            'user_id' => FactoryHelper::getRandomModelId(User::class),
            'hotel_id' => FactoryHelper::getRandomModelId(Hotel::class),
        ];
    }
}

