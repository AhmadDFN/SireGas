<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $index = 'dashboard.index';
    protected $route = 'dashboard.';
    protected $view = 'dashboard.';

    public function index()
    {
        $data = [
            "title" => "Dashboard",
            'page' => 'Dashboard',
            "pelanggans" => Pelanggan::All(),
            'transaksis' => Transaksi::All(),
            'hutangs' => Hutang::All(),
            'add' => $this->route . "create",
            'index' => $this->route,
        ];
        return view($this->view . "data", $data);
    }
}
