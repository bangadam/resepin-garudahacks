<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasien;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dokter() {
        $count_pasien = Pasien::count();
        $count_obat = Obat::count();
        return view('dashboard.dokter', compact('count_pasien', 'count_obat'));
    }

    public function apoteker() {
        return view('dashboard.apoteker');
    }

    public function pasien() {

        return view('dashboard.pasien');
    }
}
