@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Product</h4>
            <p class="card-description">
                <a href="{{ route('product.create') }}" class="btn btn-outline-primary btn-fw">
                    <i class=""></i>
                    Add
                </a>
                <a href="{{ route('product.deleted') }}" class="btn btn-outline-primary btn-fw">
                    <i class=""></i>
                    Deleted products
                </a>
            </p>

            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lstProduct as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->category->name }}</td>
                                <td><img style="width: 100px;max-height:100px;object-fit:contain" src="{{ $p->img_url }}">
                                </td>
                                <td>{{ $p->price }}</td>

                                @if ($p->status == 1)
                                    <td> Active</td>
                                @else
                                    <td> Inactive</td>
                                @endif
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('product.show', $p) }}">
                                            <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="View">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('product.edit', $p) }}">
                                            <button type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Edit">
                                                <i class="mdi mdi-pencil-box"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('product.destroy', $p) }}" method="post">
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
