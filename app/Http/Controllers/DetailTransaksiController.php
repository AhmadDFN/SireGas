<?php

namespace App\Http\Controllers;

use App\Models\detailTransaksi;
use Illuminate\Support\Facades\DB;
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
        $dtTrans = DB::table("transaksis")
            ->leftJoin("pelanggans", "transaksis.trans_id_pelanggan", "=", "pelanggans.id")
            ->select("transaksis.*", "pelanggans.pelanggan_nama")
            ->get();

        $data = [
            "title" => "Detail Transaksi",
            'page' => 'Data Detail Transaksi',
            "dtTrans" => $dtTrans,
            "total" => 0,
            "ppntotal" => 0
        ];
        return view($this->view . "data", $data);
    }

    public function hutang()
    {
        $hutangs = DB::table("transaksis")
            ->leftJoin("pelanggans", "transaksis.trans_id_pelanggan", "=", "pelanggans.id")
            ->where("transaksis.pembayaran", "=", "Hutang")
            ->select("transaksis.*", "pelanggans.pelanggan_nama")
            ->get();

        $data = [
            "title" => "Detail hutang",
            'page' => 'Data Detail hutang',
            "hutangs" => $hutangs,
            "total" => 0,
            "ppntotal" => 0
        ];

        return view($this->view . "datahutang", $data);
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
