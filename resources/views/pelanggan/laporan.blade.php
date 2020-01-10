@extends('layouts.cetak')

@section('title')
Detail-Permintaan
@endsection

@section('link')

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
                        <td>{{ $pelanggan->nama_pelanggan }}</td>
                      </tr>
                      <tr>
                        <th>Instansi</th>
                        <th>:</th>
                        <td>{{ $pelanggan->nama_instansi }}</td>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <td>{{ $pelanggan->alamat }}</td>
                      </tr>
                      <tr>
                        <th>Nomor Telpon</th>
                        <th>:</th>
                        <td>{{ $pelanggan->no_telp }}</td>
                      </tr>
                      <tr>
                        <th>Jumalah Permintaan Analisa Setahun Terakhir</th>
                        <th>:</th>
                        <td>{{ $total }}</td>
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
                      <th style="text-align: center;">No</th>
                      <th style="text-align: center;">Judul Penelitian</th>
                      <th style="text-align: center;">Nomor Sampel</th>
                      <th style="text-align: center;">Tanggal Terima</th>
                      <th style="text-align: center;">Tanggal Perkiraan Selesai</th>
                      <th style="text-align: center;">Tanggal Selesai</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=0 ;?>
                    @foreach($pelanggan->permintaan as $permintaan)
                    <?php $no++ ;?>
                    <tr>
                      <td style="text-align: center;">{{ $no }}</td>
                      <td style="text-align: center;">{{ $permintaan->judul_penelitian }}</td>
                      <td style="text-align: center;">{{ $permintaan->id }}</td>
                      <td style="text-align: center;">{{ $permintaan->created_at->format('d-m-Y') }}</td>
                      @if($permintaan->status_proses === 0 )
                      <td style="text-align: center;">{{ $permintaan->created_at->addDay(30)->format('d-m-Y') }}</td>
                      @elseif($permintaan->status_proses === 1)
                      <td style="text-align: center;">{{ $permintaan->created_at->addDay(30)->format('d-m-Y') }}</td>
                      @else
                      <td style="text-align: center;">---</td>
                      @endif
                      @if($permintaan->status_proses === 2)
                      <td style="text-align: center;">{{ $permintaan->updated_at->format('m-d-Y') }}</td>
                      @else
                      <td style="text-align: center;">---</td>
                      @endif
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