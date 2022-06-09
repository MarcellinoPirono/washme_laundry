<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body>
    <!-- Container Card -->
    <div class="row d-sm-flex justify-content-center mt-4">
        <div class="col-xl-5 col-lg-5">
            <div class="card-nota bg-transparent">
                <div class="d-sm-flex justify-content-center text-align-center">
                    <img src="assets/img/image/Asset 7.jpg" style="width: 200px;">
                </div>
            </div>
        </div>
    </div>
    <div class="row d-sm-flex justify-content-center">
        <div class="col-xl-5 col-lg-5">
            <div class="card-nota1">

                <div class="my-1">
                    <p class="text-black-100 mt-1 mb-1 small split-para">Mulai<span class="text-right">Selesai</span></p>
                </div>

                <div class="my-1">
                    <p class="text-black-100 mt-1 mb-1 small split-para">{{ $mulai }}<span class="text-right">{{ $selesai }}</span></p>
                </div>
                <div class="my-1">
                    <p class="text-black-100 mt-1 mb-1 small split-para">No. Invoice<span class="text-right">{{ $no_invoice }}</span></p>
                </div>
                <div class="my-1">
                    <p class="text-black-100 mt-1 mb-1 small split-para">Nama<span class="text-right">{{ $nama }}</span></p>
                </div>
                <div class="my-1">
                    <p class="text-black-100 mt-1 mb-1 small split-para">Collected By<span class="text-right">{{ $collected_by }}</span></p>
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider col-10 my-2">
                <div class="my-1">
                    <p class="text-black-400 mt-n1 mb-1 text-center">Kiloan</p>
                </div>
                <div class="my-1 col-pelanggan">
                    <div class="d-flex" id="textbox">
                        <p class="text-black-400 alignleft">{{ $layanan }}</p>
                        <p class="text-black-400 mt-n5 ml-n4 text-center">({{ $berat }} KG)</p>
                        <p class="text-black-400 mt-n5 mr-3 text-right">Rp. {{ $total_biaya }}</p>
                    </div>
                </div>
                <div class="my-1">
                    <p class="text-gray-600 mt-1 mb-1 ml-5 split-para">{{ $layanan }} Service</p>
                    <p class="text-gray-600 mt-1 mb-4 ml-5 split-para">{{ $estimasi_waktu }} Hari</p>
                    <p class="text-gray-600 mt-1 mb-1 ml-5 split-para">*{{ $keterangan }}</p>
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider col-10 my-2">
                <div class="my-1">
                    <p class="text-black-1000 mt-1 mb-1 split-para">Total<span class="text-right">Rp.
                            {{ $total_biaya }}</span></p>
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider col-10 my-2">
                <div class="my-1">
                    <p class="text-black-100 mt-1 mb-1 split-para">Pembayaran Saat Ini<span class="text-right">Rp. {{ $biaya_sekarang }}</span></p>
                </div>
                <div class="my-1">
                    <p class="text-black-100 mt-1 mb-1 split-para">Sisa Pembayaran<span class="text-right text-black-400">Rp. {{ $sisa_biaya }}</span></p>
                </div>
                <div class="my-1">
                    <p class="text-black-100 mt-1 mb-1 split-para">Pembayaran Via<span class="text-right">{{ $via }}</span></p>
                </div>
                <div class="my-1">
                    @if($sisa_biaya == 0)
                    <p class="text-success-100 text-right mt-1 mb-1 split-para">{{ $status_pembayaran }}</p>
                    @else
                    <p class="text-danger-100 text-right mt-1 mb-1 split-para">{{ $status_pembayaran }}</p>
                    @endif
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider col-10 my-2">
                <div class="text-align-center">
                    <img class="col-pelanggan text-align-center" style="width: 500px;" src="assets/img/image/Map-Washme.jpg">
                </div>
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
                    <a href="#"><i class="fab fa-twitter fa-2x ml-4" style="color: #00acee;"></i></a>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->
</body>