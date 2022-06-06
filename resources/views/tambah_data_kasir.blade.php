@extends('layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between shape-dashboard">
    <h1 class="h3 mb-0 text-black-800 ml-3">Tambah Kasir</h1>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Container Card -->
    <div class="col-xl-12 col-lg-12 mb-4">
        <div class="card-pesanan1 shadow">
            <div class="row ml-3">
                <form class="col-6" action="/tambah_data_kasir" method="post">
                    @csrf                                        
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Nama:</div>
                    <div class="form-group col-pelanggan">
                        <input type="text" class="form-control" id="exampleInputName"
                            aria-describedby="textName" placeholder="Masukkan nama" required>
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Username:</div>
                    <div class="form-group col-pelanggan">
                        <input type="text" class="form-control" id="exampleInputName1"
                            aria-describedby="textName1" placeholder="Masukkan Username" required>
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Password:</div>
                    <div class="form-group col-pelanggan">
                        <input type="password" class="form-control" id="exampleInputPass1"
                            aria-describedby="textPass1" placeholder="Masukkan Password" required>
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Jenis Kelamin:</div>
                    <div class="col-pelanggan d-flex mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                id="flexRadioDefault1" checked>
                            <label class="form-check-label text-black-100 small"
                                for="flexRadioDefault1">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                id="flexRadioDefault2">
                            <label class="form-check-label text-black-100 small"
                                for="flexRadioDefault2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">No. HP:</div>
                    <div class="form-group col-pelanggan">
                        <input type="text" class="form-control" id="exampleInputNoHP"
                            aria-describedby="textNoHP" placeholder="Masukkan Nomor Handphone" required>
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Email:</div>
                    <div class="form-group col-pelanggan">
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="Email1" placeholder="Masukkan Email" required>
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Alamat:</div>
                    <div class="form-group col-pelanggan">
                        <textarea class="form-control col-pelanggan" id="exampleFormControlTextarea2"
                            rows="3" required></textarea>
                    </div>                                        
                    <div class="row col-pelanggan d-flex justify-content-between align-item-center">
                        <div class="form-group col-5">
                            <a href="data_kasir.html"><input  value="Batal" class="btn btn-danger col-6"></a>
                        </div>
                        <div class="form-group col-5 text-right mr-n4">
                            <button class="btn btn-success">Input</button>
                        </div>
                    </div>                                        
                </form>                                    
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@endsection