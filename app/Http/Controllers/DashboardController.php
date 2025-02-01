<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = DB::table('datapegawais')->get();
        return view('dasboard', compact("data"));
    }
}
