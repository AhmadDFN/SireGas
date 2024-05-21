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
    <div class="col-12">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">{{ @$page }}</h6>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal Pembayaran</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Pelanggan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (@$pembayarans as $item)
                            <tr>
                                <th scope="row">{{ @$loop->iteration }}</th>
                                <td>{{ @$item->pembayaran_tanggal }}</td>
                                <td>{{ number_format($item->pembayaran_jumlah, '0', ',', '.') }}</td>
                                <td>{{ @$item->pelanggan->pelanggan_nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
