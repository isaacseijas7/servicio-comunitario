<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTutorAPIRequest;
use App\Http\Requests\API\UpdateTutorAPIRequest;
use App\Models\Tutor;
use App\Repositories\TutorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TutorController
 * @package App\Http\Controllers\API
 */

class TutorAPIController extends AppBaseController
{
    /** @var  TutorRepository */
    private $tutorRepository;

    public function __construct(TutorRepository $tutorRepo)
    {
        $this->tutorRepository = $tutorRepo;
    }

    /**
     * Display a listing of the Tutor.
     * GET|HEAD /tutors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tutorRepository->pushCriteria(new RequestCriteria($request));
        $this->tutorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tutors = $this->tutorRepository->all();

        return $this->sendResponse($tutors->toArray(), 'Tutors retrieved successfully');
    }

    /**
     * Store a newly created Tutor in storage.
     * POST /tutors
     *
     * @param CreateTutorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTutorAPIRequest $request)
    {
        $input = $request->all();

        $tutors = $this->tutorRepository->create($input);

        return $this->sendResponse($tutors->toArray(), 'Tutor saved successfully');
    }

    /**
     * Display the specified Tutor.
     * GET|HEAD /tutors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tutor $tutor */
        $tutor = $this->tutorRepository->findWithoutFail($id);

        if (empty($tutor)) {
            return $this->sendError('Tutor not found');
        }

        return $this->sendResponse($tutor->toArray(), 'Tutor retrieved successfully');
    }

    /**
     * Update the specified Tutor in storage.
     * PUT/PATCH /tutors/{id}
     *
     * @param  int $id
     * @param UpdateTutorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTutorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tutor $tutor */
        $tutor = $this->tutorRepository->findWithoutFail($id);

        if (empty($tutor)) {
            return $this->sendError('Tutor not found');
        }

        $tutor = $this->tutorRepository->update($input, $id);

        return $this->sendResponse($tutor->toArray(), 'Tutor updated successfully');
    }

    /**
     * Remove the specified Tutor from storage.
     * DELETE /tutors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tutor $tutor */
        $tutor = $this->tutorRepository->findWithoutFail($id);

        if (empty($tutor)) {
            return $this->sendError('Tutor not found');
        }

        $tutor->delete();

        return $this->sendResponse($id, 'Tutor deleted successfully');
    }
}
