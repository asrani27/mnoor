<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $query = Layanan::query();
        
        if ($request->has('search') && $request->search) {
            $query->where('kode', 'like', '%' . $request->search . '%')
                  ->orWhere('nama', 'like', '%' . $request->search . '%');
        }
        
        $layanans = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.layanans.index', compact('layanans'));
    }

    public function create()
    {
        return view('admin.layanans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:255|unique:layanans,kode',
            'nama' => 'required|string|max:255',
        ]);

        Layanan::create($validated);

        return redirect()->route('admin.layanans.index')
            ->with('success', 'Layanan created successfully.');
    }

    public function edit(Layanan $layanan)
    {
        return view('admin.layanans.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:255|unique:layanans,kode,' . $layanan->id,
            'nama' => 'required|string|max:255',
        ]);

        $layanan->update($validated);

        return redirect()->route('admin.layanans.index')
            ->with('success', 'Layanan updated successfully.');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('admin.layanans.index')
            ->with('success', 'Layanan deleted successfully.');
    }
}
