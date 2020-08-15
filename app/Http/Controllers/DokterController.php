<?php

namespace App\Http\Controllers;

use App\DataTables\DokterDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDokterRequest;
use App\Http\Requests\UpdateDokterProfileRequest;
use App\Http\Requests\UpdateDokterRequest;
use App\Repositories\DokterRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DokterController extends AppBaseController
{
    /** @var  DokterRepository */
    private $dokterRepository;

    public function __construct(DokterRepository $dokterRepo)
    {
        $this->dokterRepository = $dokterRepo;
    }

    /**
     * Display a listing of the Dokter.
     *
     * @param DokterDataTable $dokterDataTable
     * @return Response
     */
    public function index(DokterDataTable $dokterDataTable)
    {
        return $dokterDataTable->render('dokters.index');
    }

    /**
     * Show the form for creating a new Dokter.
     *
     * @return Response
     */
    public function create()
    {
        return view('dokters.create');
    }

    /**
     * Store a newly created Dokter in storage.
     *
     * @param CreateDokterRequest $request
     *
     * @return Response
     */
    public function store(CreateDokterRequest $request)
    {
        $input = $request->all();

        $dokter = $this->dokterRepository->create($input);

        Flash::success('Dokter saved successfully.');

        return redirect(route('dokters.index'));
    }

    /**
     * Display the specified Dokter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dokter = $this->dokterRepository->find($id);

        if (empty($dokter)) {
            Flash::error('Dokter not found');

            return redirect(route('dokters.index'));
        }

        return view('dokters.show')->with('dokter', $dokter);
    }

    /**
     * Show the form for editing the specified Dokter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dokter = $this->dokterRepository->find($id);

        if (empty($dokter)) {
            Flash::error('Dokter not found');

            return redirect(route('dokters.index'));
        }

        return view('dokters.edit')->with('dokter', $dokter);
    }

    /**
     * Update the specified Dokter in storage.
     *
     * @param  int              $id
     * @param UpdateDokterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDokterRequest $request)
    {
        $dokter = $this->dokterRepository->find($id);

        if (empty($dokter)) {
            Flash::error('Dokter not found');

            return redirect(route('dokters.index'));
        }

        $dokter = $this->dokterRepository->update($request->all(), $id);

        Flash::success('Dokter updated successfully.');

        return redirect(route('dokters.index'));
    }

    /**
     * Remove the specified Dokter from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dokter = $this->dokterRepository->find($id);

        if (empty($dokter)) {
            Flash::error('Dokter not found');

            return redirect(route('dokters.index'));
        }

        $this->dokterRepository->delete($id);

        Flash::success('Dokter deleted successfully.');

        return redirect(route('dokters.index'));
    }

    public function profile() {
        $user = auth()->user();
        $dokter = $this->dokterRepository->with(['user'])->find($user->id);

        if (empty($dokter)) {
            Flash::error('Dokter not found');

            return redirect()->back();
        }

        return view('dokters.profile-edit')->with('dokter', $dokter);
    }

    public function updateProfile($id, UpdateDokterProfileRequest $request) {
        $dokter = $this->dokterRepository->with(['user'])->where('id_user', $id)->first();
        if (empty($dokter)) {
            Flash::error('Dokter not found');

            return redirect(route('dokters.index'));
        }

        $dokter = $this->dokterRepository->update($request->all(), $id);

        $dokter->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'nik' => $request->nik,
        ]);

        Flash::success('Profile updated successfully.');

        return redirect(route('dokters.profile'));
    }
}
