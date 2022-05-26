
@extends('layout.app')
@section('content')

<h1>Add category</h1>
<div class="card">
    <div class="card-body">
      <form class="forms-sample" method="post" action="{{ route('category.store' ) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Name category</label>
          <input type="text" class="form-control" name="name" placeholder="Name category">
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
          <a href="{{ route('category.index') }}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>

  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>

@endsection
