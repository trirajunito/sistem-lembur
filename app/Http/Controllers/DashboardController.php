<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Lembur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Dashboard Karyawan
        if ($user->role == 'karyawan') {

            $karyawanId = $user->karyawan->id;

            $totalKaryawan = 1;

            $totalLembur = Lembur::where('karyawan_id', $karyawanId)->count();

            $totalJam = Lembur::where('karyawan_id', $karyawanId)
                ->where('status', 'disetujui')
                ->sum('total_jam');

            $statistik = Lembur::select(
                    DB::raw('MONTH(tanggal) as bulan'),
                    DB::raw('SUM(total_jam) as total')
                )
                ->where('karyawan_id', $karyawanId)
                ->where('status', 'disetujui')
                ->groupBy('bulan')
                ->orderBy('bulan')
                ->get();
        }

        // Dashboard Admin / HRD
        elseif ($user->role == 'admin') {

            $totalKaryawan = Karyawan::count();

            $totalLembur = Lembur::count();

            $totalJam = Lembur::where('status', 'disetujui')
                ->sum('total_jam');

            $statistik = Lembur::select(
                    DB::raw('MONTH(tanggal) as bulan'),
                    DB::raw('SUM(total_jam) as total')
                )
                ->where('status', 'disetujui')
                ->groupBy('bulan')
                ->orderBy('bulan')
                ->get();
        }

        // Dashboard Atasan
        else {

            $totalKaryawan = Karyawan::count();

            $totalLembur = Lembur::where('status', 'menunggu')
                ->count();

            $totalJam = Lembur::where('status', 'disetujui')
                ->sum('total_jam');

            $statistik = Lembur::select(
                    DB::raw('MONTH(tanggal) as bulan'),
                    DB::raw('SUM(total_jam) as total')
                )
                ->where('status', 'disetujui')
                ->groupBy('bulan')
                ->orderBy('bulan')
                ->get();
        }

        $namaBulan = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Agu',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des',
        ];

        $bulan = [];
        $jamLembur = [];

        foreach ($statistik as $item) {
            $bulan[] = $namaBulan[$item->bulan];
            $jamLembur[] = (float) $item->total;
        }

        return view('dashboard', compact(
            'totalKaryawan',
            'totalLembur',
            'totalJam',
            'bulan',
            'jamLembur'
        ));
    }
}