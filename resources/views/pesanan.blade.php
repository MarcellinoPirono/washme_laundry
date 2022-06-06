@extends('layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between shape-dashboard">
        <h1 class="h3 mb-0 text-black-800 ml-3">Pesanan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Container Card -->
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card-pesanan shadow">
                <div class="row m-auto">
                    <!-- Card Body -->
                    <div class="m-auto col-xl-4 col-md-4 col-sm-6 col-lg-4 mb-4 align-items-center justify-content-between">
                        <a class="card shadow h-100 py-2 btn btn-primary" href="{{ url('/transaksi_kiloan') }}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="d-sm-flex m-auto align-items-center justify-content-center">
                                        <img class="m-auto" src="assets/img/image/Cuci Kiloan.png" style="width: 150px;">
                                    </div>
                                    <div class="ml-auto mr-auto textpesanan text-center font-weight-bold text-orange mt-5">
                                        Cuci Kiloan
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="m-auto col-xl-4 col-md-4 col-sm-6 d-sm-flex align-items-center justify-content-between">
                        <a class="card shadow h-100 py-2 btn btn-primary" href="{{ url('/transaksi_satuan') }}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="d-sm-flex m-auto align-items-center justify-content-center">
                                        <img class="m-auto" src="assets/img/image/Cuci Satuan.png" style="width: 160px; height: 110px;">
                                    </div>
                                    <div class="ml-auto mr-auto textpesanan text-center font-weight-bold text-orange mt-5">
                                        Cuci Satuan
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@endsection