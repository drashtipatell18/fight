@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">{{ isset($popularplaces) ? 'Edit Popular Place' : 'Add Popular Place' }}</h3>
                        </div>
                        <hr>
                        <form action="{{ isset($popularplaces) ? '/popularplace/update/' . $popularplaces->id : '/popularplace/insert' }}" method="POST"
                            enctype="multipart/form-data" id="createpopularplaceform">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $popularplaces->name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ old('description', $popularplaces->description ?? '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="banner_text">Banner Text</label>
                                <input type="text" class="form-control" id="banner_text" name="banner_text"
                                    value="{{ old('banner_text', $popularplaces->banner_text ?? '') }}">
                            </div>
                            @if (isset($popularplaces) && $popularplaces->image)
                                <img id="imagePreview" src="{{ asset('images/' . $popularplaces->image) }}" alt="Image Preview"
                                    style="max-width: 20%; margin-top: 10px;">
                            @else
                                <img id="imagePreview" src="#" alt="Image Preview"
                                    style="display:none; max-width: 100%; margin-top: 10px;">
                            @endif
                            <div class="form-group">
                                <label for="photo">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>
                             @if (isset($popularplaces) && $popularplaces->banner_image)
                                <img id="imagePreview" src="{{ asset('images/' . $popularplaces->banner_image) }}" alt="Image Preview"
                                    style="max-width: 20%; margin-top: 10px;">
                            @else
                                <img id="imagePreview" src="#" alt="Image Preview"
                                    style="display:none; max-width: 100%; margin-top: 10px;">
                            @endif
                            <div class="form-group">
                                <label for="photo">Banner Image</label>
                                <input type="file" class="form-control" id="banner_image" name="banner_image" accept="image/*">
                            </div>
                            <div class="text-center"> <!-- Added div to center the button -->
                                <button type="submit" class="btn btn-primary">
                                    @if (isset($popularplaces))
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
                console.log("jQuery Validation plugin is loaded.");
                $("#createpopularplaceform").validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        banner_text: {
                            required: true,
                        },
                    },
                    messages: {
                        name: {
                            required: "Please enter a name",
                        },

                        banner_text: {
                            required: "Please enter a banner text",
                        },
                    },
                    errorElement: "span",
                    errorPlacement: function(error, element) {
                        if (element.attr("type") === "radio") {
                            error.appendTo(element.closest('.form-group'));
                        } else {
                            error.addClass("invalid-feedback");
                            element.closest(".form-group").append(error);
                        }
                    },
                    highlight: function(element, errorClass, validClass) {
                        if (element.type === "radio") {
                            $(element).closest('.form-group').find('input[type="radio"]').addClass("is-invalid");
                        } else {
                            $(element).addClass("is-invalid").removeClass("is-valid");
                        }
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        if (element.type === "radio") {
                            $(element).closest('.form-group').find('input[type="radio"]').removeClass("is-invalid");
                        } else {
                            $(element).removeClass("is-invalid").addClass("is-valid");
                        }
                    }
                });

                $('#image').change(function() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            $('#imagePreview').attr('src', e.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });


            }
        });

    </script>
@endsection
