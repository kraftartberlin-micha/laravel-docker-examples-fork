<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View::make('car.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View::make('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return View::make('car.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return View::make('car.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }

    public function search()
    {
        return View::make('car.search');
    }
}
