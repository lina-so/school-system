<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
           'App\Repository\TeacherRepositoryInterface',
            'App\Repository\TeacherRepository'
        );

        $this->app->bind(
            'App\Repository\StudentRepositoryInterface',
             'App\Repository\StudentRepository'
         );

         $this->app->bind(
            'App\Repository\PromotionRepositoryInterface',
             'App\Repository\PromotionRepository'
         );

         
         $this->app->bind(
            'App\Repository\StudentGraduateRepositoryInterface',
             'App\Repository\StudentGraduateRepository'
         );
         
         
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
