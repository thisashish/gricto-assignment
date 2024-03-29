<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title Here</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Other CSS files if any -->
</head>
<body>
    @extends('layouts.app')

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Verify OTP') }}</div>
    
                        <div class="card-body">
                            <form method="POST" action="{{ route('verify-otp') }}">
                                @csrf
    
                                <div class="mb-3">
                                    <label for="otp" class="form-label">{{ __('OTP') }}</label>
                                    <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" required autofocus>
                                    @error('otp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
    
                                <!-- Display OTP -->
                                <div class="mb-3">
                                    <label for="display_otp" class="form-label">{{ __('OTP') }}</label>
                                    <input id="display_otp" type="text" class="form-control" value="{{ $otp ?? '' }}" readonly>
                                </div>
    
                                <button type="submit" class="btn btn-primary">{{ __('Verify OTP') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>    





