<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index(Request $request) // TAMBAH Request
    {
        // TAMBAHAN SEARCH + PAGINATION
        $search = $request->search;

        if ($search) {
            $jurusan = Jurusan::where('nama_jurusan', 'like', "%$search%")
                        ->paginate(5);
        } else {
            $jurusan = Jurusan::paginate(5);
        }

        return view('jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        // TAMBAHAN VALIDASI
        $request->validate([
            'nama_jurusan' => 'required',
            'akreditasi' => 'required'
        ]);

        Jurusan::create($request->all());
        return redirect()->route('jurusan.index');
    }

    public function edit($id)
    {
        $data = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // TAMBAHAN VALIDASI
        $request->validate([
            'nama_jurusan' => 'required',
            'akreditasi' => 'required'
        ]);

        $data = Jurusan::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('jurusan.index');
    }

    public function destroy($id)
    {
        Jurusan::destroy($id);
        return redirect()->route('jurusan.index');
    }
}