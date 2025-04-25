<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['department_name' => 'Human Resources'],
            ['department_name' => 'Finance'],
            ['department_name' => 'Marketing'],
            ['department_name' => 'IT'],
            ['department_name' => 'Operations'],
            ['department_name' => 'Customer Service'],
        ];

        DB::table('departments')->insert($departments);
    }
}
