@extends('layouts/app')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Inventory</h3>
                    <!-- <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> -->
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Main</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Inventory</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <!-- <h4 class="card-title">Example Content</h4> -->
                </div>
                <div class="card-body">
                    <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur quas omnis laudantium tempore exercitationem, expedita aspernatur sed officia asperiores unde tempora maxime odio reprehenderit distinctio incidunt! Vel
                                                                                                                                                                                                                                                                                                                                                                                                                              aspernatur dicta consequatur! -->
                    <!-- Contact -->
                    <section id="contact">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <form action="{{ route('inventory.update', $data->first()->id_inventory) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="nama_produk" class="form-label">Nama Produk</label>
                                            <select class="form-select" name="id_produk"
                                                aria-label="Default select example">
                                                <option selected value="{{ $data->first()->id_produk }}">
                                                    {{ $data->first()->nama_produk }}
                                                </option>
                                                @foreach ($produk as $row)
                                                    <option value="{{ $row->id_produk }}">{{ $row->nama_produk }}

                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_gudang" class="form-label">Nama Gudang</label>
                                            <select class="form-select" name="id_gudang"
                                                aria-label="Default select example">
                                                <option selected value="{{ $data->first()->id_gudang }}">
                                                    {{ $data->first()->nama_gudang }}
                                                </option>
                                                @foreach ($gudang as $row)
                                                    <option value="{{ $row->id_gudang }}">{{ $row->nama_gudang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlah" class="form-label">Jumlah</label>
                                            <input type="text" type="number" class="form-control" id="jumlah"
                                                name="jumlah" aria-describedby="name"
                                                value="{{ $data->first()->jumlah }}" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" name="status"
                                                aria-label="Default select example">
                                                @if ($data->first()->status == 'IN')
                                                    <option value="IN">IN</option>
                                                    <option value="OUT">OUT</option>
                                                @elseif($data->first()->status == 'OUT')
                                                    <option value="OUT">OUT</option>
                                                    <option value="IN">IN</option>
                                                @endif

                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Akhir Contact -->
                </div>
            </div>
        </section>
    </div>
@endsection
