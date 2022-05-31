@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <p class="card-description">
            <div class="col-12 ">
                <h2 class="tm-block-title d-inline-block">Danh mục</h2>

            </div>
            </p>
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form class="tm-edit-product-form">
                            <div class="form-group mb-3">
                                <label>Tên danh mục
                                </label>
                                <input disabled type="text" value="{{ $category->name }}" class="form-control ">
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="">Ngày tạo
                                    </label>
                                    @if ($category->created_at == null)
                                        <input id="" name="" type="text" value="Null" disabled
                                            class="form-control validate hasDatepicker" data-large-mode="true">
                                    @else
                                        <input id="" name="" type="text"
                                            value="{{ $category->created_at->format('d-m-Y') }}" disabled
                                            class="form-control validate hasDatepicker" data-large-mode="true">
                                    @endif
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">

                        <img src="../storage/{{ $category->img_url }}" class="mx-auto d-block"
                            style="width: 300px;max-height:300px;object-fit:contain">

                    </div>

                </div>

            </div>
            <a href="{{ route('category.index') }}" class="btn btn-sm btn-outline-primary ">
                <i class="mdi mdi-arrow-left"></i>
            </a>
        </div>

    </div>

@endsection
