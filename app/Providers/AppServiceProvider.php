<?php

namespace App\Providers;

use App\Repositories\Category\CategoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Class\ClassInterface;
use App\Repositories\Class\ClassRepository;
use App\Repositories\Course\CourseInterface;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Language\LanguageInterface;
use App\Repositories\Language\LanguageRepository;
use App\Repositories\Level\LevelInterface;
use App\Repositories\Level\LevelRepository;
use App\Repositories\Subject\SubjectInterface;
use App\Repositories\Subject\SubjectRepository;
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
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(LevelInterface::class, LevelRepository::class);
        $this->app->bind(LanguageInterface::class, LanguageRepository::class);
        $this->app->bind(SubjectInterface::class, SubjectRepository::class);
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
