<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormBuilder;

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

        // Custom Form Components
        \Form::component('typeahead', 'components.form.typeahead', ['name', 'value', 'attributes']);
        //Example: {{ Form::typeahead('instansi', null, ['endpointUrl' => route('searchInstansi') . '?term=%QUERY%' ]) }}
        \Form::component('selectbox', 'components.form.selectbox', ['name', 'value', 'attributes']);
        //Example: {{ Form::selectbox('kegiatan_surat', null, ['endpointUrl' => route('searchKegiatanSurat') ]) }}
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
