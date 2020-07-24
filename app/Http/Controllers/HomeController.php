<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Dosen;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function dashboard(){

        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        $kelas = Kelas::all();

        return view('admin.pages.dashboard', compact('mahasiswa', 'dosen', 'kelas'));
    }

}
