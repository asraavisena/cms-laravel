<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Role;

class RoleController extends Controller
{
    //

    
    public function index(){
        $roles = Role::all();
        return view('admin.roles.index', ['roles' => $roles]);
    }

    public function store(){
        request()->validate([
            'name' => ['required']
        ]);
        Role::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('_'),

        ]);
        return back();
    }

    public function destroy(Role $role){
        $role->delete();
        session()->flash('role-delete', 'Deleted Role: ' . $role->name);
        return back();
    }
}
