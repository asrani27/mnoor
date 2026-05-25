<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Layanan;
use App\Models\Wilayah;
use App\Models\Responden;
use App\Models\Pertanyaan;
use App\Models\Kritik;
use App\Models\Jawaban;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_layanans' => Layanan::count(),
            'total_wilayahs' => Wilayah::count(),
            'total_respondens' => Responden::count(),
            'total_pertanyaans' => Pertanyaan::count(),
            'total_kritiks' => Kritik::count(),
            'total_jawabans' => Jawaban::count(),
        ];

        // Recent respondens
        $recentRespondens = Responden::with('wilayah')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        // Recent kritiks
        $recentKritiks = Kritik::with('responden.layanan')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentRespondens', 'recentKritiks'));
    }
}