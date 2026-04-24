<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\Jurusan;

class MatakuliahController extends Controller
{
    public function index(Request $request) // TAMBAH
    {
        $search = $request->search;

        if ($search) {
            $matakuliah = Matakuliah::with('jurusan')
                ->where('nama_matakuliah', 'like', "%$search%")
                ->paginate(5);
        } else {
            $matakuliah = Matakuliah::with('jurusan')->paginate(5);
        }

        // 🔥 TAMBAHAN FILTER
        if ($request->id_jurusan) {
            $matakuliah = Matakuliah::with('jurusan')
                ->where('id_jurusan', $request->id_jurusan)
                ->paginate(5)
                ->withQueryString();
        }

        // 🔥 TAMBAHAN DATA JURUSAN
        $jurusan = Jurusan::all();

        return view('matakuliah.index', compact('matakuliah', 'jurusan'));
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('matakuliah.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_matakuliah' => 'required',
            'sks' => 'required|numeric',
            'id_jurusan' => 'required'
        ]);

        Matakuliah::create($request->all());
        return redirect()->route('matakuliah.index');
    }

    public function edit($id)
    {
        $data = Matakuliah::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('matakuliah.edit', compact('data', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matakuliah' => 'required',
            'sks' => 'required|numeric',
            'id_jurusan' => 'required'
        ]);

        $data = Matakuliah::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('matakuliah.index');
    }

    public function destroy($id)
    {
        Matakuliah::destroy($id);
        return redirect()->route('matakuliah.index');
    }
}