<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Permission;

class PermissionController extends Controller
{
    //

    public function index(){
        return view('admin.permissions.index', [
            'permissions' => Permission::all()
        ]);
    }

    public function store(){
        request()->validate([
            'name' => ['required']
        ]);
        Permission::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('_'),

        ]);
        return back();
    }

    public function edit(Permission $permission){

        return view('admin.permissions.edit', [
            'permission' => $permission
            ]);
    }

    public function update(Permission $permission){
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(Str::lower(request('name')))->slug('_');
        if($permission->isClean('name')){
            session()->flash('permission-updated', 'Nothing has been updated ');
            return back();
           
        } else {
            session()->flash('permission-updated', 'Role was updated '. request('name'));
            $permission->save();

            // try return back
        
        return back();
        }

    }

    public function destroy(Permission $permission){
        $permission->delete();
        session()->flash('permission-delete', 'Deleted permission: ' . $permission->name);
        return back();
    }
}
