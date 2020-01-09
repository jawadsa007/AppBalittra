@extends('layouts.cetak')

@section('title')
Belum Dikerjakan
@endsection

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="row justify-content-center">
        <h4 class="">Laporan Permintaan Sudah Selesai</h4>
        <br>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No Sampel</th>
            <th>Jenis Sampel</th>
            <th>Jumlah Sampel</th>
            <th>Nama Pelanggan</th>
            <th>Analis</th>
            <th>Tanggal Diterima</th>
            <th>Tanggal Perkiraan Selesai</th>
          </tr>
        </thead>
        <tbody>
          @foreach($permintaans as $permintaan)
          <tr>
            <td>{{ $permintaan->id }}</td>
            <td>{{ $permintaan->kategori->nama_kategori }}</td>
            <td>{{ $permintaan->jumlah_contoh }}</td>
            <td>{{ $permintaan->pelanggan->nama_pelanggan }}</td>
            <td>Analis</td>
            <td>{{ $permintaan->created_at->format('j F Y') }}</td>
            <td>{{ $permintaan->updated_at->format('j F Y') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
@endsection