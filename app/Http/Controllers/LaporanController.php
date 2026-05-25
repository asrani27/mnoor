<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kritik;
use App\Models\Layanan;
use App\Models\Responden;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporans.index');
    }

    public function exportResponden(Request $request)
    {
        $query = Responden::with(['wilayah', 'layanan']);

        // Filter by date range
        if ($request->has('start_date') && $request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->has('end_date') && $request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        if ($request->has('wilayah_id') && $request->wilayah_id) {
            $query->where('wilayah_id', $request->wilayah_id);
        }
        if ($request->has('layanan_id') && $request->layanan_id) {
            $query->where('layanan_id', $request->layanan_id);
        }

        $respondens = $query->orderBy('created_at', 'desc')->get();
        $wilayahs = Wilayah::orderBy('nama')->get();
        $layanans = Layanan::orderBy('nama')->get();

        $pdf = Pdf::loadView('admin.laporans.pdf.responden', [
            'respondens' => $respondens,
            'wilayahs' => $wilayahs,
            'layanans' => $layanans,
            'filters' => $request->only(['start_date', 'end_date', 'wilayah_id', 'layanan_id'])
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('laporan-responden-' . date('Y-m-d') . '.pdf');
    }

    public function exportJawaban(Request $request)
    {
        $query = Jawaban::with(['pertanyaan', 'responden.layanan', 'responden.wilayah']);

        // Filter by date range
        if ($request->has('start_date') && $request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->has('end_date') && $request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        if ($request->has('layanan_id') && $request->layanan_id) {
            $query->whereHas('responden', function ($q) use ($request) {
                $q->where('layanan_id', $request->layanan_id);
            });
        }

        $jawabans = $query->orderBy('created_at', 'desc')->get();
        $layanans = Layanan::orderBy('nama')->get();

        $pdf = Pdf::loadView('admin.laporans.pdf.jawaban', [
            'jawabans' => $jawabans,
            'layanans' => $layanans,
            'filters' => $request->only(['start_date', 'end_date', 'layanan_id'])
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('laporan-jawaban-' . date('Y-m-d') . '.pdf');
    }

    public function exportKritik(Request $request)
    {
        $query = Kritik::with(['responden.layanan', 'responden.wilayah', 'layanan']);

        // Filter by date range
        if ($request->has('start_date') && $request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->has('end_date') && $request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        if ($request->has('layanan_id') && $request->layanan_id) {
            $query->where('layanan_id', $request->layanan_id);
        }

        $kritiks = $query->orderBy('created_at', 'desc')->get();
        $layanans = Layanan::orderBy('nama')->get();

        $pdf = Pdf::loadView('admin.laporans.pdf.kritik', [
            'kritiks' => $kritiks,
            'layanans' => $layanans,
            'filters' => $request->only(['start_date', 'end_date', 'layanan_id'])
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('laporan-kritik-' . date('Y-m-d') . '.pdf');
    }

    public function exportSummary(Request $request)
    {
        $layanans = Layanan::withCount(['respondens', 'kritiks'])->get();
        
        $totalRespondens = Responden::count();
        $totalJawabans = Jawaban::count();
        $totalKritiks = Kritik::count();

        // Count answers by value
        $jawabanCounts = Jawaban::selectRaw('LOWER(jawaban) as answer, COUNT(*) as count')
            ->groupByRaw('LOWER(jawaban)')
            ->get();

        $pdf = Pdf::loadView('admin.laporans.pdf.summary', [
            'layanans' => $layanans,
            'totalRespondens' => $totalRespondens,
            'totalJawabans' => $totalJawabans,
            'totalKritiks' => $totalKritiks,
            'jawabanCounts' => $jawabanCounts,
        ]);

        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('laporan-summary-' . date('Y-m-d') . '.pdf');
    }
}
