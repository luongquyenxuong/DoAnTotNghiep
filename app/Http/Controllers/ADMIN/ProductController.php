<?php

namespace App\Http\Controllers\ADMIN;
use App\Http\Controllers\Controller;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
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
            $lstProduct = product::where('name', 'LIKE', "%$search%")->paginate();
        else
            $lstProduct = product::paginate(5);
        $lstProduct->appends($request->all());
        foreach ($lstProduct as $sp) {
            $this->fixImage($sp);
        }
        return view('Admin.product.index', ['lstProduct' => $lstProduct]);
    }
    protected function fixImage(product $product)
    {
        if (Storage::disk('public')->exists($product->img_url)) {
            $product->img_url = Storage::url($product->img_url);
        } else {
            $product->img_url = 'storage/img/no-image.png';
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstCategory = category::all();

        return view('Admin.product.create', ['lstCategory' => $lstCategory]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $userId =  Auth::user()->id;
        $product = new product();


        $product->fill([
            'id_category' => $request->input('idCategory'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'status' => true,
            'id_user' => $userId,
            'img_url' => ''

        ]);

        $product->save();
        if ($request->hasFile('img')) {
            $product->img_url = $request->file('img')->store('img/product/' . $product->id, 'public');
        }
        $product->save();
        return Redirect::route('product.index', ['product' => $product])->with('add', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        $this->fixImage($product);
        return view('Admin.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $this->fixImage($product);
        $lstCategory = category::all();

        return view('Admin.product.edit', ['product' => $product, 'lstCategory' => $lstCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductRequest  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {

        $product->fill([
            'name' => $request->input('name'),
            'id_category' => $request->input('idCategory'),
            'price' => $request->input('price'),
            'status' => true,

        ]);
        $product->save();
        if ($request->hasFile('img')) {
            $product->img_url = $request->file('img')->store('img/product/' . $product->id, 'public');
        }
        $product->save();
        return Redirect::route('product.index', ['product' => $product])->with('update', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->fill([
            'status' => false
        ]);
        $product->save();
       // dd($product->status);
        $product->delete();
        return Redirect::route('product.index')->with('deleted', 'ok');
    }
    public function deleted()
    {
        $lstProduct = product::onlyTrashed()->paginate(3);
        foreach ($lstProduct as $product) {
            $this->fixImage($product);
        }
        return view('Admin.product.delete', ['lstProduct' => $lstProduct]);
    }
    public function restore($id)
    {
        $product = product::withTrashed()->where('id', $id)->first();
        $product->fill([
            'status'=>true
        ]);
        $product->save();
        $product->restore();
        return Redirect::route('admin.product.deleted')->with('restored', 'ok');
    }
}
