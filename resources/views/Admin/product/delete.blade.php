@extends('Admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sản phẩm đã xóa</h4>
            <p class="card-description">
                <a href="{{ route('product.index') }}" class="btn btn-sm btn-outline-primary ">
                    <i class="mdi mdi-arrow-left"></i>
                </a>
            </p>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lstProduct as $p)
                            <tr>
                                <td>{{  $loop->iteration }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->category->name }}</td>
                                <td><img style="width: 70px;height:70px;object-fit:contain" src="{{ $p->img_url }}">
                                </td>
                                <td>{{ number_format($p->price) }}</td>
                                @if ($p->status == 1)
                                    <td> Hoạt động</td>
                                @else
                                    <td> Không hoạt động</td>
                                @endif
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.product.restore',$p->id) }}">
                                            <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Khôi phục">
                                                <i class="mdi mdi mdi-backup-restore"></i>
                                            </button>
                                        </a>

                                    </div>
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
