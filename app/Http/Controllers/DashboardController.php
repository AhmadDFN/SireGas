<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hutang;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    protected $index = 'dashboard.index';
    protected $route = 'dashboard/';
    protected $view = 'dashboard.';

    public function index()
    {
        $rev_year = DB::select("SELECT SUM(trans_gtotal - trans_ppn) AS total 
                    FROM transaksis 
                    WHERE strftime('%Y', trans_tanggal) = strftime('%Y', 'now')");
        $rev_month = DB::select("SELECT SUM(trans_gtotal - trans_ppn) AS total 
                    FROM transaksis 
                    WHERE strftime('%Y-%m', trans_tanggal) = strftime('%Y-%m', 'now')");
        $rev_week = DB::select("SELECT SUM(trans_gtotal - trans_ppn) AS total
                    FROM transaksis
                    WHERE strftime('%Y-%W', trans_tanggal) = strftime('%Y-%W', 'now')
                    GROUP BY strftime('%Y-%W', trans_tanggal)");
        $rev_day = DB::select("SELECT SUM(trans_gtotal - trans_ppn) AS total
                    FROM transaksis
                    WHERE strftime('%Y-%m-%d', trans_tanggal) = date('now')");
        $hutang = DB::select("SELECT SUM(pelanggan_hutang) AS total FROM pelanggans");

        $data = [
            "total_user" => User::count(),
            "total_pelanggan" => Pelanggan::count(),
            "total_produk" => Produk::count(),
            "total_transaksi" => Transaksi::count(),
            "rev_year" => $rev_year[0],
            "rev_month" => $rev_month[0],
            "rev_week" => $rev_week ? $rev_week[0]->total : 0,
            "rev_day" => $rev_day[0],
            "hutang" => $hutang[0],
            "title" => "Dashboard",
            'page' => 'Dashboard',
        ];

        // dd($data);
        return view("dashboard", $data);
    }
}
