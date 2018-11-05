<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTutorRequest;
use App\Http\Requests\UpdateTutorRequest;
use App\Repositories\TutorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TutorController extends AppBaseController
{
    /** @var  TutorRepository */
    private $tutorRepository;

    public function __construct(TutorRepository $tutorRepo)
    {
        $this->tutorRepository = $tutorRepo;
    }

    /**
     * Display a listing of the Tutor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tutorRepository->pushCriteria(new RequestCriteria($request));
        $tutors = $this->tutorRepository->all();

        return view('tutors.index')
            ->with('tutors', $tutors);
    }

    /**
     * Show the form for creating a new Tutor.
     *
     * @return Response
     */
    public function create()
    {
        return view('tutors.create');
    }

    /**
     * Store a newly created Tutor in storage.
     *
     * @param CreateTutorRequest $request
     *
     * @return Response
     */
    public function store(CreateTutorRequest $request)
    {
        $input = $request->all();

        $input['user_id'] = 1;

        $tutor = $this->tutorRepository->create($input);

        Flash::success('Tutor saved successfully.');

        return redirect(route('tutors.index'));
    }

    /**
     * Display the specified Tutor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tutor = $this->tutorRepository->findWithoutFail($id);

        if (empty($tutor)) {
            Flash::error('Tutor not found');

            return redirect(route('tutors.index'));
        }

        return view('tutors.show')->with('tutor', $tutor);
    }

    /**
     * Show the form for editing the specified Tutor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tutor = $this->tutorRepository->findWithoutFail($id);

        if (empty($tutor)) {
            Flash::error('Tutor not found');

            return redirect(route('tutors.index'));
        }

        return view('tutors.edit')->with('tutor', $tutor);
    }

    /**
     * Update the specified Tutor in storage.
     *
     * @param  int              $id
     * @param UpdateTutorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTutorRequest $request)
    {
        $tutor = $this->tutorRepository->findWithoutFail($id);

        if (empty($tutor)) {
            Flash::error('Tutor not found');

            return redirect(route('tutors.index'));
        }

        $tutor = $this->tutorRepository->update($request->all(), $id);

        Flash::success('Tutor updated successfully.');

        return redirect(route('tutors.index'));
    }

    /**
     * Remove the specified Tutor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tutor = $this->tutorRepository->findWithoutFail($id);

        if (empty($tutor)) {
            Flash::error('Tutor not found');

            return redirect(route('tutors.index'));
        }

        $this->tutorRepository->delete($id);

        Flash::success('Tutor deleted successfully.');

        return redirect(route('tutors.index'));
    }
}
