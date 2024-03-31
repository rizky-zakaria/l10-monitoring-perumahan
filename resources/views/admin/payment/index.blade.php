@extends('admin.templates.layouts')
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
                                <h5 class="m-b-0">
                                    Rp. {{ isset($market) ? number_format($market, 0, ',', '.') : '0' }}
                                </h5>
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
                                <h5 class="m-b-0">
                                    Rp. {{ isset($pdam) ? number_format($pdam, 0, ',', '.') : '0' }}
                                </h5>
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
                                <h5 class="m-b-0">
                                    Rp. {{ isset($kebersihan) ? number_format($kebersihan, 0, ',', '.') : '0' }}
                                </h5>
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
                                <h5 class="m-b-0">
                                    Rp. {{ isset($keamanan) ? number_format($keamanan, 0, ',', '.') : '0' }}
                                </h5>
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
                                    <th>Produk</th>
                                    <th>Kategori Transaksi</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    {{-- {{ $item->user->biodata->kawasan_id }} --}}
                                    @if ($item->user->biodata->kawasan_id === $kawasan)
                                        <tr>
                                            <td>{{ $item->order_id }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>
                                                @foreach ($item->transaksiDetail as $produk)
                                                    <ul>
                                                        <li>
                                                            {{ $produk->produk->produk }}
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $item->kategori }}
                                            </td>
                                            <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td>{{ $item->status == 'capture' ? 'successfuly' : $item->status }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID Order</th>
                                    <th>Nama</th>
                                    <th>Produk</th>
                                    <th>Kategori Transaksi</th>
                                    <th>Harga</th>
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
