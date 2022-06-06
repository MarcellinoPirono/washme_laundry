@extends('layouts.main')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between shape-dashboard">
        <h1 class="h3 mb-0 text-black-800 ml-3">Layanan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Container Card -->
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card-pesanan2 shadow">
                <!-- Pesanan - Cuci Kiloan -->
                <div class="row mt-4">
                    <h1 class="h3 text-black-600 ml-4 mt-2">Cuci Kiloan</h1>
                    <a href="{{ url('/tambah') }}" class="btn btn-success ml-3 mt-auto mb-auto" style="height: 20px;">
                        <h5 class="mt-n1 small">Tambah</h5>
                    </a>
                </div>
                <div class="pre-scrollable-x">
                    <div class="d-flex col-9">
                        @foreach($results as $layanankiloan)
                        <div class="col-xl-4 col-md-6 col-sm-6 col-lg-6 align-items-center">
                            <div class="card-body1 bg-putih-tulang shadow">
                                <div class="ml-auto mr-auto col-10 mt-3">
                                    <span class="dot4 position-absolute mt-n3"></span>
                                    <span class="dot5 position-absolute mt-5"></span>
                                    <img class="ml-2 gambar" src="{{ URL::asset($layanankiloan->image)}}" style="width: 80px;">
                                </div>
                                <div class=" row mt-7 justify-content-between flex-nowrap">
                                    <div class="ml-auto mr-auto textpesanan text-center font-weight-bold text-orange">
                                        {{$layanankiloan->jenis}}
                                    </div>
                                </div>
                                <a href="#" class="btn btn-danger" style="width: 28px; height: 32px;" data-toggle="modal" data-target="#deleteModal{{ $layanankiloan->id }}"><i class=" fas fa-trash-alt fa-xs ml-n1 mb-1"></i></a>
                                @include('partials.dellayanan')
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pesanan - Cuci Satuan -->

                <div class="row mt-4">
                    <h1 class="h3 text-black-600 ml-4 mt-2">Cuci Satuan</h1>
                    <a href="{{ url('/tambah1') }}" class="btn btn-success ml-3 mt-auto mb-auto" style="height: 20px;">
                        <h5 class="mt-n1 small">Tambah</h5>
                    </a>
                </div>
                <div class="pre-scrollable-x">
                    <div class="d-flex col-9">
                        @foreach($result as $layanansatuan)
                        <div class="col-xl-4 col-md-6 col-sm-6 col-lg-6 align-items-center">
                            <div class="card-body1 bg-putih-tulang shadow">
                                <div class="ml-auto mr-auto col-10 mt-3">
                                    <span class="dot4 position-absolute mt-n3"></span>
                                    <span class="dot5 position-absolute mt-5"></span>
                                    <img class="ml-2 gambar" src="{{ URL::asset($layanansatuan->image)}}" style="width: 80px;">
                                </div>
                                <div class=" row mt-7 justify-content-between flex-nowrap">
                                    <div class="ml-auto mr-auto textpesanan text-center font-weight-bold text-orange">
                                        {{$layanansatuan->item}}
                                    </div>
                                </div>
                                <a href="#" class="btn btn-danger" style="width: 28px; height: 32px;" data-toggle="modal" data-target="#deleteModal{{ $layanansatuan->id }}"><i class=" fas fa-trash-alt fa-xs ml-n1 mb-1"></i></a>
                                @include('partials.dellayanan1')
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

@include('partials.dellayanan')
@endsection