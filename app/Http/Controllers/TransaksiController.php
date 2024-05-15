<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\detailTransaksi;

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
    public function simpan()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        $nota = "N" . date("Ymdhis") . Str::upper(Str::random(4));

        // Simpan Ke transaksi
        Transaksi::create([
            "trans_nota" => $nota,
            "trans_tanggal" => date("Y-m-d h:i:s"),
            "trans_id_pelanggan" => $request->input("trans_id_pelanggan"),
            "trans_gtotal" => $request->input("gtotal"),
            "trans_ppn" => $request->input("ppn"),
            "pembayaran" => $request->input("pembayaran"),
            "catatan" => $request->input("catatan"),
        ]);

        if ($request->input("pembayaran") == "Hutang") {
            $pelanggan = Pelanggan::find($request->input("trans_id_pelanggan"));
            $pelanggan->pelanggan_hutang += $request->input("gtotal");
            $pelanggan->save();
        }

        $transaksi = DB::select("SELECT seq FROM sqlite_sequence WHERE name = 'transaksis'");
        $id_transaksi = $transaksi[0]->seq;

        // Simpan Ke Detail
        $mn_id = $request->input("id_menu");
        $mn_harga = $request->input("harga");
        $mn_jumlah = $request->input("jumlah");
        for ($i = 0; $i < count($mn_id); $i++) {
            // Proses Simpan
            detailTransaksi::create([
                "detail_id_transaksi" => $id_transaksi,
                "detail_id_produk" =>  $mn_id[$i],
                "detail_jumlah" =>  $mn_jumlah[$i],
                "detail_harga" =>  $mn_harga[$i],
                "detail_total_harga" =>  $request->input("gtotal"),
            ]);
            $produk = Produk::find($mn_id[$i]);
            $produk->produk_stok -= $mn_jumlah[$i];
            $produk->save();
        }

        $data = [
            "error" => 0,
            "message" => "Data Berhasil Disimpan",
            "id_transaksi" => $id_transaksi
        ];

        return json_encode($data);
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
            ->select("transaksis.*", "pelanggans.pelanggan_nama")
            ->where("transaksis.id", $req->id)
            ->first();


        $detail = DB::table("detail_transaksis")
            ->join("produks", "detail_transaksis.detail_id_produk", "=", "produks.id")
            ->select("detail_transaksis.*", "produks.produk_nama", DB::raw("(detail_transaksis.detail_harga * detail_transaksis.detail_jumlah) as subtotal"))
            ->where("detail_transaksis.detail_id_transaksi", $req->id)
            ->get();

        // Data to View
        $data = [
            "transaksi" => $transaksi,
            "detail"    => $detail,
            "total"       => 0,
        ];
        return view($this->view . "nota", $data);
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

    function rpt_transaction()
    {
        $dtTrans = DB::table("transaksis")
            ->leftJoin("pelanggans", "transaksis.trans_id_pelanggan", "=", "pelanggans.id")
            ->select("transaksis.*", "pelanggans.pelanggan_nama")
            ->get();

        $data = [
            "dtTrans" => $dtTrans,
            "total" => 0
        ];

        return view("detailtransaksi.data", $data);
    }
}
