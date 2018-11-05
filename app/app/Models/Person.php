<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Person
 * @package App\Models
 * @version October 24, 2018, 9:08 pm UTC
 *
 * @property string name
 * @property string last_name
 * @property string identification
 * @property string gender
 * @property date birthdate
 * @property string location_state
 * @property string location
 * @property string domicile
 * @property string phone
 * @property integer user_id
 */
class Person extends Model
{
    use SoftDeletes;

    public $table = 'people';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'last_name',
        'identification',
        'gender',
        'birthdate',
        'location_state',
        'location',
        'domicile',
        'phone',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'last_name' => 'string',
        'identification' => 'string',
        'gender' => 'string',
        'birthdate' => 'date',
        'location_state' => 'string',
        'location' => 'string',
        'domicile' => 'string',
        'phone' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'last_name' => 'required',
        'identification' => 'required',
        'gender' => 'required',
        'birthdate' => 'required',
        'location_state' => 'required',
        'location' => 'required',
        'domicile' => 'required',
        'phone' => 'required',
        //'user_id' => 'required'
    ];

    
}
