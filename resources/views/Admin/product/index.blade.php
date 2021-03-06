@extends('Admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sản phẩm</h4>
            <div class="card-description" style="display:flex; justify-content: space-between; align-items: center;">

                <div> <a href="{{ route('product.create') }}" class="btn btn-outline-primary btn-fw">
                        <i class=""></i>
                        Thêm
                    </a>
                    <a href="{{ route('admin.product.deleted') }}" class="btn btn-outline-primary btn-fw">
                        <i class=""></i>
                        Sản phẩm đã xóa
                    </a>
                </div>
                <form>
                    <div class="card-tools" style="margin-left: auto">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control float-right"
                                href="{{ route('product.index') }}" placeholder="Tìm kiếm">

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
                            <th>Danh mục</th>
                            <th>Hình Ảnh</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lstProduct as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->category->name }}</td>
                                <td><img style="width: 70px;height:70px;object-fit:contain" src="{{ $p->img_url }}">
                                </td>
                                <td>{{ number_format($p->price) }}</td>

                                @if ($p->status == 1)
                                    <td> Hoạt động</td>
                                @else
                                    <td> Inactive</td>
                                @endif
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('product.show', $p) }}">
                                            <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Xen">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('product.edit', $p) }}">
                                            <button type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Chỉnh sửa">
                                                <i class="mdi mdi-pencil-box"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('product.destroy', $p) }}" method="post"
                                            class="delete">
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
                <div> {{ $lstProduct->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>
    </div>
@endsection
