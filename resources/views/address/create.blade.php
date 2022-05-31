@extends('layout.app')
@section('content')
    <h1>Thêm địa chỉ</h1>
    <div class="card">
        <div class="card-body">
            <form class="forms-sample" name="myForm" onsubmit="return validateForm()" method="post"
                action="{{ route('address.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- <div class="form-group">
                    <label>Tên người nhận</label>
                    <input type="text" name="full_name" class="form-control" placeholder="Tên người dùng">
                </div> --}}
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tên</label>
                    <select name="id_user" class="form-control form-control-lg">
                        <option value=''>Chọn</option>
                        @foreach ($lstUser as $user)
                            <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phone" class="form-control"
                        placeholder="Số điện thoại">
                </div>

                <div class="form-group">
                    <label>Đường</label>
                    <input type="text" name="street" class="form-control" placeholder="Đường">
                </div>
                <div class="form-group">
                    <label>Phường</label>
                    <input type="text" name="ward" class="form-control" placeholder="Phường">
                </div>
                <div class="form-group">
                    <label>Quận</label>
                    <input type="text" name="district" class="form-control" placeholder="Quận">
                </div>
                <div class="form-group">
                    <label>Thành phố</label>
                    <input type="text" name="city" class="form-control" placeholder="Thành phố">
                </div>
                {{-- <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                        <input name="is_default" value="1" type="checkbox" class="form-check-input">Mặc định</label>
                </div> --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary me-2">Thêm</button>
                    <a href="{{ route('address.index') }}" class="btn btn-light">Hủy</a>
                </div>

            </form>
        </div>
    </div>
    <script>
        function validatePhoneNumber(input_str) {
            var re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;

            return re.test(input_str);
        }

        function validateForm() {
            let name = document.forms["myForm"]["name"].value;

            let password = document.forms["myForm"]["password"].value;
            let phone = document.forms["myForm"]["phone"].value;
            if (name == "" || password == "" || phone == "") {
                alert("Cần nhập thông tin đầy đủ");
                return false;
            }

            if (validatePhoneNumber(phone) == false) {
                alert("Số điện thoại không đúng");
                return false;
            }
        }
    </script>
@endsection
