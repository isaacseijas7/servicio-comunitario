<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company
 * @package App\Models
 * @version October 24, 2018, 9:36 pm UTC
 *
 * @property string name
 * @property string identification
 * @property string location_state
 * @property string location
 * @property string domicile
 * @property string phone
 * @property string email
 */
class Company extends Model
{
    use SoftDeletes;

    public $table = 'companies';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'identification',
        'location_state',
        'location',
        'domicile',
        'phone',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'identification' => 'string',
        'location_state' => 'string',
        'location' => 'string',
        'domicile' => 'string',
        'phone' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'identification' => 'required',
        'location_state' => 'required',
        'location' => 'required',
        'domicile' => 'required',
        'phone' => 'required',
        'email' => 'required'
    ];

    
}
