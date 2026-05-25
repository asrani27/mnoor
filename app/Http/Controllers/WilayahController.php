<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function index(Request $request)
    {
        $query = Wilayah::query();
        
        if ($request->has('search') && $request->search) {
            $query->where('kode', 'like', '%' . $request->search . '%')
                  ->orWhere('nama', 'like', '%' . $request->search . '%');
        }
        
        $wilayahs = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.wilayahs.index', compact('wilayahs'));
    }

    public function create()
    {
        return view('admin.wilayahs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:255|unique:wilayahs,kode',
            'nama' => 'required|string|max:255',
        ]);

        Wilayah::create($validated);

        return redirect()->route('admin.wilayahs.index')
            ->with('success', 'Wilayah created successfully.');
    }

    public function edit(Wilayah $wilayah)
    {
        return view('admin.wilayahs.edit', compact('wilayah'));
    }

    public function update(Request $request, Wilayah $wilayah)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:255|unique:wilayahs,kode,' . $wilayah->id,
            'nama' => 'required|string|max:255',
        ]);

        $wilayah->update($validated);

        return redirect()->route('admin.wilayahs.index')
            ->with('success', 'Wilayah updated successfully.');
    }

    public function destroy(Wilayah $wilayah)
    {
        $wilayah->delete();
        return redirect()->route('admin.wilayahs.index')
            ->with('success', 'Wilayah deleted successfully.');
    }
}
