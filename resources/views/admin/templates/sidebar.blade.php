<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ url('admin/home') }}">Home</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-database"></i>
                    </span>
                    <span class="title">Master Data</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ url('admin/member') }}">Member</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/perumahan') }}">Perumahan</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/produk') }}">Produk</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-credit-card"></i>
                    </span>
                    <span class="title">Transaksi</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ url('admin/pembayaran') }}">Pembayaran</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/deliveri') }}">Deliveri</a>
                    </li>
                </ul>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ url('admin/monitoring') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-camera"></i>
                    </span>
                    Monitoring
                </a>
            </li> --}}
        </ul>
    </div>
</div>
