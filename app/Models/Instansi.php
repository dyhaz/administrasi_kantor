<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationship\InstansiRelationship;

class Instansi extends Model
{
    use InstansiRelationship;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'instansi';

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
    protected $fillable = ['nama', 'id_kota', 'no_telp'];

    
}
