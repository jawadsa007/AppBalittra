<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permintaan;
use App\Pelanggan;
use App\Kategori;
use App\Analisa;
use App\Analis;
use PDF;
use Carbon\Carbon;
class PermintaanController extends Controller
{
    public function index()
    {
    	$permintaans =Permintaan::all();
    	return view('permintaan.index', compact('permintaans'));
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

    public function destroy(Permintaan $permintaan)
    {
    	$permintaan->analisa()->detach();
        $permintaan->delete();
        return redirect()->route('permintaan.index');
    }

    public function pembayaran(Permintaan $permintaan)
    {
        $subtotal = $permintaan->analisa->sum('harga');
        $pajak = ($subtotal*5)/100;
        $total = $subtotal + $pajak;
        return view('permintaan.bayar', compact('permintaan', 'subtotal', 'total', 'pajak'));
    }

    public function bayar(Request $request, Permintaan $permintaan)
    {
        $subtotal = $permintaan->analisa->sum('harga');
        $pajak = ($subtotal*5)/100;
        $total = $subtotal + $pajak;

        $permintaan->bayar = $total;
        $permintaan->save();
        return redirect()->route('permintaan.index');
    }

    public function nota(Permintaan $permintaan)
    {
        $subtotal = $permintaan->analisa->sum('harga');
        $pajak = ($subtotal*5)/100;
        $total = $subtotal + $pajak;
         $tgl = Carbon::now()->locale("id_ID");;
        return view('permintaan.nota', compact('permintaan', 'subtotal', 'pajak', 'total', 'tgl'));
    }

    public function belum()
    {
        $permintaans = Permintaan::where('status_proses', 0)->get();
        return view('permintaan.belum', compact('permintaans'));
    }

    public function sedang()
    {
        $permintaans = Permintaan::where('status_proses', 1)->get();
        return view('permintaan.sedang', compact('permintaans'));
    }

    public function selesai()
    {
        $permintaans = Permintaan::where('status_proses', 2)->get();
        return view('permintaan.selesai', compact('permintaans'));
    }

    public function detail(Permintaan $permintaan)
    {
        return view('permintaan.detail', compact('permintaan'));
    }

    public function proses(Permintaan $permintaan)
    {
        $analis = Analis::all();
        return view('permintaan.proses', compact('permintaan', 'analis'));
    }

    public function kerjakan(Request $request, Permintaan $permintaan)
    {
        $permintaan->status_proses = 1;
        $permintaan->analis_id = $request->analis_id;
        $permintaan->save();
        return redirect()->route('permintaan.index');
    }    

    public function done(Permintaan $permintaan)
    {
        $permintaan->status_proses = 2;
        $permintaan->save();
        return redirect()->route('permintaan.index');
    }
}
