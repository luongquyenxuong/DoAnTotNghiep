@extends('layout.app')
@section('content')
    <h1>Chỉnh sửa</h1>
    <div class="card">
        <div class="card-body">
            <form class="forms-sample" name="myForm" onsubmit="return validateForm()" method="post"
                action="{{ route('address.update', ['address' => $address]) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tên</label>
                    <select disabled name="id_user" class="form-control form-control-lg">
                        {{-- <option value=''>Chọn</option> --}}
                        <option value="{{ $address->id_user }}">{{ $address->user->full_name }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phone" class="form-control"
                        placeholder="Số điện thoại" value="{{ $address->phone }}">
                </div>
                {{-- <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phone" class="form-control"
                        placeholder="Số điện thoại" value="{{ $address->phone }}">
                </div> --}}
                <div class="form-group">
                    <label>Đường</label>
                    <input type="text" name="street" class="form-control" placeholder="Đường"
                        value="{{ $address->street }}">
                </div>

                <div class="form-group">
                    <label>Phường</label>
                    <input type="text" name="ward" class="form-control" placeholder="Phường"
                        value="{{ $address->ward }}">
                </div>
                <div class="form-group">
                    <label>Quận</label>
                    <input type="text" name="district" class="form-control" placeholder="Quận"
                        value="{{ $address->district }}">
                </div>
                <div class="form-group">
                    <label>Thành phố</label>
                    <input type="text" name="city" class="form-control" placeholder="Thành phố"
                        value="{{ $address->city }}">
                </div>
                @if ($address->is_default == 1)
                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                            <input checked disabled name="is_default" value="1" type="checkbox" class="form-check-input">Mặc
                            định</label>
                    </div>
                @else
                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                            <input name="is_default" value="1" type="checkbox" class="form-check-input">Mặc định</label>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary me-2">Lưu</button>
                <a href="{{ route('address.index') }}" class="btn btn-light">Hủy</a>
            </form>
        </div>
    </div>
    <script>
        function validatePhoneNumber(input_str) {
            var re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
            return re.test(input_str);
        }

      

        function validateForm() {

            let street = document.forms["myForm"]["street"].value;
            let ward = document.forms["myForm"]["ward"].value;
            let district = document.forms["myForm"]["district"].value;
            let city = document.forms["myForm"]["city"].value;
            let phone = document.forms["myForm"]["phone"].value;
            if (street == "" || ward == "" || phone == "" || city == "" || district == "") {
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
