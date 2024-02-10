<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SPP;

class SPPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // fetching data dari tabel spp
        $spps = DB::table('spps')->get();
        // return ke view dan kirimkan data $spps
        return view('spp.index', compact('spps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('spp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data inputan data wajib diisi dan minimal 5 karakter
        $request->validate([
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        // Query untuk menyimpan data
        $spp = new SPP();
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();

        // Jika data disimpan maka di redirect ke halaman index
        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_spp)
    {
        // Mengambil data SPP berdasarkan ID
        $spp = SPP::findOrFail($id_spp);
        
        // Menampilkan view detail dengan data SPP yang dipilih
        return view('spp.show', compact('spp'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_spp)
    {
        // Mengambil data SPP berdasarkan ID
        $spp = SPP::findOrFail($id_spp);
        // Menampilkan view edit dengan data SPP yang dipilih
        return view('spp.edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_spp)
    {
        // Validasi data inputan data wajib diisi dan sesuai format
        $request->validate([
            'tahun' => 'required',
            'nominal' => 'required',
        ]);
    
        // Mengambil data SPP berdasarkan ID
        $spp = SPP::findOrFail($id_spp);
        // Update data SPP berdasarkan data yang diterima dari form
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();
    
        // Redirect ke halaman index
        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil diupdate');
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menghapus data SPP berdasarkan ID
        $spp = SPP::findOrFail($id);
        $spp->delete();

        // Redirect ke halaman index
        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil dihapus');
    }
}