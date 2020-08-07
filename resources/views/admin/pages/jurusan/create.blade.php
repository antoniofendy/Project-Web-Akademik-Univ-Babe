<?php 
    $BaseUrl = '/administrator/'; 
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
                <h3 class="card-title">Tambah Data Jurusan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <form action="{{url($BaseUrl . 'data/jurusan')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Jurusan</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama Jurusan">
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