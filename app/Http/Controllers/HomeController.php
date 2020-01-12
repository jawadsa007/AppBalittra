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
        $tahun = Carbon::now('Asia/Kuala_Lumpur')->year;
        $data = array();
        for ($i=1; $i <=12 ; $i++) { 
            $data[$i]=DB::table('permintaans')
                ->where('bayar', '>', 0)
                ->whereMonth('created_at', $i)
                ->get()->sum('bayar');
        }

        
        return view('home', compact('tahun', 'data'));
    }
}
