<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use App\Models\JenisKelamin;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle='Daftar list siswa';
        //ELOQUENT
        $siswass= Siswa::all();
        return view('siswa.siswa',[
            'pageTitle'=>$pageTitle,
            'siswass'=> $siswass
        ]);


        // $siswa =DB::select('select* FROM siswass');
        // return view('siswa.siswa',[
        //     'pageTitle'=>$pageTitle,
        //     'siswa'=> $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle ='tambah data siswa';
        // return view('siswa.addSiswa',compact('pageTitle'));

        $jenis_Kelamins = JenisKelamin::all();
        return view('siswa.addSiswa',compact('pageTitle','jenis_Kelamins'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle ='Detail Data Siswa';

        $siswass =collect(DB::select('select*,siswass.id as siswass_id, jenis_Kelamins.nama as jenis_kelamin_nama
        from siswass
        left Join jenis_Kelamins on siswass.jenis_Kelamins_id =jenis_Kelamins.id
        where siswass.id =? ',[$id]))->first();

        return view('siswa.ShowSiswa',compact('pageTitle','siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle='Edit Data Siswa';
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
        DB::table('siswass')
        ->where('id',$id)
        ->delete();

        return redirect()->route('siswa.index');
    }
}
