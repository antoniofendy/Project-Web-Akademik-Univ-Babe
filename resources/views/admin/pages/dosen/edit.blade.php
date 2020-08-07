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
    
    <i class="fas fa-book" aria-hidden="true"></i>
    Data Dosen

@endsection

<style>
    
    label{
        color: rgb(21, 180, 219);
    }

</style>

@section('konten')
    <form action="{{url($BaseUrl . 'data/dosen/' . $dosen->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Dosen</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="card card-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-info">
                                        <h3 class="widget-user-username">{{$dosen->name}}</h3>
                                        <h5 class="widget-user-desc">{{Carbon::parse($dosen->tanggal_lahir)->age}} Tahun</h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="{{asset('Data Dosen/Dosen/' . getTahunMasuk($dosen->created_at) . '/' . $dosen->foto)}}" alt="User Avatar">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <!-- /.col -->
                                            <div class="col-sm-6 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">Jumlah Jadwal</h5>
                                                    <span class="description-text">{{$dosen->jadwal->count()}}</span>
                                                </div>
                                            <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="description-block">
                                                    <h5 class="description-header">Mulai Mengajar</h5>
                                                    <span class="description-text">{{getTahunMasuk($dosen->created_at)}}</span>
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
                                        <label for="name">Nama Dosen</label>
                                        <input type="text" name="name" value="{{$dosen->name}}" class="form-control" placeholder="Nama Dosen">
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin">
                                            <option selected>-Pilih Jenis Kelamin-</option>
                                            @foreach (EnumListMhs::jenis_kelamin() as $key => $item)
                                                @if ($key == $dosen->jenis_kelamin)
                                                    <option value="{{$key}}" selected>{{$item}}</option>
                                                @else
                                                <option value="{{$key}}">{{$item}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email Dosen</label>
                                        <input type="email" name="email" value="{{$dosen->email}}" class="form-control" placeholder="Email Dosen">
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <select class="form-control" name="jurusan">
                                        @foreach ($jurusan as $item)
                                            @if ($item->id == $dosen->jurusan_id)
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
                                    <label for="foto">Foto</label>
                                    @if ($dosen->foto != '')
                                        <input type="text" value="{{$dosen->foto}}" class="form-control"> 
                                    @else
                                        <input type="file" class="form-control-file" name="foto">
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" value="{{$dosen->alamat}}" name="alamat" cols="50" rows="5" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="number" name="telepon" value="{{$dosen->telepon}}" class="form-control" placeholder="Telepon Dosen">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" value="{{$dosen->tempat_lahir}}" class="form-control" placeholder="Tempat Lahir Dosen">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="{{$dosen->tanggal_lahir}}" class="form-control" placeholder="Tanggal Lahir Dosen">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select class="form-control" name="agama">
                                        <option selected>-Pilih Agama-</option>
                                            @foreach (EnumListMhs::agama() as $key => $item)
                                                @if ($key == $dosen->agama)
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
                                    <input type="text" name="kewarganegaraan" value="{{$dosen->kewarganegaraan}}" class="form-control" placeholder="ex : Indonesia">
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-pencil"> Edit</i></button>
                                </div>
                            </div>
                    </div>

                </div>

            </div>
            <!-- /.card-body -->
        </div>      
        <!-- ./col -->  
    </form>

@endsection

@push('scripts')

    

@endpush