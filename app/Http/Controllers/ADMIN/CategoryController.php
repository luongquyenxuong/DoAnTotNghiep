<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;

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
            $lstCategory = category::where('name', 'LIKE', "%$search%")->paginate(5);
        else
            $lstCategory = category::paginate(5);
        $lstCategory->appends($request->all());
        foreach ($lstCategory as $category) {
            $this->fixImage($category);
        }
        return view('Admin.category.index', ['lstCategory' => $lstCategory]);
        $lstCategory = category::all();
        // foreach ($lstCategory as $category) {
        //     $this->fixImage($category);
        // }
        // return view('category.index', ['lstCategory' => $lstCategory]);
    }
    public function search(Request $request)
    {
        $output = '';
        //$category = $request->input('search') ?? "";
        $count = 1;
        $lstCategory = category::where('name', 'LIKE', '%' . $request->keyword . '%')->paginate(5);
        //   dd( $lstCategory);
        foreach ($lstCategory as $category) {
            $this->fixImage($category);
        }
        foreach ($lstCategory as $category) {
            $output  .= '<tr>
            <td>' . $count++ . ' </td>
            <td>' . $category->name . '</td>
            <td><img style="width: 70px;height:70px;object-fit:contain" src="' . $category->img_url . '">
            </td><?php ?>
            if (' . $category->status . ' == 1 )
            <td> Hoạt động</td>f
            endif
            <td>
            <div class="btn-group btn-group-sm">
                <a href="' . route('category.show', $category) . '">
                    <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip"
                        data-placement="top" title="Xem">
                        <i class="mdi mdi-eye"></i>
                    </button>
                </a>

                <a href="' . route('category.edit', $category) . '">
                    <button type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip"
                        data-placement="top" title="Chỉnh sửa">
                        <i class="mdi mdi-pencil-box"></i>
                    </button>
                </a>
                <form action="' . route('category.destroy', $category->id) . ' " method="post"
                                        class="delete">
                                      ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                        <button class="btn btn-danger btn-sm" data-toggle="tooltip" type="submit"
                                            title="Xóa">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </form>
            </a>
            </div>
        </td>
        </tr> ';
        }
        return response()->json($output);
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
        return view('Admin.category.create');
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

        $this->fixImage($category);

        //   $category = category::where('id', $category->id)->get();
        return view('Admin.category.show', ['category' => $category]);
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
        return view('Admin.category.edit', ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //  dd($request->hasFile('img'));
        if ($request->hasFile('img')) {
            $category->img_url = $request->file('img')->store('img/category/' . $category->id, 'public');
        }
        $category->fill([
            'name' => $request->input('name'),
            'status' => true
        ]);
        $category->save();
        return Redirect::route('category.index', ['category' => $category])->with('update', 'Cập nhật thành công');
    }

    public function deleted()
    {
        $lstCategory = category::onlyTrashed()->paginate(3);
        foreach ($lstCategory as $category) {
            $this->fixImage($category);
        }
        return view('Admin.category.delete', ['lstCategory' => $lstCategory]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCategory)
    {
        //     dd($idCategory);
        //     category::find($idCategory)->delete();
        //     return response()->json(['data'=>'removed'],200);

        $category = category::where('id', $idCategory)->first();

        $category->fill([
            'status' => false
        ]);
        $category->save();
        $category->delete();
        // return response()->json(['data'=>'removed'],200);
        return Redirect::route('category.index')->with('deleted', 'ok');
    }
    public function restore($id)
    {
        $category = category::withTrashed()->where('id', $id)->first();
        $category->fill([
            'status' => true
        ]);
        $category->save();
        $category->restore();
        return Redirect::route('admin.category.deleted')->with('restored', 'ok');
    }
}
