<?php 
    $BaseUrl = '/administrator/'; 
    use App\Lib\EnumListMhs;
?>

@extends('layouts.admin_temp.master')

@section('title')
    
    <i class="fas fa-book" aria-hidden="true"></i>
    Tambah Data Dosen

@endsection

@section('konten')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">Tambah Data Dosen</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <form action="{{url($BaseUrl . 'data/dosen')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Dosen</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama Dosen">
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option disabled selected>-Pilih Jenis Kelamin-</option>
                                    @foreach (EnumListMhs::jenis_kelamin() as $key => $item)
                                        <option value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Dosen</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Dosen">
                            </div>

                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-control" name="jurusan">
                                    <option disabled selected>-Pilih Jurusan-</option>
                                    @foreach ($jurusan as $item)
                                        <option value="{{$item->id}}">{{$item->nama_jurusan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control-file" name="foto">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" cols="50" rows="5" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="number" name="telepon" class="form-control" placeholder="Telepon Dosen">
                            </div>

                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir Dosen">
                            </div>

                            <div class="form-group">
                                <label for="tempat_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir Dosen">
                            </div>

                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control" name="agama">
                                    <option disabled selected>-Pilih Agama-</option>
                                    @foreach (EnumListMhs::agama() as $key => $item)
                                        <option value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kewarganegaraan">Kewarganegaraan</label>
                                <input type="text" name="kewarganegaraan" class="form-control" placeholder="ex : Indonesia">
                            </div>

                            <button class="btn btn-primary" type="submit">Submit form</button>

                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- ./col -->
</div>

@endsection

@push('scripts')



@endpush