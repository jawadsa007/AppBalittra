@extends('layouts.master')

@section('title')
Detail-Permintaan
@endsection

@section('link')

@endsection

@section('content_header')
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Permintaan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Permintaan</a></li>
              <li class="breadcrumb-item active">Proses</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
  <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i><img width="3%" src="{{ asset('dist/img/logo.png') }}" alt=""></i> Lab Balittra Banjarbaru
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                  <table width="100%">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>:</th>
                        <td>{{ $permintaan->pelanggan->nama_pelanggan }}</td>
                      </tr>
                      <tr>
                        <th>Instansi</th>
                        <th>:</th>
                        <td>{{ $permintaan->pelanggan->nama_instansi }}</td>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <td>{{ $permintaan->pelanggan->alamat }}</td>
                      </tr>
                      <tr>
                        <th>Nomor Telpon</th>
                        <th>:</th>
                        <td>{{ $permintaan->pelanggan->no_telp }}</td>
                      </tr>
                      <tr>
                        <th>Judul Penelitian</th>
                        <th>:</th>
                        <td>{{ $permintaan->judul_penelitian }}</td>
                      </tr>
                      <tr>
                        <th>Nomor Sampel</th>
                        <th>:</th>
                        <td>{{ $permintaan->id }}</td>
                      </tr>
                      <tr>
                        <th>Jenis Sampel</th>
                        <th>:</th>
                        <td>{{ $permintaan->kategori->nama_kategori }}</td>
                      </tr>
                      <tr>
                        <th>Jumlah Sampel</th>
                        <th>:</th>
                        <td>{{ $permintaan->jumlah_contoh }}</td>
                      </tr>
                      <tr>
                        <th>Asal Sampel</th>
                        <th>:</th>
                        <td>{{ $permintaan->asal_contoh }}</td>
                      </tr>
                    </thead>
                  </table>
                  <br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Analisa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=0 ;?>
                    @foreach($permintaan->analisa as $analisa)
                    <?php $no++ ;?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $analisa->nama_analisa }}</td>
                    </tr>   
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="{{ route('permintaan.index') }}" class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i> Kembali</a>

                  <a href="{{ route('permintaan.proses', $permintaan) }}" class="btn btn-default"><i class="fas fa-print"></i> Proses</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection

@section('script')

@endsection