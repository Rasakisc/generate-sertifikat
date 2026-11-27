<?php

// Hanya untuk menjalankan kode backend di Laravel 13 lokal.
// Controller teman (gaya Laravel 10) memakai RouteServiceProvider::HOME,
// kelas yang tidak ada lagi di kerangka Laravel 11 ke atas.

namespace App\Providers;

class RouteServiceProvider
{
    public const HOME = '/dashboard';
}