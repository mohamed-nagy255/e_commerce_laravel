<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:admins'], ['only' => ['index']]);
        $this->middleware(['permission:admin-create'], ['only' => ['store']]);
        $this->middleware(['permission:admin-edit'], ['only' => ['update']]);
        $this->middleware(['permission:admin-delete'], ['only' => ['destroy']]);
    }

    public function index () {
        $title = 'Admins';
        $admins = User::orderBy('id', 'desc')
            ->where('role_name', '!=', 'CUSTEMOR')
            ->get();
        $roles =  Role::pluck('name','name')->all();
        return view('admin.admins.index', compact('title', 'admins', 'roles'));
    }

    public function store (Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['role_name'] = $request->role;
    
        $user = User::create($input);
        $user->assignRole($request->input('role'));
    
        return redirect()->route('admins.index')->with('success','User created successfully');
    }

    public function update (Request $request) {
        $id = $request->id;
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'role' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
        $input['role_name'] = $request->role;
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('role'));
    
        return redirect()->route('admins.index')->with('success','User updated successfully');
    }

    public function destroy (Request $request) {
        $id = $request->id;
        User::find($id)->delete();
        return redirect()->route('admins.index')->with('success','User deleted successfully');
    }
}
