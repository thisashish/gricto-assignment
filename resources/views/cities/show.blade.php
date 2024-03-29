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
            <h2>City Details</h2>
            <ul>
                <li>ID: {{ $city->id }}</li>
                <li>Name: {{ $city->name }}</li>
                <li>State: {{ $city->state->name }}</li>
            </ul>
        </div>
    @endsection
    
</body>
</html>    