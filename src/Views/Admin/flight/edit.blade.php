@extends('layouts.master')

@section('title')
Cập nhật chuyến bay
@endsection

@section('content')
<h1>Cập nhật Chuyến bay</h1>

@if (!empty($_SESSION['errors']))
<div class="alert alert-warning">
    <ul>
        @foreach ($_SESSION['errors'] as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

    @php
    unset($_SESSION['errors']);
    @endphp
</div>
@endif

<form action="{{ url('admin/flights/' . $flight['id'] . '/update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3 mt-3">
        <label for="origin" class="form-label">Origin:</label>
        <input type="text" class="form-control" id="origin" name="origin" value="{{ $flight['Origin'] }}">
    </div>
    <div class="mb-3 mt-3">
        <label for="destination" class="form-label">Destination:</label>
        <input type="text" class="form-control" id="destination" name="destination" value="{{ $flight['Destination'] }}">
    </div>
    <div class="mb-3 mt-3">
        <label for="departure_date" class="form-label">Departure Date:</label>
        <input type="date" class="form-control" id="departure_date" name="departure_date" value="{{ $flight['DepartureDate'] }}">
    </div>
    <div class="mb-3 mt-3">
        <label for="departure_time" class="form-label">Departure Time:</label>
        <input type="time" class="form-control" id="departure_time" name="departure_time" value="{{ $flight['DepartureTime'] }}">
    </div>
    <div class="mb-3 mt-3">
        <label for="price" class="form-label">Price (VNĐ):</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $flight['Price'] }}">
    </div>
    <div class="mb-3 mt-3">
        <label for="category_id" class="form-label">Category:</label>
        <select class="form-control" id="category_id" name="category_id">
            @foreach($categories as $category)
            <option value="{{ $category['id'] }}">{{ $category['CategoryName'] }}</option>
            @endforeach
        </select>

    </div>
    <div class="mb-3 mt-3">
        <label for="description" class="form-label">Description:</label>
        <textarea class="form-control" id="description" name="description">{{ $flight['description'] }}</textarea>
    </div>
    <div class="mb-3 mt-3">
        <label for="image" class="form-label">Image:</label>
        <input type="file" class="form-control" id="image" name="image">
        @if (!empty($flight['img']))
        <img src="{{ asset($flight['img']) }}" alt="" width="100px" class="mt-2">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection