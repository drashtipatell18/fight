@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">{{ isset($users) ? 'Edit User' : 'Add User' }}</h3>
                    </div>
                    <hr>
                    <form action="{{ isset($users) ? '/user/update/' . $users->id : '/user/insert' }}" method="POST"
                        enctype="multipart/form-data" id="createuserform">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $users->name ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" class="form-control" id="phone" name="phone"
                                value="{{ old('phone', $users->phone ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $users->email ?? '') }}">
                        </div>
                        @if (!isset($users))
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    value="{{ old('password', $users->password ?? '') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                        <i class="fa fa-eye"></i> <!-- Font Awesome icon -->
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="role_id" class="control-label mb-1">Role</label>
                            <select id="role_id" name="role_id" class="form-control">
                                <!-- Fixed class attribute -->
                                <option value="">Select Role</option>
                                @foreach ($roles as $id => $name)
                                <option value="{{ $id }}" @if (old('role_id', isset($users->role_id) ? $users->role_id :
                                    '') == $id) selected @endif>
                                    {{ $name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob"
                                value="{{ old('dob', $users->dob ?? '') }}">
                        </div>
                        <!-- Gender -->
                        <div class="form-group">
                            <label class="control-label mb-1">Gender</label>
                            <div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="gender_male" name="gender"
                                        value="male" @if (old('gender', $users->gender ?? '') == 'male') checked @endif>
                                    <label class="form-check-label" for="gender_male"
                                        style="margin-right: 32px;">Male</label> <!-- Added margin -->

                                    <input type="radio" class="form-check-input" id="gender_female" name="gender"
                                        value="female" @if (old('gender', $users->gender ?? '') == 'female') checked
                                    @endif>
                                    <label class="form-check-label" for="gender_female"
                                        style="margin-right: 32px;">Female</label> <!-- Added margin -->
                                </div>
                            </div>
                        </div>
                        @if (isset($users) && $users->image)
                        <img id="imagePreview" src="{{ asset('images/' . $users->image) }}" alt="Image Preview"
                            style="max-width: 20%; margin-top: 10px;">
                        @else
                        <img id="imagePreview" src="#" alt="Image Preview"
                            style="display:none; max-width: 100%; margin-top: 10px;">
                        @endif
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <div class="text-center">
                            <!-- Added div to center the button -->
                            <button type="submit" class="btn btn-primary">
                                @if (isset($users))
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

            // Custom validation methods
            $.validator.addMethod("customEmail", function(value, element) {
                return this.optional(element) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(value);
            }, "Please enter a valid email address");

            $.validator.addMethod("customPhone", function(value, element) {
                return this.optional(element) || /^[0-9]{10}$/.test(value);
            }, "Please enter a valid 10-digit phone number.");

            $.validator.addMethod("passwordFormat", function(value, element) {
                var result = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.,-])[A-Za-z\d@$!%*?&.,-]{8,}$/.test(value);
                console.log("Password:", value, "Validation result:", result);
                return this.optional(element) || result;
            }, "The password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, a number, and a special character such as @$!%*?&.,-.");

            if (typeof $.fn.validate === 'undefined') {
                console.error("jQuery Validation plugin is not loaded.");
            } else {
                console.log("jQuery Validation plugin is loaded.");
                $("#createuserform").validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        email: {
                            required: true,
                            customEmail: true
                        },
                        phone: {
                            required: true,
                            digits: true,
                            customPhone: true
                        },
                        password: {
                            required: true,
                            minlength: 8,
                            passwordFormat: true
                        },
                        role_id: {
                            required: true,
                        },
                        gender: {
                            required: true,
                        },
                        dob: {
                            required: true,
                        },
                    },
                    messages: {
                        name: "Please enter the name",
                        email: {
                            required: "Please enter the email",
                            email: "Please enter a valid email",
                            unique: "The email is already in use",
                        },
                        phone: {
                            required: "Please enter the phone number",
                            digits: "Please enter only numbers"
                        },
                        password: {
                            required: "Please enter the password",
                            minlength: "The password must be at least 8 characters long"
                        },
                        role_id: {
                            required: "Please select a role",
                        },
                        gender: {
                            required: "Please select a gender",
                        },
                        dob: {
                            required: "Please enter the date of birth",
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
                    } else {
                        $('#imagePreview').hide();
                    }
                });
            }
            $('#togglePassword').click(function() {
                const passwordField = $('#password');
                const passwordFieldType = passwordField.attr('type');
                const icon = $(this).find('i');

                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordField.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
</script>
@endsection
