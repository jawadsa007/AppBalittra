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


@section('script')
<!-- FLOT CHARTS -->
<script src="../../plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../../plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../../plugins/flot-old/jquery.flot.pie.min.js"></script>
<!-- Page script -->
<script>
  $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server



    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [[1,{{ $jan}}], [2,{{ $feb }}], [3,{{ $mar }}], [4,{{ $apr }}], [5,{{ $mei }}], [6,{{ $jun }}], [7,{{ $jul }}], [8,{{ $ags }}], [9,{{ $sep }}],[10,{{ $okt }}], [11,{{ $nov }}], [12,{{ $des }}]],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'Jan'], [2,'Feb'], [3,'Mar'], [4,'Apr'], [5,'Mei'], [6,'Jun'], [7,'Jun'], [8,'Ags'], [9,'Sep'], [10,'Okt'], [11,'Nov'], [12,'Des']]
      }
    })
    /* END BAR CHART */

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>
@endsection