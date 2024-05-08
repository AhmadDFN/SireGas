<?php

namespace App\Http\Controllers;

use App\Models\detailTransaksi;
use App\Http\Requests\StoredetailTransaksiRequest;
use App\Http\Requests\UpdatedetailTransaksiRequest;

class DetailTransaksiController extends Controller
{
    protected $index = 'detailTransaksi.index';
    protected $route = 'detailTransaksi/';
    protected $view = 'detailTransaksi.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "title" => "Detail Transaksi",
            'page' => 'Data Detail Transaksi',
        ];
        return view($this->view . "data", $data);
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
    public function store(StoredetailTransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(detailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedetailTransaksiRequest $request, detailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detailTransaksi $detailTransaksi)
    {
        //
    }
}
