<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;

class TransaksiController extends Controller
{

    protected $index = 'transaksi.index';
    protected $route = 'transaksi/';
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
            'page' => 'Data Transaksi',
            "pelanggans" => Pelanggan::All(),
            'transaksis' => Transaksi::All(),
            'produks' => Produk::All(),
            'add' => $this->route . "create",
            'index' => $this->route,
        ];
        return view($this->view . "form", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        dd($request);
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

    function generate_nota(Request $req)
    {
        // Generate Data Menggunakan Query Builder
        $transaksi = DB::table("transaksis")
            ->join("pelanggans", "transaksis.trans_id_pelanggan", "=", "pelanggans.id")
            ->select("transaksis.*", "pelanggans.nama")
            ->where("transaksis.id", $req->id)
            ->first();


        $detail = DB::table("detail_transaksis")
            ->join("produks", "detail_transaksis.id_menu", "=", "produks.id_menu")
            ->select("detail_transaksis.*", "produks.nm_menu", DB::raw("(detail_transaksis.harga * detail_transaksis.jumlah) as subtotal"))
            ->where("detail_transaksis.id_transaksi", $req->id)
            ->get();

        // Data to View
        $data = [
            "rsTransaksi" => $transaksi,
            "rsDetail"    => $detail,
            "total"       => 0,
        ];

        return view("transaksi.nota", $data);
    }

    public function test()
    {
        $data = [
            "title" => "Transaksi",
            'page' => 'Data Transaksi',
            "pelanggans" => Pelanggan::All(),
            'transaksis' => Transaksi::All(),
            'produks' => Produk::All(),
            'add' => $this->route . "create",
            'index' => $this->route,
        ];
        return view($this->view . "pesan", $data);
    }
}
