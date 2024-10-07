@extends('layouts.app')

@section('content')

<body>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="booking-form">
                        <h3 class="text-center mb-3" style="color: #98c9ee;">OTP Verification</h3>
                        <hr>
                        <form action="{{ route('verifyOtp') }}" method="POST" id="otpForm">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <span class="form-label">OTP</span>
                                    <input class="form-control" type="tel" placeholder="Enter your OTP" name="otp">
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="submit-btn">Verify</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#otpForm").validate({
                rules: {
                    otp: {
                        required: true,
                        digits: true,
                    }
                },
                messages: {
                    otp: {
                        required: "Please enter your OTP",
                        digits: "Please enter a valid OTP",
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
