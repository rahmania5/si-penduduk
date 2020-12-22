<?php

namespace Database\Factories;

use App\Models\KartuKeluarga;
use App\Models\LevelPendidikan;
use App\Models\Pekerjaan;
use App\Models\Kewarganegaraan;
use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendudukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Penduduk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $keluarga_ids = KartuKeluarga::select('id')->get();
        $level_pendidikan_ids = LevelPendidikan::select('id')->get();
        $pekerjaan_ids = Pekerjaan::select('id')->get();
        $kewarganegaraan_ids = Kewarganegaraan::select('id')->get();

        return [
            'keluarga_id' => $this->faker->randomElement($keluarga_ids),
            'nama' => $this->faker->name,
            'nik' => $this->faker->numerify('################'),
            'tempat_lahir' => $this->faker->city,
            'agama' => $this->faker->randomElement($array = array ('Islam','Kristen','Katolik','Buddha','Hindu','Konghucu')),
            'jenis_kelamin' => $this->faker->randomElement($array = array ('Laki-laki','Perempuan')),
            'tgl_lahir' => $this->faker->dateTimeThisCentury($max = 'now')->format('Y-m-d'),
            'level_pendidikan_id' => $this->faker->randomElement($level_pendidikan_ids),
            'pekerjaan_id' => $this->faker->randomElement($pekerjaan_ids),
            'status_pernikahan' => $this->faker->randomElement($array = array ('Belum Kawin','Kawin','Janda/Duda')),
            'status_keluarga' => $this->faker->randomElement($array = array ('Ayah','Ibu','Anak','Orang Tua')),
            'kewarganegaraan_id' => $this->faker->randomElement($kewarganegaraan_ids),
            'ayah' => $this->faker->name($gender = 'male'),
            'ibu' => $this->faker->name($gender = 'female'),
        ];
    }
}
