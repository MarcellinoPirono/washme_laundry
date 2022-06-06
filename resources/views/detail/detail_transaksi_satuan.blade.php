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
    <div class="d-sm-flex justify-content-between shape-dashboard ">
        <h1 class="h3 mb-0 text-black-800 ml-3">Detail Transaksi</h1>
        @if($pelanggan->status_pembayaran=='Belum Lunas')
        <div class="d-flex justify-content-center align-item-center">
            <div class="text-center mt-auto mb-auto ml-lg-5 mr-lg-n5 text-white bg-danger border-table" style="width:150px;height:25px;">
                {{ $pelanggan->status_pembayaran }}
            </div>
        </div>
        @else
        <div class="d-flex justify-content-center align-item-center">
            <div class="text-center mt-auto mb-auto ml-lg-5 mr-lg-n5 text-white bg-success border-table" style="width:150px;height:25px;">
                {{ $pelanggan->status_pembayaran }}
            </div>
        </div>
        @endif
        @if($pelanggan->status_pengambilan=='Belum Diambil')
        <div class="d-flex justify-content-center align-item-center">
            <div class="text-center mt-auto mb-auto mr-lg-n5 text-white bg-danger border-table" style="width:150px;height:25px;">
                {{ $pelanggan->status_pengambilan }}
            </div>
        </div>
        @else
        <div class="d-flex justify-content-center align-item-center">
            <div class="text-center mt-auto mb-auto mr-lg-n5 text-white bg-success border-table" style="width:150px;height:25px;">
                {{ $pelanggan->status_pengambilan }}
            </div>
        </div>
        @endif
        @if($pelanggan->status_proses=='Pencucian')
        <div class="d-flex justify-content-center align-item-center">
            <div class="text-center mt-auto mb-auto mr-5 text-white bg-danger border-table" style="width:150px;height:25px;">
                {{ $pelanggan->status_proses }}
            </div>
        </div>
        @elseif($pelanggan->status_proses=='Pengeringan')
        <div class="d-flex justify-content-center align-item-center">
            <div class="text-center mt-auto mb-auto mr-5 text-white bg-warning border-table" style="width:150px;height:25px;">
                {{ $pelanggan->status_proses }}
            </div>
        </div>
        @else
        <div class="d-flex justify-content-center align-item-center">
            <div class="text-center mt-auto mb-auto mr-5 text-white bg-success border-table" style="width:150px;height:25px;">
                {{ $pelanggan->status_proses }}
            </div>
        </div>
        @endif
    </div>

    <!-- Container Card -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card-transaksi shadow">
                <div class="row my-2">
                    <div class="text-black-100 ml-3 mt-2 mb-1 small col-3">No. Invoice</div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">: {{ $pelanggan->no_invoice }}</div>
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider1 col-7 my-2">
                <div class="row my-2">
                    <div class="text-black-100 ml-3 mt-2 mb-1 small col-3">Tanggal Transaksi</div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">: {{ $pelanggan->tgl_transaksi }}</div>
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider1 col-7 my-2">
                <div class="row my-2">
                    <div class="text-black-100 ml-3 mt-2 mb-1 small col-3">Nama</div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">: {{ $pelanggan->nama }}</div>
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider1 col-7 my-2">
                <div class="row my-2">
                    <div class="text-black-100 ml-3 mt-2 mb-1 small col-3">No Telp</div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">: {{ $pelanggan->handphone }}</div>
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider1 col-7 my-2">
                <div class="row my-2">
                    <div class="text-black-100 ml-3 mt-2 mb-1 small col-3">Gmail</div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">: {{ $pelanggan->email }}</div>
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider1 col-7 my-2">
                <div class="row my-2">
                    <div class="text-black-100 ml-3 mt-2 mb-1 small col-3">Alamat</div>
                    <div class="text-black-100 ml-1 mt-2 mb-1 small col-5">: {{ $pelanggan->alamat }}</div>
                    @foreach($transaksis as $transaksip)
                    @endforeach
                    <div class="ml-3 mt-n0 mb-3 text-orange-100 ">Sisa Biaya: Rp. {{ $transaksip->sisa_biaya }}</div>
                </div>
                <div class="col-pelanggan scroll-table">
                    <table class="table table-bordered table-light text-center">
                        <thead class="bg-primary1 text-black-800">
                            <tr>
                                <td rowspan="2" scope="col">No</td>
                                <td rowspan="2" scope="col">Layanan</td>
                                <td rowspan="2" scope="col">item</td>
                                <td rowspan="2" scope="col">Jumlah</td>
                                <td rowspan="2" scope="col">Harga</td>
                                <td rowspan="2" scope="col">Via</td>
                                <td colspan="2" scope="col">Waktu</td>
                            </tr>
                            <tr>
                                <td rowspan="2" scope="col">Mulai</td>
                                <td rowspan="2" scope="col">Selesai</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksis as $transaksix)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaksix->layanan }}</td>
                                <td>{{ $transaksix->item }}</td>
                                <td>{{ $transaksix->jumlah }}</td>
                                <td>Rp. {{ $transaksix->harga }}</td>
                                <td>{{ $transaksix->via }}</td>
                                <td>{{ $transaksix->mulai }}</td>
                                <td>{{ $transaksix->selesai }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="10" scope="col"><span class="font-weight-bold">Total Biaya: Rp. {{ $transaksix->total_biaya }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group col-5">
                    <a href="put_transaksi_{{ $transaksix->no_invoice  }}" type="submit" class="btn btn-warning" ><img class="mr-1" src="assets/img/image/edit2.png" style="width: 25px;">Edit Data</a>
                    <a href="/nota_satuan_{{ $pelanggan->no_invoice }}" type="submit" class="btn btn-orange "><i class="fas fa-clipboard-list fa-lg mr-2"></i>Lihat Nota</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->
@endsection