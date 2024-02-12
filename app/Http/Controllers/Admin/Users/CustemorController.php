<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User;
use App\Models\CustemorData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CustemorController extends Controller
{

    function __construct()
    {
        $this->middleware(['permission:custemors'], ['only' => ['index']]);
        $this->middleware(['permission:custemor-create'], ['only' => ['store']]);
        $this->middleware(['permission:custemor-edit'], ['only' => ['update']]);
        $this->middleware(['permission:custemor-delete'], ['only' => ['destroy']]);
    }

    public function index () {
        $title = 'Custemors';
        $custemors = User::orderBy('id', 'desc')
            ->where('role_name', 'CUSTEMOR')
            ->get();
        return view('admin.custemors.index', compact('title', 'custemors'));
    }

    public function store (Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'address' => 'required',
            'phone' => 'required',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        CustemorData::create([
            'user_id' => $user->id,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('custemors.index')->with('success','Custemor created successfully');
    }

    public function update (Request $request) {
        $id = $request->id;
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'address' => 'required',
            'phone' => 'required',
        ]);

        $data_id = CustemorData::where('user_id', $id)->first();

        if (!isset($data_id)) {
            $user = User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            CustemorData::create([
                'user_id' => $id,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);
        } else {
            $user = User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            CustemorData::where('user_id', $id)->update([
                'address' => $request->address,
                'phone' => $request->phone,
            ]);
        }


        return redirect()->route('custemors.index')->with('success','Custemor updated successfully');
    }

    public function destroy (Request $request) {
        $id = $request->id;

        $data = CustemorData::where('user_id', $id)->first();
        if ($data) {
            $data->delete();
        }

        User::find($id)->delete();

        return redirect()->route('custemors.index')->with('success','Custemor deleted successfully');
    }

}
