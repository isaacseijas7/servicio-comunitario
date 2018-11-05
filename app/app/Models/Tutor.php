<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tutor
 * @package App\Models
 * @version October 24, 2018, 9:23 pm UTC
 *
 * @property string type
 * @property integer user_id
 */
class Tutor extends Model
{
    use SoftDeletes;

    public $table = 'tutors';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'type',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'type' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required',
        //'user_id' => 'required'
    ];

    
}
