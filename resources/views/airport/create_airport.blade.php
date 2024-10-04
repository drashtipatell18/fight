@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">
                                {{ isset($airports) ? 'Edit AirPorts' : 'Add AirPorts' }}</h3>
                        </div>
                        <hr>
                        <form
                            action="{{ isset($airports) ? '/airport/update/' . $airports->id : '/airport/insert' }}"
                            method="POST" enctype="multipart/form-data" id="createairportform">
                            @csrf
                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $airports->name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ old('description', $airports->description ?? '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="text">City</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    value="{{ old('city', $airports->city ?? '') }}">
                            </div>
                            @if (isset($airports) && $airports->image)
                                <img id="imagePreview" src="{{ asset('images/' . $airports->image) }}"
                                    alt="Image Preview" style="max-width: 20%; margin-top: 10px;">
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
                                    @if (isset($airports))
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
            console.log("Document ready, initializing validation...");

            if (typeof $.fn.validate === 'undefined') {
                console.error("jQuery Validation plugin is not loaded.");
            } else {
                $("#createairportform").validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        city: {
                            required: true,
                        },
                    },
                    messages: {
                        name: {
                            required: "Please enter a name",
                        },
                        city: {
                            required: "Please enter a city",
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
                        $(element).removeClass('is-invalid').addClass('is-valid');
                    }
                });
            }
        });
    </script>
@endsection
