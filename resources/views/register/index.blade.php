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
                    <form class="col-6" action="/register" method="post">
                        @csrf
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Nama:</div>
                        <div class="form-group col-pelanggan">
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" aria-describedby="textName" placeholder="Masukkan nama" required value="{{ old('nama') }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Username:</div>
                        <div class="form-group col-pelanggan">
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" aria-describedby="textName1" placeholder="Masukkan Username" required value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Password:</div>
                        <div class="form-group col-pelanggan">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" aria-describedby="textPass1" placeholder="Masukkan Password" required value="{{ old('password') }}">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Jenis Kelamin:</div>
                        <div class="col-pelanggan d-flex mb-2">
                            @if(old('gender')=='Perempuan')
                            <div class="form-check" name="gender">
                                <input class="form-check-input" type="radio" name="gender" value="Laki-Laki" id="gender1">
                                <label class="form-check-label text-black-100 small" for="gender1">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check ml-2" name="gender">
                                <input class="form-check-input" type="radio" name="gender" value="Perempuan" id="gender2" checked>
                                <label class="form-check-label text-black-100 small" for="id=" gender2>
                                    Perempuan
                                </label>
                            </div>
                            @else
                            <div class="form-check" name="gender">
                                <input class="form-check-input" type="radio" name="gender" value="Laki-Laki" id="gender1" checked>
                                <label class="form-check-label text-black-100 small" for="gender1">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check ml-2" name="gender">
                                <input class="form-check-input" type="radio" name="gender" value="Perempuan" id="gender2">
                                <label class="form-check-label text-black-100 small" for="id=" gender2>
                                    Perempuan
                                </label>
                            </div>
                            @endif
                        </div>
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">No. HP:</div>
                        <div class="form-group col-pelanggan">
                            <input type="text" name="handphone" class="form-control @error('handphone') is-invalid @enderror" id="handphone" aria-describedby="textNoHP" placeholder="Masukkan Nomor Handphone" required value="{{ old('handphone') }}">
                            @error('handphone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Email:</div>
                        <div class="form-group col-pelanggan">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="Email1" placeholder="Masukkan Email" required value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Alamat:</div>
                        <div class="form-group col-pelanggan">                            
                            <textarea class="form-control col-pelanggan @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row col-pelanggan d-flex justify-content-between align-item-center">
                            <div class="form-group col-5">
                                <a class="btn btn-danger" href="data_kasir">Batal</a>
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