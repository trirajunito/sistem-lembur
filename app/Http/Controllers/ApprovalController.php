<?php

namespace App\Http\Controllers;

use App\Models\Lembur;

class ApprovalController extends Controller
{
    public function index()
    {
        $lemburs = Lembur::with('karyawan')
            ->latest()
            ->get();

        return view('approval.index', compact('lemburs'));
    }
}