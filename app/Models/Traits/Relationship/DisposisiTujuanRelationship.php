<?php

namespace App\Models\Traits\Relationship;

use App\Models\Disposisi;
use App\Models\Divisi;
use App\Models\Jabatan;

/**
 * Class HistoryRelationship.
 */
trait DisposisiTujuanRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function disposisi()
    {
        return $this->hasOne(Disposisi::class, 'id', 'id_disposisi');
    }

    public function jabatan()
    {
        return $this->hasOne(Jabatan::class, 'id', 'id_jabatan');
    }

    public function divisi()
    {
        return $this->hasOne(Divisi::class, 'id', 'id_divisi');
    }
}
