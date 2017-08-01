<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationship\SuratKeluarRelationship;

class SuratKeluar extends Model
{
    use SuratKeluarRelationship;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'surat_keluar';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nomor', 'id_instansi', 'perihal', 'id_sifat', 'isi', 'id_pegawai', 'status'];

    
}
