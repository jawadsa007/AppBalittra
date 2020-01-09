<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use PDF;

class PelangganController extends Controller
{

	public function index()
	{
		$pelanggans = Pelanggan::all();
    	return view('pelanggan.index', compact('pelanggans'));
	}

	public function create()
	{
		return view('pelanggan.create');
	}

	public function store(Request $request)
	{
		$pelanggan = new Pelanggan;
		$pelanggan->nama_pelanggan = $request->nama_pelanggan;
		$pelanggan->nama_instansi = $request->nama_instansi;
		$pelanggan->alamat = $request->alamat;
		$pelanggan->no_telp = $request->no_telp;
		$pelanggan->save();
		return redirect()->route('pelanggan.index');
	}

	public function edit(Pelanggan $pelanggan)
	{
		return view('pelanggan.edit', compact('pelanggan'));
	}

	public function update(Request $request, Pelanggan $pelanggan)
	{
		$pelanggan->nama_pelanggan = $request->nama_pelanggan;
		$pelanggan->nama_instansi = $request->nama_instansi;
		$pelanggan->alamat = $request->alamat;
		$pelanggan->no_telp = $request->no_telp;
		$pelanggan->save();
		return redirect()->route('pelanggan.index');
	}

	public function delete(Pelanggan $pelanggan)
	{
		$pelanggan->delete();
		return redirect()->route('pelanggan.index');
	}
    
    public function laporan(Pelanggan $pelanggan)
    {
    	$total = $pelanggan->permintaan->count();
    	
    	return view('pelanggan.laporan', compact('pelanggan', 'total'));
    }
}
