<?php
namespace App\Sidebar;

use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Sidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;

class StafSubbagTUSidebar implements Sidebar
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
        $this->menu->group('Data Master', function(Group $group) {
            $group->item('Data Pegawai', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->route('pegawai.index');
            });
            $group->item('Data Kota', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->route('kota.index');
            });
            $group->item('Data Divisi', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->route('divisi.index');
            });
            $group->item('Data Jabatan', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->route('jabatan.index');
            });
            $group->item('Data Isi Disposisi', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->route('isi-disposisi.index');
            });
            $group->item('Data Instansi', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->route('instansi.index');
            });
            $group->item('Data Sifat Surat', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->route('sifat-surat.index');
            });
            $group->item('Permasalahan Surat Keluar', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->route('klasifikasi-arsip.index');
            });
            $group->item('Kegiatan Surat Keluar', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->route('kegiatan-surat.index');
            });
        });
        $this->menu->group('Agenda Surat Masuk', function(Group $group) {
            $group->item('Catat Surat Masuk', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->weight(50);
                $item->route('surat-masuk.create');
            });
            $group->item('Lihat Disposisi Surat', function (Item $item) {
                $item->icon('icon-angle-right');
                $item->weight(50);
                $item->route('disposisi.index');
            });
        });
        $this->menu->group('Surat Keluar', function(Group $group) {
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