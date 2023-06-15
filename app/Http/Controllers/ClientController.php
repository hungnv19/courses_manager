<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected function index()
    {
        return view('client.pages.index', []);
    }
    protected function about()
    {
        return view('client.pages.about', []);
    }
    protected function contact()
    {
        return view('client.pages.contact', []);
    }
    protected function blog()
    {
        return view('client.pages.blog', []);
    }
    protected function courses()
    {
        return view('client.pages.courses', []);
    }
    
}
