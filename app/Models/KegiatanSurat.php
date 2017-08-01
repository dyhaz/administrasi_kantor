<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationship\KegiatanSuratRelationship;

class KegiatanSurat extends Model
{
    use KegiatanSuratRelationship;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'kegiatan_surat';

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
    protected $fillable = ['id_klasifikasi_arsip', 'id_kegiatan', 'nomor'];

    
}
