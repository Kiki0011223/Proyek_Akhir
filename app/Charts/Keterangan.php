<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class Keterangan
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\areaChart
    {

        $keterangan = \App\Models\menu_utama::selectRaw('keterangan, COUNT(id_buku) as jenis_buku_count')->groupBy('keterangan')
            ->get();

        $isi_data1 = $keterangan->whereIn('keterangan', ["Matapelajaran"])
            ->pluck('jenis_buku_count')
            ->map(function ($value) {
                return (string) $value;
            })
            ->toArray();

        $isi_data2 = $keterangan->whereIn('keterangan', ["Novel"])
            ->pluck('jenis_buku_count')
            ->map(function ($value) {
                return (string) $value;
            })
            ->toArray();
        
        $isi_data3 = $keterangan->whereIn('keterangan', ["Kamus"])
            ->pluck('jenis_buku_count')
            ->map(function ($value) {
                return (string) $value;
            })
            ->toArray();

        $label = ['Jenis Buku','Novel', 'Kamus', 'Matapelajaran'];
        return $this->chart->areaChart()
        ->setTitle('DATA TABEL MENU UTAMA')
        ->setSubtitle('#Keterangan Jenis Buku')
        ->addData('Jumlah Buku', [0,$isi_data2, $isi_data3, $isi_data1])
        ->setXAxis($label)
        ->setColors(['#ffc63b', '#ff6384']);

}
}