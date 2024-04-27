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
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">{{ @$page }}</h6>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{ @$transaksi->id }}">
                            <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi"
                                value="{{ @$transaksi->tanggal_transaksi }}">
                            <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="dengan-rupiah" name="total_harga"
                                value="{{ @$transaksi->total_harga }}">
                            <label for="dengan-rupiah" class="form-label">Total Harga</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Works with selects</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"></textarea>
                            <label for="floatingTextarea">Comments</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
