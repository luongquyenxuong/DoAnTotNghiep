<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;

use App\Models\address;
use App\Models\User;
use App\Http\Requests\StoreaddressRequest;
use App\Http\Requests\UpdateaddressRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search') ?? "";
        if (!empty($search))
            $lstAddress = address::join('users', 'users.id', '=', 'addresses.id_user')
                ->where('addresses.phone', 'LIKE', "%$search%")
                ->orWhere('users.full_name', 'LIKE', "%$search%")
                ->orWhere('street', 'LIKE', "%$search%")
                ->orWhere('district', 'LIKE', "%$search%")
                ->orWhere('ward', 'LIKE', "%$search%")
                ->orWhere('city', 'LIKE', "%$search%")
                ->select('addresses.*')
                ->paginate();
        else
            $lstAddress = address::paginate(5);
        $lstAddress->appends($request->all());

        return view('Admin.address.index', ['lstAddress' => $lstAddress]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstUser = User::all();

        return view('Admin.address.create', ['lstUser' => $lstUser]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreaddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId =  Auth::user()->id;
        $address = new address();

        $addressUser = address::where('id_user', $request['id_user'])->where('is_default', 1)->first();
        //  dd($addressUser);
        if ($addressUser == null) {
            $address->fill([
                'id_user' => $request->input('id_user'),
                'phone' => $request->input('phone'),
                'street' => $request->input('street'),
                'ward' => $request->input('ward'),
                'district' => $request->input('district'),
                'city' => $request->input('city'),
                'is_default' => true,
            ]);
            $address->save();
        } else {
            $address->fill([
                'id_user' => $request->input('id_user'),
                'phone' => $request->input('phone'),
                'street' => $request->input('street'),
                'ward' => $request->input('ward'),
                'district' => $request->input('district'),
                'city' => $request->input('city'),
                'is_default' => false,
            ]);
            $address->save();
        }
        return Redirect::route('Admin.address.index', ['address' => $address])->with('add', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(address $address)
    {
        return view('Admin.address.show', ['address' => $address]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(address $address)
    {
        $lstUser = User::all();
        return view('Admin.address.edit', ["address" => $address, 'lstUser' => $lstUser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateaddressRequest  $request
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, address $address)
    {

        $default = address::where('id_user', $address->id_user)->where('is_default', 1)->first();
        if ($request->input('is_default') == 1) {
            if ($default) {
                $default->fill([
                    'is_default' => false,
                ]);
                $default->save();
                $address->fill([
                    'phone' => $request->input('phone'),
                    'street' => $request->input('street'),
                    'ward' => $request->input('ward'),
                    'district' => $request->input('district'),
                    'city' => $request->input('city'),
                    'is_default' => true,
                ]);
            } else {
                $address->fill([
                    'phone' => $request->input('phone'),
                    'street' => $request->input('street'),
                    'ward' => $request->input('ward'),
                    'district' => $request->input('district'),
                    'city' => $request->input('city'),
                    'is_default' => true,
                ]);
            }
        } else {
            $address->fill([
                'phone' => $request->input('phone'),
                'street' => $request->input('street'),
                'ward' => $request->input('ward'),
                'district' => $request->input('district'),
                'city' => $request->input('city'),
                'is_default' => false,
            ]);
        }


        $address->save();
        return Redirect::route('address.index', ['address' => $address])->with('update', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(address $address)
    {
        // dd($address->is_default);
        // dd($address->id_user);
        if ($address->is_default == 1) {
            $address->fill([
                'is_default' => false,
            ]);
            $address->save();
            $address->delete();
        }

        $default_true = address::where('id_user', $address->id_user)->where('is_default', 1)->first();
        if ($default_true) {
            $address->delete();
            return Redirect::route('address.index')->with('deleted', 'ok');
        }
        $default = address::where('id_user', $address->id_user)->where('is_default', 0)->first();
        if ($default) {
            $default->fill([
                'is_default' => true,
            ]);
            $default->save();
            $address->delete();
        }
        $address->delete();
        return Redirect::route('address.index')->with('deleted', 'ok');
    }
    public function deleted()
    {

        $lstAddress = address::onlyTrashed()->paginate(3);

        return view('Admin.address.delete', ['lstAddress' => $lstAddress]);
    }
    public function restore($id)
    {
        $addressDelete = address::withTrashed()->where('id', $id)->first();
        $default = address::where('id_user', $addressDelete->id_user)->where('is_default', 1)->first();
        if (!$default) {
            $addressDelete->fill([
                'is_default' => true,
            ]);
        }
        $addressDelete->restore();
        return Redirect::route('admin.address.deleted')->with('restored', 'ok');
    }
}
