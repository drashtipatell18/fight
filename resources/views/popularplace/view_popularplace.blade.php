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
                        <h4 class="card-title">Popular Place List</h4>
                        <div class="table-responsive">
                            <div class="text-right mb-3"> <!-- Aligns the button to the right -->
                                <a href="{{ route('popularplace.create') }}" class="btn btn-primary">Add Popular Places</a>
                            </div>
                            <table class="table table-striped table-bordered zero-configuration" id="userTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Banner Image</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Banner Text</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                    @foreach ($popularplaces as $popularplace)
                                        <tr>
                                            <td class="text-center"><img src="{{ asset('images/' . $popularplace->image) }}" class="img-fixed-height" width="100px"></td>
                                            <td class="text-center"><img src="{{ asset('images/' . $popularplace->banner_image) }}" class="img-fixed-height" width="100px"></td>
                                            <td class="text-center">{{ $popularplace->description }}</td>
                                            <td class="text-center">{{ $popularplace->name }}</td>
                                            <td class="text-center">{{ $popularplace->banner_text }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('popularplace.edit', $popularplace->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>

                                                <a href="{{ route('popularplace.destroy', $popularplace->id) }}"
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