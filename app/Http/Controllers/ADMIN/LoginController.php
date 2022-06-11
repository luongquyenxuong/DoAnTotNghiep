<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public  function showForm()
    {
        return view('Admin.login');
    }

    public function authenticate(Request $request)
    {
        // dd( $request->input('email'));
        // dd( $request[('password')]);
        $account =  User::where('email', '=', $request[('email')])->where('password', '=', $request[('password')])->first();

        //$account = User::where('email','=',$request[('email')])->where('password', '=', $request[('password')])->where('is_admin','=', 1)->orWhere('is_admin', '=', 2)->first();


        if (!empty($account) && ($account->is_admin == 1 || $account->is_admin == 2)) {
            Auth::login($account);
            return redirect()->intended('admin/home/');
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
            $user->avatar = asset('assets/images/user.png');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return Redirect::route('login');
    }
}
