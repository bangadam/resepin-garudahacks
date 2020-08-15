<?php

namespace App\Http\Controllers;

use App\DataTables\ObatDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateObatRequest;
use App\Http\Requests\UpdateObatRequest;
use App\Repositories\ObatRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ObatController extends AppBaseController
{
    /** @var  ObatRepository */
    private $obatRepository;

    public function __construct(ObatRepository $obatRepo)
    {
        $this->obatRepository = $obatRepo;
    }

    /**
     * Display a listing of the Obat.
     *
     * @param ObatDataTable $obatDataTable
     * @return Response
     */
    public function index(ObatDataTable $obatDataTable)
    {
        return $obatDataTable->render('obats.index');
    }

    /**
     * Show the form for creating a new Obat.
     *
     * @return Response
     */
    public function create()
    {
        return view('obats.create');
    }

    /**
     * Store a newly created Obat in storage.
     *
     * @param CreateObatRequest $request
     *
     * @return Response
     */
    public function store(CreateObatRequest $request)
    {
        $input = $request->all();

        $obat = $this->obatRepository->create($input);

        Flash::success('Obat saved successfully.');

        return redirect(route('obats.index'));
    }

    /**
     * Display the specified Obat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $obat = $this->obatRepository->find($id);

        if (empty($obat)) {
            Flash::error('Obat not found');

            return redirect(route('obats.index'));
        }

        return view('obats.show')->with('obat', $obat);
    }

    /**
     * Show the form for editing the specified Obat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $obat = $this->obatRepository->find($id);

        if (empty($obat)) {
            Flash::error('Obat not found');

            return redirect(route('obats.index'));
        }

        return view('obats.edit')->with('obat', $obat);
    }

    /**
     * Update the specified Obat in storage.
     *
     * @param  int              $id
     * @param UpdateObatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateObatRequest $request)
    {
        $obat = $this->obatRepository->find($id);

        if (empty($obat)) {
            Flash::error('Obat not found');

            return redirect(route('obats.index'));
        }

        $obat = $this->obatRepository->update($request->all(), $id);

        Flash::success('Obat updated successfully.');

        return redirect(route('obats.index'));
    }

    /**
     * Remove the specified Obat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $obat = $this->obatRepository->find($id);

        if (empty($obat)) {
            Flash::error('Obat not found');

            return redirect(route('obats.index'));
        }

        $this->obatRepository->delete($id);

        Flash::success('Obat deleted successfully.');

        return redirect(route('obats.index'));
    }
}
