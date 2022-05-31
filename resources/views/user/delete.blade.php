@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Người dùng</h4>
            <p class="card-description">
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-outline-primary ">
                    <i class="mdi mdi-arrow-left"></i>
                </a>
            </p>
            <div class="table-responsive">
                <table class="table text-center">
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
                                    <td>Ngưng hoạt động</td>
                                @else
                                    <td>Ngưng hoạt động</td>
                                @endif
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('user.restore',$u->id) }}">
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
                <div> {{ $lstUser->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>
    </div>

@endsection
