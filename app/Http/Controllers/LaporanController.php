<?php

namespace App\Http\Controllers;

use App\Models\Lembur;

class LaporanController extends Controller
{
    public function index()
    {
        $lemburs = Lembur::with('karyawan')
            ->where('status', 'disetujui')
            ->latest()
            ->get();

        return view('laporan.index', compact('lemburs'));
    }
}