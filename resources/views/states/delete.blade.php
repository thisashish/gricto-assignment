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
            <h1>Delete State</h1>
            <p>Are you sure you want to delete the state "{{ $state->name }}"?</p>
            <form method="POST" action="{{ route('states.destroy', $state->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                <a href="{{ route('states.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    @endsection
    
</body>
</html>    