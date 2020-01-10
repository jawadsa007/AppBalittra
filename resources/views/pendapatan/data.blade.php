@extends('layouts.master')

@section('title')
Pendapatan
@endsection

@section('content_header')

@endsection

@section('content')
<div class="row">
          <div class="col-12">
           <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-7">
                  <h4>
                    <img width="4%" src="{{ asset('dist/img/logo.png') }}" alt=""> Lab Balittra Banjarbaru
                  </h4>
                </div>
                <!-- /.col -->
                <div class="col-5 float-right">
                  <form action="{{ route('pendapatan.filter') }}">
                      @csrf
                      @method('get')
                      <div class="row">
                        <div class="col-5">
                          <input type="date" name="start" class="form-control form-control-sm">
                        </div>
                        <div class="col-5">
                          <input type="date" name="end" class="form-control form-control-sm">
                        </div>
                      <div class="col-2">
                        <button class="btn btn-primary btn-sm" type="submit">Filter</button>
                      </div>
                      
                      </div>
                      
                    </form>
                </div>
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <b>Pendapatan Lab Balittra Pertanggal {{ $tgl->format('d-m-Y') }}</b>
              </div>
              <br>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
              	<h4>Detail</h4>
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nomor Sampel</th>
                      <th>Nama Pelanggan</th>
                      <th>Tanggal Selesai</th>
                      <th>Jumlah</th>
                    </tr>
                    </thead>
                    <tbody>
                    	
                    	@foreach($pendapatan as $index => $permintaan)
                    	
	                    <tr>
						            <td>{{ $index + $pendapatan->firstItem() }}</td>
	                      <td>{{$permintaan->id}}</td>
	                      <td>{{$permintaan->pelanggan->nama_pelanggan}}</td>
	                      <td>{{$permintaan->updated_at->format('d-m-Y')}}</td>
	                      <td>@currency($permintaan->bayar)</td>
	                    </tr>
	                    @endforeach
                    </tbody>
                  </table>

                </div>
                
                
                <!-- /.col -->
              </div>
<div class="row justify-content-center">{{ $pendapatan->links() }}</div>
              <!-- /.row -->

              <div class="row justify-content-end">
                <!-- accepted payments column -->

                <!-- /.col -->
                <div class="col-4">


                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>@currency( $total )</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>@currency( $total )</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="{{ route('pendapatan.laporan') }}" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Cetak</a>
                  <a href="{{ route('home') }}" class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection