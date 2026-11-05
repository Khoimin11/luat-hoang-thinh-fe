<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $areas = json_decode(file_get_contents(resource_path('data/practice-areas.json')), true, 512, JSON_THROW_ON_ERROR);
        View::share('practiceAreas', collect($areas));
    }
}
