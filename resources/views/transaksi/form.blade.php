@extends('template.blank')

@section('title', $title)
@section('page-title', $page)

@section('content')
    <div class="row m-0 p-0" style="background-color: rgb(0, 0, 0)">
        {{-- Loading --}}
        <div id="loading"></div>
        {{--  End Transaksi  --}}
        <div class="col-md-8 p-0">
            <div class="card" style="background-color: rgb(25, 0, 114)">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h2 class="card-title" style="font-size: 24px; color:aliceblue;">
                                <a href="{{ url('/') }}"><i class="fas fa-home"></i></a> DAFTAR PRODUK
                            </h2>
                        </div>
                        <div class="col-4">
                            <div class="card-tools">
                                <div class="input-group">
                                    <input id="search" type="text" class="form-control" placeholder="Search"
                                        onkeyup="searching()">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  <div class="btn-group mb-3 px-1">
                <button type="button" class="btn"
                    style="background-color: rgb(84, 46, 224); color:rgb(181, 213, 240);">Category </button>
                <button type="button" class="btn dropdown-toggle dropdown-icon" data-toggle="dropdown"
                    style="background-color: rgb(25, 0, 114); color:aliceblue;">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu bg-primary" role="menu">
                    @foreach ($dtCat as $rsCat)
                        <a class="dropdown-item text-light" href="#">{{ $rsCat->cat_nm }}</a>
                    @endforeach
                </div>
            </div>  --}}
            <style>
                h4 {
                    color: white;
                }
            </style>
            <!-- List Menu -->
            <div class="menu-list px-2 mt-3" id="menulist">
                <div class="row">
                    @foreach ($produks as $item)
                        <div class="menu-item col-md-3"
                            @if ($item->produk_stok >= 1) onclick="add_menu('{{ $item->id }}','{{ $item->produk_nama }}','{{ $item->produk_harga }}')" @else style="opacity: 0.4;" @endif>
                            <div class="inner">
                                @if ($item['produk_foto'] != '')
                                    <img class="thumb-menu" src="{{ asset($item->produk_foto) }}" alt="">
                                @else
                                    <img class="thumb-menu" src="{{ asset('dashmin/ing/no-image.webp') }}" alt="">
                                @endif
                                <h2>{{ $item->produk_nama }} <br />
                                    <span>Rp
                                        {{ number_format($item->produk_harga, '0', ',', '.') }}
                                        ,-</span>
                                    | Stok ~
                                    <span
                                        class="{{ $item->produk_stok >= 11 ? 'text-dark' : 'text-danger' }}">{{ $item->produk_stok }}</span>
                                </h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!--  End List Menu -->
        </div>
        <div class="col-md-4 pe-0">
            <div class="transaksi">
                <form id="frmTransaksi" action="{{ url('transaksi') }}" method="post">
                    @csrf
                    {{-- Info Transaksi --}}
                    <div class="row member">
                        <div class="col-md-10 text-light">
                            <p><strong>Member :</strong><br /><span id="member"></span></p>
                            <input id="txtCusID" type="hidden" name="trans_id_pelanggan">
                        </div>
                        <div class="col-md-2" style="text-align: end" data-bs-toggle="modal"
                            data-bs-target="#modal-customer">
                            <a class="btn btn-sm" style="background-color: rgb(232, 38, 38)"><i
                                    class="fas fa-ellipsis-h text-black-50"></i></a>
                        </div>
                    </div>
                    <p>
                        <input style="border: 2px solid rgb(0, 0, 0); width:100%;" type="text" name="catatan"
                            id="catatan" value="Catatan Belum Diisi">
                    </p>
                    <p>
                        <select class="form-select" id="pembayaran" name="pembayaran"
                            aria-label="Floating label select example" style="color: black">
                            <option value="Cash">Cash</option>
                            <option value="Hutang">Hutang</option>
                        </select>
                        <label for="trans_pembayaran" style="color: cyan">Pembayaran</label>
                    </p>
                    {{-- End Info Transaksi --}}
                    <hr style="border-top: 2px dashed rgb(255, 255, 255);">
                    {{-- Detail Menu yang dipesan --}}
                    <div class="detail">

                    </div>
                    <hr style="border-top: 2px dashed rgb(0, 0, 0);">
                    {{-- End Detail Menu yang dipesan --}}
                    {{-- Total --}}
                    <div class="other text-light">
                        <div class="other-item">
                            <div class="row">
                                <div class="desc col-md-7">
                                    <p><strong>PPN 11%</strong></p>
                                </div>
                                <div class="price col-md-5">
                                    <p id="ppn"><span>Rp</span> 0</p>
                                    <input type="hidden" name="ppn" id="txtPPN" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Total --}}
                    <h2 class="text-light mb-0 mt-3">TOTAL </h2>
                    <h2 id="amount" class="text-light"><span>Rp</span> 0</h2>
                    <input type="hidden" id="gtotal" name="gtotal">
                    <div class="row btn-action">
                        <div class="col-md-6">
                            <button id="btn-save" class="btn text-light"
                                style="background-color: rgb(130, 123, 0); border: 2px solid rgb(0, 0, 0);" type="button"
                                onclick="save_transaksi()" data-url="{{ url('transaksi/nota') }}">SIMPAN</button>
                            <button id="btn-new" class="btn d-none text-light"
                                style="background-color: rgb(3, 70, 12); border: 2px solid rgb(0, 0, 0);" type="button"
                                onclick="new_transaksi()">TRANSAKSI BARU</button>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <iframe id="nota" src="" frameborder="0" class="d-none"></iframe>

    {{-- Template Menu --}}
    <div id="tmp-menu" class="detail-item text-light" style="display: none">
        <div class="row">
            <div class="item col-md-7">
                <h4>Nasi Goreng</h4>
                <p>Items :<input id="jumlah" class="jumlah" name="jumlah[]" onchange="ganti_harga(this)"
                        type="number" min="1" value="1" data-harga=""></p>
                {{-- Disimpan ke database --}}
                <input type="hidden" name="id_menu[]" class="txtID">
                <input type="hidden" name="nm_menu[]" class="txtNama">
                <input type="hidden" name="harga[]" class="txtHarga">
            </div>
            <div class="price col-md-5">
                <h4><span>Rp</span> 7.000</h4>
                <a href="javascript:void(0)" class="delete" onclick="del_menu(this)" data-id=""><i
                        class="fas fa-times"></i></a>
            </div>
        </div>
    </div>
    {{-- End Template Menu --}}

    {{-- Data Customer --}}
    <div class="modal fade" id="modal-customer">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color:black">Data Pelanggan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="card-tools text-end m-2 float-end">
                    <a href="{{ url('pelanggan/create') }}" target="_blank" class="btn btn-primary btn-sm">Tambah
                        Pelanggan</a>
                </div>
                <div class="modal-body">
                    <table id="dtCustomer" class="dtTable table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Kota</th>
                                <th scope="col">Telp</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggans as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->pelanggan_nama }}</td>
                                    <td>{{ $item->pelanggan_nik }}</td>
                                    <td>{{ $item->pelanggan_alamat }}</td>
                                    <td>{{ $item->pelanggan_kota }}</td>
                                    <td>{{ $item->pelanggan_telp }}</td>
                                    <td>
                                        <button
                                            onclick="pilih_customer('{{ $item->id }}','{{ $item->pelanggan_kota }}','{{ $item->pelanggan_nama }}')"
                                            class="btn btn-danger btn-sm">PILIH</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{--  End Data Customer --}}
@endsection
