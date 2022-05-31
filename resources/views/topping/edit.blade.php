@extends('layout.app')
@section('content')
    <h1>Chỉnh sửa</h1>
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('topping.update', ['topping' => $topping]) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group col-12">
                    <label for="">Tên topping:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="name" value="{{ $topping->name }}">

                </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">Giá</label>
                    <input  name="price" class="form-control" placeholder="Giá"  value="{{ $topping->price }}">
                </div>


                <button type="submit" class="btn btn-primary btn-submit-input-form btn-them-phim">
                    <strong>Lưu</strong>
                </button>
                <a href="{{ route('topping.index') }}" class="btn btn-light">Hủy</a>
            </form>
        </div>
    </div>


@endsection
