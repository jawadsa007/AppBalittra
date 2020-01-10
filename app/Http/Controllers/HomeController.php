<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tahun = Carbon::now('Asia/Kuala_Lumpur');

        $jan = DB::table('permintaans')
                ->where('bayar', '>', 0)
                ->whereMonth('created_at', 01)
                ->get()->sum('bayar');
        $feb = DB::table('permintaans')
                ->where('bayar', '>', 0)
                ->whereMonth('created_at', 02)
                ->get()->sum('bayar');
        $mar = DB::table('permintaans')
                ->where('bayar', '>', 0)
                ->whereMonth('created_at', 03)
                ->get()->sum('bayar');
        $apr = DB::table('permintaans')
                ->where('bayar', '>', 0)
                ->whereMonth('created_at', 04)
                ->get()->sum('bayar');
        $mei = DB::table('permintaans')
                ->where('bayar', '>', 0)
                ->whereMonth('created_at', 05)
                ->get()->sum('bayar');
        $jun = DB::table('permintaans')
                ->where('bayar', '>', 0)
                ->whereMonth('created_at', 06)
                ->get()->sum('bayar');
        $jul = DB::table('permintaans')
                ->where('bayar', '>', 0)
                ->whereMonth('created_at', 07)
                ->get()->sum('bayar');
        $ags = DB::table('permintaans')
                ->where('bayar', '>', 0)
                ->whereMonth('created_at', 8)
                ->get()->sum('bayar');
        $sep = DB::table('permintaans')
                ->where('bayar', '>', 0)
                ->whereMonth('created_at', 9)
                ->get()->sum('bayar');
        $okt = DB::table('permintaans')
                ->where('bayar', '>', 0)
                ->whereMonth('created_at', 10)
                ->get()->sum('bayar');
        $nov = DB::table('permintaans')
                ->where('bayar', '>', 0)
                ->whereMonth('created_at', 11)
                ->get()->sum('bayar');
        $des = DB::table('permintaans')
                ->where('bayar', '>', 0)
                ->whereMonth('created_at', 12)
                ->get()->sum('bayar');
        return view('home', compact('tahun', 'jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'ags', 'sep', 'okt', 'nov', 'des'));
    }
}
