@extends('layout.app')
@section('content')
    <a href="{{ route('user.index') }}" class="btn btn-sm btn-outline-primary ">
        <i class="mdi mdi-arrow-left"></i>
    </a>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center">
                            {{-- <img class="profile_img" src="https://source.unsplash.com/300x150/?student" alt="student dp"> --}}
                            {{-- @if ($user->avatar == null)
                                <img class="card-img-top" src="{{ asset('assets/images/user.png') }}" alt="Card image"
                                    style="width:200px;height:200px;object-fit:contain">
                            @else
                                <img class="card-img-top" src="{{ $user->avatar }}" alt="Card image"
                                    style="width:200px;height:200px;object-fit:contain">
                            @endif --}}
                            <img class="card-img-top" src="{{ $user->avatar }}" alt="Card image"
                                style="width:200px;height:200px;object-fit:contain">
                            <h3>{{ $user->full_name }}</h3>
                        </div>
                        {{-- <div class="card-body">
                            <p class="mb-0"><strong class="pr-1">Ngày sinh:</strong>
                                @if ($user->birtday == null)
                                Chưa có
                                @else
                                {{ $user->birtday }}
                                @endif
                            </p>
                            <p class="mb-0"><strong class="pr-1">Email:</strong>{{ $user->email }}</p>
                            <p class="mb-0"><strong class="pr-1">Số điện thoại:</strong>
                                @if ($user->phone == null)
                                Chưa có
                                @else
                                {{ $user->phone }}
                                @endif
                            </p>
                            <p class="mb-0"><strong class="pr-1">Section:</strong>A</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Thông tin</h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Ngày sinh</th>
                                    <td width="2%">:</td>
                                    <td>
                                        @if ($user->birthday == null)
                                            Chưa có
                                        @else
                                            {{-- {{ $user->birthday->format(' d-m-Y H:i') }} --}}
                                            {{ Carbon\Carbon::parse($user->birthday)->format('d-m-Y ') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th width="30%">Email</th>
                                    <td width="2%">:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th width="30%">Số điện thoại</th>
                                    <td width="2%">:</td>
                                    <td>
                                        @if ($user->phone == null)
                                            Chưa có
                                        @else
                                            {{ $user->phone }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th width="30%">Giới tính</th>
                                    <td width="2%">:</td>
                                    <td>
                                        @if ($user->sex == 1)
                                            Nam
                                        @else
                                            Nữ
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th width="30%">Chức vụ</th>
                                    <td width="2%">:</td>
                                    <td>
                                        @if ($user->is_admin == 1)
                                            Admin
                                        @elseif($user->is_admin == 2)
                                            Nhân viên
                                        @else
                                            Người dùng
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th width="30%">Ngày tạo</th>
                                    <td width="2%">:</td>
                                    <td>
                                        {{ $user->created_at->format(' d-m-Y H:i') }}
                                    </td>

                                </tr>
                                <tr>
                                    <th width="30%">Trạng thái</th>
                                    <td width="2%">:</td>
                                    <td>
                                        @if ($user->status == 1)
                                            Đang hoạt động
                                        @else
                                            Ngưng hoạt động
                                        @endif
                                    </td>

                                </tr>
                            </table>
                        </div>
                    </div>
                    <div style="height: 26px"></div>
                    {{-- <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
                        </div>
                        <div class="card-body pt-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
