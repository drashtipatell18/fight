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
                    <h4 class="card-title">Booking Master List</h4>
                    <div class="table-responsive">
                        <div class="text-right mb-3">
                            <!-- Aligns the button to the right -->
                            <a href="{{ route('booking.create') }}" class="btn btn-primary">Add Booking Master</a>
                        </div>
                        <table class="table table-striped table-bordered zero-configuration" id="userTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Journey ID</th>
                                    <th class="text-center">Total Amount</th>
                                    <th class="text-center">Discount</th>
                                    <th class="text-center">Paid Amount</th>
                                    <th class="text-center">Booking Date</th>
                                    <th class="text-center">Booking Time</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                <tr>
                                    <td class="text-center">{{ $booking->journey_id }}</td>
                                    <td class="text-center">{{ $booking->total_amount }}</td>
                                    <td class="text-center">{{ $booking->discount }}</td>
                                    <td class="text-center">{{ $booking->paid_amount }}</td>
                                    <td class="text-center">{{ $booking->booking_date }}</td>
                                    <td class="text-center">{{ $booking->booking_time }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('booking.edit', $booking->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="{{ route('booking.destroy', $booking->id) }}"
                                            class="btn btn-danger">Delete</a>
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
