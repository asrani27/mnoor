<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\Responden;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function index(Request $request)
    {
        $query = Jawaban::with(['pertanyaan', 'responden']);
        
        if ($request->has('search') && $request->search) {
            $query->where('jawaban', 'like', '%' . $request->search . '%');
        }
        
        $jawabans = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.jawabans.index', compact('jawabans'));
    }

    public function create()
    {
        $pertanyaans = Pertanyaan::orderBy('created_at', 'desc')->get();
        $respondens = Responden::with(['wilayah', 'layanan'])->orderBy('nama')->get();
        return view('admin.jawabans.create', compact('pertanyaans', 'respondens'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pertanyaan_id' => 'required|exists:pertanyaans,id',
            'responden_id' => 'required|exists:respondens,id',
            'jawaban' => 'required|string',
        ]);

        Jawaban::create($validated);

        return redirect()->route('admin.jawabans.index')
            ->with('success', 'Jawaban created successfully.');
    }

    public function edit(Jawaban $jawaban)
    {
        $pertanyaans = Pertanyaan::orderBy('created_at', 'desc')->get();
        $respondens = Responden::with(['wilayah', 'layanan'])->orderBy('nama')->get();
        return view('admin.jawabans.edit', compact('jawaban', 'pertanyaans', 'respondens'));
    }

    public function update(Request $request, Jawaban $jawaban)
    {
        $validated = $request->validate([
            'pertanyaan_id' => 'required|exists:pertanyaans,id',
            'responden_id' => 'required|exists:respondens,id',
            'jawaban' => 'required|string',
        ]);

        $jawaban->update($validated);

        return redirect()->route('admin.jawabans.index')
            ->with('success', 'Jawaban updated successfully.');
    }

    public function destroy(Jawaban $jawaban)
    {
        $jawaban->delete();
        return redirect()->route('admin.jawabans.index')
            ->with('success', 'Jawaban deleted successfully.');
    }
}
