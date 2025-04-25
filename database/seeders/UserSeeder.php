<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'super_admin']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'director']);
        Role::create(['name' => 'hrd']);
        Role::create(['name' => 'staff']);

        $user = User::create([
            'name'=>'Administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'department_id' => 2,
        ]);
        $user = User::create([
            'name'=>'Manager',
            'email' => 'manager@example.com',
            'password' => bcrypt('password'),
            'department_id' => 3,
        ]);
        $user = User::create([
            'name'=>'Director',
            'email' => 'director@example.com',
            'password' => bcrypt('password'),
            'department_id' => 3,
        ]);
        $user = User::create([
            'name'=>'HRD',
            'email' => 'hrd@example.com',
            'password' => bcrypt('password'),
            'department_id' => 3,
        ]);
        $user = User::create([
            'name'=>'Staff',
            'email' => 'staff@example.com',
            'password' => bcrypt('password'),
            'department_id' => 5,
        ]);

        $user = \App\Models\User::find(1);
        $user->assignRole('super_admin');
        $user = \App\Models\User::find(2);
        $user->assignRole('manager');
        $user = \App\Models\User::find(3);
        $user->assignRole('director');
        $user = \App\Models\User::find(4);
        $user->assignRole('hrd');
        $user = \App\Models\User::find(5);
        $user->assignRole('staff');
    }
}
