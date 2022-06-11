@extends('Admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh mục đã xóa</h4>
            <p class="card-description">
                <a href="{{ route('category.index') }}" class="btn btn-sm btn-outline-primary ">
                    <i class="mdi mdi-arrow-left"></i>
                </a>
            </p>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Hình ảnh</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lstCategory as $c)
                            <tr>
                                <td>{{  $loop->iteration }}</td>
                                <td>{{ $c->name }}</td>
                                <td><img style="width: 70px;height:70px;object-fit:contain" src="{{ $c->img_url }}">
                                </td>

                                @if ($c->status == 1)
                                    <td> Hoạt động</td>
                                @else
                                    <td> Không hoạt động</td>
                                @endif
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.category.restore',$c->id) }}">
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
                <div >  {{  $lstCategory->links('pagination::bootstrap-4')  }}</div>
            </div>
        </div>
    </div>


@endsection
