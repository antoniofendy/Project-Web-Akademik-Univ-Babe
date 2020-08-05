<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Kelas;

include ('lib/getNewNim.php');

class MahasiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mahasiswa = Mahasiswa::all();

        return view('admin.pages.mahasiswa.index', ['mahasiswa'=>$mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();

        return view('admin.pages.mahasiswa.create', [
            'jurusan' => $jurusan,
            'kelas' => $kelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created_at = Carbon::now()->toDateTimeString();
        $updated_at = Carbon::now()->toDateTimeString();

        $id = getNim($request->jurusan, $created_at);
        
        $foto = $request->file('foto');
        $nama_foto = $foto->getClientOriginalName();
        $tipe_foto = $foto->getClientOriginalExtension();
        
        $tujuan_simpan = public_path() . '\Data Mahasiswa\Mahasiswa\\' . substr($created_at, 0 , 4);
        $foto->move($tujuan_simpan, $id . '.' . $tipe_foto);

            Mahasiswa::create([
            'id' => $id,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'password' => Hash::make($request->telepon),
            'jurusan_id' => $request->jurusan,
            'kelas_id' => $request->kelas,
            'foto' => $id . '.' . $tipe_foto,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'hp' => $request->hp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'nama_ortu' => $request->nama_ortu,
            'alamat_ortu' => $request->alamat_ortu,
            'telepon_ortu' => $request->telepon_ortu,
            'semester' => $request->semester,
            'shift' => $request->shift,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ]);
        
        return redirect('administrator/data/mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $mahasiswa = Mahasiswa::find($id);
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();

        return view('admin.pages.mahasiswa.show', compact('mahasiswa', 'kelas', 'jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('admin.pages.mahasiswa.edit', compact('mahasiswa', 'kelas', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
