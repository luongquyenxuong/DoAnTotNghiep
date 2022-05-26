@extends('layout.app')
@section('content')
    <h1>Edit product</h1>
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('product.update', ['product' => $product]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group col-12">
                    <label for="">Name product:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="name"
                        value="{{ $product->name }}">

                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select name="idCategory" class="form-control form-control-lg">
                        {{-- <option value=''>Select</option> --}}
                        @foreach ($lstCategory as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Price</label>
                    <input  name="price" class="form-control" placeholder="Price"  value="{{ $product->price }}">
                </div>
                <img style="width: 100px;max-height:100px;object-fit:contain"
                    src="{{ $product->img_url }}">
                <div class="form-group  col-12">
                    <label for="inputImage">File upload</label>
                    <input type="file" id="inputImage" name="img" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                        </span>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary btn-submit-input-form btn-them-phim">
                    <strong>Submit</strong>
                </button>
                <a href="{{ route('product.index') }}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>


@endsection
