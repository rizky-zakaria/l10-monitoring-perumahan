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
    </div>
@endsection
