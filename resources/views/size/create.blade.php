@extends('layout.app')
@section('content')
    <h1>Add size</h1>
    <div class="card">
        <div class="card-body">
            <form class="forms-sample" method="post" action="{{ route('size.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name size</label>
                    <input type="text" class="form-control" name="name" placeholder="Name size">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">Price</label>
                    <input  type="number" name="price" class="form-control" placeholder="Price">
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ route('size.index') }}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>

    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>

@endsection
