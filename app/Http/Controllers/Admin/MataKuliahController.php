<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\MataKuliah;
use App\Models\Jurusan;

class MataKuliahController extends Controller
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
        $matakuliah = MataKuliah::all();
        return view('admin.pages.mata_kuliah.index', compact('matakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('admin.pages.mata_kuliah.create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //we need to get id again, cause create.blade.php only sent the name of "jurusan", not the id
        $jurusan_id = DB::table('jurusan')->where('nama_jurusan', $request->jurusan_id)->value('id');
        MataKuliah::create([
            "id" => $request->id,
            "nama_matkul" => $request->nama_matkul,
            "semester" => $request->semester,
            "sks_matkul" => $request->sks_matkul,
            "jurusan_id" => $jurusan_id
        ]);

        return redirect('administrator/data/matakuliah')->with('create_success', "Berhasil menambahkan mata kuliah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mata_kuliah = MataKuliah::find($id);
        $jurusan = Jurusan::all();

        return view('admin.pages.mata_kuliah.show', compact('jurusan', 'mata_kuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
