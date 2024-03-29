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
            <h1>Edit State</h1>
            <form method="POST" action="{{ route('states.update', $state->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">State Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $state->name }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update State</button>
            </form>
        </div>
    @endsection
    
</body>
</html>    