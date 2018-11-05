<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Student
 * @package App\Models
 * @version October 24, 2018, 9:18 pm UTC
 *
 * @property string unitis_of_credit
 * @property string skills_and_abilites
 * @property string knowledge
 * @property integer user_id
 */
class Student extends Model
{
    use SoftDeletes;

    public $table = 'students';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'unitis_of_credit',
        'skills_and_abilites',
        'knowledge',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'unitis_of_credit' => 'string',
        'skills_and_abilites' => 'string',
        'knowledge' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'unitis_of_credit' => 'required',
        'skills_and_abilites' => 'required',
        'knowledge' => 'required',
        //'user_id' => 'required'
    ];

    
}
