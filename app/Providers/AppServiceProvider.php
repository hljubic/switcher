<?php

namespace App\Providers;

use App\Collegium;
use App\Faculty;
use App\Study;
use App\Task;
use App\TaskUser;
use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
      $faculties = Faculty::all();
        view()->share('faculties', $faculties);
        $studies = Study::all();
        view()->share('studies', $studies);
        $collegiums = Collegium::all();
        view()->share('collegiums', $collegiums);
        $tasks = Task::all();
        view()->share('tasks',$tasks);
    }

    /**CreateCollegiumUserTable' not found

     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

}
