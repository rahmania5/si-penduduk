<?php

namespace Database\Seeders;

use App\Models\Kewarganegaraan;
use Illuminate\Database\Seeder;

class KewarganegaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kewarganegaraan::factory()->count(2)->create();
    }
}
