<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LanguageSeeder extends Seeder
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
                'name' => 'Tiếng Anh',
            ],
            [
                'name' => 'Tiếng Pháp',
            ],
            [
                'name' => 'Tiếng Việt',
            ],
            [
                'name' => 'Tiếng Trung',
            ],
        ];
        DB::table('languages')->insert($dataSeeders);
    }
}
