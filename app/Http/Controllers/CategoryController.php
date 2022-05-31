<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
            $lstCategory = category::where('name', 'LIKE', "%$search%")->orWhere('id', 'LIKE', "%$search%")->paginate();
        else
            $lstCategory = category::paginate(5);
        $lstCategory->appends($request->all());
        foreach ($lstCategory as $category) {
            $this->fixImage($category);
        }
        return view('category.index', ['lstCategory' => $lstCategory]);
    }
    protected function fixImage(category $category)
    {
        if (Storage::disk('public')->exists($category->img_url)) {
            $category->img_url = Storage::url($category->img_url);
        } else {
            $category->img_url = 'storage/img/no-image.png';
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId =  Auth::user()->id;
     //   dd($userId);
        $category = new category();

        $category->fill([
            'name' => $request->input('name'),
            'id_user' => $userId,
            'status' => true,
            'is_new' => true,
            'img_url' => ''
        ]);
        $category->save();
        if ($request->hasFile('img')) {
            $category->img_url = $request->file('img')->store('img/category/' . $category->id, 'public');
        }
        $category->save();
        return Redirect::route('category.index')->with('add', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
     //   $category = category::where('id', $category->id)->get();
        return view('category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        $this->fixImage($category);
        return view('category.edit',["category"=> $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,category $category)
    {
      //  dd($request->hasFile('img'));
        if($request->hasFile('img')){
            $category->img_url=$request->file('img')->store('img/category/' . $category->id,'public');

        }
        $category->fill([
            'name'=>$request->input('name'),
            'status'=>true
        ]);
        $category->save();
        return Redirect::route('category.index',['category'=>$category])->with('update', 'Cập nhật thành công');
    }

    public function deleted()
    {
        $lstCategory = category::onlyTrashed()->paginate(3);
        foreach ($lstCategory as $category) {
            $this->fixImage($category);
        }
        return view('category.delete', ['lstCategory' => $lstCategory]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $idCategory)
    {
        $category = category::where('id', $idCategory)->first();
        $category->fill([
            'status'=>false
        ]);
        $category->save();
        $category->delete();
        return Redirect::route('category.index')->with('deleted', 'ok');
    }
    public function restore($id)
    {
        $category = category::withTrashed()->where('id', $id)->first();
        $category->fill([
            'status'=>true
        ]);
        $category->save();
        $category->restore();
        return Redirect::route('category.deleted')->with('restored', 'ok');
    }
}
