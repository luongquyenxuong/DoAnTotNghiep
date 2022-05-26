@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">User</h4>
            <p class="card-description">

            </p>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Is_admin</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lstUser as $u)
                            <tr>
                                <td>{{ $u->id }}</td>
                                <td>{{ $u->full_name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->phone }}</td>
                                {{-- <td>{{ $u->is_admin }}</td> --}}
                                @if ($u->is_admin == 1)
                                    <td> <input type="checkbox" class="form-check-input" disabled checked></td>
                                @else
                                    <td> <input type="checkbox" class="form-check-input" disabled></td>
                                @endif
                                @if ($u->status == 1)
                                <td> Active</td>
                            @else
                                <td> Inactive</td>
                            @endif

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
