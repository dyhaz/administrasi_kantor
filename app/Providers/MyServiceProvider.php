<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Maatwebsite\Sidebar\SidebarManager;
use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * @param SidebarManager $manager
     * @param Guard $guard
     */
    public function boot(SidebarManager $manager)
    {
        $manager->register('App\Sidebar\KaUPTSidebar');

        View::creator(
            '_partials.sidebar',
            'App\Sidebar\SidebarCreator'
        );
    }
}