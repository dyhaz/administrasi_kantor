<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationship\PegawaiRelationship;

class Pegawai extends Model
{
    use PegawaiRelationship;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pegawai';

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
    protected $fillable = ['nip', 'nama', 'alamat', 'id_divisi', 'id_jabatan', 'id_kota', 'jenis_kelamin', 'no_telp', 'tanggal_lahir'];

    public function __jenis_kelamin() {
        $status = ['Laki-laki', 'Perempuan'];

        if($this->jenis_kelamin != '0' || $this->jenis_kelamin != '1')
            return $this->jenis_kelamin == 'L'?$status[0]:$status[1];

        $idx = $this->jenis_kelamin;
        return @$status[$idx];
    }
}
