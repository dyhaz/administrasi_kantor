<?php
namespace App\Sidebar;

use Maatwebsite\Sidebar\Presentation\SidebarRenderer;
use App\Sidebar\KaUPTSidebar;

class SidebarCreator
{
    /**
     * @var YourSidebar
     */
    protected $sidebar;

    /**
     * @var SidebarRenderer
     */
    protected $renderer;

    /**
     * @param YourSidebar $sidebar
     * @param SidebarRenderer       $renderer
     */
    public function __construct(KaUPTSidebar $sidebar, SidebarRenderer $renderer)
    {
        $this->sidebar  = $sidebar;
        $this->renderer = $renderer;
    }

    /**
     * @param $view
     */
    public function create($view)
    {
        $view->sidebar = $this->renderer->render(
            $this->sidebar
        );
    }
}