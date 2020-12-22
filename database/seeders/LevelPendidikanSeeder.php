<?php

namespace Database\Seeders;

use App\Models\LevelPendidikan;
use Illuminate\Database\Seeder;

class LevelPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LevelPendidikan::factory()->count(7)->create();
    }
}
