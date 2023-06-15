<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected function index()
    {
        return view('admin.dashboard');
    }
}
