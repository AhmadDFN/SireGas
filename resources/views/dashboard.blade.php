@extends('template.template')

@section('title', $title)
@section('page-title', $page)

@section('content')
    <style>
        body {
            color: black
        }
    </style>
    <div class="text-center" style="color: black">
        <h5><strong>Siregas</strong></h3>
            <p><strong>JL in aja dulu no 1 Semarang</strong></p>
            <hr>
    </div>
    <div class="row">
        <div class="col-12 col-sm-4 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Pelanggan</span>
                    <span class="info-box-number">
                        {{ $total_pelanggan }}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-4 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><img src="{{ asset('dashmin/img/gasicon.ico') }}"
                        alt="Icon Gas" width="32" height="32"></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Produk</span>
                    <span class="info-box-number">{{ $total_produk }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Transaksi</span>
                    <span class="info-box-number">{{ $total_transaksi }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total User</span>
                    <span class="info-box-number">{{ $total_user }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
    <h3>Pendapatan</h3>
    <div class="row">
        <div class="col-12 col-sm-4 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pendapatan Per Tahun</span>
                    <span class="info-box-number">
                        Rp {{ number_format($rev_year->total, '0', ',', '.') }}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-4 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dollar-sign"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pendapatan Per Bulan</span>
                    <span class="info-box-number"> Rp {{ number_format($rev_month->total, '0', ',', '.') }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-4 col-md-3">
            <div class="info-box mb-6">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pendapatan Per Minggu</span>
                    <span class="info-box-number">Rp {{ number_format($rev_week, '0', ',', '.') }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-4 col-md-3">
            <div class="info-box mb-6">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-dollar-sign"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pendapatan Per Hari</span>
                    <span class="info-box-number">Rp {{ number_format($rev_day->total, '0', ',', '.') }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
    <h3>Piutang</h3>
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6">
            <div class="info-box mb-6">
                <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-dollar-sign"
                        style="color: white"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Hutang</span>
                    <span class="info-box-number">Rp {{ number_format($hutang->total, '0', ',', '.') }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>

@endsection
