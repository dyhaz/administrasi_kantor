<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationship\SuratMasukRelationship;

class SuratMasuk extends Model
{
    use SuratMasukRelationship;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'surat_masuk';

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
    protected $fillable = ['nomor', 'tanggal_terima', 'nomor_naskah_dinas', 'id_sifat', 'id_instansi', 'perihal', 'isi_ringkas', 'file'];

    
}
