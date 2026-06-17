<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use Illuminate\Http\Request;

class LemburController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'karyawan') {

            $lemburs = Lembur::with('karyawan')
                ->where('karyawan_id', $user->karyawan->id)
                ->latest()
                ->get();

        } elseif ($user->role === 'atasan') {

            $lemburs = Lembur::with('karyawan')
                ->where('status', 'menunggu')
                ->latest()
                ->get();

        } else {

            // admin / HRD melihat semua data
            $lemburs = Lembur::with('karyawan')
                ->latest()
                ->get();
        }

        return view('lembur.index', compact('lemburs'));
    }

    public function create()
    {
        return view('lembur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal'     => 'required|date',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'pekerjaan'   => 'required|string',
        ]);

        if (!auth()->user()->karyawan) {

            return back()->with(
                'error',
                'Akun Anda belum terhubung dengan data karyawan.'
            );
        }

        $mulai = strtotime($request->jam_mulai);
        $selesai = strtotime($request->jam_selesai);

        $totalJam = ($selesai - $mulai) / 3600;

        Lembur::create([
            'karyawan_id' => auth()->user()->karyawan->id,
            'tanggal'     => $request->tanggal,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'total_jam'   => $totalJam,
            'pekerjaan'   => $request->pekerjaan,
            'status'      => 'menunggu',
        ]);

        return redirect()
            ->route('lembur.index')
            ->with('success', 'Data lembur berhasil ditambahkan');
    }

    public function approve($id)
    {
        $lembur = Lembur::findOrFail($id);

        $lembur->update([
            'status' => 'disetujui',
        ]);

        return back()->with(
            'success',
            'Pengajuan lembur berhasil disetujui.'
        );
    }

    public function reject($id)
    {
        $lembur = Lembur::findOrFail($id);

        $lembur->update([
            'status' => 'ditolak',
        ]);

        return back()->with(
            'success',
            'Pengajuan lembur berhasil ditolak.'
        );
    }
}