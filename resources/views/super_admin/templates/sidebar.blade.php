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
                        <a href="{{ url('su/home') }}">Home</a>
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
                        <a href="{{ url('su/administrator') }}">Administrator</a>
                    </li>
                    <li>
                        <a href="{{ url('su/member') }}">Member</a>
                    </li>
                    <li>
                        <a href="{{ url('su/perumahan') }}">Perumahan</a>
                    </li>
                    <li>
                        <a href="{{ url('su/slider') }}">Slider</a>
                    </li>
                    <li>
                        <a href="{{ url('su/produk') }}">Produk</a>
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
                        <a href="{{ url('su/pembayaran') }}">Pembayaran</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-camera"></i>
                    </span>
                    <span class="title">Monitoring</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ url('su/monitoring') }}">CCTV</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
