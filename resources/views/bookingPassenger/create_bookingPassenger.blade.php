@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">
                            {{ isset($bookingPassenger) ? 'Edit Booking Passenger' : 'Add Booking Passenger' }}
                        </h3>
                    </div>
                    <hr>
                    <form action="{{ isset($bookingPassenger) ? '/bookingpassenger/update/' . $bookingPassenger->id : '/bookingpassenger/insert' }}"
                        method="POST" enctype="multipart/form-data" id="createBookingPassengerForm">
                        @csrf
                        <div class="form-group">
                            <label for="booking_id">Booking ID</label>
                            <select class="form-control" id="booking_id" name="booking_id">
                                @foreach($bookingMasters as $id => $stop_name)
                                <option value="">Select Booking</option>
                                <option value="{{ $id }}" {{ (old('booking_id')==$id || (isset($bookingPassenger) && $bookingPassenger->
                                    booking_id == $id)) ? 'selected' : '' }}>
                                    {{ $stop_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="booking_detail_id">Booking Detail ID</label>
                            <select class="form-control" id="booking_detail_id" name="booking_detail_id">
                                @foreach($bookingDetails as $id => $stop_name)
                                <option value="">Select Booking Detail</option>
                                <option value="{{ $id }}" {{ (old('booking_detail_id')==$id || (isset($bookingPassenger) && $bookingPassenger->
                                    booking_detail_id == $id)) ? 'selected' : '' }}>
                                    {{ $stop_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="seat_id">Seat ID</label>
                            <select class="form-control" id="seat_id" name="seat_id">
                                <option value="">Select Seat</option>
                                @foreach($seatMasters as $id => $stop_name)
                                <option value="{{ $id }}" {{ (old('seat_id')==$id || (isset($bookingPassenger) && $bookingPassenger->
                                    seat_id == $id)) ? 'selected' : '' }}>
                                    {{ $stop_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="meal_id">Meal ID</label>
                            <select class="form-control" id="meal_id" name="meal_id">
                                @foreach($mealMasters as $id => $stop_name)
                                <option value="">Select Meal</option>
                                <option value="{{ $id }}" {{ (old('meal_id')==$id || (isset($bookingPassenger) && $bookingPassenger->
                                    meal_id == $id)) ? 'selected' : '' }}>
                                    {{ $stop_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">Select Status</option>
                                <option value="booked" {{ (old('status')=='booked') ? 'selected' : '' }}>Booked</option>
                                <option value="cancelled" {{ (old('status')=='cancelled') ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                @if (isset($bookingPassenger))
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
        $('#createBookingPassengerForm').validate({
            rules: {
                booking_id: {
                    required: true,
                },
                booking_detail_id: {
                    required: true,
                },
                seat_id: {
                    required: true,
                },
                meal_id: {
                    required: true,
                },
                price: {
                    required: true,
                },
                status: {
                    required: true,
                },
            },
            messages: {
                booking_id: {
                    required: "Please select a booking",
                },
                booking_detail_id: {
                    required: "Please select a booking detail",
                },
                seat_id: {
                    required: "Please select a seat",
                },
                meal_id: {
                    required: "Please select a meal",
                },
                price: {
                    required: "Please enter a price",
                },
                status: {
                    required: "Please select a status",
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

