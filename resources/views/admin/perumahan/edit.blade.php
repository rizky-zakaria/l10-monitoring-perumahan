@extends('admin.templates.layouts')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Data Member</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="" class="breadcrumb-item"><i class="anticon anticon-database m-r-5"></i>Master Data</a>
                    <a class="breadcrumb-item" href="">Member</a>
                    <span class="breadcrumb-item active">Tambah Data Member</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <form action="{{ url('su/member/' . $data->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="m-t-25">
                        <div class="form-row">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama"
                                class="form-control @error('nama')
                                is-invalid
                            @enderror"
                                value="{{ $data->name }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email')
                                is-invalid
                            @enderror"
                                value="{{ $data->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password')
                                is-invalid
                            @enderror">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ url('su/member/index') }}" class="btn btn-danger btn-sm">Batal</a>
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('css')
    <link href="assets/vendors/select2/select2.css" rel="stylesheet">
    <link href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
@endpush
@push('js')
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/quill/quill.min.js"></script>
    <script src="assets/js/pages/form-elements.js"></script>
@endpush
