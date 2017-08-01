<?php

namespace App\Models\Traits\Relationship;

use App\Models\Divisi;
use App\Models\Instansi;
use App\Models\Jabatan;
use App\Models\Kegiatan;
use App\Models\KlasifikasiArsip;
use App\Models\Kota;

/**
 * Class HistoryRelationship.
 */
trait KegiatanSuratRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function klasifikasi_arsip()
    {
        return $this->hasOne(KlasifikasiArsip::class, 'id', 'id_klasifikasi_arsip');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kegiatan()
    {
        return $this->hasOne(Kegiatan::class, 'id', 'id_kegiatan');
    }
}
