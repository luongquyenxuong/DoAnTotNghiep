@extends('Admin.layout.app')
@section('content')
    <h1>Thêm sản phẩm</h1>
    <div class="card">
        <div class="card-body">
            <form name="myForm" onsubmit="return validateForm()" class="forms-sample" method="post"
                action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Danh mục</label>
                    <select name="idCategory" class="form-control form-control-lg">
                        <option value=''>Chọn</option>
                        @foreach ($lstCategory as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Giá</label>
                    <input name="price" class="form-control" placeholder="Giá">
                </div>
                <div class=" custom-file mb-3">
                    <input type="file" class="custom-file-input" onchange="readURL(this);" id="customFile" name="img">
                    <label class="custom-file-label" for="customFile">Chọn hình ảnh</label>
                </div>
                <div class="form-group">
                    <img style="width: 200px;height:200px;object-fit:contain" id="hinhanh"
                        src="{{ asset('assets/images/logo.png') }}">
                </div>

                <button type="submit" class="btn btn-primary me-2">Thêm</button>
                <a href="{{ route('product.index') }}" class="btn btn-light">Hủy</a>


            </form>

        </div>
    </div>

    <script>
        function validateForm() {
            let name = document.forms["myForm"]["name"].value;
            let gia = document.forms["myForm"]["price"].value;
            let img = document.forms["myForm"]["img"].value;
            let category = document.forms["myForm"]["idCategory"].value;
            if (name == "" || gia == "" || img == "" || category == "") {
                alert("Cần nhập thông tin đầy đủ");
                return false;
            }
        }
    </script>
@endsection
