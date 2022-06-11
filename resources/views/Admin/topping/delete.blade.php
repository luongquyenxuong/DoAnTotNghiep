@extends('Admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Topping</h4>
            <p class="card-description">
                <a href="{{ route('topping.index') }}" class="btn btn-sm btn-outline-primary ">
                    <i class="mdi mdi-arrow-left"></i>
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
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $t->name }}</td>
                                <td>{{ number_format($t->price) }}</td>
                                @if ($t->status == 1)
                                    <td> Active</td>
                                @else
                                    <td> Không hoạt động</td>
                                @endif
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.topping.restore',$t->id) }}">
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
                <div> {{ $lstTopping->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>
    </div>


@endsection
