<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'super_admin', 'description' => 'Super Administrador'],
            ['name' => 'admin', 'description' => 'Secretária'],
            ['name' => 'teacher', 'description' => 'Professor'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $adminPermissions = [
            ['name' => 'admin_view', 'description' => 'Visualiza'],
            ['name' => 'admin_create', 'description' => 'Criar'],
            ['name' => 'admin_edit', 'description' => 'Editar'],
            ['name' => 'admin_delete', 'description' => 'Deletar']
        ];

        foreach ($adminPermissions as $permission) {
            Permission::create($permission)->assignRole('admin');
        }

        $teacherPermissions = [
            ['name' => 'teacher_view', 'description' => 'Visualiza'],
            ['name' => 'teacher_create', 'description' => 'Criar'],
            ['name' => 'teacher_edit', 'description' => 'Editar'],
            ['name' => 'teacher_delete', 'description' => 'Deletar']
        ];

        foreach ($teacherPermissions as $permission) {
            Permission::create($permission)->assignRole('teacher');
        }
    }
}
