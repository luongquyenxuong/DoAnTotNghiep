@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Detail product</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form class="tm-edit-product-form">
                            <div class="form-group mb-3">
                                <label for="">Name product
                                </label>
                                <input type="text" placeholder disabled value="{{ $product->name }}"
                                    class="form-control ">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Category
                                </label>
                                <input disabled type="text" value="{{ $product->category->name }}" class="form-control ">
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Price
                                </label>
                                <input disabled type="text" value="{{ $product->price }}" class="form-control ">
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="">Creat date
                                    </label>
                                    @if ($product->created_at == null)
                                        <input id="" name="" type="text" value="Null" disabled
                                            class="form-control validate hasDatepicker" data-large-mode="true">
                                    @else
                                        <input id="" name="" type="text" value="{{ $product->created_at->format('d-m-Y') }}" disabled
                                            class="form-control validate hasDatepicker" data-large-mode="true">
                                    @endif

                                </div>


                            </div>
                        </form>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                        <img src="{{ $product->img_url }}" class="mx-auto d-block"
                            style="width: 300px;max-height:300px;object-fit:contain">
                    </div>
                </div>
                <a href="{{ route('product.index') }}" class="btn btn-sm btn-outline-primary ">
                    <i class="mdi mdi-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
 
@endsection
