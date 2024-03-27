@extends('admin.templates.layouts')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Data Perumahan</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="" class="breadcrumb-item"><i class="anticon anticon-database m-r-5"></i>Master Data</a>
                    <a class="breadcrumb-item" href="">Perumahan</a>
                    <span class="breadcrumb-item active">Tambah Data Perumahan</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <form action="{{ url('su/perumahan') }}" method="post">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="m-t-25">
                        <div class="form-row">
                            <label for="nomor_rumah">Nomor Rumah</label>
                            <input type="text" name="nomor_rumah" id="nomor_rumah"
                                class="form-control @error('nomor_rumah')
                                is-invalid
                            @enderror">
                            @error('nomor_rumah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for="tipe">Tipe</label>
                            <input type="text" name="tipe" id="tipe"
                                class="form-control @error('tipe')
                                is-invalid
                            @enderror">
                            @error('tipe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for="kawasan">Kawasan</label>
                            <select name="kawasan" id="kawasan" class="form-control">
                                <option selected disabled>Pilih Kawasan</option>
                                @foreach ($kawasan as $item)
                                    <option value="{{ $item->id }}">{{ $item->kawasan }}</option>
                                @endforeach
                            </select>
                            @error('tipe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option selected disabled>Pilih Kawasan</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Belum Lunas">Belum Lunas</option>
                            </select>
                            @error('status')
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
