<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hotel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $starMin = 1;
        $starMax = 5;
        return [
            'name' => $this->faker->word(30),
            'address' => $this->faker->address,
            'star' => $this->faker->numberBetween($starMin, $starMax),
            'active' => $this->faker->numberBetween(1,0)
        ];
    }

    public function untitled()
    {
        return $this->state([
            'title' => 'untitled'
        ]);
    }
}
