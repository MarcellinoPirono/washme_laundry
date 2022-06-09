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
        <h1 class="h3 mb-0 text-black-800 ml-3">Riwayat Transaksi</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">

                    <thead class="bg-primary1">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>
                                <div style="width: 100px;">
                                    No. Invoice
                                </div>
                            </th>
                            <th>
                                <div style="width: 100px;">
                                    Nama
                                </div>
                            </th>
                            <th>
                                <div style="width: 200px;">
                                    Layanan
                                </div>
                            </th>
                            <th>
                                <div style="width: 100px;">
                                    Total Biaya
                                </div>
                            </th>
                            <th>
                                <div style="width: 120px;">
                                    Pembayaran
                                </div>
                            </th>
                            <th>
                                <div style="width: 120px;">
                                    Pengambilan
                                </div>
                            </th>
                            <th>
                                <div style="width: 120px;">
                                    Proses
                                </div>
                            </th>
                            <th>
                                <div style="width: 120px;">
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $riwayat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $riwayat->tgl_transaksi }}</td>
                            <td>{{ $riwayat->no_invoice }}</td>
                            <td>{{ $riwayat->nama }}</td>
                            <td>{{ $riwayat->layanan }}</td>
                            <td>Rp. {{ $riwayat->total_biaya }}</td>
                            <td>
                                @if($riwayat->status_pembayaran == 'Belum Lunas')
                                <div class="bg-danger border-table text-white">
                                    {{ $riwayat->status_pembayaran }}
                                </div>
                                @else
                                <div class="bg-success border-table text-white">
                                    {{ $riwayat->status_pembayaran }}
                                </div>
                                @endif
                            </td>
                            <td>
                                @if($riwayat->status_pengambilan == 'Belum Diambil')
                                <div class="bg-danger border-table text-white">
                                    {{ $riwayat->status_pengambilan }}
                                </div>
                                @else
                                <div class="bg-success border-table text-white">
                                    {{ $riwayat->status_pengambilan }}
                                </div>
                                @endif
                            </td>
                            <td>
                                @if($riwayat->status_proses == 'Pencucian')
                                <div class="bg-danger border-table text-white">
                                    {{ $riwayat->status_proses }}
                                </div>
                                @elseif($riwayat->status_proses == 'Pengeringan')
                                <div class="bg-warning border-table text-white">
                                    {{ $riwayat->status_proses }}
                                </div>
                                @else
                                <div class="bg-success border-table text-white">
                                    {{ $riwayat->status_proses }}
                                </div>
                                @endif
                            </td>
                            <td>
                                <a href="{{ "put_transaksi_".$riwayat->no_invoice }}""><img class=" btn-table gambar-table" src="assets/img/image/edit.png" style="width: 35px;" title="Ubah Data"></a>
                                <a href="{{ "detail_transaksi_".$riwayat->no_invoice }}"><img class="btn-table gambar-table" src="assets/img/image/detail.png" style="width: 35px;" title="Lihat Data"></a>
                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $riwayat->no_invoice }}"><img class="btn-table gambar-table" src="assets/img/image/delete.png" style="width: 35px;" title="Hapus Data"></a>
                            </td>
                        </tr>
                        @include('partials.deltransaksi')
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="/downloadpdf_transaksi" class="mt-3 btn btn-danger "><img class="mb-1" src="assets/img/image/pdf.png" width="25px"> Export PDF</a>
        </div>
    </div>
</div>
<!-- End of Main Content -->

@endsection