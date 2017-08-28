<?php
namespace App\Sidebar;

use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Sidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;

class StafSeksiPengujianPengendalianMutuSidebar implements Sidebar
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
            $group->item('Lihat Surat Masuk', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->route('surat-masuk.index');
            });
        });
        $this->menu->group('Agenda Surat Keluar', function(Group $group) {
            $group->item('Pembuatan Surat Keluar', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->weight(50);
                $item->route('surat-keluar.create');
            });
            $group->item('Lihat Surat Keluar', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->weight(50);
                $item->route('surat-keluar.index');
            });
            $group->item('Lihat Persetujuan Surat Keluar', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->weight(50);
                $item->route('persetujuan-surat-keluar.index');
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