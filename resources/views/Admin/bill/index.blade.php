@extends('Admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            {{-- <h4 class="card-title">Hóa đơn</h4> --}}
            <p class="card-description">

                {{-- <div>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected="">Today</option>
                        <option value="1">Yesterday</option>
                        <option value="2">Tomorrow</option>
                    </select>
                </div> --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="header-title mb-0">Hóa đơn</h4>

                {{-- <div>
                    <label for="keyword">Tìm kiếm</label>
                    <div class="card-tools" style="margin-left: auto">
                        <input type="text" name="search" id="search" placeholder="Tìm kiếm"
                            class="form-control float-right">
                    </div>
                </div> --}}

                <form>
                    <div class="card-tools" style="margin-left: auto">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control float-right"
                                href="{{ route('bill.index') }}" placeholder="Tìm kiếm">

                        </div>
                    </div>
                </form>
            </div>
            <div style="width:11%">
                <select id="statusID" class="form-select-sm ">
                    <option value="0">Chọn</option>
                    <option value="1">Chờ xác nhận</option>
                    <option value="2">Đang giao</option>
                    <option value="3">Đã giao</option>
                    <option value="4">Đã hủy</option>
                </select>
            </div>
            </p>
            <div class="table-responsive">
                <table class="table text-left">
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
                    <tbody id="listBill">
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
                                <td> {{ Carbon\Carbon::parse($b->date)->format('d-m-Y ') }}</td>
                                {{-- 1 là chờ xác nhận
                            2 là đang giao
                            3 là hoàn thành
                            4 là đã hủy --}}
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
                                        <a href="{{ route('bill.show', $b) }}  ">
                                            <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Xem chi tiết">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                    </div>
                                    @if ($b->status == 1)
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo route('admin.bill.confirm', $b->id); ?>">
                                            <button type="submit" class="btn btn-success btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Xác nhận">
                                                <i class="mdi mdi-checkbox-marked"></i>
                                            </button>
                                        </a>
                                    </div>
                                @elseif($b->status == 2)
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo route('admin.bill.finished', $b->id); ?>">
                                            <button type="submit" class="btn btn-success btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Xác nhận">
                                                <i class="mdi mdi-checkbox-marked "></i>
                                            </button>
                                        </a>
                                    </div>
                                @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div> {{ $lstBill->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>

    </div>
    <script>
        $("#statusID").on('change', function(e) {
            console.log(e);
            var status_id = e.target.value;
            //alert(status_id);
            $.get('bill/filter/' + status_id, function(data) {
                $("#listBill").html(data);
            });
        });
        var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('bill.index') }}",
        columns: [
            {data: 'title', name: 'title'},
            {data: 'title', name: 'title'},
            {data: 'author', name: 'author'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
//     $('body').on('click', '.deleteBook', function () {

//      var book_id = $(this).data("id");
//      confirm("Are You sure want to delete !");

//      $.ajax({
//          type: "DELETE",
//          url: "{{ route('books.store') }}"+'/'+book_id,
//          success: function (data) {
//              table.draw();
//          },
//          error: function (data) {
//              console.log('Error:', data);
//          }
//      });
//  });
    </script>
@endsection
