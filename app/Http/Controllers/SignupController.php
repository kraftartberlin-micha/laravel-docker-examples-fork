<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class SignupController extends Controller
{
    public function signup()
    {
        return View::make('auth.signup');
    }
}
