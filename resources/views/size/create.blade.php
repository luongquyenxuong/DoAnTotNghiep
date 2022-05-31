@extends('layout.app')
@section('content')
    <h1>Thêm</h1>
    <div class="card">
        <div class="card-body">
            <form class="forms-sample" name="myForm" onsubmit="return validateForm()" method="post" action="{{ route('size.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Kích thước</label>
                    <input type="text" class="form-control" name="name" placeholder="Kích thước">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">Giá</label>
                    <input type="number" name="price" class="form-control" placeholder="Giá">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary me-2">Thêm</button>
                    <a href="{{ route('size.index') }}" class="btn btn-light">Hủy</a>
                </div>

            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            let name = document.forms["myForm"]["name"].value;

            let price = document.forms["myForm"]["price"].value;

            if (name == "" || price == "") {
                alert("Cần nhập thông tin đầy đủ");
                return false;
            }
        }
    </script>
   
@endsection
