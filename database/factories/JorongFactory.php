<?php

namespace Database\Factories;

use App\Models\Nagari;
use App\Models\Jorong;
use Illuminate\Database\Eloquent\Factories\Factory;

class JorongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jorong::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nagari_ids = Nagari::select('id')->get();

        return [
            'nama' => $this->faker->streetName,
            'nagari_id' => $this->faker->randomElement($nagari_ids),
        ];
    }
}
