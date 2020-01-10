<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permintaan;
use Carbon\Carbon;
use DB;
class PendapatanController extends Controller
{
    public function index()
    {
    	$pendapatan = Permintaan::where('bayar', '>', 0)->paginate(10);

    	$total = $pendapatan->sum('bayar');
    	$tgl = Carbon::now('Asia/Kuala_Lumpur');

    	return view('pendapatan.data', compact('pendapatan', 'total', 'tgl'));
    }

    public function filter(Request $request)
    {
    	$pendapatan = Permintaan::whereBetween('updated_at',[$request->start, $request->end])->paginate(10);
    	$total = $pendapatan->sum('bayar');
    	$tgl = Carbon::now('Asia/Kuala_Lumpur');
    	return view('pendapatan.data', compact('pendapatan', 'total', 'tgl'));
    }

    public function laporan(Request $request)
    {
    	$pendapatan = Permintaan::where('bayar', '>', 0)->get();

        $total = $pendapatan->sum('bayar');
        $tgl = Carbon::now('Asia/Kuala_Lumpur');
        return view('pendapatan.laporan', compact('pendapatan', 'total', 'tgl'));
    }
}
