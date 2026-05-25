<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kritik;
use App\Models\Layanan;
use App\Models\Pertanyaan;
use App\Models\Rating;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * Display the user dashboard.
     */
    public function index()
    {
        $user = auth()->user();
        $totalPertanyaan = Pertanyaan::count();
        $responden = $user->responden;
        $answeredCount = $responden ? Jawaban::where('responden_id', $responden->id)->count() : 0;
        $recentAnswers = $responden ? Jawaban::where('responden_id', $responden->id)->with('pertanyaan')->latest()->take(5)->get() : collect();
        
        
        return view('user.dashboard', compact('totalPertanyaan', 'answeredCount', 'recentAnswers'));
    }

    /**
     * Display the form to answer questions.
     */
    public function jawabPertanyaan()
    {
        $pertanyaans = Pertanyaan::with('jawabans')->get();
        $totalPertanyaan = $pertanyaans->count();
        $user = auth()->user();
        $responden = $user->responden;
        $answeredCount = $responden ? Jawaban::where('responden_id', $responden->id)->count() : 0;
        
        return view('user.jawab-pertanyaan', compact('pertanyaans', 'totalPertanyaan', 'answeredCount'));
    }

    /**
     * Store answers to questions.
     */
    public function storeJawabPertanyaan(Request $request)
    {
        $user = auth()->user();
        $responden = $user->responden;
        
        if (!$responden) {
            return redirect()->back()->with('error', 'Responden tidak ditemukan');
        }
        
        $pertanyaanIds = $request->pertanyaan_id;
        $jawaban = $request->jawaban;
        
        if ($pertanyaanIds && $jawaban) {
            foreach ($pertanyaanIds as $pertanyaanId) {
                if (isset($jawaban[$pertanyaanId])) {
                    Jawaban::updateOrCreate(
                        [
                            'pertanyaan_id' => $pertanyaanId,
                            'responden_id' => $responden->id
                        ],
                        [
                            'jawaban' => $jawaban[$pertanyaanId]
                        ]
                    );
                }
            }
        }
        
        return redirect()->route('user.jawab-pertanyaan')->with('success', 'Jawaban berhasil disimpan');
    }

    /**
     * Display the rating page.
     */
    public function rating()
    {
        $layanans = Layanan::all();
        $user = auth()->user();
        $responden = $user->responden;
        $recentRatings = $responden ? Rating::where('responden_id', $responden->id)->with('layanan')->latest()->take(10)->get() : collect();
        return view('user.rating', compact('layanans', 'recentRatings'));
    }

    /**
     * Store the rating.
     */
    public function storeRating(Request $request)
    {
        $user = auth()->user();
        $responden = $user->responden;
        
        if (!$responden) {
            return redirect()->back()->with('error', 'Responden tidak ditemukan');
        }
        
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'rating' => 'required|integer|min:1|max:5'
        ]);
        
        Rating::updateOrCreate(
            [
                'responden_id' => $responden->id,
                'layanan_id' => $request->layanan_id
            ],
            [
                'rating' => $request->rating
            ]
        );
        
        return redirect()->route('user.rating')->with('success', 'Rating berhasil disimpan');
    }

    /**
     * Display the kritik page.
     */
    public function kritik()
    {
        $layanans = Layanan::all();
        $user = auth()->user();
        $responden = $user->responden;
        $recentKritiks = $responden ? Kritik::where('responden_id', $responden->id)->with('layanan')->latest()->take(10)->get() : collect();
        return view('user.kritik', compact('layanans', 'recentKritiks'));
    }

    /**
     * Store the kritik.
     */
    public function storeKritik(Request $request)
    {
        $user = auth()->user();
        $responden = $user->responden;
        
        if (!$responden) {
            return redirect()->back()->with('error', 'Responden tidak ditemukan');
        }
        
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'isi_kritik' => 'required|string|max:1000'
        ]);
        
        Kritik::create([
            'layanan_id' => $request->layanan_id,
            'responden_id' => $responden->id,
            'isi_kritik' => $request->isi_kritik
        ]);
        
        return redirect()->route('user.kritik')->with('success', 'Kritik dan saran berhasil dikirim');
    }
}
