@extends('layouts.cetak')

@section('title')
nota
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
                        <th>Nomor Sampel</th>
                        <th>:</th>
                        <td>{{ $permintaan->id }}</td>
                      </tr>
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
                        <th>Tanggal Selesai</th>
                        <th>:</th>
                        <td>{{ $permintaan->updated_at->format('d-m-Y') }}</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        
                      </tr>
                    </tbody>
                  </table>
                  <br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <legend>Detail Biaya</legend>
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Analisa</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=0 ;?>
                    @foreach($permintaan->analisa as $analisa)
                    <?php $no++ ;?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $analisa->nama_analisa }}</td>
                      <td>Rp {{ $analisa->harga }}</td>
                    </tr>   
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row justify-content-end">
                <!-- accepted payments column -->
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp {{ $subtotal }}</td>
                      </tr>
                      <tr>
                        <th>PPN (5%)</th>
                        <td>Rp {{$pajak}}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>Rp {{ $total }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div style="margin-top: 100px" class="row justify-content-between">
                <div class="col-3">
                  <br>
                  <h6 style="text-align: center;">Pemohon Analisa</h6>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <h6 style="text-align: center;">{{ $permintaan->pelanggan->nama_pelanggan }}</h6>
                  
                </div>
                <div class="col-3">
                  <h6 style="text-align: center;">Banjarbaru, {{ $tgl->format('d-m-Y') }}</h6>
                  
                  <h6 style="text-align: center;">Admin</h6>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <h6 style="text-align: center;">{{ Auth::user()->name }}</h6>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection