@extends('layout.app')
@section('content')
    <h1>Thêm người dùng</h1>
    <div class="card">
        <div class="card-body">
            <form class="forms-sample" name="myForm" onsubmit="return validateForm()" method="post"
                action="{{ route('user.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên người dùng</label>
                    <input type="text" name="full_name" class="form-control" placeholder="Tên người dùng">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phone" class="form-control"
                        placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" name="birthday" class="form-control"
                        placeholder="Ngày sinh">
                </div>
                <div class="form-group">
                    <label>Giới tính</label>
                    <select name="sex" class="form-control" id="exampleSelectGender">
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Chức vụ</label>
                    <select name="is_admin" class="form-control" id="exampleSelectAccountType">
                        <option value="1">Admin</option>
                        <option value="2">Nhân viên</option>
                        <option value="3">Khách hàng</option>
                    </select>
                </div>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" onchange="readURL(this);" id="customFile" name="img">
                    <label class="custom-file-label" for="customFile">Chọn avatar</label>
                </div>

                <div class="form-group">
                    <img style="width: 200px;height:200px;object-fit:contain" id="hinhanh"
                        src="{{ asset('assets/images/logo.png') }}">
                </div>
                <button type="submit" class="btn btn-primary me-2">Thêm</button>
                <a href="{{ route('user.index') }}" class="btn btn-light">Hủy</a>
            </form>
        </div>
    </div>
    <script>
        function validateEmail(email) {
            let res = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return res.test(email);
        }

        function validatePhoneNumber(input_str) {
            var re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;

            return re.test(input_str);
        }

        function validateForm() {
            let name = document.forms["myForm"]["name"].value;
            let email = document.forms["myForm"]["email"].value;
            let password = document.forms["myForm"]["password"].value;
            let phone = document.forms["myForm"]["phone"].value;
            if (name == "" || email == "" || password == "" || phone == "") {
                alert("Cần nhập thông tin đầy đủ");
                return false;
            }
            if (validateEmail(email) == false) {
                alert("Email sai");
                return false;
            }
            if (validatePhoneNumber(phone) == false) {
                alert("Số điện thoại không đúng");
                return false;
            }
        }

    </script>
@endsection
