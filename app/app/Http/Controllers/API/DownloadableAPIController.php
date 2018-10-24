<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDownloadableAPIRequest;
use App\Http\Requests\API\UpdateDownloadableAPIRequest;
use App\Models\Downloadable;
use App\Repositories\DownloadableRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DownloadableController
 * @package App\Http\Controllers\API
 */

class DownloadableAPIController extends AppBaseController
{
    /** @var  DownloadableRepository */
    private $downloadableRepository;

    public function __construct(DownloadableRepository $downloadableRepo)
    {
        $this->downloadableRepository = $downloadableRepo;
    }

    /**
     * Display a listing of the Downloadable.
     * GET|HEAD /downloadables
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->downloadableRepository->pushCriteria(new RequestCriteria($request));
        $this->downloadableRepository->pushCriteria(new LimitOffsetCriteria($request));
        $downloadables = $this->downloadableRepository->all();

        return $this->sendResponse($downloadables->toArray(), 'Downloadables retrieved successfully');
    }

    /**
     * Store a newly created Downloadable in storage.
     * POST /downloadables
     *
     * @param CreateDownloadableAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDownloadableAPIRequest $request)
    {
        $input = $request->all();

        $downloadables = $this->downloadableRepository->create($input);

        return $this->sendResponse($downloadables->toArray(), 'Downloadable saved successfully');
    }

    /**
     * Display the specified Downloadable.
     * GET|HEAD /downloadables/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Downloadable $downloadable */
        $downloadable = $this->downloadableRepository->findWithoutFail($id);

        if (empty($downloadable)) {
            return $this->sendError('Downloadable not found');
        }

        return $this->sendResponse($downloadable->toArray(), 'Downloadable retrieved successfully');
    }

    /**
     * Update the specified Downloadable in storage.
     * PUT/PATCH /downloadables/{id}
     *
     * @param  int $id
     * @param UpdateDownloadableAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDownloadableAPIRequest $request)
    {
        $input = $request->all();

        /** @var Downloadable $downloadable */
        $downloadable = $this->downloadableRepository->findWithoutFail($id);

        if (empty($downloadable)) {
            return $this->sendError('Downloadable not found');
        }

        $downloadable = $this->downloadableRepository->update($input, $id);

        return $this->sendResponse($downloadable->toArray(), 'Downloadable updated successfully');
    }

    /**
     * Remove the specified Downloadable from storage.
     * DELETE /downloadables/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Downloadable $downloadable */
        $downloadable = $this->downloadableRepository->findWithoutFail($id);

        if (empty($downloadable)) {
            return $this->sendError('Downloadable not found');
        }

        $downloadable->delete();

        return $this->sendResponse($id, 'Downloadable deleted successfully');
    }
}
