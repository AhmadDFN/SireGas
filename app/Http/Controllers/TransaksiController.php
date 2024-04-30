<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;

class TransaksiController extends Controller
{

    protected $index = 'transaksi.index';
    protected $route = 'transaksi.';
    protected $view = 'transaksi.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "title" => "Transaksi",
            'page' => 'Data Transaksi',
            "pelanggans" => Pelanggan::All(),
            'transaksis' => Transaksi::All(),
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
            "title" => "Transaksi",
            'page' => 'Tambah Transaksi',
            'save' => $this->route . "store",
            'index' => $this->route,
            // 'is_update' => false,
        ];

        // $data = [
        //     "title" => "Transaction",
        //     "dtCat" => Category::All(),
        //     "dtTable" => Table::All(),
        //     "dtCus" => Customer::All(),
        //     "dtMenu" => Menu::All()
        // ];

        return view($this->view . "form", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        Transaksi::create($request->all());
        return redirect()->route($this->index);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        $data = [
            "title" => "Transaksi",
            'page' => 'Edit Data Transaksi',
            'transaksi' => $transaksi,
            'save' => $this->route . "update",
            'index' => $this->route,
            'is_update' => true,
        ];
        return view($this->view . "form", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        $transaksi->fill($request->all());
        $transaksi->save();
        return redirect()->route($this->index);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route($this->index);
    }

    public function test()
    {
        $data = [
            "title" => "Transaksi",
            'page' => 'Data Transaksi',
            "pelanggans" => Pelanggan::All(),
            'transaksis' => Transaksi::All(),
            'add' => $this->route . "create",
            'index' => $this->route,
        ];
        return view($this->view . "pesan", $data);
    }
}
