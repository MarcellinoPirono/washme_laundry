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
                    <form class="col-6" method='post' action="/tambah1" enctype="multipart/form-data">
                        @csrf
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Tipe Layanan:</div>
                        <div class="form-group col-pelanggan">
                            <input type="text" class="form-control" id="tipelayanan" name="layanan" aria-describedby="nameHelp" placeholder="Satuan" value="Satuan" readonly>
                        </div>
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Nama Jenis Layanan:</div>
                        <div class="form-group col-pelanggan">
                            <input type="text" class="form-control @error('item') is-invalid @enderror" id="item" name="item" aria-describedby="textHelp" placeholder="Masukkan Jenis Layanan" value="{{ old('layanan') }}">
                            @error('item')
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
                        <div class="form-group col-pelanggan">
                            <input type="number" name="estimasi_waktu" class="form-control @error('estimasi_waktu') is-invalid @enderror" id="estimasi_waktu" aria-describedby="estimasiHelp" placeholder="Estimasi Waktu" value="{{ old('estimasi_waktu') }}">
                            @error('estimasi_waktu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Keterangan:</div>
                        <div class="form-group col-pelanggan">
                            <textarea name="keterangan" class="form-control col-pelanggan @error('keterangan') is-invalid @enderror" id="keterangan" rows="3">{{ old('keterangan1') }}</textarea>
                            @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-black-100 ml-3 mt-3 mb-1 small">Size:</div>
                        <div class="dropdown col-pelanggan">
                            <div class="input-group mb-3">
                                <select class="custom-select" name="size_id" id="size_id">
                                    <option id="size1" value="1">Tidak Ada</option>
                                    <option id="size2" value="2">Ada</option>
                                </select>
                            </div>
                        </div>
                        <div id="harga_all" name="harga_all">
                            <div class="text-black-100 ml-3 mt-2 mb-1 small">Harga:</div>
                            <div class="form-group col-pelanggan">
                                <input type="number" name="harga[]" class="form-control @error('harga') is-invalid @enderror" id="harga" aria-describedby="expressHelp" placeholder="Harga" value="{{ old('harga') }}">
                                @error('harga')
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#size_id').change(function() {
            let size_id = $(this).val();
            if(size_id==1){
                $('#harga_all').html('<div class="text-black-100 ml-3 mt-2 mb-1 small">Harga:</div><div class="form-group col-pelanggan"><input type="number" name="harga[]" class="form-control @error("harga") is-invalid @enderror" id="harga" aria-describedby="expressHelp" placeholder="Harga" value="{{ old("harga") }}"></div>@error("harga")<div class="invalid-feedback">{{ $message }}</div>@enderror')
            }
            else{
                $('#harga_all').html('<div class="text-black-100 ml-3 mt-2 mb-1 small">Harga Size Besar:</div><div class="form-group col-pelanggan"><input type="number" name="harga[]" class="form-control @error("harga") is-invalid @enderror" id="harga" aria-describedby="expressHelp" placeholder="Harga" value="{{ old("harga") }}"></div>@error("harga")<div class="invalid-feedback">{{ $message }}</div>@enderror</div><div class="text-black-100 ml-3 mt-2 mb-1 small">Harga Size Kecil:</div><div class="form-group col-pelanggan"><input type="number" name="harga[]" class="form-control @error("harga") is-invalid @enderror" id="harga" aria-describedby="expressHelp" placeholder="Harga" value="{{ old("harga") }}"></div></div>@error("harga")<div class="invalid-feedback">{{ $message }}</div>@enderror')
            }
        });
    })
</script>
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