@extends('layouts.master')

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
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')

 <!-- general form elements -->
 	<div class="row justify-content-md-center">
 		<div class="col-lg-10">
 			<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Data Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('pelanggan.store') }}" method="post">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" placeholder="Masukkan nama pelanggan">
                  </div>
                  <div class="form-group">
                    <label for="nama_instansi">Instansi</label>
                    <input type="text" name="nama_instansi" class="form-control" id="nama_instansi" placeholder="Masukkan instansi">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" rows="3" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="no_telp">Nomor Telpon</label>
                    <input type="number" name="no_telp" class="form-control" id="no_telp" placeholder="Masukkan nomor telpon">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a class="btn btn-primary float-right" href="{{ route('pelanggan.index') }}">Kembali</a>
                </div>
              </form>
            </div>
 		</div>
 	</div>

@endsection