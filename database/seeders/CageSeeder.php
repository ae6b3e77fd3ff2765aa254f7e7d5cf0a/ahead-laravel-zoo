<?php

namespace Database\Seeders;

use App\Models\Cage;
use Database\Factories\CageFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cage::factory()->count(10)->hasAnimals(rand(2, 3))->create();
    }
}
