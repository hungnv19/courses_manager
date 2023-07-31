<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected function index()
    {
        $courses = Course::with('category')->get();
        return view('client.pages.index', [
            'title' => 'Home',
            'courses' => $courses,
        ]);
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
        $courses = Course::with('category')->paginate(6);
        return view('client.pages.courses', ['courses' => $courses,]);
    }
}
