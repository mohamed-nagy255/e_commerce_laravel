<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    private $permissions = [
        'categories',
        'categories-list',
        'category-create',
        'category-edit',
        'category-delete',

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
