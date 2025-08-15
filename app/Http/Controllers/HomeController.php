<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::where('published_at', '<', now())
            ->with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model', 'owner'])
            ->orderBy('published_at', 'desc')
            ->limit(10)
            ->get();

        return View::make('home.index', ['cars' => $cars]);
    }
}
