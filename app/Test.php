<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationship\{{modelName}}Relationship;

class Test extends Model
{
    use {{modelName}}Relationship;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tests';

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
    protected $fillable = ['status'];

    
}
