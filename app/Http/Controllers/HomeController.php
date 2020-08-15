<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->load('hasRoles.role');
        if($user->hasRoles->role->name == 'pasien') {
            return redirect()->route('dashboard.pasien');
        } else if ($user->hasRoles->role->name == 'dokter') {
            return redirect()->route('dashboard.dokter');
        } else if ($user->hasRoles->role->name == 'apoteker') {
            return redirect()->route('dashboard.apoteker');
        }
    }
}
