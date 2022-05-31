@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh mục</h4>
            <p class="card-description">
                <a href="{{ route('category.create') }}" class="btn btn-outline-primary btn-fw">
                    <i class=""></i>
                    Thêm
                </a>
                <a href="{{ route('category.deleted') }}" class="btn btn-outline-primary btn-fw">
                    <i class=""></i>
                    Danh mục đã xóa
                </a>
            </p>

            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Hình Ảnh</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lstCategory as $c)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $c->name }}</td>
                                <td><img style="width: 70px;height:70px;object-fit:contain" src="{{ $c->img_url }}">
                                </td>
                                @if ($c->status == 1)
                                    <td> Hoạt động</td>
                                @else
                                    <td> Inactive</td>
                                @endif
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('category.show', $c) }}">
                                            <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Xem">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                        {{-- <a>
                                            <button id="smallButton" title="show" class="btn btn-info btn-sm" type="button"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade text-left" aria-modal="true" id="exampleModal"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Chi tiết
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="smallBody">
                                                            <div class="mb-3">
                                                                <label class="col-form-label">Tên
                                                                </label>
                                                                <input type="text" placeholder disabled
                                                                    value="{{ $c->name }}" class="form-control ">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">Ngày tạo
                                                                </label>
                                                                @if ($c->created_at == null)
                                                                    <input type="text" value="Null" disabled
                                                                        class="form-control validate hasDatepicker"
                                                                        data-large-mode="true">
                                                                @else
                                                                    <input type="text"
                                                                        value="{{ $c->created_at->format('d-m-Y') }}"
                                                                        disabled class="form-control validate hasDatepicker"
                                                                        data-large-mode="true">
                                                                @endif
                                                            </div>
                                                            <div>
                                                                <img style="width:200px;height:200px;object-fit:contain"
                                                                    src="{{ $c->img_url }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Đóng</button>
                                                            <button data-toggle="tooltip" type="submit"
                                                                class="btn btn-primary">Đồng ý</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a> --}}
                                        <a href="{{ route('category.edit', $c) }}">
                                            <button type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Chỉnh sửa">
                                                <i class="mdi mdi-pencil-box"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('category.destroy', $c->id) }}" method="post"
                                            class="delete">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" type="submit"
                                                title="Xóa">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div> {{ $lstCategory->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>

    </div>
@endsection
