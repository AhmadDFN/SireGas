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
                <div class="col-4">
                    <div class="bg-light rounded h-100 p-4">
                        <img id="photo-preview" class="thumb-menu-big"
                            src="{{ @$produk->foto != '' ? $produk->foto : asset('dashmin/img/no-image.webp') }}"
                            alt="">
                        <input type="file" class="thumb-menu-big" name="foto" id="photo-input" style="display:none"
                            value="{{ old('file') ? old('file') : @$produk->foto }}">
                        <textarea name="foto" id="foto" cols="30" rows="10" style="display:none">{{ @$produk->name }}</textarea>
                        {{--  <input type="file" class="mt-2" name="foto" id="foto">  --}}
                        @error('foto')
                            <div id="foto" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-8">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">{{ @$page }}</h6>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{ @$produk->id }}">
                            <input type="text" class="form-control" id="produk_nama" name="produk_nama"
                                value="{{ @$produk->produk_nama }}">
                            <label for="produk_nama" class="form-label">Nama Produk</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="produk_harga" name="produk_harga"
                                value="{{ @$produk->produk_harga }}" style="text-align: right">
                            <label for="produk_harga" class="form-label">Harga Produk</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="produk_stok" name="produk_stok"
                                value="{{ @$produk->produk_stok }}" style="text-align: right">
                            <label for="produk_stok" class="form-label">Stok Produk</label>
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
