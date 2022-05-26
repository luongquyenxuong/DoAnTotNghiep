<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(Request $request)
    {


        $search = $request->input('search') ?? "";
        if (!empty($search))
            $lstUser = User::where('HoTen', 'LIKE', "%$search%")->orWhere('id', 'LIKE', "%$search%")->paginate();
        else
            $lstUser = User::paginate(5);
        $lstUser->appends($request->all());
        return view('user.index', ['lstUser' => $lstUser]);
    }
    public function show(User $user)
    {
        // $this->fixImage($user);
        return view('user.show', ['user' => $user]);
    }
    protected function fixImage(User $user)
    {
        if (Storage::disk('public')->exists($user->Avatar)) {
            $user->Avatar = Storage::url($user->Avatar);
        } else {
            $user->Avatar = 'storage/img/icon/no-image.png';
        }
    }
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('user.index');

    }
    public function deleted()
    {
        $lstUser = User::onlyTrashed()->paginate(3);
        // foreach ($lstUser as $user) {
        //     $this->fixImage($user);
        // }
        return view('user.delete', ['lstUser' => $lstUser]);
    }
    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->restore();
        return Redirect::route('user.deleted')->with('restored', 'ok');
    }
}
