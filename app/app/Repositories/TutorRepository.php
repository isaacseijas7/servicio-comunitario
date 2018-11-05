<?php

namespace App\Repositories;

use App\Models\Tutor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TutorRepository
 * @package App\Repositories
 * @version October 24, 2018, 9:23 pm UTC
 *
 * @method Tutor findWithoutFail($id, $columns = ['*'])
 * @method Tutor find($id, $columns = ['*'])
 * @method Tutor first($columns = ['*'])
*/
class TutorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tutor::class;
    }
}
