@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Size</h4>
            <p class="card-description">
                <a href="{{ route('size.create') }}" class="btn btn-outline-primary btn-fw">
                    <i class=""></i>
                    Add
                </a>
                <a href="{{ route('size.deleted') }}" class="btn btn-outline-primary btn-fw">
                    <i class=""></i>
                    Deleted size
                </a>
            </p>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lstSize as $s)
                            <tr>
                                <td>{{ $s->id }}</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->price }}</td>
                                @if ($s->status == 1)
                                    <td> Active</td>
                                @else
                                    <td> Inactive</td>
                                @endif
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('size.show', $s) }}">
                                            <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="View">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('size.edit', $s) }}">
                                            <button type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Edit">
                                                <i class="mdi mdi-pencil-box"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('size.destroy', $s) }}" method="post">
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
