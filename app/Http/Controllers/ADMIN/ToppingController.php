<?php

namespace App\Http\Controllers\ADMIN;
use App\Http\Controllers\Controller;

use App\Models\topping;
use App\Http\Requests\StoretoppingRequest;
use App\Http\Requests\UpdatetoppingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ToppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search') ?? "";

        if (!empty($search)){
            $lstTopping = topping::where('name', 'LIKE', "%$search%")->paginate(5);
        }
        else
            $lstTopping = topping::paginate(5);
        $lstTopping->appends($request->all());

        return view('Admin.topping.index', ['lstTopping' => $lstTopping]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstTopping = topping::all();

        return view('Admin.topping.create', ['lstTopping' => $lstTopping]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretoppingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId =  Auth::user()->id;
        $topping = new topping();
        $topping->fill([

            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'status' => true,
            'id_user' => $userId,


        ]);
        $topping->save();
        return Redirect::route('topping.index', ['topping' => $topping])->with('add', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function show(topping $topping)
    {
        return view('Admin.topping.show', ['topping' => $topping]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function edit(topping $topping)
    {
        return view('Admin.topping.edit',["topping"=> $topping]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetoppingRequest  $request
     * @param  \App\Models\topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, topping $topping)
    {
        $userId =  Auth::user()->id;

        $topping->fill([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'status' => true,
            'id_user'=>$userId

        ]);


        $topping->save();
        return Redirect::route('topping.index', ['topping' => $topping])->with('update', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function destroy(topping $topping)
    {
        $topping->fill([
            'status' => false
        ]);
        $topping->save();
       // dd($product->status);
        $topping->delete();
        return Redirect::route('topping.index');
    }
    public function deleted()
    {
        $lstTopping = topping::onlyTrashed()->paginate(3);

        return view('Admin.topping.delete', ['lstTopping' => $lstTopping]);
    }
    public function restore($id)
    {
        $topping = topping::withTrashed()->where('id', $id)->first();
        $topping->fill([
            'status'=>true
        ]);
        $topping->save();
        $topping->restore();
        return Redirect::route('admin.topping.deleted')->with('restored', 'ok');
    }
}
