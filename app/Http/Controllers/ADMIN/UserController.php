<?php

namespace App\Http\Controllers\ADMIN;

use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search') ?? "";
        if (!empty($search))
            $lstUser = User::where('full_name', 'LIKE', "%$search%")->orWhere('phone', 'LIKE', "%$search%")->paginate(5);
        else
            $lstUser = User::paginate(5);
        $lstUser->appends($request->all());
        return view('Admin.user.index', ['lstUser' => $lstUser]);
    }
    public function show(User $user)
    {
            $this->fixImage($user);
        return view('Admin.user.show', ['user' => $user]);
    }
    protected function fixImage(User $user)
    {
        if (Storage::disk('public')->exists($user->avatar)) {
            $user->avatar = Storage::url($user->avatar);
        } else {
            $user->avatar = asset('assets/images/user.png') ;
        }
    }
    public function create()
    {
        $lstUser = User::all();

        return view('Admin.user.create', ['lstUser' => $lstUser]);
    }
    public function store(Request $request)
    {
        $userId =  Auth::user()->id;
        $user = new User();
        //dd($request->hasFile('img'));
        $user->fill([
            'full_name' => $request->input('full_name'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
            'phone'=>$request->input('phone'),
            'birthday'=>$request->input('birthday'),
            'is_admin' => $request->input('is_admin'),
            'status' => true,
            'sex' => $request->input('sex'),
            // 'avatar' => $request->input('img_avatar'),
        ]);
        $user->save();
        if ($request->hasFile('img')) {
            $user->avatar = $request->file('img')->store('img/avatar/' . $user->id, 'public');
        }
        $user->save();
        return Redirect::route('Admin.user.index', ['user' => $user])->with('add', 'Th??m th??nh c??ng');
    }

    public function edit(User $user)
    {
        $this->fixImage($user);
        return view('Admin.user.edit',["user"=> $user]);
    }

    public function destroy(User $user)
    {
        $user->fill([
            'status' => false
        ]);
        $user->save();
        $user->delete();
        return Redirect::route('user.index')->with('deleted', 'ok');

    }
    public function update(Request $request, User $user)
    {
        $userId =  Auth::user()->id;

        $user->fill([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'phone' => $request->input('phone'),
            'birthday' => $request->input('birthday'),
            'is_admin' => $request->input('is_admin'),
            'sex' => $request->input('sex'),
            'status' => true,
        ]);
        $user->save();
        if ($request->hasFile('img')) {
            $user->avatar = $request->file('img')->store('img/avatar/' . $user->id, 'public');
        }
        $user->save();
        return Redirect::route('user.index', ['user' => $user])->with('update', 'C???p nh???t th??nh c??ng');
    }

    public function deleted()
    {
        $lstUser = User::onlyTrashed()->paginate(3);
        // foreach ($lstUser as $user) {
        //     $this->fixImage($user);
        // }
        return view('Admin.user.delete', ['lstUser' => $lstUser]);
    }
    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->fill([
            'status' => true
        ]);
        $user->restore();
        return Redirect::route('admin.user.deleted')->with('restored', 'ok');
    }
}
