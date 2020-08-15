<?php

namespace App\Http\Controllers;

use App\DataTables\ResepDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateResepRequest;
use App\Http\Requests\UpdateResepRequest;
use App\Models\Obat;
use App\Models\Resep;
use App\Models\ResepDetail;
use App\Repositories\ResepRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Response;

class ResepController extends AppBaseController
{
    /** @var  ResepRepository */
    private $resepRepository;

    public function __construct(ResepRepository $resepRepo)
    {
        $this->resepRepository = $resepRepo;
    }

    /**
     * Display a listing of the Resep.
     *
     * @param ResepDataTable $resepDataTable
     * @return Response
     */
    public function index(ResepDataTable $resepDataTable)
    {
        return $resepDataTable->render('reseps.index');
    }

    /**
     * Show the form for creating a new Resep.
     *
     * @return Response
     */
    public function create()
    {
        $obat = Obat::all();
        return view('reseps.create', compact('obat'));
    }

    /**
     * Store a newly created Resep in storage.
     *
     * @param CreateResepRequest $request
     *
     * @return Response
     */
    public function store(CreateResepRequest $request)
    {
        try {
            DB::beginTransaction();
            $id_pasien = Route::current()->parameter('id_pasien');
            $input = $request->all();
            $input['id_user_pasien'] = $id_pasien;
            $resep = Resep::create([
                'id_user_pasien' => $input['id_user_pasien'],
                'id_user_dokter' => auth()->user()->id,
                'tanggal_resep' => $input['tanggal_resep'],
                'diagnosa' => $input['diagnosa'],
            ]);

            foreach ($input['id_obat'] as $key => $value) {
                $resep_detail = ResepDetail::create([
                    'id_resep' => $resep->id,
                    'id_obat' => $value,
                    'kuantitas' => $input['kuantitas'][$key],
                    'satuan' => $input['satuan'][$key],
                    'periode' => $input['periode'][$key],
                    'dalam_sehari' => $input['dalam_sehari'][$key],
                    'dalam_sekali' => $input['dalam_sekali'][$key],
                    'boleh_berulang' => $input['boleh_berulang'][$key],
                ]);
            }

            Flash::success('Resep saved successfully.');

            DB::commit();

            return redirect(route('pasiens.show', $id_pasien));
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

    }

    /**
     * Display the specified Resep.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $resep = $this->resepRepository->find($id);

        if (empty($resep)) {
            Flash::error('Resep not found');

            return redirect(route('reseps.index'));
        }

        return view('reseps.show')->with('resep', $resep);
    }

    /**
     * Show the form for editing the specified Resep.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $resep = $this->resepRepository->find($id);

        if (empty($resep)) {
            Flash::error('Resep not found');

            return redirect(route('reseps.index'));
        }

        return view('reseps.edit')->with('resep', $resep);
    }

    /**
     * Update the specified Resep in storage.
     *
     * @param int $id
     * @param UpdateResepRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResepRequest $request)
    {
        $resep = $this->resepRepository->find($id);

        if (empty($resep)) {
            Flash::error('Resep not found');

            return redirect(route('reseps.index'));
        }

        $resep = $this->resepRepository->update($request->all(), $id);

        Flash::success('Resep updated successfully.');

        return redirect(route('reseps.index'));
    }

    /**
     * Remove the specified Resep from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $resep = $this->resepRepository->find($id);

        if (empty($resep)) {
            Flash::error('Resep not found');

            return redirect(route('reseps.index'));
        }

        $this->resepRepository->delete($id);

        Flash::success('Resep deleted successfully.');

        return redirect(route('reseps.index'));
    }

    public function getResep($id) {
        $resep = Resep::with('resepDetail.obat')->find($id);
        return response()->json($resep->resepDetail);
    }
}
