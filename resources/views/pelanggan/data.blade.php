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
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Telp</th>
                            <th scope="col">Hutang</th>
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
                                <td>{{ number_format($item->pelanggan_hutang, '0', ',', '.') }}</td>
                                <td>
                                    <form action="{{ url($index . @$item->id) }}" method="post"
                                        id="{{ 'delete-form-' . @$item->id }}">
                                        <a href="{{ url($index . @$item->id . '/edit') }}"><i
                                                class="text-warning fas fa-edit"></i></a>
                                        <a href="{{ url('pembayaran/create/' . @$item->id) }}"><i
                                                class="ms-2 text-info fa-solid fa-dollar-sign"></i></a><br>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-transparent mt-0"><i
                                                class="text-danger fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
