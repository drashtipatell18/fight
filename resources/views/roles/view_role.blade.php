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
                        <h4 class="card-title">Role List</h4>
                        <div class="table-responsive">
                            <div class="text-right mb-3"> <!-- Aligns the button to the right -->
                                <a href="{{ route('role.create') }}" class="btn btn-primary">Add Role</a>
                            </div>
                            <table class="table table-striped table-bordered zero-configuration" id="roleTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td class="text-center">{{ $role->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('role.edit', $role->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>

                                                 <a href="{{ route('role.destroy', $role->id) }}"
                                                class="btn btn-danger btn-sm" onclick="return confirmDeleteRole('{{ $role->id }}');"><i
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
