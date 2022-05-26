@extends('layout.app')
@section('content')
    <h1>Edit size</h1>
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('size.update', ['size' => $size]) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group col-12">
                    <label for="">Name size:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="name" value="{{ $size->name }}">

                </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">Price</label>
                    <input  name="price" class="form-control" placeholder="Price"  value="{{ $size->price }}">
                </div>


                <button type="submit" class="btn btn-primary btn-submit-input-form btn-them-phim">
                    <strong>Submit</strong>
                </button>
                <a href="{{ route('size.index') }}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>

@endsection
