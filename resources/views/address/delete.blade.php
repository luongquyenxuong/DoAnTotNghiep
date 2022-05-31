@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Địa chỉ đã xóa</h4>
            <p class="card-description">
                <a href="{{ route('address.index') }}" class="btn btn-sm btn-outline-primary ">
                    <i class="mdi mdi-arrow-left"></i>
                </a>
            </p>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Số điện thoại</th>
                            <th>Đường</th>
                            <th>Phường</th>
                            <th>Quận</th>
                            <th>Thành phố</th>
                            <th>Mặc định</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lstAddress as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $a->user->full_name }}</td>
                                <td>{{ $a->phone }}</td>
                                <td>{{ $a->street }}</td>
                                <td>{{ $a->ward }}</td>
                                <td>{{ $a->district }}</td>
                                <td>{{ $a->city }}</td>
                                @if ($a->is_default == 1)
                                    <td class="checkbox-center">
                                        <i class="mdi mdi-checkbox-marked menu-icon"></i>
                                    </td>
                                @else
                                    <td> <i class="mdi mdi-checkbox-blank-outline menu-icon"></i></td>
                                @endif
                                {{-- @if ($a->status == 1)
                                    <td> Hoạt động</td>
                                @else
                                    <td> Inactive</td>
                                @endif --}}
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('address.restore', $a->id) }}">
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
                <div> {{ $lstAddress->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>
    </div>
@endsection
