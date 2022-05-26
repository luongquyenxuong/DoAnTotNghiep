@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Category</h4>
            <p class="card-description">
                <a href="{{ route('category.create') }}" class="btn btn-outline-primary btn-fw">
                    <i class=""></i>
                    Add
                </a>
                <a href="{{ route('category.deleted') }}" class="btn btn-outline-primary btn-fw">
                    <i class=""></i>
                    Deleted categories
                </a>
            </p>

            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lstCategory as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->name }}</td>
                                <td><img style="width: 100px;max-height:100px;object-fit:contain" src="{{ $c->img_url }}">
                                </td>

                                @if ($c->status == 1)
                                    <td> Active</td>
                                @else
                                    <td> Inactive</td>
                                @endif
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('category.show', $c) }}">
                                            <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="View">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('category.edit', $c) }}">
                                            <button type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Edit">
                                                <i class="mdi mdi-pencil-box"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('category.destroy', $c->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a>
                                                <button class="btn btn-danger btn-sm" data-toggle="tooltip" type="submit"
                                                    title="Delete">
                                                    <i class="mdi mdi-delete"></i>
                                                </button></a>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>

@endsection
