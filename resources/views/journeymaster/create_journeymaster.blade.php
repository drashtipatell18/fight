@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">
                                {{ isset($journey) ? 'Edit Journey Master' : 'Add Journey Master' }}</h3>
                        </div>
                        <hr>
                        <form action="{{ isset($journey) ? '/journey/update/' . $journey->id : '/journey/insert' }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="from_city">From City</label>
                                <input type="text" class="form-control" id="from_city" name="from_city" value="{{ old('from_city', $journey->from_city ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="to_city">To City</label>
                                <input type="text" class="form-control" id="to_city" name="to_city" value="{{ old('to_city', $journey->to_city ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="plane_id">Plane Name</label>
                                <select class="form-control" id="plane_id" name="plane_id">
                                    <option value="">Select Plane Master</option>
                                    @foreach ($planes as $id => $name)
                                        <option value="{{ $id }}" {{ old('plane_id', $journey->plane_id ?? '') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $journey->price ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $journey->date ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="departure_datetime">Departure Datetime</label>
                                <input type="time" class="form-control" id="departure_datetime" name="departure_datetime" value="{{ old('departure_datetime', $journey->departure_datetime ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="arrival_datetime">Arrival Datetime</label>
                                <input type="time" class="form-control" id="arrival_datetime" name="arrival_datetime" value="{{ old('arrival_datetime', $journey->arrival_datetime ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="total_stop">Total Stop</label>
                                <input type="number" class="form-control" id="total_stop" name="total_stop" value="{{ old('total_stop', $journey->total_stop ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="stop_name">Stop Name</label>
                                <input type="text" class="form-control" id="stop_name" name="stop_name" value="{{ old('stop_name', $journey->stop_name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="stop_time">Stop Time</label>
                                <input type="time" class="form-control" id="stop_time" name="stop_time" value="{{ old('stop_time', $journey->stop_time ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="cabin_bag">Cabin Bag</label>
                                <input type="text" class="form-control" id="cabin_bag" name="cabin_bag" value="{{ old('cabin_bag', $journey->cabin_bag ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="checkin_bag">Checkin Bag</label>
                                <input type="text" class="form-control" id="checkin_bag" name="checkin_bag" value="{{ old('checkin_bag', $journey->checkin_bag ?? '') }}">
                            </div>

                            <div class="text-center"> <!-- Added div to center the button -->
                                <button type="submit" class="btn btn-primary">
                                    @if (isset($journey))
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
@section('script')
    <script>
        $(document).ready(function() {
            $('#departure_datetime').datetimepicker({
                format: 'Y-m-d H:i:s'
            });
            $('#arrival_datetime').datetimepicker({
                format: 'Y-m-d H:i:s'
            });

            $('#date').datetimepicker({
                format: 'Y-m-d'
            });
        });
    </script>
@endsection
