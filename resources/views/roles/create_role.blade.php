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
                            >
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $roles->name ?? '') }}">
                            </div>
                            <div class="text-center"> <!-- Added div to center the button -->
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $.validator.addMethod("passwordFormat", function(value, element) {
                    var result = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.,-])[A-Za-z\d@$!%*?&.,-]{8,}$/
                        .test(value);
                    console.log("Password:", value, "Validation result:", result);
                    return this.optional(element) || result;
                },
                "The password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, a number, and a special character such as @$!%*?&.,-."
            );

            $.validator.addMethod("customEmail", function(value, element) {
                return this.optional(element) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(value);
            }, "Please enter a valid email address");

            $.validator.addMethod("customPhone", function(value, element) {
                return this.optional(element) || /^[0-9]{9}$/.test(value);
            }, "Please enter at least 9 characters.");

            // Initialize jQuery Validation plugin on the form
            $('#createuserform').validate({
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        customEmail: true
                    },
                    phone: {
                        required: true,
                        digits: true,
                        customPhone: true
                    },
                    // employee: "required",
                    password: {
                        required: true,
                        minlength: 8, // Adjusted minlength to 8 characters
                        passwordFormat: true // Apply custom passwordFormat rule
                    }
                },
                messages: {
                    name: "Por favor, ingrese el nombre",
                    email: {
                        required: "Por favor, ingrese el correo",
                        email: "Por favor, ingrese un correo válido",
                        unique: 'El correo electrónico ya está en uso.',

                    },
                    phone: {
                        required: "Por favor, ingrese el teléfono",
                        digits: "Por favor, ingrese solo números"
                    },
                    password: {
                        required: "Por favor, ingrese la contraseña",
                        minlength: "La contraseña debe tener al menos 8 caracteres" // Updated minlength message
                    }
                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    console.log("Error for element:", element.attr("name"), "Message:", error.text());
                    error.addClass("invalid-feedback");
                    element.closest(".form-group").append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass("is-invalid").addClass("is-valid");
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
                } else {
                    $('#imagePreview').hide();
                }
            });
        });
    </script>
@endsection
