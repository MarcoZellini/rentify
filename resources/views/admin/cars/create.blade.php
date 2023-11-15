@extends('layouts.admin')

@section('content')
    <h1>Add a New Car</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <div>
                    <strong>Error!</strong> {{ $error }}
                </div>
            @endforeach
        </div>
    @endif


    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" name="brand" id="brand" aria-describedby="helpBrand"
                placeholder="Select a car brand" value="{{ old('brand') }}">
            <small id="helpBrand" class="form-text text-muted">Select a new Brand</small>
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control" name="model" id="model" aria-describedby="helpModel"
                placeholder="Select a car model" value="{{ old('model') }}">
            <small id="helpModel" class="form-text text-muted">Select a new Model</small>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Choose Image</label>
            <input type="file" class="form-control" name="image" id="image" placeholder="Select a Car Image"
                aria-describedby="fileHelpImage">
            <div id="fileHelpImage" class="form-text">Select a car Image</div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" id="price" aria-describedby="helpPrice"
                placeholder="Select a car Price" value="{{ old('price') }}">
            <small id="helpPrice" class="form-text text-muted">Add a new Price</small>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Car Notes</label>
            <textarea class="form-control" name="notes" id="notes" rows="4" placeholder="Select car notes">{{ old('notes') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="transmission" class="form-label">Transmission</label>
            <select class="form-select form-select" name="transmission" id="transmission">
                <option selected disabled>Select one</option>
                <option value="manual" {{ old('transmission') === 'manual' ? 'selected' : '' }}>Manual</option>
                <option value="automatic" {{ old('transmission') === 'automatic' ? 'selected' : '' }}>Automatic</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="fuel_type" class="form-label">Fuel Type</label>
            <select class="form-select form-select" name="fuel_type" id="fuel_type">
                <option selected disabled>Select one</option>
                <option value="petrol" {{ old('transmission') === 'petrol' ? 'selected' : '' }}>Petrol</option>
                <option value="diesel" {{ old('transmission') === 'diesel' ? 'selected' : '' }}>Diesel</option>
                <option value="electric" {{ old('transmission') === 'electric' ? 'selected' : '' }}>Electric</option>
                <option value="gpl" {{ old('transmission') === 'gpl' ? 'selected' : '' }}>GPL</option>
                <option value="hybrid" {{ old('transmission') === 'hybrid' ? 'selected' : '' }}>Hybrid</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="seats" class="form-label">Seats</label>
            <div class="d-flex align-items-center">
                <div>2</div>
                <input type="range" min="2" max="7" class="form-control mx-3" name="seats" id="seats"
                    aria-describedby="helpSeats" placeholder="Select a car seat number" value="{{ old('brand') }}">
                <div>7</div>
            </div>
            <small id="helpSeats" class="form-text text-muted">Select a car seat number</small>
        </div>
        <button type="submit" class="btn btn-primary">Add a new Car</button>
    </form>
@endsection
