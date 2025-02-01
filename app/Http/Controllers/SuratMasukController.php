<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\SuratMasuk;

class SuratMasukController extends Controller
{
    public function index()
    {
        // $data = DB::table('datapegawais')->join('users', 'users.id', '=', 'datapegawais.user_id');
        $data = DB::table('surat_masuks')->get();
        return view('suratmasuk.suratmasuk',compact("data"));
    }
    public function add()
    {
       return view('suratmasuk.create');
    }   
    public function create(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'pengirim' => 'required',
            'nomorsurat' => 'required',
            'perihal' => 'required',
            'keterangan' => 'required',
            'dokumen' => 'required|file|mimes:pdf'
        ]);
        $post = new SuratMasuk();

        $post->user_id = $request->id;
        $post->tanggal = $request->tanggal;
        $post->pengirim = $request->pengirim;
        $post->nomorsurat = $request->nomorsurat;
        $post->perihal = $request->perihal;
        $post->keterangan = $request->keterangan;

        $filenameWithExt = $request->file('dokumen')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('dokumen')->getClientOriginalExtension();
        $filenamestore = $filename.'-'.time().'.'.$extension;
        $path = $request->file('dokumen')->move('filesuratmasuk', $filenamestore);
        $post->dokumen = $filenamestore;


        $post->save();
        return redirect('/suratmasuk/tambahsuratm')->with('status', 'Data Berhasil Ditambahkan.');
    }   
    public function edit($id_sm)
    {
        $data = DB::table('surat_masuks')->join('users', 'users.id', '=', 'surat_masuks.user_id')->where('id_sm', $id_sm)->first();
        return view('suratmasuk.edit',compact("data"));
    } 
    public function update(Request $request, $id_sm)
    {
        $data = DB::table('surat_masuks')->where('id_sm', '=', $id_sm)->first();
        if ($request->file('dokumen') == "") {
            $filenamestore = $data->dokumen;
        } else {
            File::delete(public_path('filesuratmasuk/' . $data->dokumen));
            $filenameWithExt = $request->file('dokumen')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('dokumen')->getClientOriginalExtension();
            $filenamestore = $filename.'-'.time().'.'.$extension;
            $path = $request->file('dokumen')->move('filesuratmasuk', $filenamestore);
        }
        DB::table('surat_masuks')->where('id_sm', $id_sm)->update([
            'tanggal' => $request->tanggal,
            'pengirim' => $request->pengirim,
            'nomorsurat' => $request->nomorsurat,
            'perihal' => $request->perihal,
            'keterangan' => $request->keterangan,
            'dokumen' => $filenamestore,
        ]);
        return redirect('/suratmasuk')->with('status', 'Data Berhasil Diedit.');
    }   
    public function delete($id_sm)
    {
        $data = DB::table('surat_masuks')->where('id_sm', '=', $id_sm)->first();
        File::delete(public_path('filesuratmasuk/' . $data->dokumen));
        DB::table('surat_masuks')->where('id_sm', $id_sm)->delete();
        return redirect('/suratmasuk')->with('status', 'Data Berhasil Dihapus!');
    }
    
    
}
