<?php

namespace App\Models\Traits\Relationship;

use App\Models\Instansi;
use App\Models\SuratMasuk;
use App\Models\SifatSurat;

/**
 * Class HistoryRelationship.
 */
trait DisposisiRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function surat_masuk()
    {
        return $this->hasOne(SuratMasuk::class, 'id', 'id_surat_masuk');
    }

    public function isi_disposisi()
    {
        return $this->belongsToMany('App\Models\IsiDisposisi');
    }
}
