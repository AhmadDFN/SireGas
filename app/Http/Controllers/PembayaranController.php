<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\Pelanggan;

class PembayaranController extends Controller
{
    protected $index = 'pembayaran.index';
    protected $route = 'pembayaran/';
    protected $view = 'pembayaran.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = Pembayaran::with('pelanggan')->get();
        $data = [
            "title" => "Pembayaran",
            'page' => 'Data Pembayaran hutang',
            "pembayarans" => $pembayarans,
            'add' => $this->route . "create",
            'index' => $this->route,
        ];
        return view($this->view . "data", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_pelanggan = [])
    {
        $data = [
            "idPelanggan" => $id_pelanggan,
            "title" => "Pembayaran",
            'page' => 'Tambah Pembayaran',
            'save' => $this->route . "store",
            'index' => $this->route,
            'pelanggans' => Pelanggan::all(),
            // 'is_update' => false,
        ];
        // dd($data);
        return view($this->view . "form", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembayaranRequest $request)
    {
        $data = $request->all();
        $data['pembayaran_tanggal'] = date("Y-m-d h:i:s");
        // Update Produk Stok
        $pelanggan = Pelanggan::find($request->pembayaran_id_pelanggan);
        if ($pelanggan->pelanggan_hutang < $request->pembayaran_jumlah) {
            return back()->with(['text' => "Pembayaran melebihi hutang"]);
        }
        $pelanggan->pelanggan_hutang -= $request->pembayaran_jumlah;
        $pelanggan->save();
        Pembayaran::create($data);

        return redirect()->route($this->index);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
