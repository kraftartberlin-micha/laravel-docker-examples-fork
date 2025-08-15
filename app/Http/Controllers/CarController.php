<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cars = User::find(1)->cars()
            ->with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model', 'owner'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return View::make('car.index', ['cars' => $cars]);
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
        return View::make('car.show', ['car' => $car]);
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
        $query = Car::where('published_at', '<', now())->orderBy('published_at', 'desc')
            ->with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model', 'owner']);

        $cars = $query->paginate(15)->withQueryString();

        return View::make('car.search', ['cars' => $cars]);
    }

    public function watchlist(){

        $cars =  User::find(2)->favCars()
            ->with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model', 'owner'])->paginate(15);

        return View::make('car.watchlist', ['cars' => $cars]);
    }
}
