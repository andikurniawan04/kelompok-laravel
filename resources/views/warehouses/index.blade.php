@extends('layouts/app')

@section('content')
    @if (session('Berhasil'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('Berhasil') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('Gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('Gagal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Warehouse</h3>
                    <p class="text-subtitle text-muted">List Warehouse</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Main</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Warehouse</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Warehouse</h4>
                    <a href="{{ route('warehouse.create') }}" class="btn btn-primary"><i class="bi bi-plus">New
                            Warehouse</i></a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Nama Gudang</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->nama_gudang }}</td>
                                    <td>{{ $row->alamat_gudang }}</td>

                                    <td>
                                        <form action="{{ route('warehouse.destroy', $row->id_gudang) }}" method="POST">
                                            <a class="btn btn-success"
                                                href="{{ route('warehouse.edit', $row->id_gudang) }}">Edit</a>
                                            {{-- <a class="btn btn-danger" href="#">Hapus</a> --}}

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah anda ingin menghapus data ini?')">Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
