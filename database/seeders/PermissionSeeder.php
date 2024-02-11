<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    private $permissions = [
        'users',
        'roles',
        'role-create',
        'role-show',
        'role-edit',
        'role-delete',

        'admins',
        'admin-create',
        'admin-edit',
        'admin-delete',
        
        'custemors',
        'custemor-create',
<<<<<<< HEAD
=======
        'custemor-show',
>>>>>>> f5230a190c03d0bbad64a3a01af4bafff271fe00
        'custemor-edit',
        'custemor-delete',
    ];

    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
