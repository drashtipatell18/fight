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
                        <h4 class="card-title">Journey Master List</h4>
                        <div class="table-responsive">
                            <div class="text-right mb-3"> <!-- Aligns the button to the right -->
                                <a href="{{ route('journey.create') }}" class="btn btn-primary">Add Journey Master</a>
                            </div>
                            <table class="table table-striped table-bordered zero-configuration" id="userTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">From City</th>
                                        <th class="text-center">To City</th>
                                        <th class="text-center">Plane ID</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Departure Datetime</th>
                                        <th class="text-center">Arrival Datetime</th>
                                        <th class="text-center">Total Stop</th>
                                        <th class="text-center">Stop Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($journeymasters as $journeymaster)
                                        <tr>
                                            <td class="text-center">{{ $journeymaster->from_city }}</td>
                                            <td class="text-center">{{ $journeymaster->to_city }}</td>
                                            <td class="text-center">{{ $journeymaster->plane_id }}</td>
                                            <td class="text-center">{{ $journeymaster->price }}</td>
                                            <td class="text-center">{{ $journeymaster->date }}</td>
                                            <td class="text-center">{{ $journeymaster->departure_datetime }}</td>
                                            <td class="text-center">{{ $journeymaster->arrival_datetime }}</td>
                                            <td class="text-center">{{ $journeymaster->total_stop }}</td>
                                            <td class="text-center">{{ $journeymaster->stop_name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('journey.edit', $journeymaster->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ route('journey.destroy', $journeymaster->id) }}" class="btn btn-danger">Delete</a>
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
@section('script')
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
        setTimeout(function() {
                $(".alert-success").fadeOut(1000);
            }, 1000);
            setTimeout(function() {
                $(".alert-danger").fadeOut(1000);
            }, 1000);
    </script>
@endsection
