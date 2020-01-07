<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permintaan;
use App\Pelanggan;
use App\Kategori;
use App\Analisa;
use PDF;

class PermintaanController extends Controller
{
    public function index()
    {
    	$permintaan =Permintaan::all();
    	return view('permintaan.index', compact('permintaan'));
    }

    public function create()
    {
    	$kategoris = Kategori::all();
    	$analisas =Analisa::all();
    	$pelanggans = Pelanggan::all();
    	return view('permintaan.create', compact('pelanggans', 'analisas', 'kategoris'));
    }

    public function store(Request $request)
    {
    	$permintaan = new Permintaan;
    	$permintaan->pelanggan_id = $request->pelanggan_id;
    	$permintaan->judul_penelitian = $request->judul_penelitian;
    	$permintaan->kategori_id = $request->kategori_id;
    	$permintaan->jumlah_contoh = $request->jumlah_contoh;
    	$permintaan->asal_contoh = $request->asal_contoh;
    	$permintaan->save();
    	$permintaan->analisa()->sync($request->analisas, false);
    	return redirect()->route('permintaan.index');	
    }

    public function edit()
    {
    	
    }

    public function update()
    {
    	
    }

    public function destroy()
    {
    	
    }
}
