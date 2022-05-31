<?php

namespace App\Http\Controllers;

use App\Models\size;
use App\Http\Requests\StoresizeRequest;
use App\Http\Requests\UpdatesizeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class SizeController extends Controller
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
            $lstSize = size::where('name', 'LIKE', "%$search%")->orWhere('id', 'LIKE', "%$search%")->paginate();
        else
            $lstSize = size::paginate(5);
        $lstSize->appends($request->all());

        return view('size.index', ['lstSize' => $lstSize]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstSize = size::all();

        return view('size.create', ['lstSize' => $lstSize]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId =  Auth::user()->id;
        $size = new size();


        $size->fill([

            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'status' => true,
            'id_user' => $userId,


        ]);


        $size->save();
        return Redirect::route('size.index', ['size' => $size])->with('add', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(size $size)
    {
        return view('size.show', ['size' => $size]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(size $size)
    {
        return view('size.edit',["size"=> $size]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesizeRequest  $request
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, size $size)
    {
        $userId =  Auth::user()->id;

        $size->fill([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'status' => true,
            'id_user'=>$userId

        ]);


        $size->save();
        return Redirect::route('size.index', ['size' => $size])->with('update', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(size $size)
    {
        $size->fill([
            'status' => false
        ]);
        $size->save();
       // dd($product->status);
        $size->delete();
        return Redirect::route('size.index')->with('deleted', 'ok');
    }
    public function deleted()
    {
        $lstSize = size::onlyTrashed()->paginate(3);

        return view('size.delete', ['lstSize' => $lstSize]);
    }
    public function restore($id)
    {
        $size = size::withTrashed()->where('id', $id)->first();
        $size->fill([
            'status'=>true
        ]);
        $size->save();
        $size->restore();
        return Redirect::route('size.deleted')->with('restored', 'ok');
    }
}
