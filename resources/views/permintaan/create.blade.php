@extends('layouts.master')

@section('link')
<!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
              <li class="breadcrumb-item"><a href="#">Permintaan</a></li>
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
                <h3 class="card-title">Form Tambah Data Permintaan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('permintaan.store') }}" method="post">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                  <label>Pelanggan</label>
                  <select class="form-control select2bs4" name="pelanggan_id" style="width: 100%;">
                    <option selected="selected">--Pilih--</option>
                    @foreach($pelanggans as $pelanggan)
                        <option value="{{$pelanggan->id}}">{{$pelanggan->nama_pelanggan}}</option>
                    @endforeach
                  </select>
                </div>
                  <div class="form-group">
                    <label for="judul_penelitian">Judul Penelitian</label>
                    <input type="text" name="judul_penelitian" class="form-control" id="judul_penelitian" placeholder="Masukkan instansi">
                  </div>
                  <div class="form-group">
                  <label>Jenis Contoh</label>
                  <select class="form-control select2bs4" name="kategori_id" style="width: 100%;">
                    <option selected="selected">--Pilih--</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                    @endforeach
                  </select>
                </div>
                  <div class="form-group">
                    <label for="jumlah_contoh">Jumlah Contoh</label>
                    <input type="number" name="jumlah_contoh" class="form-control" id="jumlah_contoh" placeholder="Masukkan nomor telpon">
                  </div>
                  <div class="form-group">
                    <label for="asal_contoh">Asal_contoh</label>
                    <textarea name="asal_contoh" rows="3" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                  <label>Multiple</label>
                  <select class="select2bs4" multiple="multiple" name="analisas[]" data-placeholder="Select a State"
                          style="width: 100%;">
                    @foreach($analisas as $analisa)
                    <option value="{{$analisa->id}}">{{$analisa->nama_analisa}}</option>
                    @endforeach
                  </select>
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

@section('script')
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
@endsection