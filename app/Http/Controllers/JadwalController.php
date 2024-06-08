<?php

namespace App\Http\Controllers;

use App\Exports\JadwalExport;
use App\Http\Controllers\Controller;
use App\Models\Pkt_kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;
use App\Models\Mentor;
use App\Models\Sarpra;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class jadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function makeExcle()
     {
         return Excel::download(new JadwalExport(), 'Jadwal-Kelas.xlsx');
     }

    public function index()
    {
        confirmDelete();
        $jadwal = Jadwal::all();
        return view('jadwal.jadwal', compact('jadwal'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mentor = Mentor::all();
        $sarpra = Sarpra::all();
        $pkt_kelas = Pkt_kelas::all();
        // $jadwal = Jadwal::all();
        return view('jadwal.addJadwal', compact('sarpra', 'mentor', 'pkt_kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kd_jadwal' => 'required|unique:jadwal',
            'mentor_id' => 'required|exists:mentor,id',
            'pkt_kelas_id' => 'required|exists:pkt_kelas,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',  // Validasi format waktu jam_mulai
            'jam_akhir' => 'required|date_format:H:i',  // Validasi format waktu jam_akhir
        ], [
            'kd_jadwal.required' => 'Kode Jadwal harus diisi.',
            'kd_jadwal.unique' => 'Kode Jadwal sudah ada.',
            'mentor_id.required' => 'Mentor harus dipilih.',
            'mentor_id.exists' => 'Mentor yang dipilih tidak valid.',
            'pkt_kelas_id.required' => 'Paket Kelas harus dipilih.',
            'pkt_kelas_id.exists' => 'Paket Kelas yang dipilih tidak valid.',
            'hari.required' => 'Hari harus dipilih.',
            'hari.in' => 'Hari yang dipilih tidak valid.',
            'jam_mulai.required' => 'Jam Mulai harus diisi.',
            'jam_mulai.date_format' => 'Format Jam Mulai tidak valid, harus dalam format HH:mm.',
            'jam_akhir.required' => 'Jam Akhir harus diisi.',
            'jam_akhir.date_format' => 'Format Jam Akhir tidak valid, harus dalam format HH:mm.',

            // Pesan validasi lainnya yang mungkin diperlukan
        ]);


        // $validator->messages()->add('firstName.required', 'Nama depan harus diisi.');

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $jadwal = new Jadwal;
        $jadwal->kd_jadwal = $request->kd_jadwal;
        $jadwal->hari = $request->hari;
        $jadwal->mentor_id = $request->mentor_id;
        $jadwal->sarpra_id = $request->sarpra_id;
        $jadwal->pkt_kelas_id = $request->pkt_kelas_id;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_akhir = $request->jam_akhir;
        $jadwal->save();

        Alert::success('Simpan Data', 'Berhasil Simpan Data Jadwal.');
        return redirect()->route('jadwal.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jadwal = Jadwal::find($id);
        $mentor = Mentor::all();
        $sarpra = Sarpra::all();
        $pkt_kelas = Pkt_kelas::all();
        return view('jadwal.ShowJadwal', ['jadwal' => $jadwal, 'mentor' => $mentor, 'sarpra' => $sarpra, 'pkt_kelas' => $pkt_kelas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $mentor = Mentor::all();
        $sarpra = Sarpra::all();
        $pkt_kelas = Pkt_kelas::all();

        return view('jadwal.EditJadwal', compact('jadwal', 'mentor', 'sarpra', 'pkt_kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'mentor_id' => 'required|exists:mentor,id',
            'pkt_kelas_id' => 'required|exists:pkt_kelas,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu'
        ], [
            'mentor_id.required' => 'Mentor harus dipilih.',
            'mentor_id.exists' => 'Mentor yang dipilih tidak valid.',
            'pkt_kelas_id.required' => 'Paket Kelas harus dipilih.',
            'pkt_kelas_id.exists' => 'Paket Kelas yang dipilih tidak valid.',
            'hari.required' => 'Hari harus dipilih.',
            'hari.in' => 'Hari yang dipilih tidak valid.',
            'jam_mulai.required' => 'Jam Mulai harus diisi.',
            'jam_mulai.date_format' => 'Format Jam Mulai tidak valid, harus dalam format HH:mm.',
            'jam_akhir.required' => 'Jam Akhir harus diisi.',
            'jam_akhir.date_format' => 'Format Jam Akhir tidak valid, harus dalam format HH:mm.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->kd_jadwal = $request->kd_jadwal;
        $jadwal->hari = $request->hari;
        $jadwal->mentor_id = $request->mentor_id;
        $jadwal->sarpra_id = $request->sarpra_id;
        $jadwal->pkt_kelas_id = $request->pkt_kelas_id;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_akhir = $request->jam_akhir;

        $jadwal->save();

        Alert::success('Update Data', 'Berhasil Update Jadwal.');
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jadwal::find($id)->delete();
        Alert::success('Hapus Data', 'Jadwal Berhasil Dihapus');
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
