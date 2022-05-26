@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Detail topping</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form class="tm-edit-product-form">
                            <div class="form-group mb-3">
                                <label for="">Name topping
                                </label>
                                <input type="text" placeholder disabled value="{{ $topping->name }}"
                                    class="form-control ">
                            </div>


                            <div class="form-group mb-3">
                                <label for="name">Price
                                </label>
                                <input disabled type="text" value="{{ $topping->price }}" class="form-control ">
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="">Creat date
                                    </label>
                                    @if ($topping->created_at == null)
                                        <input id="" name="" type="text" value="Null" disabled
                                            class="form-control validate hasDatepicker" data-large-mode="true">
                                    @else
                                        <input id="" name="" type="text" value="{{ $topping->created_at->format('d-m-Y') }}" disabled
                                            class="form-control validate hasDatepicker" data-large-mode="true">
                                    @endif

                                </div>


                            </div>
                        </form>
                    </div>

                </div>
                <a href="{{ route('topping.index') }}" class="btn btn-sm btn-outline-primary ">
                    <i class="mdi mdi-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
   <script src="{{ asset('assets/js/file-upload.js') }}"></script>
@endsection
