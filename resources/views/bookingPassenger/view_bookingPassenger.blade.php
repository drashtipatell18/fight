
@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Booking Passenger</h4>
                    <div class="table-responsive">
                        <div class="text-right mb-3"> <!-- Aligns the button to the right -->
                            <a href="{{ route('bookingpassenger.create') }}" class="btn btn-primary">Add Booking Passenger</a>
                        </div>
                            <table class="table table-striped table-bordered zero-configuration" id="userTable">
                            <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Booking Total Amount</th>
                                <th>Booking Detail ID</th>
                                <th>Seat ID</th>
                                <th>Meal ID</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookingPassengers as $bookingPassenger)
                                <tr>
                                    <td>{{ $bookingPassenger->booking_id }}</td>
                                    <td>{{ $bookingPassenger->bookingMaster->total_amount }}</td>
                                    <td>{{ $bookingPassenger->bookingDetail->first_name }}</td>
                                    <td>{{ $bookingPassenger->seatMaster->seat_number }}</td>
                                    <td>{{ $bookingPassenger->mealMaster->name }}</td>
                                    <td>{{ $bookingPassenger->price }}</td>
                                    <td>{{ $bookingPassenger->status }}</td>
                                    <td>
                                        <a href="{{ route('bookingpassenger.edit', $bookingPassenger->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('bookingpassenger.destroy', $bookingPassenger->id) }}" class="btn btn-danger">Delete</a>
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
@endsection
@push('script')
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
