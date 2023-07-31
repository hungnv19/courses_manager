<?php

namespace App\Providers;

use App\Repositories\Class\ClassInterface;
use App\Repositories\Class\ClassRepository;
use App\Repositories\Course\CourseInterface;
use App\Repositories\Course\CourseRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClassInterface::class, ClassRepository::class);
        $this->app->bind(CourseInterface::class, CourseRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
