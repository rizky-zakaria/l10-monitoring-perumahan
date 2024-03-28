@extends('super_admin.templates.layouts')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Data Slider</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="" class="breadcrumb-item"><i class="anticon anticon-database m-r-5"></i>Master Data</a>
                    <a class="breadcrumb-item" href="">Slider</a>
                    <span class="breadcrumb-item active">Data Slider</span>
                </nav>
            </div>
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#exampleModal">
                Tambah Data
            </button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="m-t-25">
                    <table id="data-table" class="table">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->gambar }}</td>
                                    <td>
                                        {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModal" data-bs-id="{{ $item->id }}">Hapus
                                        </button> --}}
                                        <form action="{{ url('su/slider/' . $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nomor</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- modal hapus --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form method="post" id="formHapusModal">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('su/slider') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link href="{{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endpush
@push('js')
    <script src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
    <script>
        var deleteModal = document.getElementById('deleteModal')
        deleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-id')
            var formdeleteModal = deleteModal.querySelector('#formHapusModal')
            console.log(id);
            formdeleteModal.action = 'su/slider/' + id
        })
    </script>
@endpush
