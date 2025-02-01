@extends('layouts.main')
@section('title', 'Edit Data Pegawai')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h4 class="mb-0 text-gray-800">Arsip Surat Keluar</h4>
    @if(session('status'))
    <div id="myAlert" class="alert alert-success alert-dismissible fade show">
        <strong>Berhasil,</strong> {{session('status')}}
        <button id="myBtn" type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <h6 class="mb-0 text-gray-700">Edit Data</h6>
</div>
<br>
<div class="row pb-5">
    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
        @method('patch')
        {{-- @method('PUT') --}}
        @csrf
        {{ csrf_field() }}
        <div class="mb-2 row">
            <div class="col-md-6">
                <label for="name">Penginput Data</label>
                <input type="text" id="name" name="name" value="{{$data->name}}" class="form-control" disabled="true" />
            </div>
            <div class="col-md-6">
                <label for="nomorsurat">Nomor Surat</label>
                <input type="text" id="nomorsurat" name="nomorsurat" value="{{$data->nomorsurat}}"
                    class="form-control @error('nomorsurat') is-invalid @enderror" />
            </div>
        </div>
        <div class="mb-2 row">
            <div class="col-md-6">
                <label for="tujuan">Tujuan</label>
                <input type="text" id="tujuan" name="tujuan" value="{{$data->tujuan}}"
                    class="form-control @error('pengirim') is-invalid @enderror" />
            </div>
            <div class="col-md-6">
                <label for="tanggal">Tanggal Surat</label>
                <input type="date" id="tanggal" name="tanggal" value="{{$data->tanggal}}"
                    class="form-control @error('tanggal') is-invalid @enderror" />
            </div>
        </div>
        <div class=" mb-2 row">
            <div class="col-md-6">
                <label for="perihal">Perihal</label>
                <input type="text" id="perihal" name="perihal" value="{{$data->perihal}}"
                    class="form-control @error('perihal') is-invalid @enderror" />
            </div>
            <div class="col-md-6">
                <label>Nama File</label>
                <input type="text" value="{{$data->dokumen}}" class="form-control" disabled="true" />
            </div>
        </div>
        <div class=" mb-2 row">
            <div class="col-md-6">
                <label for="keterangan">Keterangan</label>
                <textarea type="text" id="keterangan" name="keterangan"
                    class="form-control @error('keterangan') is-invalid @enderror"
                    rows="3" />{{$data->keterangan}}</textarea>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <div class="mb-4">
            <label for="dokumen">Dokumen</label>
            <input type="file" id="dokumen" name="dokumen" value="{{$data->dokumen}}" class="form-control" />
        </div>
        <div>
            <a href="{{url('/suratkeluar/update/'.$data->id_sk)}}"> <button type="submit"
                    class="btn btn-primary pl-3 pr-3">
                    <i class="fa-regular fa-paper-plane"></i> Kirim
                </button></a>
            <a href="{{url('/suratkeluar')}}"><button type="button" class="btn btn-secondary pl-3 pr-3">
                    <i class="fa-solid fa-chevron-left"></i> Kembali
                </button></a>
            <a href="{{ asset('filesuratkeluar/'.$data->dokumen) }}" target="_blank"><button type="button"
                    class="btn btn-info pl-3 pr-3">
                    <i class="fa-regular fa-eye"></i> Lihat File
                </button></a>

        </div>
    </form>
</div>
@endsection
