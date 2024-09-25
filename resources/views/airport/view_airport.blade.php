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
                        <h4 class="card-title">Airport List</h4>
                        <div class="table-responsive">
                            <div class="text-right mb-3"> <!-- Aligns the button to the right -->
                                <a href="{{ route('airport.create') }}" class="btn btn-primary">Add Airport</a>
                            </div>
                            <table class="table table-striped table-bordered zero-configuration" id="userTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">City</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($airports as $airport)
                                        <tr>
                                            <td class="text-center"><img src="{{ asset('images/' . $airport->image) }}"
                                                    alt="Image" style="width: 100px; height: 100px;"></td>
                                            <td class="text-center">{{ $airport->name }}</td>
                                            <td class="text-center">{{ $airport->city }}</td>
                                            <td class="text-center">{{ $airport->description }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('airport.edit', $airport->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>

                                                <a href="{{ route('airport.destroy', $airport->id) }}"
                                                    class="btn btn-danger btn-sm"onclick="return confirm('Are you sure you want to delete this ?');"><i
                                                        class="bi bi-trash3-fill"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
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