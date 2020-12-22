<?php

namespace Database\Factories;

use App\Models\LevelPendidikan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevelPendidikanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LevelPendidikan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->randomElement($array = array ('Tidak Sekolah','SD','SMP','SMA','S1','S2','S3')),
        ];
    }
}
