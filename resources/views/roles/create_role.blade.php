@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">{{ isset($roles) ? 'Edit Role' : 'Add Role' }}</h3>
                        </div>
                        <hr>
                        <form action="{{ isset($roles) ? '/role/update/' . $roles->id : '/role/insert' }}" method="POST"
                            id="createroleform">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $roles->name ?? '') }}">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    @if (isset($roles))
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
                $("#createroleform").validate({
                    rules: {
                        name: {
                            required: true,
                        }
                    },
                    messages: {
                        name: {
                            required: "Please enter a role name",
                        }
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
            }

            console.log("Validation initialized.");
        });
    </script>
@endsection

