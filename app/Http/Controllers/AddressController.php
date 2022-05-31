<?php

namespace App\Http\Controllers;

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
            $lstAddress = address::where('phone', 'LIKE', "%$search%")->orWhere('street', 'LIKE', "%$search%")->paginate();
        else
            $lstAddress = address::paginate(5);
        $lstAddress->appends($request->all());

        return view('address.index', ['lstAddress' => $lstAddress]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstUser = User::all();

        return view('address.create', ['lstUser' => $lstUser]);
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
        return Redirect::route('address.index', ['address' => $address])->with('add', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(address $address)
    {
        return view('address.show', ['address' => $address]);
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
        return view('address.edit', ["address" => $address,'lstUser'=>$lstUser]);
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
        $address->fill([

        ]);
        $address->save();
       // dd($product->status);
        $address->delete();
        return Redirect::route('address.index')->with('deleted', 'ok');
    }
    public function deleted()
    {
        $lstAddress = address::onlyTrashed()->paginate(3);

        return view('address.delete', ['lstAddress' => $lstAddress]);
    }
    public function restore($id)
    {
        $address = address::withTrashed()->where('id', $id)->first();
        // $address->fill([
        //     'status'=>true
        // ]);
        // $address->save();
        $address->restore();
        return Redirect::route('address.deleted')->with('restored', 'ok');
    }
}
