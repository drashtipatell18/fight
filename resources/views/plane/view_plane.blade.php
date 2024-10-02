@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Plane Master List</h4>
                        <div class="table-responsive">
                            <div class="text-right mb-3"> <!-- Aligns the button to the right -->
                                <a href="{{ route('planemaster.create') }}" class="btn btn-primary">Add Plane Master</a>
                            </div>
                            <table class="table table-striped table-bordered zero-configuration" id="userTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Company Name</th>
                                        <th class="text-center">Food Facility</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plane as $item)
                                        <tr>
                                            <td class="text-center"><img src="{{ asset('images/' . $item->image) }}" class="img-fixed-height" width="100px"></td>
                                            <td class="text-center">{{ $item->name }}</td>
                                            <td class="text-center">{{ $item->company_name }}</td>
                                            <td class="text-center">{{ $item->food_facility }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('planemaster.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{ route('planemaster.destroy', $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this ?');"><i class="bi bi-trash3-fill"></i></a>
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
