<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            ['code' => 'GK', 'description' => 'Goalkeeper'],
            ['code' => 'RB', 'description' => 'Right Back'],
            ['code' => 'CB', 'description' => 'Center Back'],
            ['code' => 'LB', 'description' => 'Left Back'],
            ['code' => 'CDM', 'description' => 'Defensive Midfielder'],
            ['code' => 'CM', 'description' => 'Central Midfielder'],
            ['code' => 'CAM', 'description' => 'Attacking Midfielder'],
            ['code' => 'LM', 'description' => 'Left Midfielder'],
            ['code' => 'RM', 'description' => 'Right Midfielder'],
            ['code' => 'ST', 'description' => 'Striker'],
        ];

        // Insert data into the 'positions' table
        DB::table('positions')->insert($positions);
    }
}
