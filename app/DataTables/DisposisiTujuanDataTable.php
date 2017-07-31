<?php

namespace App\DataTables;

use App\Models\DisposisiTujuan;
use Yajra\Datatables\Services\DataTable;

class DisposisiTujuanDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @return \Yajra\Datatables\Engines\BaseEngine
     */
    public function dataTable()
    {
        $query = $this->query();
        return $this->datatables
            ->eloquent($query)
            ->addColumn('action', function ($query) {
                return '<button onclick="deleteRecord(this)" data-id="'.$query->id_disposisi_tujuan.'" data-token="" class="btn btn-danger btn-xs" >Delete</button>';
            });
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = DisposisiTujuan::query()->join('disposisi', 'disposisi_tujuan.id_disposisi', '=', 'disposisi.id')
            ->join('jabatan', 'disposisi_tujuan.id_jabatan', '=', 'jabatan.id')
            ->join('divisi', 'disposisi_tujuan.id_divisi', '=', 'divisi.id')
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
                            /*'create',
                            'export',*/
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
            'disposisi_tujuan.id as id_disposisi_tujuan',
            'nomor',
            'jabatan.nama as jabatan',
            'divisi.nama as divisi',
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
            'nomor',
            'jabatan',
            'divisi',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'disposisitujuan_' . time();
    }
}
