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
              <form role="form" action="{{ route('permintaan.kerjakan', $permintaan) }}" method="post">
              	@csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label for="analis">Analis</label>
                    <select class="form-control" name="analis_id" id="analis">
                      @foreach($analis as $data)
                      <option value="{{ $data->id }}">{{ $data->nama_analis }}</option>
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