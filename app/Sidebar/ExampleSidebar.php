<?php
namespace App\Sidebar;

use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Sidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;

class ExampleSidebar implements Sidebar
{

    /**
     * @var Menu
     */
    protected $menu;

    /**
     * @param Menu $menu
     */
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Build your sidebar implementation here
     */
    public function build()
    {
        $this->menu->group('Tes', function(Group $group) {
            $group->item('asddfdf', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->route('surat-masuk.index');
            });
        });
        $this->menu->group('Group 2', function(Group $group) {
            $group->item('asdsaa', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->weight(50);
                $item->route('home');
            });
        });
    }

    /**
     * @return Menu
     */
    public function getMenu()
    {
        return $this->menu;
    }
}