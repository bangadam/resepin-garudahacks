<?php

namespace App\Http\Controllers;

use App\DataTables\ApotekerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateApotekerRequest;
use App\Http\Requests\UpdateApotekerRequest;
use App\Repositories\ApotekerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ApotekerController extends AppBaseController
{
    /** @var  ApotekerRepository */
    private $apotekerRepository;

    public function __construct(ApotekerRepository $apotekerRepo)
    {
        $this->apotekerRepository = $apotekerRepo;
    }

    /**
     * Display a listing of the Apoteker.
     *
     * @param ApotekerDataTable $apotekerDataTable
     * @return Response
     */
    public function index(ApotekerDataTable $apotekerDataTable)
    {
        return $apotekerDataTable->render('apotekers.index');
    }

    /**
     * Show the form for creating a new Apoteker.
     *
     * @return Response
     */
    public function create()
    {
        return view('apotekers.create');
    }

    /**
     * Store a newly created Apoteker in storage.
     *
     * @param CreateApotekerRequest $request
     *
     * @return Response
     */
    public function store(CreateApotekerRequest $request)
    {
        $input = $request->all();

        $apoteker = $this->apotekerRepository->create($input);

        Flash::success('Apoteker saved successfully.');

        return redirect(route('apotekers.index'));
    }

    /**
     * Display the specified Apoteker.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $apoteker = $this->apotekerRepository->find($id);

        if (empty($apoteker)) {
            Flash::error('Apoteker not found');

            return redirect(route('apotekers.index'));
        }

        return view('apotekers.show')->with('apoteker', $apoteker);
    }

    /**
     * Show the form for editing the specified Apoteker.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $apoteker = $this->apotekerRepository->find($id);

        if (empty($apoteker)) {
            Flash::error('Apoteker not found');

            return redirect(route('apotekers.index'));
        }

        return view('apotekers.edit')->with('apoteker', $apoteker);
    }

    /**
     * Update the specified Apoteker in storage.
     *
     * @param  int              $id
     * @param UpdateApotekerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateApotekerRequest $request)
    {
        $apoteker = $this->apotekerRepository->find($id);

        if (empty($apoteker)) {
            Flash::error('Apoteker not found');

            return redirect(route('apotekers.index'));
        }

        $apoteker = $this->apotekerRepository->update($request->all(), $id);

        Flash::success('Apoteker updated successfully.');

        return redirect(route('apotekers.index'));
    }

    /**
     * Remove the specified Apoteker from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $apoteker = $this->apotekerRepository->find($id);

        if (empty($apoteker)) {
            Flash::error('Apoteker not found');

            return redirect(route('apotekers.index'));
        }

        $this->apotekerRepository->delete($id);

        Flash::success('Apoteker deleted successfully.');

        return redirect(route('apotekers.index'));
    }
}
