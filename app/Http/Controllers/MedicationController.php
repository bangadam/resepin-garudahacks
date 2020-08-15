<?php

namespace App\Http\Controllers;

use App\Models\Apotek;
use App\Models\Apoteker;
use App\Models\Pasien;
use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class MedicationController extends Controller
{
    public function index() {
        return view('medication.index');
    }

    public function indexPasien() {
        $pasien = Pasien::with('resep')->where('id_user', auth()->user()->id)->first();
        return view('medication.indexPasien', compact('pasien'));
    }

    public function searchNik(Request $request) {
        $user = User::with(['pasien', 'resep.resepDetail.obat'])->where('nik', $request->nik)->first();
        return view('medication.index', compact('user'));
    }

    public function profile() {
        $user = auth()->user();
        $apoteker = Apoteker::with(['apotek', 'user'])->where('id_user', $user->id)->first();

        if (empty($apoteker)) {
            Flash::error('Apotek not found');

            return redirect()->back();
        }

        return view('apotekers.profile-edit')->with('apoteker', $apoteker);
    }

    public function updateProfile(Request $request) {
        $apoteker = Apoteker::with(['user', 'apotek'])->where('id_user', auth()->user()->id)->first();

        if (empty($apoteker)) {
            Flash::error('Apotek not found');

            return redirect(route('dokters.index'));
        }

        $apoteker->apotek->update($request->only(['nama', 'alamat', 'nomor_izin']));

        $apoteker->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat_user,
            'telepon' => $request->telepon,
            'nik' => $request->nik,
        ]);

        Flash::success('Profile updated successfully.');

        return redirect(route('apotekers.profile'));
    }
}
