@extends('layouts/app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add Warehouse</h3>
                    <!-- <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> -->
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Main</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Warehouse</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <section id="contact">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <form action="{{ route('warehouse.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Gudang</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                aria-describedby="name" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1">Alamat Gudang</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat"
                                                rows="3"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </section>
    </div>
@endsection
