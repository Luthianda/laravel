<?php

namespace App\Http\Controllers;

use App\Models\Levels;
use Illuminate\Http\Request;


class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $datas = Levels::all();
        $datas = Levels::orderBy('id', 'desc')->get();
        $title = "Data Level";
        return view('level.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Level";
        return view('level.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Levels::create($request->all());
        return redirect()->to('level')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Ubah Level";
        $level = Levels::find($id);
        // untuk blank^
        return view('level.edit', compact('level', 'title'));
        // $level = Levels::findOrFail($id);
        // // akan keluar 404^
        // $level = Levels::where('id', $id)->first();
        // // sesuai parameter^
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $level = Levels::find($id);
        $level->name = $request->name;
        $level->save();
        return redirect()->to('level')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $level = Levels::find($id);
        $level->delete();
        return redirect()->to('level')->with('success', 'Data berhasil dihapus');
    }
}
