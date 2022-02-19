@extends('layouts/app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add Category</h3>
                    <!-- <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> -->
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Main</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
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
                                    <form action="{{ route('category.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Kategori</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                aria-describedby="name" />
                                        </div>

                                        <button type="submit" class="btn btn-primary">Add</button>
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
