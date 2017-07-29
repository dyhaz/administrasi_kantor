<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
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
    protected $fillable = ['nip', 'nama', 'alamat', 'id_divisi', 'id_jabatan', 'jenis_kelamin', 'no_telp', 'tanggal_lahir'];

    public function __jenis_kelamin() {
        $status = ['Laki-laki', 'Perempuan'];
        return @$status[$this->jenis_kelamin];
    }
}
