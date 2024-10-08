@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">
                            {{ isset($bookings) ? 'Edit Booking Master' : 'Add Booking Master' }}</h3>
                    </div>
                    <hr>
                    <form action="{{ isset($bookings) ? '/booking/update/' . $bookings->id : '/booking/insert' }}"
                        method="POST" enctype="multipart/form-data" id="createBookingForm">
                        @csrf
                        <div class="form-group">
                            <label for="journey_id">Journey ID</label>
                            <select class="form-control" id="journey_id" name="journey_id">
                                @foreach($journeys as $id => $stop_name)
                                <option value="">Select Journey</option>
                                <!-- Loop through journeys -->
                                <option value="{{ $id }}" {{ (old('journey_id')==$id || (isset($bookings) && $bookings->
                                    journey_id == $id)) ? 'selected' : '' }}>
                                    {{ $stop_name }}
                                    <!-- Display journey name -->
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input type="number" class="form-control" id="total_amount" name="total_amount"
                                value="{{ old('total_amount', $bookings->total_amount ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" class="form-control" id="discount" name="discount"
                                value="{{ old('discount', $bookings->discount ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="paid_amount">Paid Amount</label>
                            <input type="number" class="form-control" id="paid_amount" name="paid_amount"
                                value="{{ old('paid_amount', $bookings->paid_amount ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="booking_date">Booking Date</label>
                            <input type="date" class="form-control" id="booking_date" name="booking_date"
                                value="{{ old('booking_date', $bookings->booking_date ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="booking_time">Booking Time</label>
                            <input type="time" class="form-control" id="booking_time" name="booking_time"
                                value="{{ old('booking_time', $bookings->booking_time ?? '') }}">
                        </div>
                        <div class="text-center">
                            <!-- Added div to center the button -->
                            <button type="submit" class="btn btn-primary">
                                @if (isset($bookings))
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
        $("#createBookingForm").validate({
            rules: {
                journey_id: {
                    required: true,
                },
                total_amount: {
                    required: true,
                },
                discount: {
                    required: true,
                },
                paid_amount: {
                    required: true,
                },
                booking_date: {
                    required: true,
                },
                booking_time: {
                    required: true,
                },
            },
            messages: {
                journey_id: {
                    required: "Please select a journey",
                },
                total_amount: {
                    required: "Please enter a total amount",
                },
                discount: {
                    required: "Please enter a discount",
                },
                paid_amount: {
                    required: "Please enter a paid amount",
                },
                booking_date: {
                    required: "Please enter a booking date",
                },
                booking_time: {
                    required: "Please enter a booking time",
                },
            },
            errorElement: 'div',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                error.insertAfter(element);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass('is-valid').removeClass('is-invalid');
            }
        });
    });
</script>
@endsection
