<?php

namespace App\Http\Controllers;

use App\Exports\SarpraExport;
use Illuminate\Http\Request;
use App\Models\Sarpra;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class SarPraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function makeExcle()
     {
         return Excel::download(new SarpraExport(), 'Data-Sarana-Prasarana.xlsx');
     }

    public function index()
    {
        // Anda bisa menambahkan logika pemrosesan data di sini
        confirmDelete();
        $sarpra = Sarpra::all();
        return view('sarpra.sarpra', ['sarpra' => $sarpra]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sarpra = Sarpra::all();
        return view('sarpra.addSarpra', compact('sarpra'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'kd_sarpra' => 'required|unique:sarpra',
            'nama_ruangan' => 'required',
            'kapasitas' => 'required',
            'jmlh_baik' => 'required',
            'jmlh_rusak' => 'required',
            'meja_mentor' => 'required',
            'kursi_mentor' => 'required',
            'kursi_meja_siswa' => 'required',
            'kipas' => 'required',
            'papan_tulis' => 'required',
        ],
        [
            'kd_sarpra.required' => 'Kode Sarpra harus diisi.',
            'nama_ruangan.required' => 'Nama ruangan harus diisi.',
            'kapasitas.required' => 'Kapasitas siswa harus diisi.',
            'jmlh_baik.required' => 'Jumlah Barang Baik harus diisi.',
            'jmlh_rusak.required' => 'Jumlah Barang Rusak diisi.',
            'meja_mentor.required' => 'Meja Mentor harus diisi.',
            'kursi_mentor.required' => 'Kursi Mentor harus diisi.',
            'kursi_meja_siswa.required' => 'Kursi Meja Siswa harus diisi.',
            'kipas.required' => 'Kipas harus diisi.',
            'papan_tulis.required' => 'Papan tulis harus diisi.',
        ]);

        // $validator->messages()->add('firstName.required', 'Nama depan harus diisi.');
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //ELOQUENT
        $sarpra = new Sarpra;
        $sarpra->kd_sarpra = $request->kd_sarpra;
        $sarpra->nama_ruangan = $request->nama_ruangan;
        $sarpra->kapasitas = $request->kapasitas;
        $sarpra->jmlh_baik = $request->jmlh_baik;
        $sarpra->jmlh_rusak = $request->jmlh_rusak;
        $sarpra->meja_mentor = $request->meja_mentor;
        $sarpra->kursi_mentor = $request->kursi_mentor;
        $sarpra->kursi_meja_siswa = $request->kursi_meja_siswa;
        $sarpra->kipas = $request->kipas;
        $sarpra->papan_tulis = $request->papan_tulis;
        $sarpra->keterangan = $request->keterangan;
        $sarpra->save();
        Alert::success('Tambah Data', 'Berhasil Tambah Data Sarana Prasarana.');
        return redirect()->route('sarpra.index')->with('success', 'Data Sarpra berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $sarpra = Sarpra::find($id);
        return view('sarpra.showSarpra', compact('sarpra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $sarpra = Sarpra::find($id);
        return view('sarpra.EditSarpra', compact('sarpra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $sarpra = Sarpra::findOrFail($id);
        $sarpra->kd_sarpra = $request->kd_sarpra;
        $sarpra->nama_ruangan = $request->nama_ruangan;
        $sarpra->kapasitas = $request->kapasitas;
        $sarpra->jmlh_baik = $request->jmlh_baik;
        $sarpra->jmlh_rusak = $request->jmlh_rusak;
        $sarpra->meja_mentor = $request->meja_mentor;
        $sarpra->kursi_mentor = $request->kursi_mentor;
        $sarpra->kursi_meja_siswa = $request->kursi_meja_siswa;
        $sarpra->kipas = $request->kipas;
        $sarpra->papan_tulis = $request->papan_tulis;
        $sarpra->keterangan = $request->keterangan;
        $sarpra->save();
        Alert::success('Update Data', 'Berhasil Update Data Sarana Prasarana.');
        return redirect()->route('sarpra.index')->with('success', 'Data Sarpra berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Sarpra::find($id)->delete();
        Alert::success('Hapus Data', 'Berhasil Hapus Data Sarana Prasarana.');
        return redirect()->route('sarpra.index')->with('success', 'Data Sarpra berhasil disimpan!');
    }
}
