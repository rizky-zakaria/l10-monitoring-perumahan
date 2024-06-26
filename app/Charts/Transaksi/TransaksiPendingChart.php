<?php

namespace App\Charts\Transaksi;

use App\Models\Transaksi;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class TransaksiPendingChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $kategori = Transaksi::orderBy('kategori', 'asc')
            ->get()
            ->groupBy('kategori')
            ->keys()
            ->map(function ($kategori) {
                return strtoupper($kategori);
            })->toArray();

        $market = Transaksi::where('kategori', 'market')->where('status', '!=', 'capture')->where('created_at', 'like', '%' . date('Y-m') . '%')->sum('harga');
        $pdam = Transaksi::where('kategori', 'pdam')->where('status', '!=', 'capture')->where('created_at', 'like', '%' . date('Y-m') . '%')->sum('harga');
        $keamanan = Transaksi::where('kategori', 'keamanan')->where('status', '!=', 'capture')->where('created_at', 'like', '%' . date('Y-m') . '%')->sum('harga');
        $kebersihan = Transaksi::where('kategori', 'kebersihan')->where('status', '!=', 'capture')->where('created_at', 'like', '%' . date('Y-m') . '%')->sum('harga');

        $bulan = Carbon::parse(now());
        return $this->chart->pieChart()
            ->setTitle('Transaksi Pending Bulan ' . $bulan->isoFormat('MMMM'))
            ->setSubtitle('Pertanggal ' . $bulan->isoFormat('LL'))
            ->addData([intval($keamanan), intval($kebersihan), intval($market), intval($pdam)])
            ->setHeight(400)
            ->setLabels($kategori);
    }
}
