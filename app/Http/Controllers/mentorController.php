<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentor;
use Illuminate\Support\Facades\Validator;

class mentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle='Mentor';
        $mentor=Mentor::all();
        return view('mentor.mentor',[
            'pageTitle'=>$pageTitle,
            'mentor'=>$mentor
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle='Tambah Data Mentor';
        $mentor=Mentor::all();
        return view('mentor.addMentor',[
            'pageTitle'=>$pageTitle,
            'mentor'=>$mentor
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'koded_mentor' => 'required|unique:mentor',
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pendidikan' => 'required',
            'alamat' => 'required',
        ],
        [
            'kode_mentor.required' => 'Kode Mentor harus diisi.',
            'nama.required' => 'Nama Mentor harus diisi.',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi.',
            'no_telp.required' => 'Nomor Telepon harus diisi.',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',

            // Tambahkan pesan kustom untuk aturan validasi lainnya di sini
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $mentor = new Mentor;
        $mentor->kode_mentor = $request->kode_mentor;
        $mentor->nama = $request->nama;
        $mentor->email = $request->email;
        $mentor->no_telp = $request->no_telp;
        $mentor->jenis_kelamin = $request->jenis_kelamin;
        $mentor->pendidikan = $request->pendidikan;
        $mentor->alamat = $request->alamat;
        $mentor->save();
        return redirect()->route('Mentor.index')->with('success', 'Data Mentor berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mentor =Mentor::find($id);
        return view('Mentor.show',['mentor'=>$mentor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
