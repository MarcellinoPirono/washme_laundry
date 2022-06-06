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
<div class="d-sm-flex justify-content-between shape-dashboard">
    <h1 class="h3 mb-0 text-black-800 ml-3">Nota Transaksi</h1>
</div>

<!-- Container Card -->
<div class="row d-sm-flex justify-content-center mt-4">
    <div class="col-xl-5 col-lg-5">
        <div class="card-nota bg-gray">
            <div class="d-sm-flex justify-content-center">
                <img src="assets/img/image/Asset 7.png" style="width: 200px;">
            </div>
        </div>
    </div>
</div>
<div class="row d-sm-flex justify-content-center">
    <div class="col-xl-5 col-lg-5">
        <div class="card-nota1">
            <div class="my-1">
                <p class="text-black-100 mt-1 mb-1 small split-para">Mulai<span
                        class="text-right">Selesai</span></p>
            </div>
            <div class="my-1">
                <p class="text-black-100 mt-1 mb-1 small split-para">{{ $transaksi1->mulai }}<span
                        class="text-right">{{ $transaksi1->selesai }}</span></p>
            </div>
            <div class="my-1">
                <p class="text-black-100 mt-1 mb-1 small split-para">No. Invoice<span
                        class="text-right">{{ $transaksi1->no_invoice }}</span></p>
            </div>
            <div class="my-1">
                <p class="text-black-100 mt-1 mb-1 small split-para">Nama<span
                        class="text-right">{{ $pelanggan->nama }}</span></p>
            </div>
            <div class="my-1">
                <p class="text-black-100 mt-1 mb-1 small split-para">Collected By<span
                        class="text-right">{{ $transaksi1->collected_by }}</span></p>
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider col-10 my-2">
            <div class="my-1">
                <p class="text-black-400 mt-n1 mb-1 text-center">Satuan</p>
            </div>
            <div class="my-1 col-pelanggan">
                <div id="textbox">
                    @foreach($transaksi2 as $transaksis)
                    @if($transaksis->size=='Tidak Ada')
                    <p class="text-black-400 mt-n1 mb-1 alignleft">{{ $transaksis->item }}</p>
                    <p class="text-black-400 mt-n1 mb-1 aligncenter">({{ $transaksis->jumlah }})</p>
                    <p class="text-black-400 mt-n1 mb-1 alignright">Rp. {{ $transaksis->harga }}</p>
                    @else
                    <p class="text-black-400 mt-n1 mb-1 alignleft">{{ $transaksis->item }} {{ $transaksis->size }}</p>
                    <p class="text-black-400 mt-n1 mb-1 aligncenter">({{ $transaksis->jumlah }})</p>
                    <p class="text-black-400 mt-n1 mb-1 alignright">Rp. {{ $transaksis->harga }}</p>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="my-1">
                <p class="text-gray-600 mt-1 mb-1 ml-5 split-para">{{ $transaksi1->layanan }} Service</p>
                <p class="text-gray-600 mt-1 mb-4 ml-5 split-para">{{ $hari }} Hari</p>
                <p class="text-gray-600 mt-1 mb-1 ml-5 split-para">*{{ $transaksi1->keterangan }}</p>
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider col-10 my-2">
            <div class="my-1">
                <p class="text-black-1000 mt-1 mb-1 split-para">Total<span class="text-right">Rp.
                {{ $transaksi1->total_biaya }}</span></p>
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider col-10 my-2">
            <div class="my-1">
                <p class="text-black-100 mt-1 mb-1 split-para">Pembayaran Saat Ini<span
                        class="text-right">Rp. {{ $transaksi1->biaya_sekarang }}</span></p>
            </div>
            <div class="my-1">
                <p class="text-black-100 mt-1 mb-1 split-para">Sisa Pembayaran<span
                        class="text-right text-black-400">Rp. {{ $transaksi1->sisa_biaya }}</span></p>
            </div>
            <div class="my-1">
                <p class="text-black-100 mt-1 mb-1 split-para">Pembayaran Via<span
                        class="text-right">{{ $transaksi1->via }}</span></p>
            </div>
            <div class="my-1">
                @if($transaksi1->sisa_biaya == 0)
                <p class="text-success-100 text-right mt-1 mb-1 split-para">{{ $pelanggan->status_pembayaran }}</p>
                @else
                <p class="text-danger-100 text-right mt-1 mb-1 split-para">{{ $pelanggan->status_pembayaran }}</p>
                @endif
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider col-10 my-2">
            <img class="col-pelanggan" src="assets/img/image/Map-Washme.png">
            <div class="my-1">
                <p class="text-black-100 text-center mt-2 mb-1 split-para">Visit Us At</p>
            </div>
            <div class="my-1">
                <p class="text-gray-600 text-center mt-1 mb-1 split-para">Jl. Serigala No. 32 A, Makassar, SulSel, 90135</p>                                    
            </div>
            <div class="my-1">
                <p class="text-primary1 text-center mt-1 mb-1 split-para">0813-5466-6538</p>                                    
            </div>
            <div class="my-1">
                <p class="text-gray-600 text-center mt-1 mb-1 split-para">*Perlihatkan struk saat pengambilan</p>                                    
            </div>
            <div class="row d-flex justify-content-center my-1">
                <a href="#"><i class="fab fa-facebook fa-2x" style="color: blue;"></i></a>
                <a href="#"><img class="ml-4" src="assets/img/image/Instagram.png" width="30px"></a>
                <a href="#"><i class="fab fa-twitter fa-2x ml-4" style="color: #00acee;"></i></a>                           
            </div>                                
        </div>
        <div class="row col-pelanggan mt-3 d-flex justify-content-between align-items-center">
            <div class="form-group col-6">
                <a href="{{ "exportpdf1_".$transaksi1->no_invoice }}" class="btn btn-danger "><img class="mr-2" src="assets/img/image/pdf.png" width="25px"> Download</a>
            </div>
            <div class="form-group col-6 text-right mr-n4">
                <a href="{{ "sendemail_satuan_".$transaksi1->no_invoice }}" class="btn btn-success"><img class="mr-3" src="assets/img/image/gmail.png" width="30px"><span class="mr-4 text-right">Kirim</span></a>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->
@endsection