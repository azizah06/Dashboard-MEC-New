<?php

namespace App\Http\Controllers;

use App\Exports\MentorExport;
use Illuminate\Http\Request;
use App\Models\Mentor;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function makeExcle()
     {
         return Excel::download(new MentorExport(), 'Data_Mentor.xlsx');
     }
    public function index()
    {
        // Anda bisa menambahkan logika pemrosesan data di sini
        $mentor = Mentor::all();
        confirmDelete();
        return view('mentor.mentor', ['mentor' => $mentor]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mentor = Mentor::all();
        return view('mentor.addMentor', compact('mentor'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kd_mentor' => 'required|unique:mentor',
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pendidikan' => 'required',
            'alamat' => 'required',
        ],
        [
            'kd_mentor.required' => 'Kode Mentor harus diisi.',
            'nama.required' => 'Nama Mentor harus diisi.',
            'email.required' => 'Email harus diisi.',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi.',
            'no_telp.required' => 'Nomor Telepon harus diisi.',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi.',
            'pendidikan.required' => 'Pendidikan harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',

            // Tambahkan pesan kustom untuk aturan validasi lainnya di sini
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $mentor = new Mentor;
        $mentor->kd_mentor = $request->kd_mentor;
        $mentor->nama = $request->nama;
        $mentor->email = $request->email;
        $mentor->no_telp = $request->no_telp;
        $mentor->jenis_kelamin = $request->jenis_kelamin;
        $mentor->pendidikan = $request->pendidikan;
        $mentor->alamat = $request->alamat;
        $mentor->save();
        Alert::success('Tambah Data', 'Berhasil Tambah Data Mentor.');
        return redirect()->route('mentor.index')->with('success', 'Data Mentor berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mentor = Mentor::find($id);
        return view('mentor.showMentor', ['mentor' => $mentor]);
        // return view('siswa.EditSiswa', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mentor = Mentor::find($id);
        return view('mentor.EditMentor', compact('mentor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mentor = Mentor::findOrFail($id);
        $mentor->kd_mentor = $request->kd_mentor;
        $mentor->nama = $request->nama;
        $mentor->email = $request->email;
        $mentor->no_telp = $request->no_telp;
        $mentor->jenis_kelamin = $request->jenis_kelamin;
        $mentor->pendidikan = $request->pendidikan;
        $mentor->alamat = $request->alamat;
        $mentor->save();
        Alert::success('Update Data', 'Berhasil Update Data Mentor.');
        return redirect()->route('mentor.index')->with('success', 'Data Mentor berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mentor::find($id)->delete();
        Alert::success('Hapus Data', 'Data Mentor Berhasil Dihapus');
        return redirect()->route('mentor.index')->with('success', 'Data mentor berhasil dihapus.');
    }
}
