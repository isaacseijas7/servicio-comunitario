<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDownloadableRequest;
use App\Http\Requests\UpdateDownloadableRequest;
use App\Repositories\DownloadableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DownloadableController extends AppBaseController
{
    /** @var  DownloadableRepository */
    private $downloadableRepository;

    public function __construct(DownloadableRepository $downloadableRepo)
    {
        $this->downloadableRepository = $downloadableRepo;
    }

    /**
     * Display a listing of the Downloadable.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->downloadableRepository->pushCriteria(new RequestCriteria($request));
        $downloadables = $this->downloadableRepository->all();

        return view('downloadables.index')
            ->with('downloadables', $downloadables);
    }

    /**
     * Show the form for creating a new Downloadable.
     *
     * @return Response
     */
    public function create()
    {
        return view('downloadables.create');
    }

    /**
     * Store a newly created Downloadable in storage.
     *
     * @param CreateDownloadableRequest $request
     *
     * @return Response
     */
    public function store(CreateDownloadableRequest $request)
    {
        $input = $request->all();

        $downloadable = $this->downloadableRepository->create($input);

        Flash::success('Downloadable saved successfully.');

        return redirect(route('downloadables.index'));
    }

    /**
     * Display the specified Downloadable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $downloadable = $this->downloadableRepository->findWithoutFail($id);

        if (empty($downloadable)) {
            Flash::error('Downloadable not found');

            return redirect(route('downloadables.index'));
        }

        return view('downloadables.show')->with('downloadable', $downloadable);
    }

    /**
     * Show the form for editing the specified Downloadable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $downloadable = $this->downloadableRepository->findWithoutFail($id);

        if (empty($downloadable)) {
            Flash::error('Downloadable not found');

            return redirect(route('downloadables.index'));
        }

        return view('downloadables.edit')->with('downloadable', $downloadable);
    }

    /**
     * Update the specified Downloadable in storage.
     *
     * @param  int              $id
     * @param UpdateDownloadableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDownloadableRequest $request)
    {
        $downloadable = $this->downloadableRepository->findWithoutFail($id);

        if (empty($downloadable)) {
            Flash::error('Downloadable not found');

            return redirect(route('downloadables.index'));
        }

        $downloadable = $this->downloadableRepository->update($request->all(), $id);

        Flash::success('Downloadable updated successfully.');

        return redirect(route('downloadables.index'));
    }

    /**
     * Remove the specified Downloadable from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $downloadable = $this->downloadableRepository->findWithoutFail($id);

        if (empty($downloadable)) {
            Flash::error('Downloadable not found');

            return redirect(route('downloadables.index'));
        }

        $this->downloadableRepository->delete($id);

        Flash::success('Downloadable deleted successfully.');

        return redirect(route('downloadables.index'));
    }
}
