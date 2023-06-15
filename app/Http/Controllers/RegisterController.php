<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    private User $user;



    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function createClient()
    {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }
    public function storeClient(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status =  1;
        $user->password = Hash::make($request->password);
        $user->save();

        auth()->login($user);
        return redirect()->route('home.index')->with('success', 'Đăng ký tài khoản thành công!');
    }
    public function checkMailRegister(Request $request)
    {
        $data = $request->all();
        $data['id'] = $request->id;
        return response()->json([
            'valid' => $this->checkMail($data),
        ], 200);
    }
    protected function checkMail($request)
    {
        if ($request['value'] != '') {
            return !$this->user->where(function ($query) use ($request) {
                if (isset($request['id'])) {
                    $query->where('id', '!=', $request['id']);
                }
                $query->where(['email' => $request['value']]);
            })->exists();
        }

        return true;
    }
}
