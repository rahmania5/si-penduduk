<?php

namespace Database\Seeders;

use App\Models\KartuKeluarga;
use Illuminate\Database\Seeder;

class KartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KartuKeluarga::factory()->count(100)->create();
    }
}
