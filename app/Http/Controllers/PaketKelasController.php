<?php

namespace App\Http\Controllers;

use App\Exports\Pkt_kelasExport;
use App\Models\Pkt_kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class PaketKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function makeExcle()
     {
         return Excel::download(new Pkt_kelasExport(), 'Data-Paket-Kelas.xlsx');
     }
    public function index()
    {
        // Anda bisa menambahkan logika pemrosesan data di sini
        confirmDelete();
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
            'kd_pkt_kelas' => 'required|unique:pkt_kelas,kd_pkt_kelas',
            'nama_kelas' => 'required',
            'harga' => 'required|numeric',
        ], [
            // Pesan error kustom
            'kd_pkt_kelas.required' => 'Kode Paket Kelas harus diisi.',
            'kd_pkt_kelas.unique' => 'Kode Paket Kelas sudah digunakan.',
            'nama_kelas.required' => 'Nama Paket harus diisi.',
            'harga.required' => 'Harga harus diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
        ]);

        // Jika validasi gagal, kembalikan dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, lanjutkan dengan proses penyimpanan data
        $Paket_Kelas = new Pkt_kelas();
        $Paket_Kelas->kd_pkt_kelas = $request->kd_pkt_kelas;
        $Paket_Kelas->nama_kelas = $request->nama_kelas;
        $Paket_Kelas->harga = $request->harga;
        $Paket_Kelas->save();

        Alert::success('Simpan Data', 'Berhasil Simpan Data Paket Kelas.');
        return redirect()->route('paket_kelas.index');

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
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required',
            'harga' => 'required|numeric',
        ], [
            // Pesan error kustom
            'nama_kelas.required' => 'Nama Paket harus diisi.',
            'harga.required' => 'Harga harus diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
        ]);

        // Jika validasi gagal, kembalikan dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $Paket_Kelas = Pkt_kelas::findOrFail($id);
        $Paket_Kelas->kd_pkt_kelas = $request->kd_pkt_kelas;
        $Paket_Kelas->nama_kelas = $request->nama_kelas;
        $Paket_Kelas->harga = $request->harga;
        $Paket_Kelas->save();

        Alert::success('Update Data', 'Berhasil Update Data Paket Kelas.');
        return redirect()->route('paket_kelas.index')->with('success', 'Data Siswa berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pkt_kelas = Pkt_kelas::findOrFail($id);

        // Hapus jadwal yang terkait
        $pkt_kelas->jadwal()->delete();

        // Hapus paket kelas
        $pkt_kelas->delete();
        Alert::success('Hapus Data', 'Data Paket Kelas Berhasil Dihapus');
        return redirect()->route('paket_kelas.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
