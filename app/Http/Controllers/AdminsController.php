<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    // harusnya single not plural jadi AdminController
    public function index() {
        return view('admin.index');
    }
}
