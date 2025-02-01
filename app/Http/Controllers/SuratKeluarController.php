<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\SuratKeluar;

class SuratKeluarController extends Controller
{
    public function index()
    {
        // $data = DB::table('datapegawais')->join('users', 'users.id', '=', 'datapegawais.user_id');
        $data = DB::table('surat_keluars')->get();
        return view('suratkeluar.suratkeluar',compact("data"));
    }
    public function add()
    {
       return view('suratkeluar.create');
    }   
    public function create(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'tujuan' => 'required',
            'nomorsurat' => 'required',
            'perihal' => 'required',
            'keterangan' => 'required',
            'dokumen' => 'required|file|mimes:pdf'
        ]);
        $post = new SuratKeluar();

        $post->user_id = $request->id;
        $post->tanggal = $request->tanggal;
        $post->tujuan = $request->tujuan;
        $post->nomorsurat = $request->nomorsurat;
        $post->perihal = $request->perihal;
        $post->keterangan = $request->keterangan;

        $filenameWithExt = $request->file('dokumen')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('dokumen')->getClientOriginalExtension();
        $filenamestore = $filename.'-'.time().'.'.$extension;
        $path = $request->file('dokumen')->move('filesuratkeluar', $filenamestore);
        $post->dokumen = $filenamestore;


        $post->save();
        return redirect('/suratkeluar/tambahsuratk')->with('status', 'Data Berhasil Ditambahkan.');
    }   
    public function edit($id_sk)
    {
        $data = DB::table('surat_keluars')->join('users', 'users.id', '=', 'surat_keluars.user_id')->where('id_sk', $id_sk)->first();
        return view('suratkeluar.edit',compact("data"));
    } 
    public function update(Request $request, $id_sk)
    {
        $data = DB::table('surat_keluars')->where('id_sk', '=', $id_sk)->first();
        if ($request->file('dokumen') == "") {
            $filenamestore = $data->dokumen;
        } else {
            File::delete(public_path('filesuratkeluar/' . $data->dokumen));
            $filenameWithExt = $request->file('dokumen')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('dokumen')->getClientOriginalExtension();
            $filenamestore = $filename.'-'.time().'.'.$extension;
            $path = $request->file('dokumen')->move('filesuratkeluar', $filenamestore);
        }
        DB::table('surat_keluars')->where('id_sk', $id_sk)->update([
            'tanggal' => $request->tanggal,
            'tujuan' => $request->tujuan,
            'nomorsurat' => $request->nomorsurat,
            'perihal' => $request->perihal,
            'keterangan' => $request->keterangan,
            'dokumen' => $filenamestore
        ]);
        return redirect('/suratkeluar')->with('status', 'Data Berhasil Diedit.');
    }   
    public function delete($id_sk)
    {
        $data = DB::table('surat_keluars')->where('id_sk', '=', $id_sk)->first();
        File::delete(public_path('filesuratmasuk/' . $data->dokumen));
        DB::table('surat_keluars')->where('id_sk', $id_sk)->delete();
        return redirect('/suratkeluar')->with('status', 'Data Berhasil Dihapus.');
    }
}
