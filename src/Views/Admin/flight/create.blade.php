@extends('layouts.master')

@section('title')
Thêm mới chuyến bay
@endsection

@section('content')
<h1>Thêm mới Chuyến bay</h1>

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


<form action="{{ url('admin/flights/store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 mt-3">
        <label for="origin" class="form-label">Origin:</label>
        <input type="text" class="form-control" id="origin" placeholder="Enter origin" name="origin">
    </div>
    <div class="mb-3 mt-3">
        <label for="destination" class="form-label">Destination:</label>
        <input type="text" class="form-control" id="destination" placeholder="Enter destination" name="destination">
    </div>
    <div class="mb-3 mt-3">
        <label for="departure_date" class="form-label">Departure Date:</label>
        <input type="date" class="form-control" id="departure_date" name="departure_date">
    </div>
    <div class="mb-3 mt-3">
        <label for="departure_time" class="form-label">Departure Time:</label>
        <input type="time" class="form-control" id="departure_time" name="departure_time">
    </div>
    <div class="mb-3 mt-3">
        <label for="price" class="form-label">Price (VNĐ):</label>
        <input type="number" class="form-control" id="price" placeholder="Enter price" name="price">
    </div>
    <div class="mb-3 mt-3">
        <label for="category" class="form-label">Category:</label>
        <select class="form-control" id="category_id" name="category_id">
            @foreach($categories as $category)
            <option value="{{ $category['id'] }}">{{ $category['CategoryName'] }}</option>
            @endforeach
        </select>

    </div>
    <div class="mb-3 mt-3">
        <label for="description" class="form-label">Description:</label>
        <textarea class="form-control" id="description" placeholder="Enter description" name="description"></textarea>
    </div>
    <div class="mb-3 mt-3">
        <label for="image" class="form-label">Image:</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection