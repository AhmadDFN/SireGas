<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Http\Requests\StorePengadaanRequest;
use App\Http\Requests\UpdatePengadaanRequest;
use App\Models\Produk;

class PengadaanController extends Controller
{
    protected $index = 'pengadaan.index';
    protected $route = 'pengadaan/';
    protected $view = 'pengadaan.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengadaans = Pengadaan::with('produk')->get();
        // dd($pengadaans);
        $data = [
            "title" => "Pengadaan",
            'page' => 'Data Pengadaan SireGas',
            "pengadaans" => $pengadaans,
            'add' => $this->route . "create",
            'index' => $this->route,
        ];
        // dd($data);
        return view($this->view . "data", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Pengadaan",
            'page' => 'Tambah Pengadaan',
            'save' => $this->route . "store",
            'index' => $this->route,
            'produks' => Produk::all(),
            // 'is_update' => false,
        ];
        return view($this->view . "form", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengadaanRequest $request)
    {
        $data = $request->all();
        $data['pengadaan_tanggal'] = date("Y-m-d h:i:s");
        $data['pengadaan_total'] = $request->pengadaan_jumlah * $request->pengadaan_harga;
        // dd($data);
        Pengadaan::create($data);
        // Update Produk Stok
        $produk = Produk::find($request->pengadaan_id_produk);
        $produk->produk_stok += $request->pengadaan_jumlah;
        $produk->save();

        return redirect()->route($this->index);
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
