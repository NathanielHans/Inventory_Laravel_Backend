<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Http\Requests\StoreRuanganRequest;
use App\Http\Requests\UpdateRuanganRequest;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Ruangans = Ruangan::all();
        return response()->json($Ruangans);
        // return view('barang', compact('Barang','title', 'Ruangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRuanganRequest $request)
    {
        $validatedData = $request->validate([
            'nama_ruangan' => 'required|max:50', 
            'jenis_ruangan' => 'required|max:10',
        ]);

        $ruangan = new Ruangan;
        $ruangan->nama_ruangan = $validatedData['nama_ruangan'];
        $ruangan->jenis_ruangan = $validatedData['jenis_ruangan'];
        $result = $ruangan->save();
        if ($result) {
            return response()->json(['message' => 'Data maintenance berhasil disimpan']);
        } else {
            return response()->json(['message' => 'Data maintenance gagal disimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ruangan = Ruangan::find($id);
        return response()->json($ruangan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruangan $ruangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRuanganRequest $request, Ruangan $ruangan)
    {
        $validatedData = $request->validate([
            'nama_ruangan' => 'required|max:50', 
            'jenis_ruangan' => 'required|max:10',
        ]);

        $ruangan->nama_ruangan = $validatedData['nama_ruangan'];
        $ruangan->jenis_ruangan = $validatedData['jenis_ruangan'];
        $result = $ruangan->save();
    
        if ($result) {
            return response()->json(['message' => 'Data Ruangan berhasil diperbarui']);
        } else {
            return response()->json(['message' => 'Data Ruangan gagal diperbarui']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruangan $ruangan)
    {
        $result = $ruangan->delete();

        if ($result) {
            return response()->json(['message' => 'Data Ruangan berhasil dihapus']);
        } else {
            return response()->json(['message' => 'Data Ruangan gagal dihapus']);
        }
    }
}
