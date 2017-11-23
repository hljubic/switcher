<?php

namespace App\Providers;

use App\Collegium;
use App\Faculty;
use App\Study;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        $faculties = Faculty::all();
        view()->share('faculties', $faculties);
        $studies = Study::all();
        view()->share('studies', $studies);
        $collegiums = Collegium::all();
        view()->share('collegiums', $collegiums);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

}
