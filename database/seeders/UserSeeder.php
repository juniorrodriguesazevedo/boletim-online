<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'role_id' => RoleEnum::SUPER_ADMIN,
            'password' => 'secret',
        ])->assignRole(RoleEnum::SUPER_ADMIN);

        User::create([
            'name' => 'Professor 1',
            'email' => 'professor1@admin.com',
            'role_id' => RoleEnum::TEACHER,
            'password' => 'secret',
        ])->assignRole(RoleEnum::TEACHER);

        User::create([
            'name' => 'Professor 2',
            'email' => 'professor2@admin.com',
            'role_id' => RoleEnum::TEACHER,
            'password' => 'secret',
        ])->assignRole(RoleEnum::TEACHER);
    }
}
