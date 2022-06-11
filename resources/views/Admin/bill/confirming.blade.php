@extends('Admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Hóa đơn</h4>
            <p class="card-description">

                {{-- <a href="{{ route('bi.deleted') }}" class="btn btn-outline-primary btn-fw">
                    <i class=""></i>
                    Danh mục đã xóa
                </a> --}}
            </p>

            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Thành tiền</th>
                            <th>Ship</th>
                            <th>Mã giảm</th>
                            <th>Tổng tiền</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lstBill as $b)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $b->user->full_name }}</td>
                                <td>{{ $b->address->phone }}</td>
                                <td>{{ $b->total_amount }}</td>
                                <td>{{ $b->ship }}</td>
                                @if ($b->id_discount)
                                    <td>{{ $b->id_discount }}</td>
                                @else
                                    <td>Không có</td>
                                @endif
                                <td>{{ $b->total }}</td>
                                <td>{{ Carbon\Carbon::parse($b->date)->format('d-m-Y ') }}</td>
                                @if ($b->status == 1)
                                    <td> Chờ xác nhận</td>
                                @elseif($b->status == 2)
                                    <td> Đang giao</td>
                                @elseif($b->status == 3)
                                    <td>Hoàn thành</td>
                                @else
                                    <td>Đã hủy</td>
                                @endif
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('bill.show', $b) }}">
                                            <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Xem chi tiết">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('bill.confirm',$b->id) }}">
                                            <button type="submit" class="btn btn-success btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Xác nhận">
                                                <i class="mdi mdi-checkbox-marked
                                                "></i>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div> {{ $lstBill->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>

    </div>
@endsection
