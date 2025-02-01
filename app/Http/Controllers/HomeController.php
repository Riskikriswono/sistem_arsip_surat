<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('dasboard');
    }
    public function dashboard()
    {
        $data1 = DB::table('datapegawais')->get();
        $data1a = DB::table('datapegawais')->where('jeniskelamin', '=', "Laki-laki")->get();
        $data1b = DB::table('datapegawais')->where('jeniskelamin', '=', "Perempuan")->get();
        $data2 = DB::table('surat_masuks')->get();
        $data3 = DB::table('surat_keluars')->get();
        return view('dasboard', compact('data1','data1a','data1b','data2','data3'));
    }
}
