<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public  function showForm()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);
        $account = User::where('email', $request->input('email'))->where('password', $request->input('password'))->where('is_admin', true)->orWhere('is_admin', 2)->first();

        if (!empty($account)) {
            Auth::login($account);
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Sai thông tin tài khoản.',
        ]);
    }
    protected function fixImage(User $user)
    {
        if (Storage::disk('public')->exists($user->avatar)) {
            $user->avatar = Storage::url($user->avatar);
        } else {
            $user->avatar = asset('assets/images/user.png') ;
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return Redirect::route('login');
    }
}
