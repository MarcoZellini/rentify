<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cars.index', ['cars' => Car::orderByDesc('id')->paginate(9)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {

        $val_data = $request->validated();

        if ($request->has('image')) {
            $file_path = Storage::put('car_images', $request->image);
            $val_data['image'] = $file_path;
        }

        Car::create($val_data);
        return to_route('admin.cars.index')->with('message', 'Car Created Successfully! 👍');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('admin.cars.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('admin.cars.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {


        $val_data = $request->validated();

        if ($request->has('image') && $car->image) {
            Storage::delete($car->image);
            $file_path = Storage::put('car_images', $request->image);
            $val_data['image'] = $file_path;
        }

        $car->update($val_data);
        return to_route('admin.cars.index')->with('message', 'Car Edited Successfully! 👍');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
