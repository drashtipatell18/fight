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
                        <h4 class="card-title">Place To Roam List</h4>
                        <div class="table-responsive">
                            <div class="text-right mb-3"> <!-- Aligns the button to the right -->
                                <a href="{{ route('placetoroam.create') }}" class="btn btn-primary">Add Place To Roam</a>
                            </div>
                            <table class="table table-striped table-bordered zero-configuration" id="userTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Popular Place</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Location</th>
                                        <th class="text-center">Exploration Time</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($placetoroams as $placetoroam)
                                        <tr>
                                            <td class="text-center"><img src="{{ asset('images/' . $placetoroam->image) }}"
                                                    alt="Image" style="width: 100px; height: 100px;"></td>
                                            <td class="text-center">{{ $placetoroam->title }}</td>
                                            <td class="text-center">{{ $placetoroam->popularPlace->name }}</td>
                                            <td class="text-center">{{ $placetoroam->description }}</td>
                                            <td class="text-center">{{ $placetoroam->location }}</td>
                                            <td class="text-center">{{ $placetoroam->exploration_time }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('placetoroam.edit', $placetoroam->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>

                                                <a href="{{ route('placetoroam.destroy', $placetoroam->id) }}"
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
