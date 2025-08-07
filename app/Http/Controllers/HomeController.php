<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return View::make('home.index');
    }
}
