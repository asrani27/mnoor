<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pertanyaan::query();
        
        if ($request->has('search') && $request->search) {
            $query->where('pertanyaan', 'like', '%' . $request->search . '%');
        }
        
        $pertanyaans = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pertanyaans.index', compact('pertanyaans'));
    }

    public function create()
    {
        $layanans = Layanan::orderBy('nama')->get();
        return view('admin.pertanyaans.create', compact('layanans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pertanyaan' => 'required|string',
            'layanan_id' => 'required|exists:layanans,id',
        ]);

        Pertanyaan::create($validated);

        return redirect()->route('admin.pertanyaans.index')
            ->with('success', 'Pertanyaan created successfully.');
    }

    public function edit(Pertanyaan $pertanyaan)
    {
        $layanans = Layanan::orderBy('nama')->get();
        return view('admin.pertanyaans.edit', compact('pertanyaan', 'layanans'));
    }

    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        $validated = $request->validate([
            'pertanyaan' => 'required|string',
            'layanan_id' => 'required|exists:layanans,id',
        ]);

        $pertanyaan->update($validated);

        return redirect()->route('admin.pertanyaans.index')
            ->with('success', 'Pertanyaan updated successfully.');
    }

    public function destroy(Pertanyaan $pertanyaan)
    {
        $pertanyaan->delete();
        return redirect()->route('admin.pertanyaans.index')
            ->with('success', 'Pertanyaan deleted successfully.');
    }
}
