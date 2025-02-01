@extends('layouts.main')
@section('title', 'Edit Data Pegawai')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h4 class="mb-0 text-gray-800">Arsip Pegawai</h4>
    @if(session('status'))
    <div id="myAlert" class="alert alert-success alert-dismissible fade show">
        <strong>Berhasil,</strong> {{session('status')}}.
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
                @error('name')
                <div class="alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="nip">NIP</label>
                <input type="number" id="nip" name="nip" value="{{$data->nip}}" class="form-control" />
                @error('nip')
                <div class="alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-2 row">
            <div class="col-md-6">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{$data->nama}}" class="form-control" />
                @error('nama')
                <div class="alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="jeniskelamin">Jenis Kelamin</label>
                <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                    <option value="{{$data->jeniskelamin}}">{{$data->jeniskelamin}}</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class=" mb-2 row">
            <div class="col-md-6">
                <label for="tanggal">Tahun Masuk</label>
                <input type="date" id="tanggal" name="tanggal" value="{{$data->tanggal}}" class="form-control" />
                @error('tanggal')
                <div class="alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="nomortelepon">Nomor telepon</label>
                <input type="text" id="nomortelepon" name="nomortelepon" value="{{$data->nomortelepon}}"
                    class="form-control" />
                @error('nomortelepon')
                <div class="alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class=" mb-2 row">
            <div class="col-md-6">
                <label for="jabatan">Email</label>
                <input type="email" id="jabatan" name="jabatan" value="{{$data->jabatan}}" class="form-control" />
                @error('jabatan')
                <div class="alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Nama File</label>
                <input type="text" value="{{$data->dokumen}}" class="form-control" disabled="true" />
            </div>
        </div>
        <div class="mb-4">
            <label for="dokumen">Dokumen</label>
            <input type="file" id="dokumen" name="dokumen" value="{{$data->dokumen}}" class="form-control" />
        </div>
        <div>
            <a href="{{url('/datapegawai/update/'.$data->id_data)}}"> <button type="submit"
                    class="btn btn-primary pl-3 pr-3">
                    <i class="fa-regular fa-paper-plane"></i> Kirim
                </button></a>
            <a href="{{url('/datapegawai')}}"><button type="button" class="btn btn-secondary pl-3 pr-3">
                    <i class="fa-solid fa-chevron-left"></i>Kembali
                </button></a>
            <a href="{{ asset('filedatapegawai/'.$data->dokumen) }}" target="_blank"><button type="button"
                    class="btn btn-info pl-3 pr-3">
                    <i class="fa-regular fa-eye"></i> Lihat File
                </button></a>

        </div>
    </form>
</div>
@endsection
