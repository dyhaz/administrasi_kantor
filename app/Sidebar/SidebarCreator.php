<?php
namespace App\Sidebar;

use Maatwebsite\Sidebar\Presentation\SidebarRenderer;
use App\Sidebar\KaUPTSidebar;
use App\Sidebar\ExampleSidebar;

class SidebarCreator
{
    /**
     * @var YourSidebar
     */
    protected $sidebar_example;
    protected $sidebar_ka_upt;
    protected $sidebar_ka_subbag_tu;
    protected $sidebar_ka_seksi_pengujian_pengendalian_mutu;
    protected $sidebar_staf_seksi_pengujian_pengendalian_mutu;
    protected $sidebar_staf_subbag_tu;
    protected $sidebar_superuser;

    /**
     * @var SidebarRenderer
     */
    protected $renderer;

    /**
     * @param YourSidebar $sidebar
     * @param SidebarRenderer       $renderer
     */
    public function __construct(ExampleSidebar $sidebar0, KaUPTSidebar $sidebar1, KaSubbagTUSidebar $sidebar2, KaSeksiPengujianPengendalianMutuSidebar $sidebar3, StafSeksiPengujianPengendalianMutuSidebar $sidebar4, StafSubbagTUSidebar $sidebar5, SuperuserSidebar $sidebar6,SidebarRenderer $renderer)
    {
        $this->sidebar_example = $sidebar0;
        $this->sidebar_ka_upt  = $sidebar1;
        $this->sidebar_ka_subbag_tu  = $sidebar2;
        $this->sidebar_ka_seksi_pengujian_pengendalian_mutu  = $sidebar3;
        $this->sidebar_staf_seksi_pengujian_pengendalian_mutu  = $sidebar4;
        $this->sidebar_staf_subbag_tu  = $sidebar5;
        $this->sidebar_superuser  = $sidebar6;
        $this->renderer = $renderer;
    }

    /**
     * @param $view
     */
    public function create($view)
    {
        $view->sidebar_ka_upt = $this->renderer->render(
            $this->sidebar_ka_upt
        );
        $view->sidebar_example = $this->renderer->render(
            $this->sidebar_example
        );
        $view->sidebar_ka_subbag_tu = $this->renderer->render(
            $this->sidebar_ka_subbag_tu
        );
        $view->sidebar_ka_seksi_pengujian_pengendalian_mutu = $this->renderer->render(
            $this->sidebar_ka_seksi_pengujian_pengendalian_mutu
        );
        $view->sidebar_staf_subbag_tu = $this->renderer->render(
            $this->sidebar_staf_subbag_tu
        );
        $view->sidebar_staf_seksi_pengujian_pengendalian_mutu = $this->renderer->render(
            $this->sidebar_staf_seksi_pengujian_pengendalian_mutu
        );
        $view->sidebar_superuser = $this->renderer->render(
            $this->sidebar_superuser
        );
    }
}