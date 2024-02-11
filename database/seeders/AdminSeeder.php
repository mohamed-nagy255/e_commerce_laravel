<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin', 
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'role_name' => 'OWNER',
        ]);
    
        $role = Role::create(['name' => 'OWNER']);
        
        $permissions = Permission::pluck('id', 'id')->all();
      
        $role->syncPermissions($permissions);
      
        $user->assignRole([$role->id]);
    }
}
