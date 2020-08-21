<?php 
    $BaseUrl = '/administrator/'; 
?>

@extends('layouts.admin_temp.master')

@section('title')
    
    <i class="fas fa-book" aria-hidden="true"></i>
    Tambah Data Mata Kuliah

@endsection

@section('konten')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">Tambah Data Mata Kuliah</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                    <form action="{{url($BaseUrl . 'data/matakuliah')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8 col-md-12 mb-3">
                                
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <select class="form-control" name="jurusan_id" class="jurusan_id">
                                        <option disabled selected>-Pilih Jurusan-</option>
                                        @foreach ($jurusan as $item)
                                            <option value="{{$item->nama_jurusan}}">{{$item->nama_jurusan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Mata Kuliah</label>
                                    <input type="text" name="nama_matkul" class="form-control nama_matkul" placeholder="Nama Mata Kuliah" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="name">Semester</label>
                                    <input type="number" name="semester" max="8" min="1" class="form-control semester" placeholder="Semester" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="name">SKS Mata Kuliah</label>
                                    <input type="text" name="sks_matkul" class="form-control sks" placeholder="SKS Mata Kuliah" disabled>
                                </div>

                                <button class="btn btn-primary" type="submit">Submit form</button>
                            
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="kode-mata-kuliah">
                                    <h4>Kode Mata Kuliah</h4>
                                    <div class="form-group">
                                        <input type="text" name="id" class="form-control kode" value="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- ./col -->
</div>

@endsection

@push('scripts')

<link rel="stylesheet" href="{{asset('css/admin/matakuliah.css')}}">

<script>

    //script untuk menentukan id
    const kode = document.querySelector(".kode");
    const nama = document.querySelector(".nama_matkul");
    const semester = document.querySelector(".semester");
    const sks = document.querySelector(".sks");

    let kd1 = '';
    let kd2 = '';
    let kd3 = '';

    const jurusan_id = document.querySelector("select");
    jurusan_id.addEventListener("change", function(){
        kd1 = jurusan_id.value.match(/\b\w/g).join('');
        kode.setAttribute("value", kd1);
        nama.removeAttribute("disabled");
    });

    nama.addEventListener("keyup", function(){
        kd2 = nama.value.match(/\b\w/g).join('');
        kode.setAttribute("value", `${kd1}${kd2}`);
        semester.removeAttribute("disabled");
    });

    semester.addEventListener("keyup", function() {
        kd3 = `0${semester.value}`;
        kode.setAttribute("value", `${kd1}${kd2}${kd3}`);
        sks.removeAttribute("disabled");
    });

</script>

@endpush