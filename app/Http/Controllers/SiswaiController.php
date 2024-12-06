<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaiController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::query();

        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('nis', 'like', '%' . $request->search . '%')
                ->orWhere('kelas', 'like', '%' . $request->search . '%');
        }

        $siswa = $query->get();

        return view('siswa.index', compact('siswa'));
    }


    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswa',
            'kelas' => 'required',
        ]);

        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswa,nis,' . $siswa->id,
            'kelas' => 'required',
        ]);

        $siswa->update($request->all());
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}