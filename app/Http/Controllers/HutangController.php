<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreHutangRequest;
use App\Http\Requests\UpdateHutangRequest;

class HutangController extends Controller
{
    protected $index = 'hutang.index';
    protected $route = 'hutang/';
    protected $view = 'hutang.';
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
    public function store(StoreHutangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Hutang $hutang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hutang $hutang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHutangRequest $request, Hutang $hutang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hutang $hutang)
    {
        //
    }
}
