<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
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
                'name' => 'PHP',
            ],
            [
                'name' => 'React',
            ],
            [
                'name' => 'Node',
            ],
            [
                'name' => 'Javascript',
            ],
        ];
        DB::table('categories')->insert($dataSeeders);
    }
}
