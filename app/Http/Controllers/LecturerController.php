<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
    public User $user;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    protected function index()
    {
        return view('lecturer.pages.dashboard');
    }
    protected function profile()
    {
        $user = Auth::user();
        return view('lecturer.pages.profile', [
            'user' => $user,
            'title' => 'Lecturer - Profile',
        ]);
    }
    public function updateProfile(Request $request)
    {
        $user =  $this->user->where('id', Auth::user()->id)->first();
        // $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->date_birth = $request->date_birth;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->position = $request->position;
        $user->description = $request->description;
        if ($request->hasFile('image')) {
            $user->image = $request->image->storeAs('public/images', $request->image->hashName());
        }
        $user->save();
        if ($user) {
            return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
        } else {
            return redirect()->back()->with('failed', 'Cập nhật thông tin thất bại!');
        }
    }
}
