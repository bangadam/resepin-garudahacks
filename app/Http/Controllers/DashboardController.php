<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dokter() {
        return view('dashboard.dokter');
    }

    public function apoteker() {
        return view('dashboard.apoteker');
    }
}
