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
        app('view')->composer('layouts.master', function ($view) {
            $action = app('request')->route()->getAction();

            if(@$action['controller']) {
                $controller = class_basename($action['controller']);
                list($controller, $action) = explode('@', $controller);
            } else {
                list($controller, $action) = ['asdfds', 'sdd'];
            }


            $view->with(compact('controller', 'action'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Appzcoder\CrudGenerator\CrudGeneratorServiceProvider');
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
            //$this->app->register(\VTalbot\RepositoryGenerator\RepositoryGeneratorServiceProvider::class);
        }
    }
}
