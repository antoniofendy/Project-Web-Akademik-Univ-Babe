<?php 
    $BaseUrl = '/administrator/'; 
?>

@extends('layouts.admin_temp.master')

@section('title')
    
    <i class="fas fa-book" aria-hidden="true"></i>
    Edit Data Jurusan

@endsection

@section('konten')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">Edit Data Jurusan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <form action="{{url($BaseUrl . 'data/jurusan/' . $jurusan->id)}}" method="post">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="name">Nama Jurusan</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama Jurusan" value="{{$jurusan->nama_jurusan}}">
                            </div>

                            <button class="btn btn-primary" type="submit">Update</button>

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