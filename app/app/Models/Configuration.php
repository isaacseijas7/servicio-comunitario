<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Configuration
 * @package App\Models
 * @version October 24, 2018, 8:38 pm UTC
 *
 * @property string academic_period
 * @property string min_credit_units
 * @property string min_hour_community_service
 * @property string min_hour_weeks
 * @property date registration_date
 * @property date registration_final_date
 * @property date date_int_community_service
 * @property date date_fin_community_service
 * @property string coordinator_full_name
 * @property string coordinator_identification
 * @property enum status
 */
class Configuration extends Model
{
    use SoftDeletes;

    public $table = 'configurations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'academic_period',
        'min_credit_units',
        'min_hour_community_service',
        'min_hour_weeks',
        'registration_date',
        'registration_final_date',
        'date_int_community_service',
        'date_fin_community_service',
        'coordinator_full_name',
        'coordinator_identification',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'academic_period' => 'string',
        'min_credit_units' => 'string',
        'min_hour_community_service' => 'string',
        'min_hour_weeks' => 'string',
        'registration_date' => 'date',
        'registration_final_date' => 'date',
        'date_int_community_service' => 'date',
        'date_fin_community_service' => 'date',
        'coordinator_full_name' => 'string',
        'coordinator_identification' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'academic_period' => 'required',
        'min_credit_units' => 'required',
        'min_hour_community_service' => 'required',
        'min_hour_weeks' => 'required',
        'registration_date' => 'required',
        'registration_final_date' => 'required',
        'date_int_community_service' => 'required',
        'date_fin_community_service' => 'required',
        'coordinator_full_name' => 'required',
        'coordinator_identification' => 'required',
        //'status' => 'required'
    ];

    
}
