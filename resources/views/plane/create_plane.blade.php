@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">
                                {{ isset($plane) ? 'Edit Plane' : 'Add Plane' }}</h3>
                        </div>
                        <hr>
                        <form action="{{ isset($plane) ? '/planemaster/update/' . $plane->id : '/planemaster/insert' }}" method="POST" enctype="multipart/form-data" id="createPlaneForm">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $plane->name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $plane->company_name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <div class="form-check"style="padding-left: 0px !important;">
                                    <label for="food_facility" class="form-check-label">Food Facility</label>
                                    <input type="checkbox" class="form-check-input" id="food_facility" name="food_facility" value="1" {{ old('food_facility', $plane->food_facility ?? 0) ? 'checked' : '' }} style="margin-left: 20px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total_seat">Total Seat</label>
                                <input type="number" class="form-control" id="total_seat" name="total_seat" value="{{ old('total_seat', $plane->total_seat ?? '') }}">
                            </div>
                            @if (isset($plane) && $plane->image)
                                <img id="imagePreview" src="{{ asset('images/' . $plane->image) }}" alt="Image Preview"
                                    style="max-width: 20%; margin-top: 10px;">
                            @else
                                <img id="imagePreview" src="#" alt="Image Preview"
                                    style="display:none; max-width: 100%; margin-top: 10px;">
                            @endif
                            <div class="form-group">
                                <label for="photo">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>
                            <div class="text-center"> <!-- Added div to center the button -->
                                <button type="submit" class="btn btn-primary">
                                    @if (isset($plane))
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
            $("#createPlaneForm").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    company_name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter a name",
                    },
                    company_name: {
                        required: "Please enter a company name",
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
