@extends('Admin.layout.app')
@section('content')
    <h1>Chỉnh sửa</h1>
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('size.update', ['size' => $size]) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="">Kích thước:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="name" value="{{ $size->name }}">

                </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">Giá</label>
                    <input name="price" class="form-control" placeholder="" value="{{ $size->price }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-submit-input-form btn-them-phim">
                        <strong>Lưu</strong>
                    </button>
                    <a href="{{ route('size.index') }}" class="btn btn-light">Hủy</a>
                </div>

            </form>
        </div>
    </div>

@endsection
