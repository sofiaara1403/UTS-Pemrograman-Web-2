<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Jurusan;

class MahasiswaController extends Controller
{
    public function index(Request $request) // TAMBAH
    {
        // SEARCH + PAGINATION
        $search = $request->search;

        if ($search) {
            $mahasiswa = Mahasiswa::with('jurusan')
                ->where('nama', 'like', "%$search%")
                ->paginate(5);
        } else {
            $mahasiswa = Mahasiswa::with('jurusan')->paginate(5);
        }

        // 🔥 TAMBAHAN FILTER JURUSAN (TANPA MENGUBAH YANG LAMA)
        if ($request->id_jurusan) {
            $mahasiswa = Mahasiswa::with('jurusan')
                ->where('id_jurusan', $request->id_jurusan)
                ->paginate(5)
                ->withQueryString();
        }

        // 🔥 TAMBAHAN DATA JURUSAN (buat dropdown)
        $jurusan = Jurusan::all();

        return view('mahasiswa.index', compact('mahasiswa', 'jurusan'));
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('mahasiswa.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'id_jurusan' => 'required'
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index');
    }

    public function edit($id)
    {
        $data = Mahasiswa::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('mahasiswa.edit', compact('data', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'id_jurusan' => 'required'
        ]);

        $data = Mahasiswa::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('mahasiswa.index');
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect()->route('mahasiswa.index');
    }
}