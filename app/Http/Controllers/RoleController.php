<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    //

    
    public function index(){
        $roles = Role::all();
        return view('admin.roles.index', ['roles' => $roles]);
    }

    public function edit(Role $role){
        $permissions = Permission::all();

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => $permissions
            ]);
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

    public function update(Role $role){
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(Str::lower(request('name')))->slug('_');
        if($role->isClean('name')){
            session()->flash('role-updated', 'Nothing has been updated ');
            return back();
           
        } else {
            session()->flash('role-updated', 'Role was updated '. request('name'));
            $role->save();

            // try return back
        $roles = Role::all();
        return view('admin.roles.index', ['roles' => $roles]);
        }

    }

    public function destroy(Role $role){
        $role->delete();
        session()->flash('role-delete', 'Deleted Role: ' . $role->name);
        return back();
    }

    public function attach_permission(Role $role){
        $role->permissions()->attach(request('permission'));
        return back();
    }


    public function detach_permission(Role $role){
        $role->permissions()->detach(request('permission'));
        return back();
    }
    
}
