<?php

namespace App\Http\Controllers;

use App\DataTables\ApotekDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateApotekRequest;
use App\Http\Requests\UpdateApotekRequest;
use App\Repositories\ApotekRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ApotekController extends AppBaseController
{
    /** @var  ApotekRepository */
    private $apotekRepository;

    public function __construct(ApotekRepository $apotekRepo)
    {
        $this->apotekRepository = $apotekRepo;
    }

    /**
     * Display a listing of the Apotek.
     *
     * @param ApotekDataTable $apotekDataTable
     * @return Response
     */
    public function index(ApotekDataTable $apotekDataTable)
    {
        return $apotekDataTable->render('apoteks.index');
    }

    /**
     * Show the form for creating a new Apotek.
     *
     * @return Response
     */
    public function create()
    {
        return view('apoteks.create');
    }

    /**
     * Store a newly created Apotek in storage.
     *
     * @param CreateApotekRequest $request
     *
     * @return Response
     */
    public function store(CreateApotekRequest $request)
    {
        $input = $request->all();

        $apotek = $this->apotekRepository->create($input);

        Flash::success('Apotek saved successfully.');

        return redirect(route('apoteks.index'));
    }

    /**
     * Display the specified Apotek.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $apotek = $this->apotekRepository->find($id);

        if (empty($apotek)) {
            Flash::error('Apotek not found');

            return redirect(route('apoteks.index'));
        }

        return view('apoteks.show')->with('apotek', $apotek);
    }

    /**
     * Show the form for editing the specified Apotek.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $apotek = $this->apotekRepository->find($id);

        if (empty($apotek)) {
            Flash::error('Apotek not found');

            return redirect(route('apoteks.index'));
        }

        return view('apoteks.edit')->with('apotek', $apotek);
    }

    /**
     * Update the specified Apotek in storage.
     *
     * @param  int              $id
     * @param UpdateApotekRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateApotekRequest $request)
    {
        $apotek = $this->apotekRepository->find($id);

        if (empty($apotek)) {
            Flash::error('Apotek not found');

            return redirect(route('apoteks.index'));
        }

        $apotek = $this->apotekRepository->update($request->all(), $id);

        Flash::success('Apotek updated successfully.');

        return redirect(route('apoteks.index'));
    }

    /**
     * Remove the specified Apotek from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $apotek = $this->apotekRepository->find($id);

        if (empty($apotek)) {
            Flash::error('Apotek not found');

            return redirect(route('apoteks.index'));
        }

        $this->apotekRepository->delete($id);

        Flash::success('Apotek deleted successfully.');

        return redirect(route('apoteks.index'));
    }
}
