<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class JenisKelamin
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $jenisKelamin = \Illuminate\Foundation\Auth\User::selectRaw('jenisKelamin, COUNT(id) as user_count')->groupBy('jenisKelamin')->get();
        $isi_data = [
            $jenisKelamin->where('jenisKelamin', "Pria")->pluck('user_count')->first(),
            $jenisKelamin->where('jenisKelamin', "Wanita")->pluck('user_count')->first()
        ];

        $label = [
            'Pria',
            'Wanita'
        ];

        return $this->chart->pieChart()
            ->setTitle('DATA TABEL USER')
            ->setSubtitle('#Jenis Kelamin')
            ->setWidth(330)
            ->setHeight(500)
            ->addData($isi_data)
            ->setLabels($label)
            ->setColors(['#000000', '#FF69B4']);

    }
}