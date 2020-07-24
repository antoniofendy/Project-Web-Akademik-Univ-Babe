<?php $BaseUrl = '/administrator/'; ?>

@extends('layouts.admin_temp.master')

@section('title')
    
    <i class="fas fa-book" aria-hidden="true"></i>
    Data Kelas

@endsection

@section('konten')

    <a href="{{url( $BaseUrl . 'data/kelas/create')}}" class="btn btn-primary mb-3"><i class="fas fa-plus"> Tambah Kelas</i></a>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Seluruh Kelas</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Nama Kelas</th>
                                <th>Jurusan</th>
                                <th>Jumlah Mahasiswa</th>
                                <th width="5%">Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->nama_kelas}}</td>
                                    <td>{{$data->jurusan->nama_jurusan}}</td>
                                    <td>{{$data->mahasiswa->count()}}</td>
                                    <td>{{substr($data->nama_kelas, 0, 1)}}</td>
                                    <td><a href="{{url( $BaseUrl . 'data/kelas/' . $data->id)}}" class="btn btn-info"><i class="fa fa-eye"> Detail</i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Nama Kelas</th>
                                <th>Jurusan</th>
                                <th>Jumlah Mahasiswa</th>
                                <th width="5%">Semester</th>
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