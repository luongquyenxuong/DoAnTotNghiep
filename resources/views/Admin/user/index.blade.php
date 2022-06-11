@extends('Admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Người dùng</h4>
            <div class="card-description" style="display:flex; justify-content: space-between; align-items: center; ">
                <div>
                    <a href="{{ route('user.create') }}" class="btn btn-outline-primary btn-fw">
                        <i class=""></i>
                        Thêm
                    </a>
                    <a href="{{ route('admin.user.deleted') }}" class="btn btn-outline-primary btn-fw">
                        <i class=""></i>
                        Người dùng đã xóa
                    </a>
                </div>
                <form >
                    <div class="card-tools" style="margin-left: auto">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control float-right"
                                href="{{ route('category.index') }}" placeholder="Tìm kiếm">

                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table text-left">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Admin</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lstUser as $u)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->full_name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->phone }}</td>
                                @if ($u->is_admin == 1)
                                    <td class="checkbox-center">


                                        <i class="mdi mdi-checkbox-marked menu-icon"></i>
                                    </td>
                                @else
                                    <td> <i class="mdi mdi-checkbox-blank-outline menu-icon"></i></td>
                                @endif
                                @if ($u->status == 1)
                                    <td> Hoạt động</td>
                                @else
                                    <td> Hoạt động</td>
                                @endif
                                <td style="">
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
                                        <a href="{{ route('user.show', $u) }}">
                                            <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Xem">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('user.edit', $u) }}">
                                            <button type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Chỉnh sửa">
                                                <i class="mdi mdi-pencil-box"></i>
                                            </button>
                                        </a>
                                        @if ($u->is_admin != 1)
                                            <form action="{{ route('user.destroy', $u) }}" method="post"
                                                class="delete">
                                                @csrf
                                                @method('DELETE')
                                                <a>
                                                    <button disable class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                        type="submit" title="Xóa">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button></a>
                                            </form>
                                        @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div> {{ $lstUser->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>
    </div>
@endsection
