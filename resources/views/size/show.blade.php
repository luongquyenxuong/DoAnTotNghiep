@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Chi tiết</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form class="tm-edit-product-form">

                            <div class="form-group mb-3">
                                <label for="">Kích thước
                                </label>
                                <input type="text" placeholder disabled value="{{ $size->name }}" class="form-control ">
                            </div>


                            <div class="form-group mb-3">
                                <label for="name">Giá
                                </label>
                                <input disabled type="text" value="{{ $size->price }}" class="form-control ">
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="">Ngày tạo
                                    </label>
                                    @if ($size->created_at == null)
                                        <input id="" name="" type="text" value="Null" disabled
                                            class="form-control validate hasDatepicker" data-large-mode="true">
                                    @else
                                        <input id="" name="" type="text" value="{{ $size->created_at->format('d-m-Y') }}"
                                            disabled class="form-control validate hasDatepicker" data-large-mode="true">
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <a href="{{ route('size.index') }}" class="btn btn-sm btn-outline-primary ">
                    <i class="mdi mdi-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
   
@endsection
