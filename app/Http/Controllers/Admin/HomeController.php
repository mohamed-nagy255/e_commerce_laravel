<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index () {
        $users = User::count();
        $admins = User::where('role_name', '!=', 'CUSTEMOR')->count();
        $custemors = User::where('role_name', 'CUSTEMOR')->count();
        $roles = Role::count();
        return view('admin.dashboard', 
            compact(
                'users',
                'admins',
                'custemors',
                'roles',
            ));
    }
}
