<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    
    public function boot()
    {
        // Kirim $profil ke semua view
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $view->with('profil', \App\Models\profil_sekolah::first());
        });
    }
}
