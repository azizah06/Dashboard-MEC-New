<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use PDF;
use App\Exports\SiswaExport;
use App\Models\Pkt_kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function makeExcle()
     {
         return Excel::download(new SiswaExport(), 'Data_Siswa.xlsx');
     }

    public function makePDF()
    {
        $siswa = Siswa::all();
        $pdf = PDF::loadView('siswa.export_pdf', compact('siswa'));

    return $pdf->download('Data_Siswa.pdf');
}


    public function index()
    {
        // Anda bisa menambahkan logika pemrosesan data di sini
        confirmDelete();
        $siswa = Siswa::all();
        return view('siswa.siswa', ['siswa' => $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $pkt_kelas = Pkt_kelas::all();
        return view('siswa.addSiswa', compact('siswa', 'pkt_kelas'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kd_siswa' => 'required|unique:siswa',
                'nama' => 'required',
                'tgl_lahir' => 'required|date',
                'no_telp' => 'required',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'alamat' => 'required',
                'pkt_kelas_id' => 'required|exists:pkt_kelas,id',
            ],
            [
                'kd_siswa.required' => 'Kode Siswa harus diisi.',
                'nama.required' => 'Nama Siswa harus diisi.',
                'tgl_lahir.required' => 'Tanggal Lahir Siswa harus diisi.',
                'no_telp.required' => 'Nomor Telepon harus diisi.',
                'jenis_kelamin.required' => 'Jenis Kelamin harus diisi.',
                'alamat.required' => 'Alamat Siswa harus diisi.',
                'pkt_kelas_id.required' => 'Mohon isi paket kelas yang diinginkan.',
                'pkt_kelas_id.exists' => 'Paket kelas yang dipilih tidak valid.',

                // Tambahkan pesan kustom untuk aturan validasi lainnya di sini
            ]
        );

        // $validator->messages()->add('firstName.required', 'Nama depan harus diisi.');

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $siswa = new Siswa;
        $siswa->kd_siswa = $request->kd_siswa;
        $siswa->nama = $request->nama;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->no_telp = $request->no_telp;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->alamat = $request->alamat;
        $siswa->pkt_kelas_id = $request->pkt_kelas_id;
        $siswa->save();

        Alert::success('Tambah Data', 'Berhasil Tambah Data Siswa.');
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.showSiswa', compact('siswa'));
        // return view('siswa.EditSiswa', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::find($id);
        $pkt_kelas = Pkt_kelas::all();
        return view('siswa.EditSiswa', compact('siswa', 'pkt_kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // dd($validator->errors());
        $validator = Validator::make($request->all(), [
            'kd_siswa' => 'required|unique:siswa,kd_siswa,' . $id,
            'nama' => 'required',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'required',
            'alamat' => 'required',
        ], [
            // Pesan error kustom
            'kd_siswa.required' => 'Kode Siswa harus diisi.',
            'kd_siswa.unique' => 'Kode Siswa sudah digunakan.',
            'nama.required' => 'Nama Siswa harus diisi.',
            'tgl_lahir.required' => 'Tanggal Lahir Siswa harus diisi.',
            'no_telp.required' => 'Nomor Telepon harus diisi.',
            'alamat.required' => 'Alamat Siswa harus diisi.',
        ]);

        // Jika validasi gagal, kembalikan dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, lanjutkan dengan proses update data
        // Ambil data siswa yang akan diupdate
        $siswa = Siswa::findOrFail($id);
        $siswa->kd_siswa = $request->kd_siswa;
        $siswa->nama = $request->nama;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->no_telp = $request->no_telp;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->alamat = $request->alamat;
        $siswa->pkt_kelas_id = $request->pkt_kelas_id;
        $siswa->save();

        Alert::success('Update Data', 'Berhasil Update Data Siswa.');

        // Redirect ke halaman yang sesuai atau tindakan selanjutnya
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::find($id)->delete();

        Alert::success('Hapus Data', 'Data Siswa Berhasil Dihapus'); $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        // return redirect()->route('transaksi.index')->with('success', 'Transaksi deleted successfully.');
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }




}
