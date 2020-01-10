@extends('layouts.master')

@section('title')
Data Permintaan
@endsection

@section('link')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@section('content_header')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Permintaan Analisa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Permintaan Analisa</a></li>
              <li class="breadcrumb-item active">Data Permintaan</li>
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
              <h3 class="card-title">Data Permintaan</h3>
              <div class="row justify-content-end">
                <div style="margin-right: 3px" class="btn-group">
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i> Cetak
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('permintaan.belum') }}" target="_blank">Belum Dikerjakan</a>
                    <a class="dropdown-item" href="{{ route('permintaan.sedang') }}" target="_blank">Sedang Dikerjakan</a>
                    <a class="dropdown-item" href="{{ route('permintaan.selesai') }}" target="_blank">Selesai</a>
                  </div>
                </div>
                <a class="btn btn-primary btn-sm" href="{{ route('permintaan.create') }}"><i class="fa fa-plus"></i> Tambah</a>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="col-12 table-responsive"></div>
              <table width="100%" id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="25%">Nama Pelanggan</th>
                  <th>No Sampel</th>
                  <th>Jenis Sampel</th>
                  <th width="15%">Proses</th>
                  <th width="15%">Pembayaran</th>
                  <th width="11%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=0; ?>
                @foreach($permintaans as $permintaan)
                <?php $no++ ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$permintaan->pelanggan->nama_pelanggan}}</td>
                  <td>{{$permintaan->id}}</td>
                  <td>{{$permintaan->kategori->nama_kategori}}</td>
                  @if($permintaan->status_proses === 0)
                  <td style="text-align: center;">
                    <span class="badge bg-danger">Belum dikerjakan</span>
                  </td>
                  @elseif($permintaan->status_proses === 1)
                  <td style="text-align: center;">
                    <span class="badge bg-warning">Sedang dikerjakan</span>
                  </td>
                  @else
                  <td style="text-align: center;">
                    <span class="badge bg-success">Selesai</span>
                  </td>
                  @endif

                  @if($permintaan->bayar === 0)
                  <td style="text-align: center;">
                    <span class="badge bg-danger">Belum dibayar</span>
                  </td>
                  @else
                  <td style="text-align: center;">
                    <span class="badge bg-success">Lunas</span>
                  </td>
                  @endif
                  <td>
                    <div class="row justify-content-md-center">
                      <a style="margin-right: 2px" class="btn btn-info btn-xs" href="{{ route('permintaan.detail', $permintaan) }}"><i class="fa fa-info"></i></a>
                      <a style="margin-right: 2px" class="btn btn-success btn-xs" href="{{ route('permintaan.pembayaran', $permintaan) }}"><i class="fa fa-hand-holding-usd"></i></a>
                      <a style="margin-right: 2px" class="btn btn-warning btn-xs" href=""><i class="fa fa-edit"></i></a>
                      <form action="{{ route('permintaan.destroy', $permintaan) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                      </form>
                    </div>    
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
		</div>
	</div>
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
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