<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datapegawai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DatapegawaiController extends Controller
{
    public function index()
    {
        // $data = DB::table('datapegawais')->join('users', 'users.id', '=', 'datapegawais.user_id');
        $data = DB::table('datapegawais')->get();
        // $data   = Datapegawai::all();
        return view('datapegawai.datapegawai',compact("data"));
    }
    public function add()
    {
       return view('datapegawai.create');
    }

    public function create(Request $request)
    {   
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'nomortelepon' => 'required',
            'tanggal' => 'required',
            'jabatan' => 'required',
            'dokumen' => 'required|file|mimes:pdf'
        ]);

        $post = new Datapegawai();

        $post->user_id = $request->id;
        $post->nip = $request->nip;
        $post->nama = $request->nama;
        $post->jeniskelamin = $request->jeniskelamin;
        $post->nomortelepon = $request->nomortelepon;
        $post->tanggal = $request->tanggal;
        $post->jabatan = $request->jabatan;

        $filenameWithExt = $request->file('dokumen')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('dokumen')->getClientOriginalExtension();
        $filenamestore = $filename.'-'.time().'.'.$extension;
        $path = $request->file('dokumen')->move('filedatapegawai', $filenamestore);
        $post->dokumen = $filenamestore;

        // $file = $request->file('dokumen');
        // $filename = time() . '.' . $file->getClientOriginalExtension();
        // $file->move('filedatapegawai', $filename);
        // $post->dokumen = $filename;

        $post->save();
        return redirect('datapegawai/tambahd')->with('status', 'Data Berhasil Ditambahkan.');
    }
    public function edit($id_data)
    {
        $data = DB::table('datapegawais')->join('users', 'users.id', '=', 'datapegawais.user_id')->where('id_data', $id_data)->first();
        return view('datapegawai.edit',compact("data"));
    } 
    public function update(Request $request, $id_data)
    {
        // $request->validate([
        //     'nip' => 'required',
        //     'nama' => 'required',
        //     'nomortelepon' => 'required',
        //     'tanggal' => 'required',
        //     'jabatan' => 'required',
        //     'dokumen' => 'required|file|mimes:pdf'
        // ]);
        $data = DB::table('datapegawais')->where('id_data', '=', $id_data)->first();
        // $id = $data->user_id;
        if ($request->file('dokumen') == "") {
            $filenamestore = $data->dokumen;
        } else {
            File::delete(public_path('filedatapegawai/' . $data->dokumen));
            $filenameWithExt = $request->file('dokumen')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('dokumen')->getClientOriginalExtension();
            $filenamestore = $filename.'-'.time().'.'.$extension;
            $path = $request->file('dokumen')->move('filedatapegawai', $filenamestore);
        }
        DB::table('datapegawais')->where('id_data', $id_data)->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jeniskelamin' => $request->jeniskelamin,
            'nomortelepon' => $request->nomortelepon,
            'tanggal' => $request->tanggal,
            'jabatan' => $request->jabatan,
            'dokumen' => $filenamestore
        ]);
        return redirect('/datapegawai')->with('status', 'Data Berhasil Diedit.');
    }   
    public function delete($id_data)
    {
        $data = DB::table('datapegawais')->where('id_data', '=', $id_data)->first();
        File::delete(public_path('filedatapegawai/' . $data->dokumen));
        DB::table('datapegawais')->where('id_data', $id_data)->delete();
        return redirect('/datapegawai')->with('status', 'Data Berhasil Dihapus.');
    }
}
