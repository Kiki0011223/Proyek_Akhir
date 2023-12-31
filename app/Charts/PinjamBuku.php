<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PinjamBuku
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\donutChart
    {
        $status = \App\Models\pinjam_buku::selectRaw('status, COUNT(id_pinjam) as pinjam_buku_count')->groupBy('status')
        ->get();
        $isi_data = [
            $status->where('status', "1")->pluck('pinjam_buku_count')->first(),
            $status->where('status', "0")->pluck('pinjam_buku_count')->first()
        ];

        $label = [
            'Sudah Dikembalikan',
            'Belum Dikembalikan'
        ];


        return $this->chart->donutChart()
            ->setTitle('DATA TABEL PINJAM DAN PENGEMBALIAN BUKU')
            ->setSubtitle('#status pinjam')
            ->setWidth(405)
            ->setHeight(500)
            ->addData($isi_data)
            ->setLabels($label)
            ->setColors(['#32CD32', '#FF0000']);
    }
}