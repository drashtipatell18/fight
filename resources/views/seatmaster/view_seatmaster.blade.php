@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Seat Master List</h4>
                        <div class="table-responsive">

                            <div class="text-right mb-3"> <!-- Aligns the button to the right -->
                                <a href="{{ route('seatmaster.create') }}" class="btn btn-primary">Add Seat Master</a>
                            </div>
                            <table class="table table-striped table-bordered zero-configuration" id="userTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Plane ID</th>
                                        <th class="text-center">Seat Number</th>
                                        <th class="text-center">Seat Type</th>
                                        <th class="text-center">Is Window</th>
                                        <th class="text-center">Seat Status</th>
                                        <th class="text-center">Seat Price</th>
                                        <th class="text-center">Price Incrementer</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($seatmaster as $seat)
                                        <tr>
                                            <td class="text-center">{{ $seat->plane_id }}</td>
                                            <td class="text-center">{{ $seat->seat_number }}</td>
                                            <td class="text-center">{{ $seat->seat_type }}</td>
                                            <td class="text-center">{{ $seat->is_window }}</td>
                                            <td class="text-center">{{ $seat->seat_status }}</td>
                                            <td class="text-center">{{ $seat->seat_price }}</td>
                                            <td class="text-center">{{ $seat->price_incrementer }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('seatmaster.edit', $seat->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ route('seatmaster.destroy', $seat->id) }}" class="btn btn-danger">Delete</a>
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
