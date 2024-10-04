@extends('layouts.main')
@section('content')
<di class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">
                            {{ isset($bookingdetail) ? 'Edit Booking Detail' : 'Add Booking Detail' }}
                        </h3>
                    </div>
                    <hr>
                    <form action="{{ isset($bookingdetail) ? '/bookingdetail/update/' . $bookingdetail->id : '/bookingdetail/insert' }}"
                        method="POST" enctype="multipart/form-data" id="createBookingDetailForm">
                        @csrf
                        <div class="form-group">
                            <label for="booking_id">Booking ID</label>
                            <select class="form-control" id="booking_id" name="booking_id">
                                @foreach($bookingmasters as $id => $stop_name)
                                <option value="">Select Booking</option>
                                <option value="{{ $id }}" {{ (old('booking_id')==$id || (isset($bookingdetail) && $bookingdetail->
                                    booking_id == $id)) ? 'selected' : '' }}>
                                    {{ $stop_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $bookingdetail->first_name ?? '') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $bookingdetail->last_name ?? '') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">Select Gender</option>
                                <option value="male" {{ (old('gender')=='male' || (isset($bookingdetail) && $bookingdetail->gender=='male')) ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ (old('gender')=='female' || (isset($bookingdetail) && $bookingdetail->gender=='female')) ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" id="dob" value="{{ old('dob', $bookingdetail->dob ?? '') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" id="country" value="{{ old('country', $bookingdetail->country ?? '') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="mobile_no">Mobile No</label>
                            <input type="number" name="mobile_no" id="mobile_no" value="{{ old('mobile_no', $bookingdetail->mobile_no ?? '') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="alternate_mobile_no">Alternate Mobile No</label>
                            <input type="number" name="alternate_mobile_no" id="alternate_mobile_no" value="{{ old('alternate_mobile_no', $bookingdetail->alternate_mobile_no ?? '') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email1">Email 1</label>
                            <input type="email" name="email1" id="email1" value="{{ old('email1', $bookingdetail->email1 ?? '') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email2">Email 2</label>
                            <input type="email" name="email2" id="email2" value="{{ old('email2', $bookingdetail->email2 ?? '') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" value="{{ old('address', $bookingdetail->address ?? '') }}" class="form-control">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                @if (isset($bookingdetail))
                                    Update
                                @else
                                    Save
                                @endif
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#createBookingDetailForm').validate({
            rules: {
                booking_id: {
                    required: true,
                },
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                gender: {
                    required: true,
                },
                dob: {
                    required: true,
                },
                country: {
                    required: true,
                },
                mobile_no: {
                    required: true,
                },  
                email1: {
                    required: true,
                },
                email2: {
                    required: true,
                },
            },
            messages: {
                booking_id: {
                    required: "Please select a booking",
                },
                first_name: {
                    required: "Please enter a first name",
                },
                last_name: {
                    required: "Please enter a last name",
                },
                gender: {
                    required: "Please select a gender",
                },
                dob: {
                    required: "Please enter a date of birth",
                },
                country: {
                    required: "Please enter a country",
                },
                mobile_no: {
                    required: "Please enter a mobile number",
                },
                email1: {
                    required: "Please enter an email address",
                },
                email2: {
                    required: "Please enter an email address",
                },

            },
            errorElement: 'div',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass('is-valid').removeClass('is-invalid');
            }

        });

    });
</script>
@endsection

