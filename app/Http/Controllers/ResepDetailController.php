<?php

namespace App\Http\Controllers;

use App\DataTables\ResepDetailDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateResepDetailRequest;
use App\Http\Requests\UpdateResepDetailRequest;
use App\Repositories\ResepDetailRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ResepDetailController extends AppBaseController
{
    /** @var  ResepDetailRepository */
    private $resepDetailRepository;

    public function __construct(ResepDetailRepository $resepDetailRepo)
    {
        $this->resepDetailRepository = $resepDetailRepo;
    }

    /**
     * Display a listing of the ResepDetail.
     *
     * @param ResepDetailDataTable $resepDetailDataTable
     * @return Response
     */
    public function index(ResepDetailDataTable $resepDetailDataTable)
    {
        return $resepDetailDataTable->render('resep_details.index');
    }

    /**
     * Show the form for creating a new ResepDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('resep_details.create');
    }

    /**
     * Store a newly created ResepDetail in storage.
     *
     * @param CreateResepDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateResepDetailRequest $request)
    {
        $input = $request->all();

        $resepDetail = $this->resepDetailRepository->create($input);

        Flash::success('Resep Detail saved successfully.');

        return redirect(route('resepDetails.index'));
    }

    /**
     * Display the specified ResepDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $resepDetail = $this->resepDetailRepository->find($id);

        if (empty($resepDetail)) {
            Flash::error('Resep Detail not found');

            return redirect(route('resepDetails.index'));
        }

        return view('resep_details.show')->with('resepDetail', $resepDetail);
    }

    /**
     * Show the form for editing the specified ResepDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $resepDetail = $this->resepDetailRepository->find($id);

        if (empty($resepDetail)) {
            Flash::error('Resep Detail not found');

            return redirect(route('resepDetails.index'));
        }

        return view('resep_details.edit')->with('resepDetail', $resepDetail);
    }

    /**
     * Update the specified ResepDetail in storage.
     *
     * @param  int              $id
     * @param UpdateResepDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResepDetailRequest $request)
    {
        $resepDetail = $this->resepDetailRepository->find($id);

        if (empty($resepDetail)) {
            Flash::error('Resep Detail not found');

            return redirect(route('resepDetails.index'));
        }

        $resepDetail = $this->resepDetailRepository->update($request->all(), $id);

        Flash::success('Resep Detail updated successfully.');

        return redirect(route('resepDetails.index'));
    }

    /**
     * Remove the specified ResepDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $resepDetail = $this->resepDetailRepository->find($id);

        if (empty($resepDetail)) {
            Flash::error('Resep Detail not found');

            return redirect(route('resepDetails.index'));
        }

        $this->resepDetailRepository->delete($id);

        Flash::success('Resep Detail deleted successfully.');

        return redirect(route('resepDetails.index'));
    }
}
