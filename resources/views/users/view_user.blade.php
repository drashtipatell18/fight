@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('danger'))
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">User List</h4>
                        <div class="table-responsive">
                            <div class="text-right mb-3"> <!-- Aligns the button to the right -->
                                <a href="{{ route('create.user') }}" class="btn btn-primary">Add User</a>
                            </div>
                            <table class="table table-striped table-bordered zero-configuration" id="userTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="text-center"><img src="{{ asset('images/' . $user->image) }}" class="img-fixed-height" width="100px"></td>
                                            <td class="text-center">{{ $user->name }}</td>
                                            <td class="text-center">{{ $user->email }}</td>
                                            <td class="text-center">{{ $user->phone }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('edit.user', $user->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>

                                                <a href="{{ route('destroy.user', $user->id) }}"
                                                    class="btn btn-danger btn-sm"onclick="return confirm('Are you sure you want to delete this ?');"><i
                                                        class="bi bi-trash3-fill"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();

            setTimeout(function() {
                $(".alert-success").fadeOut(1000);
            }, 1000);
            setTimeout(function() {
                $(".alert-danger").fadeOut(1000);
            }, 1000);
        });
    </script>
@endpush