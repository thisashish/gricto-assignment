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
<!-- resources/views/pincodes/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add Pincode
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pincodes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="code">Pincode:</label>
                                <input type="text" name="code" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="city_id">City:</label>
                                <select name="city_id" class="form-control" required>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Pincode</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

</body>
</html>    