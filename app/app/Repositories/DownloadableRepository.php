<?php

namespace App\Repositories;

use App\Models\Downloadable;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DownloadableRepository
 * @package App\Repositories
 * @version October 24, 2018, 9:52 pm UTC
 *
 * @method Downloadable findWithoutFail($id, $columns = ['*'])
 * @method Downloadable find($id, $columns = ['*'])
 * @method Downloadable first($columns = ['*'])
*/
class DownloadableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'archive',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Downloadable::class;
    }
}
