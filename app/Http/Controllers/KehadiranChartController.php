<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;

class KehadiranChartController extends Controller
{
    public function index()
    {
        $kehadiranData = Absen::select('kehadiran', \DB::raw('count(*) as total'))
            ->groupBy('kehadiran')
            ->pluck('total', 'kehadiran');

        return view('kehadiran_chart.index', compact('kehadiranData'));
    }
}
