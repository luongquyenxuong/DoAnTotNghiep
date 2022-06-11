@extends('Admin.layout.app')
@section('content')
    <h1>Chỉnh sửa</h1>
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('product.update', ['product' => $product]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group ">
                    <label for="">Tên sản phẩm:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="name"
                        value="{{ $product->name }}">

                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Danh mục</label>
                    <select name="idCategory" class="form-control form-control-lg">
                        {{-- <option value=''>Select</option> --}}
                        @foreach ($lstCategory as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Giá</label>
                    <input type="number" name="price" class="form-control" placeholder="" value="{{ $product->price }}">
                </div>

                <div class=" custom-file mb-3">
                    <input type="file" class="custom-file-input" onchange="readURL(this);" id="customFile" name="img">
                    <label class="custom-file-label" for="customFile">Chọn hình ảnh</label>
                </div>

                <div class="form-group"> <img style="width: 100px;max-height:100px;object-fit:contain" id="hinhanh"
                        src="{{ $product->img_url }}"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-submit-input-form btn-them-phim">
                        <strong>Lưu</strong>
                    </button>
                    <a href="{{ route('product.index') }}" class="btn btn-light">Hủy</a>
                </div>

            </form>
        </div>
    </div>

@endsection
