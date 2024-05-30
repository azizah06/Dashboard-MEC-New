<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaketKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Anda bisa menambahkan logika pemrosesan data di sini
        return view('paket_kelas.pkt_kelas');

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
