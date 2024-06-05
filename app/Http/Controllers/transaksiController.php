<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaksi;


class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle="Transaksi";
        $transaksi = Transaksi::all();
        // $transaksi = DB::select('select*transaksi.id as transaksi_id,kelas.nama_paket as kelas_paket
        // from transaksi
        // left join  transaksi on transaksi. kelas_id =kelas.id');

        return view('transaksi.transaksi',
        ['pageTitle'=>$pageTitle,
        'transaksi'=>$transaksi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle='Add Transaksi';
        $kelas=DB::select('select* from kelas');
        return view('transaksi.addTransaksi',
        compact('pageTitle','kelas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $custom=[
            'required'=>'Silahkan lengkapi form dahulu',
            'date'=>'Anda belum mengisi tanggal',
            'present'=>'Silahkan pilih salah satu'
        ];
        $validator= Validator::make($request->all(),[
            'kd_bayar'=>'required',
            'siswa'=>'required',
            'paket_kelas'=>'present',
            'tgl_bayar'=>'date'
        ],$custom);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $transaksi = new Transaksi;
        $transaksi->kode_bayar = $request->kd_bayar;
        $transaksi->siswass_id = $request->siswa;
        $transaksi->kelas_id = $request->paket_kelas;
        $transaksi->tanggal_bayar = $request->tgl_bayar;
        $transaksi->save();

        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle="Transaksi";
        $transaksi = Transaksi::find($id);
        return view('transaksi.show', [
        'transaksi' => $transaksi,
        'pageTitle'=>$pageTitle]);
        // return view('siswa.EditSiswa', compact('siswa'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle='Jadwal';
        $transaksi = Transaksi::find($id);
        return view('transaksi.editTransaksi', compact('transaksi','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->kode_bayar = $request->kode_bayar;
        $transaksi->siswass_id = $request->siswass_id;
        $transaksi->kelas_id = $request->kelas_id;
        $transaksi->tanggal_bayar = $request->tanggal_bayar;

        $transaksi->save();
        return redirect()->route('transaksi.index')->with('success', 'Data Mentor berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('transaksi')
        ->where('id',$id)
        ->delete();
        return redirect()->route('transaksi.index');
    }
}
