@extends('super_admin.templates.layouts')
@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-blue">
                                <i class="anticon anticon-shopping-cart"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">
                                    Rp. {{ isset($data) == true ? count($data->where('kategori', 'market')) : '0' }}
                                </h2>
                                <p class="m-b-0 text-muted">Market</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-bg-colors"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">Rp.
                                    {{ isset($data) == true ? count($data->where('kategori', 'market')) : '0' }}</h2>
                                <p class="m-b-0 text-muted">PDAM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-gold">
                                <i class="anticon anticon-delete"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">Rp.
                                    {{ isset($data) == true ? count($data->where('kategori', 'market')) : '0' }}</h2>
                                <p class="m-b-0 text-muted">Kebersihan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-purple">
                                <i class="anticon anticon-user"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">Rp.
                                    {{ isset($data) == true ? count($data->where('kategori', 'market')) : '0' }}</h2>
                                <p class="m-b-0 text-muted"> Keamanan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="data-table" class="table">
                            <thead>
                                <tr>
                                    <th>ID Order</th>
                                    <th>Nama</th>
                                    <th>Kategori Transaksi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $data->order_id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->produk->kategori }}</td>
                                        <td>{{ $item->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID Order</th>
                                    <th>Nama</th>
                                    <th>Kategori Transaksi</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
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
@endpush