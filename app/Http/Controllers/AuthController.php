<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private User $user;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {

        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'role' => 0], $request->input('remember'))) {
            return redirect()->route('home-client');
        } else if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'role' => 1], $request->input('remember'))) {
            return redirect()->route('lecturer.dashboard');
        } else if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'role' => 2], $request->input('remember'))) {
            return redirect()->route('admin.home.index');
        } else {
            return abort('403');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    function checkUserLogin(Request $request)
    {
        if ($this->checkUser($request)) {
            return response()->json(['message' => 'Logged in successfully']);
        } else {
            return response()->json(['error' => 'Incorrect email or password!']);
        }
    }

    protected function checkUser($request)
    {
        $userInfo = $this->user
            ->where('email', $request->email)
            ->first();

        if ($userInfo) {
            return Hash::check($request->password, $userInfo->password);
        }
        return false;
    }
}
