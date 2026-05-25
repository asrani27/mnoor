<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Jawaban;
use App\Models\Responden;
use App\Models\Pertanyaan;
use App\Models\Wilayah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        // Get statistics for charts
        $totalResponden = Responden::count();
        $totalLayanan = Layanan::count();
        
        // Bar chart data - responden per layanan
        $layananStats = Layanan::withCount('respondens')->get();
        
        // Pie chart data - jawaban distribution
        $jawabanStats = Jawaban::selectRaw('jawaban, COUNT(*) as total')
            ->groupBy('jawaban')
            ->get();
        
        // Calculate percentages for pie chart
        $totalJawaban = $jawabanStats->sum('total');
        
        return view('home', compact('totalResponden', 'totalLayanan', 'layananStats', 'jawabanStats', 'totalJawaban'));
    }
    
    public function createResponden()
    {
        $layanans = Layanan::orderBy('nama')->get();
        return view('register', compact('layanans'));
    }
    
    public function storeResponden(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'nama' => 'required|string|max:255',
            'jkel' => 'required|in:L,P',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telp' => 'required|string|max:255',
        ]);
        
        // Create user account
        $user = User::create([
            'name' => $validated['nama'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);
        
        // Auto-assign random layanan and wilayah
        $layanan = Layanan::inRandomOrder()->first();
        $wilayah = $layanan ? $layanan->wilayahs()->inRandomOrder()->first() : null;
        
        if (!$wilayah) {
            $wilayah = Wilayah::inRandomOrder()->first();
        }
        
        // Create responden dengan user_id
        $responden = Responden::create([
            'user_id' => $user->id,
            'layanan_id' => $layanan ? $layanan->id : null,
            'wilayah_id' => $wilayah ? $wilayah->id : null,
            'nama' => $validated['nama'],
            'jkel' => $validated['jkel'],
            'pekerjaan' => $validated['pekerjaan'],
            'alamat' => $validated['alamat'],
            'telp' => $validated['telp'],
        ]);
        
        // Auto login setelah berhasil daftar
        Auth::login($user);
        $request->session()->regenerate();
        
        return redirect()->route('user.dashboard')->with('success', 'Selamat! Anda berhasil terdaftar dan masuk sebagai responden.');
    }
}
