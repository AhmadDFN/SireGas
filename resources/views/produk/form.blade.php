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
    <form action="{{ url('produk/' . @$produk->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @isset($produk)
            @method('PUT')
        @endisset
        <div class="container-fluid pt-1 px-0">
            <div class="row g-4">
                <div class="col">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">{{ @$page }}</h6>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{ @$produk->id }}">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ @$produk->nama }}">
                            <label for="nama" class="form-label">Nama Produk</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ @$produk->harga }}" style="text-align: right">
                            <label for="harga" class="form-label">Harga Produk</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="stok" name="stok"
                                value="{{ @$produk->stok }}" style="text-align: right">
                            <label for="stok" class="form-label">Stok Produk</label>
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
