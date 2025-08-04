<?php

declare(strict_types=1);

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShowCarController;
use Illuminate\Support\Facades\Route;

// use names for routes
Route::get('/', static function () {
    Log::info('Welcome page visited');
    $aboutUrl = route('about');

    // dump($aboutUrl);
    // dd($aboutUrl);
    return view('welcome', ['aboutUrl' => $aboutUrl]);
});

Route::view('/about', 'about', ['phone_number' => '+49 12 3456 789'])->name('about');

// optional parameter and restriction
Route::get('/product/{id?}', static function (?string $id = null) {
    return 'product '.($id ?? 'null');
})->whereNumber('id');

// lang only 2 lowercase chars and in array check, id at least 4 digits
// de/product/1234
Route::get('{lang}/product/{id}', static function (string $lang, string $id) {
    return 'lang '.$lang.' product '.$id;
})->where(['lang' => '[a-z]{2}', 'id' => '\d{4,}'])->whereIn('lang', ['en', 'fr', 'de']);

// make slash as param available
// search/9/15
Route::get('/search/{search}', static function (string $search) {
    return 'search '.$search;
})->where('search', '.+');

// prefix routes
Route::prefix('admin')->group(function () {
    Route::get('/users/', static function () {
        return 'admin/users';
    });
});

Route::fallback(static function () {
    return 'fallback for unmatched urls';
});

// ############ route types ##############

/*Route::any('/users', static function () {
    return view('users');
});*/

/*Route::match(['get','post'],'/users', static function () {
    return view('users');
});*/

/* Route::redirect('/not', '/', 301); */
// also possible with get and a redirect as return in the anonym function

/* Route::view('/contact', 'contact'); */

/*Route::get('/info', function () {
    Log::info('Phpinfo page visited');
    return phpinfo();
});*/

/*Route::get('/health', function () {
    $status = [];

    // Check Database Connection
    try {
        DB::connection()->getPdo();
        // Optionally, run a simple query
        DB::select('SELECT 1');
        $status['database'] = 'OK';
    } catch (\Exception $e) {
        $status['database'] = 'Error';
    }

    // Check Redis Connection
    try {
        Cache::store('redis')->put('health_check', 'OK', 10);
        $value = Cache::store('redis')->get('health_check');
        if ($value === 'OK') {
            $status['redis'] = 'OK';
        } else {
            $status['redis'] = 'Error';
        }
    } catch (\Exception $e) {
        $status['redis'] = 'Error';
    }

    // Check Storage Access
    try {
        $testFile = 'health_check.txt';
        Storage::put($testFile, 'OK');
        $content = Storage::get($testFile);
        Storage::delete($testFile);

        if ($content === 'OK') {
            $status['storage'] = 'OK';
        } else {
            $status['storage'] = 'Error';
        }
    } catch (\Exception $e) {
        $status['storage'] = 'Error';
    }

    // Determine overall health status
    $isHealthy = collect($status)->every(function ($value) {
        return $value === 'OK';
    });

    $httpStatus = $isHealthy ? 200 : 503;

    return response()->json($status, $httpStatus);
});*/

// single action:
// Route::get('/car', [CarController::class, 'index']);

// multiple actions:
Route::controller(CarController::class)->group(function () {
    Route::get('/car', 'index');
    Route::get('/my-car', 'myCars');
});

Route::get('/show-car', ShowCarController::class);

Route::resource('/products', ProductController::class);
// Route::apiResource('/products', ProductController::class);
// ->except(['show'])
// ->only(['show'])
