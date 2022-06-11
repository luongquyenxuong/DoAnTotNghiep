@extends('Admin.layout.app')
@section('content')
    <h1>Chỉnh sửa</h1>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('category.update', ['category' => $category]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="">Tên danh mục:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="name"
                        value="{{ $category->name }}">

                </div>
                <div class=" custom-file mb-3">
                    <input type="file" class="custom-file-input" onchange="readURL(this);" id="customFile" name="img">
                    <label class="custom-file-label" for="customFile">Chọn hình ảnh</label>
                </div>
                <img style="width: 200px;height:200px;object-fit:contain" id="hinhanh" src="{{ $category->img_url }}">

                <div>
                    <button type="submit" class="btn btn-primary btn-submit-input-form btn-them-phim">
                        <strong>Lưu</strong>
                    </button>
                    <a href="{{ route('category.index') }}" class="btn btn-light">Hủy</a>
                </div>

            </form>
        </div>
    </div>
@endsection
