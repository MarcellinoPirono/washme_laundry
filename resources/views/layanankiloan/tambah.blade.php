@extends('layouts.main')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between shape-dashboard">
        <h1 class="h3 mb-0 text-black-800 ml-3">Tambah Layanan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Container Card -->
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card-pesanan1 shadow">
                <div class="row ml-3">
                    <form class="col-6" method='post' action="/tambah" enctype="multipart/form-data">
                        @csrf
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Tipe Layanan:</div>
                        <div class="form-group col-pelanggan">
                            <input type="text" class="form-control" id="layanan" name="layanan" aria-describedby="nameHelp" placeholder="Kiloan" value="Kiloan" readonly>
                        </div>
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Nama Jenis Layanan:</div>
                        <div class="form-group col-pelanggan">
                            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" aria-describedby="textHelp" placeholder="Masukkan Jenis Layanan" value="{{ old('jenis') }}">
                            @error('jenis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Gambar:</div>
                        <div class="mb-3 form-group col-pelanggan">
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input id="image" name="image" class="@error('image') is-invalid @enderror" type="file" onchange="previewImage()" />
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Estimasi Waktu:</div>
                        <div class="ml-3">
                            <div class="text-black-100 ml-3 mt-2 mb-1 small">Express :</div>
                            <div class="form-group col-pelanggan">
                                <input type="number" name="estimasi_waktu[]" class="form-control @error('estimasi_waktu') is-invalid @enderror" id="estimasi_waktu" aria-describedby="estimasiHelp" placeholder="Estimasi Waktu" value="{{ old('estimasi_waktu') }}">
                                @error('estimasi_waktu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="text-black-100 ml-3 mt-2 mb-1 small">Normal :</div>
                            <div class="form-group col-pelanggan">
                                <input type="number" name="estimasi_waktu[]" class="form-control @error('estimasi_waktu') is-invalid @enderror" id="estimasi_waktu" aria-describedby="estimasiHelp" placeholder="Estimasi Waktu" value="{{ old('estimasi_waktu') }}">
                                @error('estimasi_waktu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Keterangan:</div>
                        <div class="form-group col-pelanggan">
                            <textarea name="keterangan" class="form-control col-pelanggan @error('keterangan') is-invalid @enderror" id="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Harga:</div>
                        <div class="ml-3">
                            <div class="text-black-100 ml-3 mt-2 mb-1 small">Express:</div>
                            <div class="form-group col-pelanggan">
                                <input type="number" name="harga[]" class="form-control @error('express1') is-invalid @enderror" id="express1" aria-describedby="expressHelp" placeholder="Harga" value="{{ old('express1') }}">
                                @error('express1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="text-black-100 ml-3 mt-2 mb-1 small">Normal:</div>
                            <div class="form-group col-pelanggan">
                                <input type="number" name="harga[]" class="form-control @error('normal1') is-invalid @enderror" id="normal1" aria-describedby="normalHelp" placeholder="Harga" value="{{ old('normal1') }}">
                                @error('normal1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row col-pelanggan d-flex justify-content-between align-item-center">
                            <div class="form-group col-5">
                                <a href="{{ url('/layanan') }}" class="btn btn-danger">Batal</a>
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
</div>
<!-- End of Main Content -->
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection