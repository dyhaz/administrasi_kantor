<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationship\KegiatanRelationship;

class Kegiatan extends Model
{
    use KegiatanRelationship;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'kegiatan';

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
    protected $fillable = ['nama'];

    
}
