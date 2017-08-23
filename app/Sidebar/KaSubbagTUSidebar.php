<?php
namespace App\Sidebar;

use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Sidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;

class KaSubbagTUSidebar implements Sidebar
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
        $this->menu->group('Data Surat Masuk', function(Group $group) {
            $group->item('Lihat Disposisi Surat', function (Item $item) {
                $item->icon('icon-user-md');
                $item->route('disposisi.index');
            });
        });
        $this->menu->group('Agenda Surat Keluar', function(Group $group) {
            $group->item('Lihat Surat Keluar', function (Item $item) {
                $item->icon('icon-user-md');
                $item->weight(50);
                $item->route('surat-keluar.index');
            });
            $group->item('Persetujuan Surat Keluar', function (Item $item) {
                $item->icon('icon-user-md');
                $item->weight(50);
                $item->route('persetujuan-surat-keluar.index');
            });
        });
        $this->menu->group('Laporan', function(Group $group) {
           $group->item('Laporan Surat Masuk', function (Item $item) {
                $item->icon('icon-user-md');
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