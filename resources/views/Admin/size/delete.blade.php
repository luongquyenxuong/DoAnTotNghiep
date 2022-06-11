@extends('Admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Kích thước</h4>
            <p class="card-description">
                <a href="{{ route('size.index') }}" class="btn btn-sm btn-outline-primary ">
                    <i class="mdi mdi-arrow-left"></i>
                </a>
            </p>
            <div class="table-responsive">
                <table class="table text-center">
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
                                    <td> Active</td>
                                @else
                                    <td> Không hoạt động</td>
                                @endif
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.size.restore',$s->id) }}">
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
                <div> {{ $lstSize->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>
    </div>


@endsection
