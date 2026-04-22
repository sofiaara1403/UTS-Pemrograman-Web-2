<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
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