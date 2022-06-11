@extends('Admin.layout.app')
@section('content')
    <h1>Chỉnh sửa</h1>
    <div class="card">
        <div class="card-body">
            <form class="forms-sample" name="myForm" onsubmit="return validateForm()" method="post"
                action="{{ route('user.update', ['user' => $user]) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label>Tên người dùng</label>
                    <input type="text" name="full_name" class="form-control" placeholder="Tên người dùng"
                        value="{{ $user->full_name }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu"
                        value="{{ $user->password }}">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phone" class="form-control"
                        placeholder="Số điện thoại" value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label>Ngày sinh </label>
                    <input type="date" name="birthday" class="form-control"
                        value={{ Carbon\Carbon::parse($user->birthday)->format('Y-m-d') }}>
                </div>
                <div class="form-group">
                    <label>Giới tính</label>
                    <select name="sex" class="form-control" id="exampleSelectGender">
                        @if ($user->sex == 1)
                            <option value="1" selected>Nam</option>
                            <option value="2">Nữ</option>
                        @else
                            <option value="1">Nam</option>
                            <option value="2" selected>Nữ</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>Chức vụ</label>
                    <select name="is_admin" class="form-control" id="exampleSelectAccountType">
                        @if ($user->is_admin == 1)
                            <option value="1" selected>Admin</option>
                            <option value="2">Nhân viên</option>
                            <option value="3">Khách hàng</option>
                        @elseif($user->is_admin == 2)
                            <option value="1">Admin</option>
                            <option value="2" selected>Nhân viên</option>
                            <option value="3">Khách hàng</option>
                        @else
                            <option value="1">Admin</option>
                            <option value="2">Nhân viên</option>
                            <option value="3" selected>Khách hàng</option>
                        @endif

                    </select>
                </div>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" onchange="readURL(this);" id="customFile" name="img">
                    <label class="custom-file-label" for="customFile">Chọn avatar</label>
                </div>

                <div class="form-group">
                    <img style="width: 200px;height:200px;object-fit:contain" id="hinhanh"
                        src="{{ $user->avatar }}">
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

        function  validateForm  () {
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
