@extends('template.template')

@section('title', $title)
@section('page-title', $page)

@section('content')

    <div class="bg-secondary rounded">
        @if (session('text'))
            <div class="alert alert-{{ session('type') }} text-center" style="width: 300px;" role="alert">
                {{ session('text') }}
            </div>
        @endif
    </div>
    <form action="{{ url('transaksi/' . @$transaksi->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @isset($transaksi)
            @method('PUT')
        @endisset
        <style>
            #dengan-rupiah {
                text-align: right;
            }
        </style>
        <div class="container-fluid pt-1 px-0">
            <div class="row g-4">
                <div class="col">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">{{ @$page }}</h6>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{ @$transaksi->id }}">
                            @if (@$transaksi)
                                <input type="datetime-local" class="form-control" id="tanggal_transaksi"
                                    name="tanggal_transaksi" value="{{ @$transaksi->tanggal_transaksi }}" readonly>
                                <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="total_harga" name="total_harga"
                                value="{{ @$transaksi->total_harga }}">
                            <label for="total_harga" class="form-label">Total Harga</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="pelanggan" name="pelanggan"
                                aria-label="Floating label select example">
                                <option selected>Pilih Pelanggan</option>
                                @if (@$pelanggans)
                                    @foreach (@$pelanggans as $pelanggan)
                                        <option style="color: white" value="{{ @$pelanggan->id }}"
                                            {{ @$transaksi->id_pelanggan == @$pelanggan->id ? 'selected' : '' }}>
                                            {{ @$pelanggan->nama_pelanggan }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <label for="pelanggan">Pelanggan</label>
                            <a href="{{ url('pelanggan/create') }}" class="mt-3">Tambah Data Pelanggan</a>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="pembayaran" name="pembayaran"
                                aria-label="Floating label select example">
                                <option selected>Pilih Pembayaran</option>
                                <option value="Cash">Cash</option>
                                <option value="Hutang">Hutang</option>
                                <option value="Campur">Campur</option>
                            </select>
                            <label for="pembayaran">Pembayaran</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Catatan" id="catatan" name="catatan" style="height: 150px;"></textarea>
                            <label for="catatan">Catatan</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
