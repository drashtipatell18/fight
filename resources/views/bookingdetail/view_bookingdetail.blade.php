@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Booking Detail List</h4>
                    <div class="table-responsive">
                        <div class="text-right mb-3"> <!-- Aligns the button to the right -->
                            <a href="{{ route('bookingdetail.create') }}" class="btn btn-primary">Add Booking Detail</a>
                        </div>
                        <table class="table table-striped table-bordered zero-configuration" id="userTable">
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Date of Birth</th>
                                    <th>Country</th>
                                    <th>Mobile No</th>
                                    <th>Alternate Mobile No</th>
                                    <th>Email 1</th>
                                    <th>Email 2</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookingdetails as $bookingdetail)
                                    <tr>
                                        <td>{{ $bookingdetail->booking_id }}</td>
                                        <td>{{ $bookingdetail->first_name }}</td>
                                        <td>{{ $bookingdetail->last_name }}</td>
                                        <td>{{ $bookingdetail->dob }}</td>
                                        <td>{{ $bookingdetail->country }}</td>
                                        <td>{{ $bookingdetail->mobile_no }}</td>
                                        <td>{{ $bookingdetail->alternate_mobile_no }}</td>
                                        <td>{{ $bookingdetail->email1 }}</td>
                                        <td>{{ $bookingdetail->email2 }}</td>
                                        <td>{{ $bookingdetail->gender }}</td>
                                        <td>
                                            <a href="{{ route('bookingdetail.edit', $bookingdetail->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('bookingdetail.destroy', $bookingdetail->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ?');">Delete</a>

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
