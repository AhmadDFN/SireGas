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
                            <th scope="col">Nota</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Pelanggan</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Pembayaran</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (@$transaksis as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->trans_nota }}</td>
                                <td>{{ $item->trans_tanggal }}</td>
                                <td>{{ $item->trans_id_pelanggan }}</td>
                                <td>{{ $item->trans_gtotal }}</td>
                                <td>{{ $item->pembayaran }}</td>
                                <td>{{ $item->catatan }}</td>
                                <td>
                                    <form action="{{ url($index . @$item->id) }}" method="post"
                                        id="{{ 'delete-form-' . @$item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url($index . 'nota/' . @$item->id) }}"><i
                                                class="text-success fas fa-eye"></i></a>
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
