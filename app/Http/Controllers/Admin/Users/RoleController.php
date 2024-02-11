<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:roles'], ['only' => ['index']]);
        $this->middleware(['permission:role-show'], ['only' => ['show']]);
        $this->middleware(['permission:role-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:role-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:role-delete'], ['only' => ['destroy']]);
    }
    
    public function index () {
        $title = 'Roles';
        $roles = Role::all();
        return view('admin.roles.index', compact('title', 'roles'));
    }

    public function create () {
        $permission = Permission::get();
        return view('admin.roles.create_role', compact('permission'));
    }

    public function store (Request $request) {
        // return $request;

        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    public function show ($id) {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('admin.roles.show_role', compact('role', 'rolePermissions'));
    }

    public function edit ($id) {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit_role', compact('role', 'permission', 'rolePermissions'));
    }

    public function update (Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    public function destroy (request $request) {
        $id = $request->id;
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
