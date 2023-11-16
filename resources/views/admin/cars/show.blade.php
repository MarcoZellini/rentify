@extends('layouts.admin')

@section('content')
    <div class="d-flex gap-2 mt-4">

        <div>
            @if (str_contains($car->image, 'http'))
                <img class="img-fluid" src="{{ asset($car->image) }}">
            @else
                <img class="img-fluid" src="{{ asset('storage/' . $car->image) }}">
            @endif
        </div>
        <div class="d-flex flex-column justify-content-space-around">
            <h5>{{ $car->brand }}</h5>
            <h1>{{ $car->model }}</h1>
            <div>{{ $car->notes }}</div>
            <div class="fuel_type">{{ $car->fuel_type }}</div>
            <div class="price">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-currency-euro" viewBox="0 0 16 16">
                    <path
                        d="M4 9.42h1.063C5.4 12.323 7.317 14 10.34 14c.622 0 1.167-.068 1.659-.185v-1.3c-.484.119-1.045.17-1.659.17-2.1 0-3.455-1.198-3.775-3.264h4.017v-.928H6.497v-.936c0-.11 0-.219.008-.329h4.078v-.927H6.618c.388-1.898 1.719-2.985 3.723-2.985.614 0 1.175.05 1.659.177V2.194A6.617 6.617 0 0 0 10.341 2c-2.928 0-4.82 1.569-5.244 4.3H4v.928h1.01v1.265H4v.928z" />
                </svg>
                {{ $car->price }}
            </div>
            <a href="{{ route('admin.cars.index') }}" class="btn btn-primary my-3">Back</a>
            <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-secondary my-3">Edit</a>
            <!-- Modal trigger button -->
            <button type="button" class="btn btn-danger btn" data-bs-toggle="modal"
                data-bs-target="#modalId-{{ $car->id }}">
                Delete
            </button>

            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="modalId-{{ $car->id }}" tabindex="-1" data-bs-backdrop="static"
                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{ $car->id }}"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId-{{ $car->id }}">Deleting Car
                                n. # {{ $car->id }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            This operation cannot be undone!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>

                            <form action="{{ route('admin.cars.destroy', $car) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
