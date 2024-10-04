@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">
                                {{ isset($placetoroams) ? 'Edit PlaceToRoams' : 'Add PlaceToRoams' }}</h3>
                        </div>
                        <hr>
                        <form
                            action="{{ isset($placetoroams) ? '/placetoroam/update/' . $placetoroams->id : '/placetoroam/insert' }}"
                            method="POST" enctype="multipart/form-data" id="createplacetoroamform">
                            @csrf
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title', $placetoroams->title ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="popular_place_id">Popular Place</label>
                                <select class="form-control" id="popular_place_id" name="popular_place_id">
                                    <option value="">Select Popular Place</option>
                                    @foreach ($popularplaces as $key => $popularplace)
                                        <option value="{{ $popularplace->id ?? $key }}"
                                            {{ isset($placetoroams) && $placetoroams->popular_place_id == ($popularplace->id ?? $key) ? 'selected' : '' }}>
                                            {{ is_object($popularplace) ? $popularplace->name : $popularplace }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ old('description', $placetoroams->description ?? '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="text">Location</label>
                                <input type="location" class="form-control" id="location" name="location"
                                    value="{{ old('location', $placetoroams->location ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="exploration_time">Exploration Time</label>
                                <input type="time" class="form-control" id="exploration_time" name="exploration_time"
                                    value="{{ old('exploration_time', $placetoroams->exploration_time ?? '') }}">
                            </div>
                            @if (isset($placetoroams) && $placetoroams->image)
                                <img id="imagePreview" src="{{ asset('images/' . $placetoroams->image) }}"
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
                                    @if (isset($placetoroams))
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
            if (typeof $.fn.validate === 'undefined') {
                console.error("jQuery Validation plugin is not loaded.");
            } else {
                $("#createplacetoroamform").validate({
                    rules: {
                    title: {
                        required: true,
                    },
                    popular_place_id: {
                        required: true,
                    },
                    location: {
                        required: true,
                    },
                    exploration_time: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: "Please enter a title",
                    },
                    popular_place_id: {
                        required: "Please select a popular place",
                    },
                    location: {
                        required: "Please enter a location",
                    },
                    exploration_time: {
                        required: "Please enter a exploration time",
                    },
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass("is-invalid").addClass("is-valid");
                }
                });
            }
        });
    </script>
@endsection
