@extends('layouts.main')
@section('title', 'Tambah Data Pegawai')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h1 class="h4 mb-0 text-gray-800">Surat Keluar</h1>
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
    <form action="{{url('/suratkeluar/tambahdata')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ Auth::user()->id}}">
        <div class="mb-2">
            <label for="tanggal">Tanggal Surat</label>
            <input type="date" id="tanggal" name="tanggal"
                class="form-control @error('tanggal') is-invalid @enderror" />
            @error('tanggal')
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> --}}
            @enderror
        </div>
        <div class="mb-2">
            <label for="tujuan">Tujuan</label>
            <input type="text" id="tujuan" name="tujuan" class="form-control @error('tujuan') is-invalid @enderror" />
            @error('tujuan')
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> --}}
            @enderror
        </div>
        <div class="mb-2">
            <label for="nomorsurat">Nomor Surat</label>
            <input type="text" id="nomorsurat" name="nomorsurat"
                class="form-control @error('nomorsurat') is-invalid @enderror" />
            @error('nomor surat')
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> --}}
            @enderror
        </div>
        <div class="mb-2">
            <label for="perihal">Perihal</label>
            <input type="text" id="perihal" name="perihal"
                class="form-control @error('perihal') is-invalid @enderror" />
            @error('perihal')
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> --}}
            @enderror
        </div>
        <div class="mb-2">
            <label for="keterangan">Keterangan</label>
            <textarea type="text" id="keterangan" name="keterangan"
                class="form-control @error('keterangan') is-invalid @enderror" rows="3" /></textarea>
            @error('keterangan')
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> --}}
            @enderror
        </div>
        <div class="mb-4">
            <label for="dokumen">Dokumen</label>
            <input type="file" id="dokumen" name="dokumen"
                class="form-control @error('dokumen') is-invalid @enderror" />
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
