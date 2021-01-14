<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Str;

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
}
