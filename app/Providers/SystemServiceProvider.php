<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class SystemServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $systemPath = public_path('json/system.json');
        $systemData = [];
        
        if (file_exists($systemPath)) {
            $systemData = json_decode(file_get_contents($systemPath), true);
            // Mengambil data pertama dari array system
            $systemData = $systemData['system'][0] ?? [];
        }

        // Membuat variable global yang bisa diakses di semua view
        View::share('system', $systemData);

        // Membuat helper function global
        app()->singleton('system', function () use ($systemData) {
            return $systemData;
        });//
    }
}
