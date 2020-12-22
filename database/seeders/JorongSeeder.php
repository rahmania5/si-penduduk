<?php

namespace Database\Seeders;

use App\Models\Jorong;
use Illuminate\Database\Seeder;

class JorongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jorong::factory()->count(150)->create();
    }
}
