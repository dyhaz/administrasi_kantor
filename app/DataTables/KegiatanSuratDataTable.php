<?php

namespace App\DataTables;

use App\Models\KegiatanSurat;
use Yajra\Datatables\Services\DataTable;

class KegiatanSuratDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @return \Yajra\Datatables\Engines\BaseEngine
     */
    public function dataTable()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'kegiatansurat.action');
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = KegiatanSurat::query()->join('kegiatan', 'kegiatan_surat.id_kegiatan', '=', 'kegiatan.id')
            ->join('klasifikasi_arsip', 'kegiatan_surat.id_klasifikasi_arsip', '=', 'klasifikasi_arsip.id')
            ->select($this->getColumns());

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumnNames())
                    ->minifiedAjax('')
                    ->addAction(['width' => '80px'])
                    ->parameters([
                        'dom'     => 'Bfrtip',
                        'order'   => [[0, 'desc']],
                        'buttons' => [
                            'print',
                            'reset',
                            'reload',
                        ],
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'kegiatan_surat.id as id_kegiatan_surat',
            'klasifikasi_arsip.nama as klasifikasi_arsip',
            'kegiatan.nama as kegiatan',
        ];
    }

    /**
     * Get column names.
     *
     * @return array
     */
    protected function getColumnNames()
    {
        return [
            'id_kegiatan_surat',
            'klasifikasi_arsip',
            'kegiatan',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'kegiatansurat_' . time();
    }
}
