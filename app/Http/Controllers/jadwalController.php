<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;
use App\Models\Mentor;
use App\Models\Kelas;
use App\Models\Sarpras;
use Illuminate\Support\Facades\Validator;


class jadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Jadwal Siswa';
        //ELOQUENT
        $jadwal=Jadwal::all();
        // $jadwal = DB::table('jadwal')
        //     ->join('mentor', 'jadwal.mentors_id', '=', 'mentor.id')
        //     ->join('sarpras', 'jadwal.sarprass_id', '=', 'sarpras.id')
        //     ->join('kelas', 'jadwal.Kelass', '=', 'kelas.id')
        //     ->select(
        //         'jadwal.id',
        //         'jadwal.kode_jadwal',
        //         'mentor.nama AS nama_mentor',
        //         'sarpras.nama AS nama_sarpras',
        //         'kelas.nama AS nama_kelas',
        //         'jadwal.hari',
        //         'jadwal.jam_mulai',
        //         'jadwal.jam_akhir',
        //         'jadwal.created_at',
        //         'jadwal.updated_at'
        //     );

    //     $jadwal= DB::select('
    //     SELECT jadwal.id, jadwal.kode_jadwal, mentor.nama AS mentor_nama,
    //     sarpras.nama AS sarpras_nama,
    //     kelas.nama AS kelas_nama,
    //     jadwal.hari,
    //     jadwal.jam_mulai,
    //     jadwal.jam_akhir,
    //     jadwal.created_at,
    //     jadwal.updated_at
    // FROM jadwal
    // JOIN mentor ON jadwal.mentors_id = mentor.id
    // JOIN sarpras ON jadwal.sarprass_id = sarpras.id
    // JOIN kelas ON jadwal.Kelass = kelas.id
    // ');
        return view('jadwal.jadwal',[
            'pageTitle'=> $pageTitle,
            'jadwal' =>$jadwal]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle ='Tambah Jadwal';
        $mentor= Mentor::all();
        $sarpras = Sarpras::all();
        $kelas =Kelas::all();
        return view('jadwal.addJadwal',[
            'pageTitle'=>$pageTitle,
            'mentor'=>$mentor,
            'Sarpras'=> $sarpras,
            'Kelas'=>$kelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message=[
            'required'=> 'Form Belom terisi',
            'present'=> 'Silahkan pilih option'
        ];
        $validator= Validator::make($request->all(),[
            'kode'=>'required',
            'Mentor'=>'present',
            'hari'=>'presernt',
            'ruangan'=>'present',
            'kelas'=>'present'
        ], $message);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $jadwal= New Jadwal;
        $jadwal->kode_jadwal =$request->kode_jadwal;
        $jadwal->mentors_id =$request->mentors_id;
        $jadwal->hari =$request->hari;
        $jadwal->sarprass_id=$request->sarprass_id;
        $jadwal->Kelass= $request->Kelass;
        $jadwal->save();

        return redirect()->route('jadwal.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     $jadwal=Jadwal::find($id);
     return view('jadwal.edit',['jadwal'=>$jadwal]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle= 'Edit Jadwal';
        $jadwal=Jadwal::find($id);
        return view('jadwal.editJadwal',[
            'pageTitle'=>$pageTitle,
            'jadwal'=>$jadwal
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->kode_jadwal = $request->kode_jadwal;
        $jadwal->mentors_id = $request->mentors_id;
        $jadwal->hari= $request->hari;
        $jadwal->sarprass_id = $request->sarprass_id;
        $jadwal->Kelass = $request->Kelass;

        $jadwal->save();
        return redirect()->route('jadwal.index')->with('success', 'Data Mentor berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('jadwal')
        ->where('id',$id)
        ->delete();
        return redirect()->route('jadwal.index');
    }
}
