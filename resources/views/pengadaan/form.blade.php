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
    <form action="{{ url('pengadaan/' . @$pengadaan->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @isset($pengadaan)
            @method('PUT')
        @endisset
        <div class="container-fluid pt-1 px-0">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">{{ @$page }}</h6>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{ @$pengadaan->id }}">
                            <select class="form-select" id="pengadaan_id_produk" name="pengadaan_id_produk"
                                aria-label="Floating label select example">
                                <option selected>Pilih barang</option>
                                @foreach ($produks as $item)
                                    <option
                                        value="{{ @$item->id }}"{{ @$item->id == @$pengadaan->pengadaan_id_produk ? 'Selected' : '' }}>
                                        {{ @$item->produk_nama . ' - Harga Jual - ' . @$item->produk_harga }}</option>
                                @endforeach
                            </select>
                            <label for="pengadaan_id_produk">Pengadaan Produk</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="pengadaan_jumlah" name="pengadaan_jumlah"
                                value="{{ @$pengadaan->pengadaan_jumlah }}">
                            <label for="pengadaan_jumlah" class="form-label">Jumlah</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="pengadaan_harga" name="pengadaan_harga"
                                value="{{ @$pengadaan->pengadaan_harga }}">
                            <label for="pengadaan_harga" class="form-label">Harga Beli</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Catatan Disini" name="pengadaan_catatan" id="pengadaan_catatan"
                                style="height: 150px;">{{ @$pengadaan->id ? @$pengadaan->pengadaan_catatan : 'Catatan' }}</textarea>
                            <label for="pengadaan_catatan">Catat Disini</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
