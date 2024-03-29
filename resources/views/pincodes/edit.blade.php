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
<!-- resources/views/pincodes/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Pincode
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pincodes.update', $pincode->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="code">Pincode:</label>
                                <input type="text" name="code" class="form-control" value="{{ $pincode->code }}" required>
                            </div>
                            <div class="form-group">
                                <label for="city_id">City:</label>
                                <select name="city_id" class="form-control" required>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" @if($city->id == $pincode->city_id) selected @endif>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Pincode</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

</body>
</html>    