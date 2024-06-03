<?php

namespace App\Http\Controllers;

use App\Models\Pkt_kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaketKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Anda bisa menambahkan logika pemrosesan data di sini
        $pkt_kelas = Pkt_kelas::withCount('siswa')->get();
        return view('paket_kelas.pkt_kelas', compact('pkt_kelas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paket_kelas.addPktKelas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kd_pkt_kelas' => 'required|unique:pkt_kelas',
            'nama_kelas' => 'required',
            'harga' => 'required',
        ],
        [
            'kd_pkt_kelas.required' => 'Kode Paket Kelas harus diisi.',
            'nama_kelas.required' => 'Nama Kelas harus diisi.',
            'harga.required' => 'Harga harus diisi.'

            // Tambahkan pesan kustom untuk aturan validasi lainnya di sini
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // ELOQUENT
        $Paket_Kelas = new Pkt_kelas();
        $Paket_Kelas->kd_pkt_kelas = $request->kd_pkt_kelas;
        $Paket_Kelas->nama_kelas = $request->nama_kelas;
        $Paket_Kelas->harga = $request->harga;
        $Paket_Kelas->save();
        return redirect()->route('paket_kelas.index')->with('success', 'Paket Kelas berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pkt_kelas = Pkt_kelas::withCount('siswa')->find($id);
        return view('paket_kelas.showPktKelas', compact('pkt_kelas'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pkt_kelas = Pkt_kelas::find($id);
        return view('paket_kelas.EditPktKelas', compact('pkt_kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Paket_Kelas = Pkt_kelas::findOrFail($id);
        $Paket_Kelas->kd_pkt_kelas = $request->kd_pkt_kelas;
        $Paket_Kelas->nama_kelas = $request->nama_kelas;
        $Paket_Kelas->harga = $request->harga;
        $Paket_Kelas->save();
        return redirect()->route('paket_kelas.index')->with('success', 'Data Siswa berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pkt_kelas::find($id)->delete();
        return redirect()->route('paket_kelas.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
