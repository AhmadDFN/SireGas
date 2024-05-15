<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;

class PelangganController extends Controller
{
    protected $index = 'pelanggan.index';
    protected $route = 'pelanggan/';
    protected $view = 'pelanggan.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "title" => "Pelanggan",
            'page' => 'Data Pelanggan',
            "pelanggans" => Pelanggan::All(),
            'add' => $this->route . "create",
            'index' => $this->route,
        ];
        return view($this->view . "data", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Pelanggan",
            'page' => 'Tambah Pelanggan',
            "pelanggans" => Pelanggan::All(),
            'save' => $this->route . "store",
            'index' => $this->route,
            // 'is_update' => false,
        ];

        return view($this->view . "form", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelangganRequest $request)
    {
        $data = $request->all();
        $data['pelanggan_hutang'] = 0;
        Pelanggan::create($data);
        return redirect()->route($this->index);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        $data = [
            "title" => "Pelanggan",
            'page' => 'Edit Data Pelanggan',
            'pelanggan' => $pelanggan,
            'save' => $this->route . "update",
            'index' => $this->route,
            'is_update' => true,
        ];

        return view($this->view . "form", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}
