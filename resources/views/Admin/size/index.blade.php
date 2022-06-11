@extends('Admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Kích thước </h4>
            <div class="card-description" style="display:flex; justify-content: space-between; align-items: center;">
                <div> <a href="{{ route('size.create') }}" class="btn btn-outline-primary btn-fw">
                        <i class=""></i>
                        Thêm
                    </a>
                    <a href="{{ route('admin.size.deleted') }}" class="btn btn-outline-primary btn-fw">
                        <i class=""></i>
                        Kích thước đã xóa
                    </a>

                </div>

                <form>
                    <div class="card-tools" style="margin-left: auto">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control float-right"
                                href="{{ route('topping.index') }}" placeholder="Tìm kiếm">

                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table text-left">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Kích thước</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lstSize as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ number_format($s->price) }}</td>
                                @if ($s->status == 1)
                                    <td> Hoạt động</td>
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
                                                                <label class="col-form-label" for="">Kích thước
                                                                </label>
                                                                <input type="text" placeholder disabled
                                                                    value="{{ $s->name }}" class="form-control ">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="name">Giá
                                                                </label>
                                                                <input disabled type="text" value="{{ $s->price }}"
                                                                    class="form-control ">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="">Ngày tạo
                                                                </label>
                                                                @if ($s->created_at == null)
                                                                    <input id="" name="" type="text" value="Null" disabled
                                                                        class="form-control validate hasDatepicker"
                                                                        data-large-mode="true">
                                                                @else
                                                                    <input id="" name="" type="text"
                                                                        value="{{ $s->created_at->format('d-m-Y') }}"
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
                                        <a href="{{ route('size.show', $s) }}">
                                            <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Xem">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('size.edit', $s) }}">
                                            <button type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Chỉnh sửa">
                                                <i class="mdi mdi-pencil-box"></i>
                                            </button>
                                        </a>


                                        <form action=" {{ route('size.destroy', $s) }}" method="post"
                                            class="delete">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Button trigger modal -->
                                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" type="submit"
                                                title="Xóa">
                                                <i class="mdi mdi-delete"></i>
                                            </button>

                                        </form>
                                        <!-- Vertically centered modal -->
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div> {{ $lstSize->links('pagination::bootstrap-4') }}</div>
            </div>

        </div>
    </div>
@endsection
