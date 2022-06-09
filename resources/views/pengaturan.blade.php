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
    <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-black-800 ml-3">Edit Profil</h1>
    </div>

    <!-- Content Row -->
    <form method='post' action="/pengaturan_username" enctype="multipart/form-data">
        <div class="row">
            @csrf
            <div class="col-sm-3 col-lg-3 col-xl-3 col-md-4">
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input id="image" name="image" class="@error('image') is-invalid @enderror" type="file" onchange="previewImage()" />
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-sm-3 col-lg-3 col-xl-4 col-md-4">
                <div class="col-sm-12 col-lg-8 col-xl-8 col-md-6">
                    <div class="text-black-800 ml-3 mt-2 mb-1 lead setting">Username:</div>
                    <div class="form-group col-pelanggan position-relative">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" aria-describedby="textName1" placeholder="Masukkan Username" required value="{{ old('username') }}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-black-800 ml-3 mt-2 mb-1 lead setting">Password:</div>
                    <div class="form-group col-pelanggan">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" aria-describedby="textPass1" placeholder="Masukkan Password" required value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-secondary">Simpan Perubahan</button>
        </div>
        <div class="form-group text-center mb-5 pb-3">
            <a href="#" data-toggle="modal" data-target="#logoutModal" class="btn btn-danger" style="width: 180px;">Logout</a>
        </div>
    </form>
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