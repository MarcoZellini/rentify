@extends('layouts.admin')

@section('content')
    <h1>All Cars</h1>

    <div class="text-end">
        <a href="{{ route('admin.cars.create') }}" class="btn btn-primary m-2">Add a New Car</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table
                class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                <thead class="table-light">
                    <caption>Table Name</caption>
                    <tr>
                        <th>Image</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Fuel Type</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($cars as $car)
                        <tr class="table-primary">
                            <td scope="row">

                                @if (str_contains($car->image, 'http'))
                                    <img height="75px" src="{{ asset($car->image) }}">
                                @else
                                    <img height="75px" src="{{ asset('storage/' . $car->image) }}">
                                @endif

                            </td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->fuel_type }}</td>
                            <td>{{ $car->price }}</td>
                            <td>
                                <a href="{{ route('admin.cars.show', $car) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-secondary">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="6"> No Cars Found 😒</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $cars->links('pagination::bootstrap-5') }}

        </div>
    </div>
@endsection
