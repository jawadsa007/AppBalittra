@extends('layouts.master')

@section('link')
<!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endsection

@section('content_header')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
              <li class="breadcrumb-item active">Data Pelanggan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Pelanggan</h3>
              <a class="btn btn-primary btn-sm float-sm-right" href="{{ route('pelanggan.create') }}">Tambah</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table width="100%" id="example1" class="table table-responsive table-bordered table-striped">
                <thead>
                <tr>
                  <th width="6%">No</th>
                  <th>ID Pelanggan</th>
                  <th width="18%">Nama Pelanggan</th>
                  <th width="18%">Instansi</th>
                  <th width="18%">Alamat</th>
                  <th width="14%">No Telpon</th>
                  <th width="12%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=0; ?>
                @foreach($pelanggans as $pelanggan)
                <?php $no++ ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$pelanggan->created_at->format('Y')}}{{$pelanggan->id}}</td>
                  <td>{{$pelanggan->nama_pelanggan}}</td>
                  <td>{{$pelanggan->nama_instansi}}</td>
                  <td>{{$pelanggan->alamat}}</td>
                  <td>{{$pelanggan->no_telp}}</td>
                  <td>
                    <div class="row justify-content-md-center">
                      <a style="margin-right: 2px" class="btn btn-default btn-xs" href="{{ route('pelanggan.laporan', $pelanggan) }}" target="_blank"><i class="fa fa-print"></i></a>
                      <a style="margin-right: 2px" class="btn btn-warning btn-xs" href=""><i class="fa fa-edit"></i></a>
                      <form action="">
                        <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                      </form>
                    </div>    
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
		</div>
	</div>
@endsection

@section('script')
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection