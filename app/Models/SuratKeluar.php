<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationship\SuratKeluarRelationship;

class SuratKeluar extends Model
{
    use SuratKeluarRelationship;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'surat_keluar';

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
    protected $fillable = ['nomor', 'id_instansi', 'id_kegiatan_surat', 'perihal', 'id_sifat', 'isi', 'id_pegawai', 'status'];

    public function __status_kirim() {
        $status = ['Belum Terkirim', 'Terkirim'];
        return @$status[$this->status_kirim];
    }

    public function disetujui_oleh($nama) {
        foreach($this->persetujuan as $pegawai) {
            if($pegawai->jabatan->nama == $nama) {
                return true;
            }
        }
        return false;
    }

    public function disetujui_kasie_pengujian() {
        return $this->disetujui_oleh('Kepala Seksi Pengujian');
    }

    public function disetujui_kasie_pengendalian_mutu() {
        return $this->disetujui_oleh('Kepala Seksi Pengendalian Mutu');
    }

    public function disetujui_ka_upt() {
        return $this->disetujui_oleh('Ka UPT');
    }

    public function __persetujuan() {
        $jabatan = [];
        foreach($this->persetujuan as $pegawai) {
            $jabatan[] = $pegawai->jabatan->nama;
        }
        return implode(', ', $jabatan);
    }
}
