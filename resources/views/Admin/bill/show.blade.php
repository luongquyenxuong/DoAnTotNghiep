@extends('Admin.layout.app')
@section('content')
    <h1>Chi tiết hóa đơn</h1>
    <div class="card ">

        <div class="card-body">
            <div class="form-group"> <a href="{{ route('bill.index') }}" class="btn btn-sm btn-outline-primary ">
                    <i class="mdi mdi-arrow-left"></i>
                </a></div>

            {{-- <h4 class="card-title">Chi tiết hóa đơn</h4> --}}
            @foreach ($bill->bill_detail as $b)
                @if ($loop->first)
                    <h5 class="form-group">Người nhận: {{ $bill->user->full_name }}</h5>
                    <h5 class="form-group">Địa chỉ: {{ $bill->address->street }}, {{ $bill->address->ward }},
                        {{ $bill->address->district }}, {{ $bill->address->city }}
                    </h5>
                    {{-- $bill->address->district + $bill->address->city --}}
                @endif
            @endforeach
            </p>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Size</th>
                        <th>Đá</th>
                        <th>Đường</th>
                        <th>Loại</th>
                        <th>Topping</th>
                        <th>Giá</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($bill->bill_detail as $bd)
                        <tr>
                            <td>{{ $bd->product->name }}</td>
                            <td>{{ $bd->amount }}</td>
                            <td>{{ $bd->size->name }}({{number_format($bd->size->price)  }})</td>
                            <td>{{ $bd->ice }}%</td>
                            <td>{{ $bd->sugar }}%</td>
                            <td>{{ $bd->type }}</td>
                            <td>


                                @foreach ($bd->bill_detail_topping as $top)
                                    {{ $top->topping->name }} ({{ number_format($top->price) }})
                                    <br>
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                <?php $a = 0; ?>
                                @foreach ($bd->bill_detail_topping as $top)
                                    <?php $a += $top->price; ?>
                                @endforeach
                                {{ number_format($bd->price + $bd->size->price + $a) }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
@endsection
