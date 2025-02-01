@extends('layouts.main')
@section('title', 'Surat Keluar')
@section('content')
<div class="row align-items-center mb-2">
    <div class="col-4">
        <h4 class=" mb-0 text-gray-800">Surat Keluar</h4>
    </div>

    <div class="col-4">
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil, </strong> {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('/suratkeluar/tambahsuratk')}}"><button type="button" class="btn btn-primary">
                    <i class="fa-light fa-circle-plus"></i> Tambah Data
                </button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table_id" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Nomor Surat</th>
                            <th>Tujuan</th>
                            <th>Tanggal</th>
                            <th>Perihal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nomor Surat</th>
                            <th>Tujuan</th>
                            <th>No Telepon</th>
                            <th>Perihal</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr>
                            <td>{{$item->nomorsurat}}</td>
                            <td>{{$item->tujuan}}</td>
                            <td>{{$item->tanggal}}</td>
                            <td>{{$item->perihal}}</td>
                            <td class="text-center">
                                <a href="{{url('/suratkeluar/edit/'.$item->id_sk)}}"><i
                                        class="fa-solid fa-pen-to-square fa-lg" style="color:blue"></i></a>
                                |
                                <a href="{{url('/suratkeluar/hapus/'.$item->id_sk)}}"
                                    onclick="return confirm('Data akan dihapus?')"><i class="fa-solid fa-trash fa-lg"
                                        style="color:red"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js">
</script>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });

</script>
<script>
    $('.alert').alert()

</script>
{{-- <script src="{{ asset('vendor1/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor1/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor1/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('js1/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor1/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor1/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script> --}}
@endsection
