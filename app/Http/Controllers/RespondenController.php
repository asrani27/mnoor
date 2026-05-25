<?php

namespace App\Http\Controllers;

use App\Models\Responden;
use App\Models\Layanan;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class RespondenController extends Controller
{
    public function index(Request $request)
    {
        $query = Responden::with(['wilayah', 'layanan']);
        
        if ($request->has('search') && $request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('alamat', 'like', '%' . $request->search . '%')
                  ->orWhere('telp', 'like', '%' . $request->search . '%');
        }
        
        $respondens = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.respondens.index', compact('respondens'));
    }

    public function create()
    {
        $layanans = Layanan::orderBy('nama')->get();
        $wilayahs = Wilayah::orderBy('nama')->get();
        return view('admin.respondens.create', compact('layanans', 'wilayahs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'wilayah_id' => 'required|exists:wilayahs,id',
            'layanan_id' => 'required|exists:layanans,id',
            'nama' => 'required|string|max:255',
            'jkel' => 'required|in:L,P',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telp' => 'required|string|max:255',
        ]);

        Responden::create($validated);

        return redirect()->route('admin.respondens.index')
            ->with('success', 'Responden created successfully.');
    }

    public function edit(Responden $responden)
    {
        $layanans = Layanan::orderBy('nama')->get();
        $wilayahs = Wilayah::orderBy('nama')->get();
        return view('admin.respondens.edit', compact('responden', 'layanans', 'wilayahs'));
    }

    public function update(Request $request, Responden $responden)
    {
        $validated = $request->validate([
            'wilayah_id' => 'required|exists:wilayahs,id',
            'layanan_id' => 'required|exists:layanans,id',
            'nama' => 'required|string|max:255',
            'jkel' => 'required|in:L,P',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telp' => 'required|string|max:255',
        ]);

        $responden->update($validated);

        return redirect()->route('admin.respondens.index')
            ->with('success', 'Responden updated successfully.');
    }

    public function destroy(Responden $responden)
    {
        $responden->delete();
        return redirect()->route('admin.respondens.index')
            ->with('success', 'Responden deleted successfully.');
    }
}
