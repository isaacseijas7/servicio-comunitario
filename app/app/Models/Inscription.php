<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Inscription
 * @package App\Models
 * @version October 24, 2018, 9:26 pm UTC
 *
 * @property string status
 * @property integer student_id
 */
class Inscription extends Model
{
    use SoftDeletes;

    public $table = 'inscriptions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'student_id',
        'configuration_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
        'student_id' => 'integer',
        'configuration_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status' => 'required',
        //'student_id' => 'required',
        //'configuration_id' => 'required'
    ];

    
}
