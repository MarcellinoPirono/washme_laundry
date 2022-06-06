@extends('layouts.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-black-800 ml-3">Edit Profil</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-sm-3 col-lg-3 col-xl-3 col-md-4">
                <a class="btn"><i class="fas fa-user-circle fa-10x ml-n2" style="color: black; width: 200px;"></i></a>
                <h1 class="h3 mb-0 text-black-800 ml-4 lead">Ganti Foto Profil</h1>
            </div>
            <div class="col-sm-3 col-lg-3 col-xl-8 col-md-4">
                <form class="col-sm-12 col-lg-8 col-xl-6 col-md-6" action="#">
                    <div class="text-black-800 ml-3 mt-2 mb-1 lead setting">Username:</div>
                    <div class="form-group col-pelanggan position-relative">
                        <input type="text" class="form-control bg-transparent border-0 border-bottom-dark" id="exampleInputUser1" aria-describedby="textuser1" placeholder="Ubah Username" required>
                    </div>
                    <div class="text-black-800 ml-3 mt-2 mb-1 lead setting">Password:</div>
                    <div class="form-group col-pelanggan">
                        <input type="password" class="form-control bg-transparent border-0 border-bottom-dark" id="exampleInputPass3" aria-describedby="textPass3" placeholder="Ubah Password" required>
                    </div>
                </form>
            </div>
        </div>
        <div class="form-group text-center">
            <a href="#" class="btn btn-secondary">Simpan Perubahan</a>
        </div>
        <div class="form-group text-center mb-5 pb-3">
            <a href="#" data-toggle="modal" data-target="#logoutModal" class="btn btn-danger" style="width: 180px;">Logout</a>
        </div>
    </div>
    <!-- End of Main Content -->
@endsection