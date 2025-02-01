@extends('layouts.main')
@section('title', 'Tambah Data Pegawai')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h1 class="h4 mb-0 text-gray-800">Arsip Pegawai</h1>
    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil, </strong> {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <h6 class="mb-0 text-gray-700">Tambah Data</h6>
</div>
<br>
<div class="row pb-5">
    <form action="{{url('/datapegawai/tambahdata')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ Auth::user()->id}}">
        <div class="mb-2">
            <label for="nip">NIP</label>
            <input type="number" id="nip" name="nip" class="form-control @error('nip') is-invalid @enderror" />
            @error('nip')
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> --}}
            @enderror
        </div>
        <div class="mb-2">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" />
            @error('nama')
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> --}}
            @enderror
        </div>
        <div class=" mb-2">
            <label class="form-label" for="jeniskelamin">Jenis Kelamin</label>
            <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="nomortelepon">Nomor Telepon</label>
            <input type="number" id="nomortelepon" name="nomortelepon"
                class="form-control @error('nomortelepon') is-invalid @enderror" />
            @error('nomortelepon')
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> --}}
            @enderror
        </div>
        <div class="mb-2">
            <label for="tanggal">Tahun Masuk</label>
            <input type="date" id="tanggal" name="tanggal"
                class="form-control @error('tanggal') is-invalid @enderror" />
            @error('tanggal')
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> --}}
            @enderror
        </div>
        <div class="mb-2">
            <label for="jabatan">Email</label>
            <input type="email" id="jabatan" name="jabatan"
                class="form-control @error('jabatan') is-invalid @enderror" />
            @error('jabatan')
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> --}}
            @enderror
        </div>
        <div class="mb-4">
            <label for="dokumen">Dokumen</label>
            <input type="file" id="dokumen" name="dokumen"
                class="form-control  @error('dokumen') is-invalid @enderror" />
            @error('dokumen')
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> --}}
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary pl-3 pr-3">
                <i class="fa-regular fa-paper-plane"></i> Kirim
            </button>
            <a href="{{url('/datapegawai')}}"><button type="button" class="btn btn-secondary pl-3 pr-3">
                    <i class="fa-solid fa-chevron-left"></i> Kembali
                </button></a>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>
    $('.alert').alert()

</script>
@endsection
