@extends('template.template')

@section('title', $data->title)
@section('page-title', $data->page)

@section('content')

    <div class="bg-secondary rounded">
        @if (session('text'))
            <div class="alert alert-{{ session('type') }} text-center" style="width: 300px;" role="alert">
                {{ session('text') }}
            </div>
        @endif
    </div>
    <form action="{{ url('akun/' . @$akun->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @isset($akun)
            @method('PUT')
        @endisset
        <div class="container-fluid pt-1 px-0">
            <div class="row g-4">
                <div class="col">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">{{ @$page }}</h6>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{ @$akun->id }}">
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ @$akun->username }}" {{ @$akun->id ? 'disabled' : '' }}>
                            <label for="username" class="form-label">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" value="">
                            <label for="password" class="form-label">Password</label>
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
