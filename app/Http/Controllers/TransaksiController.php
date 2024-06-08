<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiExport;
use App\Models\Jadwal;
use App\Models\Pkt_kelas;
use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function makeExcle()
    {
        return Excel::download(new TransaksiExport(), 'Data-Transaksi.xlsx');
    }

    public function index()
    {
        // Anda bisa menambahkan logika pemrosesan data di sini
        confirmDelete();
        $transaksi = Transaksi::all();
        return view('transaksi.transaksi', ['transaksi' => $transaksi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $pkt_kelas = Pkt_kelas::all();
        // return view('siswa.addSiswa', compact('siswa', 'pkt_kelas'));
        return view('transaksi.addTransaksi', compact('siswa', 'pkt_kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make([
            $request->all(),
            'kd_bayar' => 'required|unique:transaksis',
            'siswa_id' => 'required|exists:siswa,id',
            'pkt_kls_id' => 'required|exists:pkt_kelas,id',
            'tgl_bayar' => 'required|date',
            'bukti_bayar' => 'required|string',
        ], [
            'kd_bayar.required' => 'Kode Pembayaran harus diisi.',
            'kd_bayar.unique' => 'Kode Pembayaran sudah ada dalam database.',
            'siswa_id.required' => 'Siswa harus dipilih.',
            'siswa_id.exists' => 'Siswa yang dipilih tidak valid.',
            'pkt_kls_id.required' => 'Paket Kelas harus dipilih.',
            'pkt_kls_id.exists' => 'Paket Kelas yang dipilih tidak valid.',
            'tgl_bayar.required' => 'Tanggal Pembayaran harus diisi.',
            'tgl_bayar.date' => 'Format tanggal tidak valid.',
            'bukti_bayar.required' => 'Bukti Pembayaran harus diunggah.',
            'bukti_bayar.string' => 'Bukti Pembayaran harus berupa teks.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $siswa = Siswa::find($request->siswa_id);
        $pkt_kls = Pkt_kelas::find($request->pkt_kls_id);


        $transaksi = new Transaksi();
        $transaksi->kd_bayar = $request->kd_bayar;

        $transaksi->siswa_id = $request->siswa_id;
        $transaksi->pkt_kls_id = $request->pkt_kls_id;

        // ADD OTOMATIS DI KOLOM
        $transaksi->nama_siswa = $siswa->nama;
        $transaksi->paket_kelas = $pkt_kls->nama_kelas;
        $transaksi->harga_bayar = $pkt_kls->harga;

        $transaksi->tgl_bayar = $request->tgl_bayar;
        // $transaksi->bukti_bayar = $request->bukti_bayar;

        $imageName = time() . '.' . $request->bukti_bayar->extension();
        $request->bukti_bayar->storeAs('public/images', $imageName);

        $transaksi->bukti_bayar = $imageName;

        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = Transaksi::find($id);
        $siswa = Siswa::all();
        $pkt_kelas = Pkt_kelas::all();
        return view('transaksi.ShowTransaksi', compact('transaksi', 'siswa', 'pkt_kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = Transaksi::find($id);
        $siswa = Siswa::all();
        $pkt_kelas = Pkt_kelas::all();
        return view('transaksi.EditTransaksi', compact('transaksi', 'siswa', 'pkt_kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make([
            $request->all(),
            'kd_bayar' => 'required|unique:transaksis',
            'siswa_id' => 'required|exists:siswa,id',
            'pkt_kls_id' => 'required|exists:pkt_kelas,id',
            'tgl_bayar' => 'required|date',
            'bukti_bayar' => 'required|string',
        ], [
            'kd_bayar.required' => 'Kode Pembayaran harus diisi.',
            'kd_bayar.unique' => 'Kode Pembayaran sudah ada dalam database.',
            'siswa_id.required' => 'Siswa harus dipilih.',
            'siswa_id.exists' => 'Siswa yang dipilih tidak valid.',
            'pkt_kls_id.required' => 'Paket Kelas harus dipilih.',
            'pkt_kls_id.exists' => 'Paket Kelas yang dipilih tidak valid.',
            'tgl_bayar.required' => 'Tanggal Pembayaran harus diisi.',
            'tgl_bayar.date' => 'Format tanggal tidak valid.',
            'bukti_bayar.required' => 'Bukti Pembayaran harus diunggah.',
            'bukti_bayar.string' => 'Bukti Pembayaran harus berupa teks.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $siswa = Siswa::find($request->siswa_id);
        $pkt_kls = Pkt_kelas::find($request->pkt_kls_id);


        $transaksi = Transaksi::findOrFail($id);
        $transaksi->kd_bayar = $request->kd_bayar;

        $transaksi->siswa_id = $request->siswa_id;
        $transaksi->pkt_kls_id = $request->pkt_kls_id;

        // ADD OTOMATIS DI KOLOM
        $transaksi->nama_siswa = $siswa->nama;
        $transaksi->paket_kelas = $pkt_kls->nama_kelas;

        $transaksi->tgl_bayar = $request->tgl_bayar;
        // $transaksi->bukti_bayar = $request->bukti_bayar;

        if ($request->hasFile('bukti_bayar')) { // Check if file exists in the request
            $imageName = time() . '.' . $request->bukti_bayar->extension();
            $request->bukti_bayar->storeAs('public/images', $imageName);
            $transaksi->bukti_bayar = $imageName;
        }

        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
