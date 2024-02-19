<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data kelas
        $kelass = Kelas::all();

        // Mengembalikan view index dengan data kelas
        return view('kelas.index', compact('kelass'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengembalikan view untuk membuat kelas baru
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelasRequest $request)
    {
        // Membuat kelas baru berdasarkan data yang diterima dari form
        Kelas::create($request->validated());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        // Mengembalikan view detail dengan data kelas yang dipilih
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        // Mengembalikan view edit dengan data kelas yang dipilih
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelasRequest $request, Kelas $kelas)
    {
        // Mengupdate data kelas berdasarkan data yang diterima dari form
        $kelas->update($request->validated());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        // Menghapus data kelas berdasarkan ID
        $kelas->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil dihapus');
    }
}