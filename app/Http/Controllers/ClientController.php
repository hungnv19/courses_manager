<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected function index()
    {
        return view('client.pages.index', []);
    }
}
