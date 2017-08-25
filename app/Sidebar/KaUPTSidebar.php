<?php
namespace App\Sidebar;

use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Sidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;

class KaUPTSidebar implements Sidebar
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
        $this->menu->group('Disposisi', function(Group $group) {
            $group->item('Lihat Surat Masuk', function (Item $item) {
                $item->icon('icon-user-md');
                $item->route('surat-masuk.index');
            });
            $group->item('Persetujuan Surat Keluar', function (Item $item) {
                $item->icon('icon-user-md');
                $item->route('persetujuan-surat-keluar.index');
            });
            $group->item('Lihat Disposisi Surat', function (Item $item) {
                $item->icon('icon-user-md');
                $item->route('disposisi.index');
            });
        });
        $this->menu->group('Laporan', function(Group $group) {
            $group->item('Laporan Surat Masuk', function (Item $item) {
                $item->icon('icon-user-md');
                $item->weight(50);
                $item->route('home');
            });
            /**$group->item('Surat Masuk', function (Item $item) {
                $item->icon('icon-user-md');
                $item->weight(50);
                $item->route('surat-keluar.index');
            });
            $group->item('eee');*/
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