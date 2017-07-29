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

    
}
