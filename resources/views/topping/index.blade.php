@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Topping</h4>
            <p class="card-description">
                <a href="{{ route('topping.create') }}" class="btn btn-outline-primary btn-fw">
                    <i class=""></i>
                    Thêm
                </a>
                <a href="{{ route('topping.deleted') }}" class="btn btn-outline-primary btn-fw">
                    <i class=""></i>
                   Topping đã xóa
                </a>
            </p>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên topping</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lstTopping as $t)
                            <tr>
                                <td>{{  $loop->iteration }}</td>
                                <td>{{ $t->name }}</td>
                                <td>{{ number_format($t->price) }}</td>
                                @if ($t->status == 1)
                                    <td>Hoạt động</td>
                                @else
                                    <td> Inactive</td>
                                @endif
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        {{-- <a>
                                            <button title="Xem" type="submit" class="btn btn-info btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade text-left" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Chi tiết
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="">Topping
                                                                </label>
                                                                <input type="text" placeholder disabled
                                                                    value="{{ $t->name }}" class="form-control ">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="name">Giá
                                                                </label>
                                                                <input disabled type="text" value="{{ $t->price }}"
                                                                    class="form-control ">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="">Ngày tạo
                                                                </label>
                                                                @if ($t->created_at == null)
                                                                    <input id="" name="" type="text" value="Null" disabled
                                                                        class="form-control validate hasDatepicker"
                                                                        data-large-mode="true">
                                                                @else
                                                                    <input id="" name="" type="text"
                                                                        value="{{ $t->created_at->format('d-m-Y') }}"
                                                                        disabled class="form-control validate hasDatepicker"
                                                                        data-large-mode="true">
                                                                @endif

                                                            </div>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Đóng</button>
                                                        <button data-toggle="tooltip" type="submit" class="btn btn-primary">Đồng ý</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <a href="{{ route('topping.show', $t) }}">
                                            <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Xem">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('topping.edit', $t) }}">
                                            <button type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Chỉnh sửa">
                                                <i class="mdi mdi-pencil-box"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('topping.destroy', $t) }}" method="post" class="delete">
                                            @csrf
                                            @method('DELETE')
                                            <a>
                                                <button class="btn btn-danger btn-sm" data-toggle="tooltip" type="submit"
                                                    title="Xóa">
                                                    <i class="mdi mdi-delete"></i>
                                                </button></a>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div> {{ $lstTopping->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>
    </div>


@endsection
