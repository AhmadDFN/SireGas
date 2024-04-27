<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Http\Requests\StorePengadaanRequest;
use App\Http\Requests\UpdatePengadaanRequest;

class PengadaanController extends Controller
{
    protected $index = 'pengadaan.index';
    protected $route = 'pengadaan.';
    protected $view = 'pengadaan.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengadaanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengadaan $pengadaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengadaan $pengadaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengadaanRequest $request, Pengadaan $pengadaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengadaan $pengadaan)
    {
        //
    }
}
