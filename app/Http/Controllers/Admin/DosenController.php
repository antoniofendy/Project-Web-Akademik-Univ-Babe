<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use App\Models\Dosen;
use App\Models\Jurusan;

include ('lib/getNewNid.php');

class DosenController extends Controller
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
        $dosen = Dosen::all();

        return view('admin.pages.dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $jurusan = Jurusan::all();
        return view('admin.pages.dosen.create', compact('jurusan'));
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

        $id = getNid($request->jurusan, $created_at);

        $foto = $request->file('foto');
        $nama_foto = $foto->getClientOriginalName();
        $tipe_foto = $foto->getClientOriginalExtension();

        $tujuan_simpan = public_path() . '\Data Dosen\Dosen\\' . substr($created_at, 0 , 4);
        $foto->move($tujuan_simpan, $id . '.' . $tipe_foto);

        Dosen::create([
            "id" => $id,
            "name" => $request->name,
            "agama" => $request->agama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "email" => $request->email,
            "password" => Hash::make($request->telepon),
            "foto" => $id . "." . $tipe_foto,
            "telepon" => $request->telepon,
            "alamat" => $request->alamat,
            "jurusan_id" => $request->jurusan,
            "kewarganegaraan" => $request->kewarganegaraan,
            "created_at" => $created_at,
            "updated_at" => $updated_at
        ]); 

        return redirect('administrator/data/dosen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jurusan = Jurusan::all();
        $dosen = Dosen::find($id);
        return view('admin.pages.dosen.show', compact('dosen', 'jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dosen = Dosen::find($id);
        $jurusan = Jurusan::all();
        return view('admin.pages.dosen.edit', compact('dosen', 'jurusan'));
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
        $updated_at = Carbon::now()->toDateTimeString();
        $foto = $request->file('foto');
        $dosen = Dosen::find($id);

        if(is_null($foto)){
            $dosen->update([
                "name" => $request->name,
                "agama" => $request->agama,
                "jenis_kelamin" => $request->jenis_kelamin,
                "tempat_lahir" => $request->tempat_lahir,
                "tanggal_lahir" => $request->tanggal_lahir,
                "email" => $request->email,
                "password" => Hash::make($request->telepon),
                "telepon" => $request->telepon,
                "alamat" => $request->alamat,
                "jurusan_id" => $request->jurusan,
                "kewarganegaraan" => $request->kewarganegaraan,
                "updated_at" => $updated_at
            ]);
        }
        else{
            $nama_foto = $foto->getClientOriginalName();
            $tipe_foto = $foto->getClientOriginalExtension();

            $tujuan_simpan = public_path() . '\Data Dosen\Dosen\\' . substr($created_at, 0 , 4);
            $foto->move($tujuan_simpan, $id . '.' . $tipe_foto);

        $dosen->update([
            "name" => $request->name,
            "agama" => $request->agama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "email" => $request->email,
            "password" => Hash::make($request->telepon),
            "foto" => $id . "." . $tipe_foto,
            "telepon" => $request->telepon,
            "alamat" => $request->alamat,
            "jurusan_id" => $request->jurusan,
            "kewarganegaraan" => $request->kewarganegaraan,
            "updated_at" => $updated_at
        ]);

        }

        return redirect('administrator/data/dosen')->with("update_success", "Berhasil mengupdate data dosen");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::find($id);
        $dosen->delete();
        
        return redirect('administrator/data/dosen')->with("delete_success", "Berhasil menghapus data dosen");
    }
}
