<?php

namespace App\Models\Traits\Relationship;

use App\Models\Instansi;
use App\Models\Kota;

/**
 * Class HistoryRelationship.
 */
trait InstansiRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kota()
    {
        return $this->hasOne(Kota::class, 'id', 'id_kota');
    }
}
