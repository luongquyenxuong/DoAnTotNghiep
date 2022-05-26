
@extends('layout.app')
@section('content')

<h1>Add product</h1>
<div class="card">
    <div class="card-body">
      <form class="forms-sample" method="post" action="{{ route('product.store' ) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Name product</label>
          <input type="text" class="form-control" name="name" placeholder="Name product">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select name="idCategory" class="form-control form-control-lg">
                <option value=''>Select</option>
                @foreach ($lstCategory as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail3">Price</label>
            <input name="price" class="form-control" placeholder="Price">
        </div>
        <div class="form-group">
            <input  name="id" class="file-upload-default">
            <label>File upload</label>
            <input type="file" name="img" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <a href="{{ route('product.index') }}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>

  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>

@endsection
