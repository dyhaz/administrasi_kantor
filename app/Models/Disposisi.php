<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationship\DisposisiRelationship;

class Disposisi extends Model
{
    use DisposisiRelationship;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'disposisi';

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
    protected $fillable = ['nomor', 'id_surat_masuk', 'keterangan', 'status'];

    public function __status() {
        $status = ['Balasan', 'Tidak perlu balasan'];
        return @$status[$this->status];
    }

    public function __isi_disposisi() {
        $isi_disposisi = [];
        foreach($this->isi_disposisi as $isi) {
            $isi_disposisi[] = $isi->isi;
        }
        return implode(', ', $isi_disposisi);
    }
}
