<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    protected function index()
    {
        return view('lecturer.pages.dashboard');
    }
}
