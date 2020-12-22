<?php

namespace Database\Factories;

use App\Models\Jorong;
use App\Models\KartuKeluarga;
use Illuminate\Database\Eloquent\Factories\Factory;

class KartuKeluargaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KartuKeluarga::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $jorong_ids = Jorong::select('id')->get();
        
        return [
            'no_kk' => $this->faker->numerify('################'),
            'jorong_id' => $this->faker->randomElement($jorong_ids),
            'tgl_pencatatan' => $this->faker->dateTimeThisDecade($max = 'now')->format('Y-m-d'),
        ];
    }
}
