<?php

namespace App\Models\Traits\Relationship;

use App\Models\Instansi;
use App\Models\SuratMasuk;
use App\Models\SifatSurat;
use App\Models\Pegawai;

/**
 * Class HistoryRelationship.
 */
trait SuratKeluarRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sifat_surat()
    {
        return $this->hasOne(SifatSurat::class, 'id', 'id_sifat');
    }

    public function instansi()
    {
        return $this->hasOne(Instansi::class, 'id', 'id_instansi');
    }

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id', 'id_pegawai');
    }
}
