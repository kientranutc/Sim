<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $repositories = [
                'Users\UserRepositoryInterface' => 'Users\UserRepository',
                'Net\NetRepositoryInterface' => 'Net\NetRepository',
                'TypeSim\TypeSimRepositoryInterface' => 'TypeSim\TypeSimRepository',
                'Sim\SimRepositoryInterface' => 'Sim\SimRepository',
                'News\NewsRepositoryInterface' => 'News\NewsRepository',
        ];
        foreach($repositories as $key=>$val){
            $this->app->bind("App\\Repositories\\$key", "App\\Repositories\\$val");
        }

    }
}
