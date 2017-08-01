<?php

namespace App\Models\Traits\Relationship;

use App\Models\Divisi;
use App\Models\Instansi;
use App\Models\Jabatan;
use App\Models\Kota;

/**
 * Class HistoryRelationship.
 */
trait PegawaiRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kota()
    {
        return $this->hasOne(Kota::class, 'id', 'id_kota');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function divisi()
    {
        return $this->hasOne(Divisi::class, 'id', 'id_divisi');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jabatan()
    {
        return $this->hasOne(Jabatan::class, 'id', 'id_jabatan');
    }
}
