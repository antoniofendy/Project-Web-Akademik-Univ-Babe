<?php 
    $BaseUrl = '/administrator/';  
    use Carbon\Carbon;

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
                            <form action="{{url($BaseUrl . 'data/mahasiswa/store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Mahasiswa</label>
                                    <input type="text" name="name" value="{{$mahasiswa->name}}" class="form-control" placeholder="Nama Mahasiswa" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" disabled>
                                        @if ($mahasiswa->jenis_kelamin = 'l')
                                            <option value="l">Laki-laki</option>
                                        @else
                                            <option value="p">Perempuan</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Mahasiswa</label>
                                    <input type="email" name="email" value="{{$mahasiswa->email}}" class="form-control" placeholder="Email Mahasiswa" disabled>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-control" name="jurusan" disabled>
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
                                <select class="form-control" name="kelas" disabled>
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
                                @if ($mahasiswa->foto != '')
                                    <div class="form-control">
                                        <p>{{$mahasiswa->foto}}</p>
                                    </div>
                                @else
                                    <input type="file" class="form-control-file" name="foto">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" value="{{$mahasiswa->alamat}}" name="alamat" cols="50" rows="5" class="form-control" disabled>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="number" name="telepon" value="{{$mahasiswa->telepon}}" class="form-control" placeholder="Telepon Mahasiswa" disabled>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="hp">HP</label>
                                <input type="number" name="hp" value="{{$mahasiswa->hp}}" class="form-control" placeholder="HP Mahasiswa" disabled>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" value="{{$mahasiswa->tempat_lahir}}" class="form-control" placeholder="Tempat Lahir Mahasiswa" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="tempat_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{$mahasiswa->tanggal_lahir}}" class="form-control" placeholder="Tanggal Lahir Mahasiswa" disabled>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control" name="agama" disabled>
                                    <option value="{{$mahasiswa->agama}}">{{$mahasiswa->agama}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="kewarganegaraan">Kewarganegaraan</label>
                                <input type="text" name="kewarganegaraan" value="{{$mahasiswa->kewarganegaraan}}" class="form-control" placeholder="ex : Indonesia" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="nama_ortu">Nama Orang Tua</label>
                                <input type="text" name="nama_ortu" value="{{$mahasiswa->nama_ortu}}" class="form-control" placeholder="Nama Orang Tua Mahasiswa" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="alamat_ortu">Alamat Orang Tua</label>
                                <input type="text" name="alamat_ortu" value="{{$mahasiswa->alamat_ortu}}" class="form-control" placeholder="Alamat Orang Tua Mahasiswa" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="telepon_ortu">Telepon Orang Tua</label>
                                <input type="number" name="telepon_ortu" value="{{$mahasiswa->telepon_ortu}}" class="form-control" placeholder="Telepon Orang Tua Mahasiswa" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <input type="number" name="semester" value="{{$mahasiswa->semester}}" class="form-control" placeholder="Semester Mahasiswa" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="shift">Shift</label>
                                <select class="form-control" name="shift" disabled>
                                    @if ($mahasiswa->shift == 'p')
                                        <option value="p">Pagi</option>
                                    @else
                                        <option value="m">Malam</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="row text-center">
                            <div class="col">
                                <button class="btn btn-info" type="submit">Submit form</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- ./col -->  

@endsection

@push('scripts')

    

@endpush