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
        $manager->register('App\Sidebar\ExampleSidebar');
        $manager->register('App\Sidebar\KaUPTSidebar');
        $manager->register('App\Sidebar\KaSubbagTUSidebar');
        $manager->register('App\Sidebar\KaSeksiPengujianPengendalianMutuSidebar');
        $manager->register('App\Sidebar\StafSubbagTUSidebar');
        $manager->register('App\Sidebar\StafSeksiPengujianPengendalianMutuSidebar');

        View::creator(
            '_partials.sidebar',
            'App\Sidebar\SidebarCreator'
        );
    }
}