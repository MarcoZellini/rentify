@extends('layouts.admin')

@section('content')
    <h1>All Cars</h1>

    <div class="text-end">
        <a href="{{ route('admin.cars.create') }}" class="btn btn-primary m-2">Add a New Car</a>
    </div>

    @if (session('message'))
        <div class="alert alert-info" role="alert">
            <strong>Message: </strong> {{ session('message') }}
        </div>
    @endif


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
                            <td>{{ $car->price }}</td>
                            <td>
                                <a href="{{ route('admin.cars.show', $car) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-secondary">Edit</a>

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger btn" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $car->id }}">
                                    Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $car->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $car->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId-{{ $car->id }}">Deleting Car
                                                    n. # {{ $car->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                This operation cannot be undone!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Dismiss</button>

                                                <form action="{{ route('admin.cars.destroy', $car) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
