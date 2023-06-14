<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSeeders = [
            [
                'name' => 'A1',
            ],
            [
                'name' => 'C2',
            ],
            [
                'name' => 'NL',
            ],
            [
                'name' => 'D',
            ],
        ];
        DB::table('levels')->insert($dataSeeders);
    }
}
