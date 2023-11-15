@extends('layouts.admin')

@section('content')
    <h1>Edit Car n. # {{ $car->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <div>
                    <strong>Error!</strong> {{ $error }}
                </div>
            @endforeach
        </div>
    @endif


    <form action="{{ route('admin.cars.update', $car) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" name="brand" id="brand" aria-describedby="helpBrand"
                placeholder="Edit car brand" value="{{ old('brand', $car->brand) }}">
            <small id="helpBrand" class="form-text text-muted">Edit Car Brand</small>
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control" name="model" id="model" aria-describedby="helpModel"
                placeholder="Edit car Model" value="{{ old('model', $car->model) }}">
            <small id="helpModel" class="form-text text-muted">Edit Car Model</small>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Edit Image</label>
            <input type="file" class="form-control" name="image" id="image" placeholder="Edit Car Image"
                aria-describedby="fileHelpImage">
            <div id="fileHelpImage" class="form-text">Edit Car Image</div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" id="price" aria-describedby="helpPrice"
                placeholder="Edit car Price" value="{{ old('price', $car->price) }}">
            <small id="helpPrice" class="form-text text-muted">Edit Car Price</small>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Car Notes</label>
            <textarea class="form-control" name="notes" id="notes" rows="4" placeholder="Edit Car notes">{{ old('notes', $car->notes) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="transmission" class="form-label">Transmission</label>
            <select class="form-select form-select" name="transmission" id="transmission">
                <option selected disabled>Select one</option>
                <option value="manual" {{ old('transmission', $car->transmission) === 'manual' ? 'selected' : '' }}>Manual
                </option>
                <option value="automatic" {{ old('transmission', $car->transmission) === 'automatic' ? 'selected' : '' }}>
                    Automatic</option>
            </select>
            <small id="helpPrice" class="form-text text-muted">Edit Car Transmission</small>
        </div>
        <div class="mb-3">
            <label for="fuel_type" class="form-label">Fuel Type</label>
            <select class="form-select form-select" name="fuel_type" id="fuel_type">
                <option selected disabled>Select one</option>
                <option value="petrol" {{ old('fuel_type', $car->fuel_type) === 'petrol' ? 'selected' : '' }}>Petrol
                </option>
                <option value="diesel" {{ old('fuel_type', $car->fuel_type) === 'diesel' ? 'selected' : '' }}>Diesel
                </option>
                <option value="electric" {{ old('fuel_type', $car->fuel_type) === 'electric' ? 'selected' : '' }}>Electric
                </option>
                <option value="gpl" {{ old('fuel_type', $car->fuel_type) === 'gpl' ? 'selected' : '' }}>GPL</option>
                <option value="hybrid" {{ old('fuel_type', $car->fuel_type) === 'hybrid' ? 'selected' : '' }}>Hybrid
                </option>
            </select>
            <small id="helpPrice" class="form-text text-muted">Edit Car Fuel Type</small>

        </div>
        <div class="mb-3">
            <label for="seats" class="form-label">Seats</label>
            <div class="d-flex align-items-center">
                <div>2</div>
                <input type="range" min="2" max="7" class="form-control mx-3" name="seats" id="seats"
                    aria-describedby="helpSeats" placeholder="Edit a Car Seat Number" value="{{ old('brand') }}">
                <div>7</div>
            </div>
            <small id="helpSeats" class="form-text text-muted">Edit a Car Seat Number</small>
        </div>
        <button type="submit" class="btn btn-secondary">Edit Car</button>
    </form>
@endsection
