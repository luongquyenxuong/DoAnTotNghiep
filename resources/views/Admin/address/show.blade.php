@extends('Admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Chi tiết </h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form class="tm-edit-product-form">
                            <div class="form-group mb-3">
                                <label for="">Tên
                                </label>
                                <input type="text" placeholder disabled value="{{ $address->user->full_name }}"
                                    class="form-control ">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Số điện thoại
                                </label>
                                <input disabled type="text" value="{{ $address->phone }}" class="form-control ">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Đường
                                </label>
                                <input disabled type="text" value="{{ $address->street }}" class="form-control ">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Phường
                                </label>
                                <input disabled type="text" value="{{ $address->ward }}" class="form-control ">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Phường
                                </label>
                                <input disabled type="text" value="{{ $address->district }}" class="form-control ">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Phường
                                </label>
                                <input disabled type="text" value="{{ $address->city }}" class="form-control ">
                            </div>
                            @if ($address->is_default == 1)
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" disabled checked>Mặc định<i
                                        class="input-helper"></i></label>
                            </div>
                        @else
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" disabled>Mặc định<i
                                        class="input-helper"></i></label>
                            </div>
                        @endif
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="">Ngày tạo
                                    </label>
                                    @if ($address->created_at == null)
                                        <input id="" name="" type="text" value="Null" disabled
                                            class="form-control validate hasDatepicker" data-large-mode="true">
                                    @else
                                        <input id="" name="" type="text" value="{{ $address->created_at->format('d-m-Y') }}" disabled
                                            class="form-control validate hasDatepicker" data-large-mode="true">
                                    @endif

                                </div>


                            </div>
                        </form>
                    </div>

                </div>
                <a href="{{ route('address.index') }}" class="btn btn-sm btn-outline-primary ">
                    <i class="mdi mdi-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>


@endsection
