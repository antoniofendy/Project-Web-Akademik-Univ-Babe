<?php 
    $BaseUrl = '/administrator/';  
    use Carbon\Carbon;

    use App\Lib\EnumListMhs;

    function getTahunMasuk($thn){

        $tahun = substr($thn, 0, 4);
        return $tahun;

    }
?>

@extends('layouts.admin_temp.master')

@section('title')
    
    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
    Data Mahasiswa

@endsection

<style>
    
    label{
        color: rgb(21, 180, 219);
    }

</style>

@section('konten')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Mahasiswa</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-info">
                                    <h3 class="widget-user-username">{{$mahasiswa->name}}</h3>
                                    <h5 class="widget-user-desc">{{Carbon::parse($mahasiswa->tanggal_lahir)->age}} Tahun</h5>
                                </div>
                                <div class="widget-user-image">
                                    <img class="img-circle elevation-2" src="{{asset('Data Mahasiswa/Mahasiswa/' . getTahunMasuk($mahasiswa->created_at) . '/' . $mahasiswa->foto)}}" alt="User Avatar">
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">3.2</h5>
                                                <span class="description-text">IPS TERAKHIR</span>
                                            </div>
                                        <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">3.6</h5>
                                                <span class="description-text">IPK</span>
                                            </div>
                                        <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">{{$mahasiswa->kelas->nama_kelas}}</h5>
                                                <span class="description-text">{{$mahasiswa->jurusan->nama_jurusan}}</span>
                                            </div>
                                        <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 mt-3">
                                <div class="form-group">
                                    <label for="name">Nama Mahasiswa</label>
                                    <input type="text" name="name" value="{{$mahasiswa->name}}" class="form-control" placeholder="Nama Mahasiswa">
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin">
                                        <option disabled selected>-Pilih Jenis Kelamin-</option>
                                        @foreach (EnumListMhs::jenis_kelamin() as $key => $item)
                                            @if ($key == $mahasiswa->jenis_kelamin)
                                                <option value="{{$key}}" selected>{{$item}}</option>
                                            @else
                                            <option value="{{$key}}">{{$item}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Mahasiswa</label>
                                    <input type="email" name="email" value="{{$mahasiswa->email}}" class="form-control" placeholder="Email Mahasiswa">
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-control" name="jurusan">
                                    @foreach ($jurusan as $item)
                                        @if ($item->id == $mahasiswa->jurusan_id)
                                            <option value="{{$item->id}}" selected>{{$item->nama_jurusan}}</option>
                                        @else
                                            <option value="{{$item->id}}">{{$item->nama_jurusan}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select class="form-control" name="kelas">
                                    @foreach ($kelas as $item)
                                        @if ($item->id == $mahasiswa->kelas_id)
                                            <option value="{{$item->id}}" selected>{{$item->nama_kelas}}</option>
                                        @else
                                            <option value="{{$item->id}}">{{$item->nama_kelas}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control-file" name="foto">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" value="{{$mahasiswa->alamat}}" name="alamat" cols="50" rows="5" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="number" name="telepon" value="{{$mahasiswa->telepon}}" class="form-control" placeholder="Telepon Mahasiswa">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="hp">HP</label>
                                <input type="number" name="hp" value="{{$mahasiswa->hp}}" class="form-control" placeholder="HP Mahasiswa">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" value="{{$mahasiswa->tempat_lahir}}" class="form-control" placeholder="Tempat Lahir Mahasiswa">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="tempat_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{$mahasiswa->tanggal_lahir}}" class="form-control" placeholder="Tanggal Lahir Mahasiswa">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control" name="agama">
                                    <option disabled selected>-Pilih Agama-</option>
                                        @foreach (EnumListMhs::agama() as $key => $item)
                                            @if ($key == $mahasiswa->agama)
                                                <option value="{{$key}}" selected>{{$item}}</option>
                                            @else
                                                <option value="{{$key}}">{{$item}}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="kewarganegaraan">Kewarganegaraan</label>
                                <input type="text" name="kewarganegaraan" value="{{$mahasiswa->kewarganegaraan}}" class="form-control" placeholder="ex : Indonesia">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="nama_ortu">Nama Orang Tua</label>
                                <input type="text" name="nama_ortu" value="{{$mahasiswa->nama_ortu}}" class="form-control" placeholder="Nama Orang Tua Mahasiswa">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="alamat_ortu">Alamat Orang Tua</label>
                                <input type="text" name="alamat_ortu" value="{{$mahasiswa->alamat_ortu}}" class="form-control" placeholder="Alamat Orang Tua Mahasiswa">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="telepon_ortu">Telepon Orang Tua</label>
                                <input type="number" name="telepon_ortu" value="{{$mahasiswa->telepon_ortu}}" class="form-control" placeholder="Telepon Orang Tua Mahasiswa">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <input type="number" name="semester" value="{{$mahasiswa->semester}}" class="form-control" placeholder="Semester Mahasiswa">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="shift">Shift</label>
                                <select class="form-control" name="shift">
                                    <option disabled selected>-Pilih Shift-</option>
                                        @foreach (EnumListMhs::shift() as $key => $item)
                                            @if ($key == $mahasiswa->shift)
                                                <option value="{{$key}}" selected>{{$item}}</option>
                                            @else
                                                <option value="{{$key}}">{{$item}}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col">
                                <a href="{{$BaseUrl . 'data/mahasiswa/' . $mahasiswa->id . '/edit'}}" class="btn btn-warning mr-2"><i class="fas fa-edit"> Edit</i></a>
                                <form action="{{$BaseUrl . 'data/mahasiswa/' . $mahasiswa->id}}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"> Hapus</i></button>
                                </form>
                            </div>
                        </div>
                </div>

            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- ./col -->  

@endsection

@push('scripts')

    

@endpush