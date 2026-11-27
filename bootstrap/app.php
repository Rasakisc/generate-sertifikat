<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            Route::middleware('web')->group(function () {
                // web.php punya dua rute bernama "organisasi.update"; versi {id} didaftarkan dulu
                Route::middleware('auth')->put('/organisasi/{id}', [App\Http\Controllers\OrganisasiController::class, 'update'])
                    ->name('organisasi.update');

                require base_path('routes/web.php');
            });
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();

// css/, js/, img/, vendor/bootstrap ada di folder utama, jadi folder publiknya folder utama
$app->usePublicPath($app->basePath());

return $app;
