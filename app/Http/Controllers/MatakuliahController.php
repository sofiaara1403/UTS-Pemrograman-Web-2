<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\Jurusan;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::with('jurusan')->get();
        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('matakuliah.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
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