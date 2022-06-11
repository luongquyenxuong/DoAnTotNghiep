@extends('Admin.layout.app')
@section('content')
    <h1>Thêm danh mục</h1>
    <div class="card">
        <div class="card-body">
            <form class="forms-sample" name="myForm" onsubmit="return validateForm()" method="post"
                action="{{ route('category.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <input type="text" class="form-control" name="name" placeholder="Tên danh mục" >
                    {{-- required  oninvalid="this.setCustomValidity('Nhập tên danh mục')"
                    oninput="this.setCustomValidity('')" --}}
                </div>
                <div class=" custom-file mb-3">
                    <input type="file"  class="custom-file-input" onchange="readURL(this);" id="customFile" name="img" >
                    <label class="custom-file-label" for="customFile">Chọn hình ảnh</label>


                </div>
                <div class="form-group">
                    <img style="width: 200px;max-height:200px;object-fit:contain" id="hinhanh"
                        src="{{ asset('assets/images/logo.png') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary me-2">Thêm</button>
                    <a href="{{ route('category.index') }}" class="btn btn-light">Hủy</a>
                </div>
            </form>
        </div>
    </div>
    {{-- <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script> --}}
    <script>
        function validateForm() {
            let name = document.forms["myForm"]["name"].value;

            let img = document.forms["myForm"]["img"].value;

            if (name == "" || img == "") {
                alert("Cần nhập thông tin đầy đủ");
                return false;
            }
        }
    </script>



@endsection
