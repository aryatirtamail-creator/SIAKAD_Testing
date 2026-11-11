<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = Matakuliah::orderBy('kode_mk')->get();

        return view('matakuliah', compact('matakuliahs'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mk' => 'required|string|max:255|unique:matakuliahs,kode_mk',
            'nama_mk' => 'required|string|min:3|max:255',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        Matakuliah::create($validated);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    public function edit(Matakuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, Matakuliah $matakuliah)
    {
        $validated = $request->validate([
            'kode_mk' => ['required', 'string', 'max:255', Rule::unique('matakuliahs', 'kode_mk')->ignore($matakuliah)],
            'nama_mk' => 'required|string|min:3|max:255',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        $matakuliah->update($validated);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}
