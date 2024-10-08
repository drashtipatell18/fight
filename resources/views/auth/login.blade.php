@extends('layouts.app')

@section('content')

<body>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="booking-form">
                        <h3 class="text-center mb-3" style="color: #98c9ee;">Login</h3>
                        <hr>
                        <form id="loginForm" action="{{ route('loginstore') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <span class="form-label">Phone Number</span>
                                    <input class="form-control" type="tel" name="phone" placeholder="Enter your mobile number">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="submit-btn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#loginForm").validate({
                rules: {
                    phone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                    }
                },
                messages: {
                    phone: {
                        required: "Please enter your phone number",
                        digits: "Please enter a valid phone number",
                        minlength: "Your phone number must be at least 10 digits",
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
        });
    </script>
</body>
@endsection
