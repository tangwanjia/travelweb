<?php

namespace Database\Seeders;

use App\Models\TravelWeb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TravelWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TravelWeb::factory()->count(100)->create();
    }
}
