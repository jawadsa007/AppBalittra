@extends('layouts.cetak')

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
                    	<?php $no=0;?>
                    	@foreach($pendapatan as $permintaan)
                    	<?php $no++;?>
	                    <tr>
						            <td>{{ $no }}</td>
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

            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection