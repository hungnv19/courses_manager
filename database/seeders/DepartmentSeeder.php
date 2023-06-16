<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DepartmentSeeder extends Seeder
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
                'name' => 'Công nghệ thông tin',
            ],
            [
                'name' => 'Marketing',
            ],
            [
                'name' => 'Thiết kế đồ họa',
            ],
            [
                'name' => 'Quản trị kinh doanh',
            ],
        ];
        DB::table('departments')->insert($dataSeeders);
    }
}
