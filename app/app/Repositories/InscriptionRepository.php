<?php

namespace App\Repositories;

use App\Models\Inscription;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InscriptionRepository
 * @package App\Repositories
 * @version October 24, 2018, 9:26 pm UTC
 *
 * @method Inscription findWithoutFail($id, $columns = ['*'])
 * @method Inscription find($id, $columns = ['*'])
 * @method Inscription first($columns = ['*'])
*/
class InscriptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'student_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Inscription::class;
    }
}
