@extends('Admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh mục</h4>
            <div class="card-description" style="display:flex; justify-content: space-between; align-items: center; ">
                <div>
                    <a href="{{ route('category.create') }}" class="btn btn-outline-primary btn-fw">
                        <i class=""></i>
                        Thêm
                    </a>
                    <a href="{{ route('admin.category.deleted') }}" class="btn btn-outline-primary btn-fw">
                        <i class=""></i>
                        Danh mục đã xóa
                    </a>
                </div>
                <div class="card-tools" style="margin-left: auto">
                    <label for="keyword">Tìm kiếm</label>
                    <div class="input-group">
                        <input type="text" name="keyword" id="keyword" class="form-control float-right">
                    </div>
                </div>

                {{-- <form>
                    <div class="card-tools" style="margin-left: auto">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control float-right"
                                href="{{ route('category.index') }}" placeholder="Tìm kiếm">

                        </div>
                    </div>
                </form> --}}
            </div>

            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Hình Ảnh</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody id="listCategory">
                        @foreach ($lstCategory as $c)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $c->name }}</td>
                                <td><img style="width: 70px;height:70px;object-fit:contain" src="{{ $c->img_url }}">
                                </td>
                                @if ($c->status == 1)
                                    <td> Hoạt động</td>
                                @endif
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('category.show', $c) }}">
                                            <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Xem">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>

                                        <a href="{{ route('category.edit', $c) }}">
                                            <button type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Chỉnh sửa">
                                                <i class="mdi mdi-pencil-box"></i>
                                            </button>
                                        </a>
                                        {{-- <a href="{{ route('category.destroy', $c->id) }}">
                                            <button type="" class="btn btn-danger btn-sm"  class="delete"
                                                data-placement="top" title="Xóa">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </a> --}}
                                        {{-- <a type="submit" class="btn btn-danger btn-sm" href="{{ route('category.destroy', $c->id) }}"> <i class="mdi mdi-delete"></i></a> --}}
                                        <form action="{{ route('category.destroy', $c->id) }}" method="post"
                                            class="delete">
                                            {{ csrf_field() }}
                                            {{-- @method('DELETE') --}}
                                            {{ method_field('DELETE') }}

                                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" type="submit"
                                                title="Xóa">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </form>
                                        {{-- <a>
                                            <button class=" btn btn-danger btn-sm btn-delete"
                                            data-url="{{ route('category.destroy', $c->id) }}" ​ type="button"
                                            data-target="#delete" data-toggle="modal"><i
                                                class="mdi mdi-delete"></i>
                                            </button>
                                        </a> --}}
                                        {{-- <a href="{{ route('category.destroy', $c->id) }}">
                                            <button class=" btn btn-danger btn-sm btn-delete"
                                            data-url="" ​ type="submit"
                                            data-target="#delete" data-toggle="modal"><i
                                                class="mdi mdi-delete"></i>
                                            </button>
                                        </a> --}}





                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div> {{ $lstCategory->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>
    </div>
    {{-- <script>
        $('.btn-delete').click(function() {
            var url = $(this).attr('data-url');
            var _this = $(this);

            if (confirm(url)) {
                $.ajax({
                    type: 'delete',
                    url: url,
                    success: function(response) {
                        toastr.success('Delete student success!')
                        _this.parent().parent().remove();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        //xử lý lỗi tại đây
                    }
                })
            }
        })
    </script> --}}

    <script>
        $(document).ready(function() {
            $(document).on('keyup', '#keyword', function() {
                var keyword = $(this).val();
                $.ajax({
                    type: "get",
                    url: "search",
                    data: {
                        keyword: keyword
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#listCategory').html(response);
                    }
                })
            });
        });
    </script>
@endsection
