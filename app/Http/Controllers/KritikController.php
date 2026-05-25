<?php

namespace App\Http\Controllers;

use App\Models\Kritik;
use App\Models\Layanan;
use App\Models\Responden;
use Illuminate\Http\Request;

class KritikController extends Controller
{
    public function index(Request $request)
    {
        $query = Kritik::with(['layanan', 'responden']);
        
        if ($request->has('search') && $request->search) {
            $query->where('isi_kritik', 'like', '%' . $request->search . '%')
                  ->orWhere('tindak_lanjut', 'like', '%' . $request->search . '%');
        }
        
        $kritiks = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.kritiks.index', compact('kritiks'));
    }

    public function create()
    {
        $layanans = Layanan::orderBy('nama')->get();
        $respondens = Responden::with(['wilayah', 'layanan'])->orderBy('nama')->get();
        return view('admin.kritiks.create', compact('layanans', 'respondens'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'responden_id' => 'required|exists:respondens,id',
            'isi_kritik' => 'required|string',
            'tindak_lanjut' => 'nullable|string',
        ]);

        Kritik::create($validated);

        return redirect()->route('admin.kritiks.index')
            ->with('success', 'Kritik created successfully.');
    }

    public function edit(Kritik $kritik)
    {
        $layanans = Layanan::orderBy('nama')->get();
        $respondens = Responden::with(['wilayah', 'layanan'])->orderBy('nama')->get();
        return view('admin.kritiks.edit', compact('kritik', 'layanans', 'respondens'));
    }

    public function update(Request $request, Kritik $kritik)
    {
        $validated = $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'responden_id' => 'required|exists:respondens,id',
            'isi_kritik' => 'required|string',
            'tindak_lanjut' => 'nullable|string',
        ]);

        $kritik->update($validated);

        return redirect()->route('admin.kritiks.index')
            ->with('success', 'Kritik updated successfully.');
    }

    public function destroy(Kritik $kritik)
    {
        $kritik->delete();
        return redirect()->route('admin.kritiks.index')
            ->with('success', 'Kritik deleted successfully.');
    }
}
