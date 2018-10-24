<?php

namespace App\Repositories;

use App\Models\Configuration;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConfigurationRepository
 * @package App\Repositories
 * @version October 24, 2018, 8:38 pm UTC
 *
 * @method Configuration findWithoutFail($id, $columns = ['*'])
 * @method Configuration find($id, $columns = ['*'])
 * @method Configuration first($columns = ['*'])
*/
class ConfigurationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Configuration::class;
    }
}
