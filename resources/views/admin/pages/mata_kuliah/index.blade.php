<?php $BaseUrl = '/administrator/'; ?>

@extends('layouts.admin_temp.master')

@section('title')
    
    <i class="fas fa-book" aria-hidden="true"></i>
    Data Mata Kuliah
@endsection

@section('konten')

    @if (Session::has('delete_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{!! Session::get('delete_success') !!}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @else
            @if (Session::has('update_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{!! Session::get('update_success') !!}</strong>
                    <button button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @else
                @if (Session::has('create_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{!! Session::get('create_success') !!}</strong>
                        <button button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
        @endif
    @endif

    <a href="{{url( $BaseUrl . 'data/matakuliah/create')}}" class="btn btn-primary mb-3"><i class="fas fa-plus"> Tambah Mata Kuliah</i></a>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Seluruh Mata Kuliah</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Kode</th>
                                <th width="40%">Nama</th>
                                <th width="15%">Semester</th>
                                <th>SKS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matakuliah as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->nama_matkul}}</td>
                                    <td>{{$data->semester}}</td>
                                    <td>{{$data->sks_matkul}}</td>
                                    <td><a href="{{url( $BaseUrl . 'data/matakuliah/' . $data->id)}}" class="btn btn-info"><i class="fa fa-eye"> Detail</i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Kode</th>
                                <th width="40%">Nama</th>
                                <th width="15%">Semester</th>
                                <th>SKS</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- ./col -->
    </div>

@endsection

@push('scripts')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    
    <!-- jQuery -->
    <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin/dist/js/demo.js')}}"></script>
    <!-- page script -->
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        });
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>

@endpush