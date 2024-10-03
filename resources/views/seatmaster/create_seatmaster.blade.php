@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">
                                {{ isset($seatmaster) ? 'Edit Seat Master' : 'Add Seat Master' }}</h3>
                        </div>
                        <hr>
                        <form action="{{ isset($seatmaster) ? '/seatmaster/update/' . $seatmaster->id : '/seatmaster/insert' }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="plane_id">Plane Name</label>
                                <select class="form-control" id="plane_id" name="plane_id">
                                    <option value="">Select Plane Master</option>
                                    @foreach ($planes as $id => $name)
                                        <option value="{{ $id }}" {{ old('plane_id', $seatmaster->plane_id ?? '') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="seat_number">Seat Number</label>
                                <input type="text" class="form-control" id="seat_number" name="seat_number" value="{{ old('seat_number', $seatmaster->seat_number ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="seat_type">Seat Type</label>
                                <input type="text" class="form-control" id="seat_type" name="seat_type" value="{{ old('seat_type', $seatmaster->seat_type ?? '') }}">
                            </div>
                            <div class="form-group">
                                <div class="form-check"style="padding-left: 0px !important;">
                                    <label for="is_window" class="form-check-label">Is Window</label>
                                    <input type="checkbox" class="form-check-input" id="is_window" name="is_window" value="1" {{ old('is_window', $seatmaster->is_window ?? 0) ? 'checked' : '' }} style="margin-left: 20px;">
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="seat_status">Seat Status</label>
                                <input type="text" class="form-control" id="seat_status" name="seat_status" value="{{ old('seat_status', $seatmaster->seat_status ?? '') }}">
                            </div> --}}
                            <div class="form-group">
                                <label for="seat_price">Seat Price</label>
                                <input type="number" class="form-control" id="seat_price" name="seat_price" value="{{ old('seat_price', $seatmaster->seat_price ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="price_incrementer">Price Incrementer</label>
                                <input type="text" class="form-control" id="price_incrementer" name="price_incrementer" value="{{ old('price_incrementer', $seatmaster->price_incrementer ?? '') }}">
                            </div>
                            <div class="text-center"> <!-- Added div to center the button -->
                                <button type="submit" class="btn btn-primary">
                                    @if (isset($seatmaster))
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
@endsection

