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
        Role::create(['name' => 'staff']);

        $user = User::create([
            'name'=>'Administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $user = User::create([
            'name'=>'Staff',
            'email' => 'staff@example.com',
            'password' => bcrypt('password'),
        ]);

        $user = \App\Models\User::find(1);
        $user->assignRole('super_admin');
        $user = \App\Models\User::find(2);
        $user->assignRole('staff');
    }
}
