<?php

namespace App\Http\Controllers;

use App\DataTables\PasienDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePasienRequest;
use App\Http\Requests\UpdatePasienRequest;
use App\Models\Pasien;
use App\Repositories\PasienRepository;
use App\User;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class PasienController extends AppBaseController
{
    /** @var  PasienRepository */
    private $pasienRepository;

    public function __construct(PasienRepository $pasienRepo)
    {
        $this->pasienRepository = $pasienRepo;
    }

    /**
     * Display a listing of the Pasien.
     *
     * @param PasienDataTable $pasienDataTable
     * @return Response
     */
    public function index(PasienDataTable $pasienDataTable)
    {
        return $pasienDataTable->render('pasiens.index');
    }

    /**
     * Show the form for creating a new Pasien.
     *
     * @return Response
     */
    public function create()
    {
        return view('pasiens.create');
    }

    /**
     * Store a newly created Pasien in storage.
     *
     * @param CreatePasienRequest $request
     *
     * @return Response
     */
    public function store(CreatePasienRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $input['password'] = bcrypt($input->password);
            $user = User::create($request->except('dob'));
            $input['id_user'] = $user->id;
            $pasien = $this->pasienRepository->create([
                'id_user' => $input['id_user'],
                'dob' => $input['dob'],
            ]);

            DB::commit();

            Flash::success('Pasien saved successfully.');


            return redirect(route('pasiens.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified Pasien.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pasien = $this->pasienRepository->with(['user', 'resep'])->find($id);

        if (empty($pasien)) {
            Flash::error('Pasien not found');

            return redirect(route('pasiens.index'));
        }

        return view('pasiens.show')->with('pasien', $pasien);
    }

    /**
     * Show the form for editing the specified Pasien.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pasien = $this->pasienRepository->find($id);

        if (empty($pasien)) {
            Flash::error('Pasien not found');

            return redirect(route('pasiens.index'));
        }

        return view('pasiens.edit')->with('pasien', $pasien);
    }

    /**
     * Update the specified Pasien in storage.
     *
     * @param int $id
     * @param UpdatePasienRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePasienRequest $request)
    {
        $pasien = $this->pasienRepository->find($id);

        if (empty($pasien)) {
            Flash::error('Pasien not found');

            return redirect(route('pasiens.index'));
        }

        $pasien = $this->pasienRepository->update($request->all(), $id);
        $user = $pasien->user->update($request->except(['dob', 'id_user']));

        Flash::success('Pasien updated successfully.');

        return redirect()->back();
    }

    /**
     * Remove the specified Pasien from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pasien = $this->pasienRepository->find($id);

        if (empty($pasien)) {
            Flash::error('Pasien not found');

            return redirect(route('pasiens.index'));
        }

        $this->pasienRepository->delete($id);

        Flash::success('Pasien deleted successfully.');

        return redirect(route('pasiens.index'));
    }

    public function profile()
    {
        $user = auth()->user();
        $pasien = Pasien::with(['user'])->where('id_user', $user->id)->first();

        if (empty($pasien)) {
            Flash::error('Pasien not found');

            return redirect()->back();
        }

        return view('pasiens.profile-edit')->with('pasien', $pasien);
    }

    public function updateProfile(Request $request)
    {
        $pasien = Pasien::with(['user'])->where('id_user', auth()->user()->id)->first();

        if (empty($pasien)) {
            Flash::error('Pasien not found');

            return redirect(route('dokters.index'));
        }

        $pasien->update($request->only(['dob']));

        if (empty($request->password)) {
            $pasien->user->update([
                'name' => $request->name,
                'email' => $request->email,
                'alamat' => $request->alamat_user,
                'telepon' => $request->telepon,
                'nik' => $request->nik,
            ]);
        } else {
            $pasien->user->update([
                'name' => $request->name,
                'email' => $request->email,
                'alamat' => $request->alamat_user,
                'telepon' => $request->telepon,
                'nik' => $request->nik,
                'password' => bcrypt($request->password),
            ]);
        }

        Flash::success('Profile updated successfully.');

        return redirect(route('pasiens.profile'));
    }
}
