<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IsiDisposisi extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'isi_disposisi';

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
    protected $fillable = ['isi'];

    
}
