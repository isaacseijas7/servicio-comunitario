<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Downloadable
 * @package App\Models
 * @version October 24, 2018, 9:52 pm UTC
 *
 * @property string archive
 * @property string status
 */
class Downloadable extends Model
{
    use SoftDeletes;

    public $table = 'downloadables';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'archive',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'archive' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'archive' => 'required',
        'status' => 'required'
    ];

    
}
