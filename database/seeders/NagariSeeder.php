<?php

namespace Database\Seeders;

use App\Models\Nagari;
use Illuminate\Database\Seeder;

class NagariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nagari::factory()->count(30)->create();
    }
}
