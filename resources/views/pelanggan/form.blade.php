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
    <form action="{{ url('pelanggan/' . @$pelanggan->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @isset($pelanggan)
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
                            <input type="hidden" name="id" value="{{ @$pelanggan->id }}">
                            <input type="text" class="form-control" id="pelanggan_nama" name="pelanggan_nama"
                                value="{{ @$pelanggan->pelanggan_nama }}">
                            <label for="pelanggan_nama" class="form-label">Nama Pelanggan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="pelanggan_nik" name="pelanggan_nik"
                                value="{{ @$pelanggan->pelanggan_nik }}">
                            <label for="pelanggan_nik" class="form-label">NIK</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="pelanggan_alamat" name="pelanggan_alamat"
                                value="{{ @$pelanggan->pelanggan_alamat }}">
                            <label for="pelanggan_alamat" class="form-label">Alamat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="pelanggan_kota" name="pelanggan_kota"
                                value="{{ @$pelanggan->pelanggan_kota }}">
                            <label for="pelanggan_kota" class="form-label">Kota</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="pelanggan_telp" name="pelanggan_telp"
                                value="{{ @$pelanggan->pelanggan_telp }}">
                            <label for="pelanggan_telp" class="form-label">No Telp</label>
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
