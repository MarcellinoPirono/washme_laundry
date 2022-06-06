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
        <h1 class="h3 mb-0 text-black-800 ml-3">Data Kasir</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ url('/register') }}" class="btn btn-success mb-2"><i class="fas fa-plus mr-2"></i>Tambah Data</a>
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary1">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>
                                <div style="width: 100px;">
                                    Username
                                </div>
                            </th>
                            <th>
                                <div style="width: 100px;">
                                    Gender
                                </div>
                            </th>
                            <th>
                                <div style="width: 70px;">
                                    No. HP
                                </div>
                            </th>
                            <th>
                                <div style="width: 70px;">
                                    Email
                                </div>
                            </th>
                            <th>
                                <div style="width: 150px;">
                                    Alamat
                                </div>
                            </th>
                            <th>
                                <div style="width: 70px;">
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $users)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $users->nama }}</td>
                            <td>{{ $users->username }}</td>
                            <td>{{ $users->gender }}</td>
                            <td>{{ $users->handphone }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->alamat }}</td>
                            <td>
                                <a href="{{ "put/".$users['id'] }}" data-toggle="modal" data-target="#editDataKiloan{{ $users->id }}"><img class="btn-table gambar-table" src="assets/img/image/edit.png" style="width: 35px;"></a>
                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $users->id }}"><img class="btn-table gambar-table" src="assets/img/image/delete.png" style="width: 35px;"></a>
                                @include('partials.delete')
                                <!-- Edit Data PopUp -->
                                <form action="{{ "update/".$users['id'] }}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="modal fade text-left" id="editDataKiloan{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="editDataKiloan" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary1">
                                                    <h5 class="modal-title h3 mb-0 text-black-800 ml-3" id="editDataKiloan">Edit Data Kasir</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <!-- Content Row -->
                                                        <div class="row">
                                                            <!-- Card Transaksi -->
                                                            <div class="col-xl-9 col-md-6 col-sm-6 col-lg-6 m-auto">
                                                                <form class="col-6" action="/register" method="post">
                                                                    @csrf
                                                                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Nama:</div>
                                                                    <div class="form-group col-pelanggan">
                                                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" aria-describedby="textName" placeholder="Masukkan nama" required value="{{ old('nama', $users->nama) }}">
                                                                        @error('nama')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Username:</div>
                                                                    <div class="form-group col-pelanggan">
                                                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" aria-describedby="textName1" placeholder="Masukkan Username" required value="{{ old('username', $users->username) }}">
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
                                                                        @if($users->gender=='Laki-Laki')
                                                                        <div class="form-check" name="gender">
                                                                            <input class="form-check-input" type="radio" name="gender" value="Laki-Laki" id="gender1" checked>
                                                                            <label class="form-check-label text-black-100 small" for="gender1">
                                                                                Laki-Laki
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check ml-2" name="gender">
                                                                            <input class="form-check-input" type="radio" name="gender" value="Perempuan" id="gender2">
                                                                            <label class="form-check-label text-black-100 small" for="gender2">
                                                                                Perempuan
                                                                            </label>
                                                                        </div>
                                                                        @else
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
                                                                        @endif
                                                                    </div>
                                                                    <div class="text-black-100 ml-3 mt-2 mb-1 small">No. HP:</div>
                                                                    <div class="form-group col-pelanggan">
                                                                        <input type="text" name="handphone" class="form-control @error('handphone') is-invalid @enderror" id="handphone" aria-describedby="textNoHP" placeholder="Masukkan Nomor Handphone" required value="{{ old('handphone', $users->handphone) }}">
                                                                        @error('handphone')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Email:</div>
                                                                    <div class="form-group col-pelanggan">
                                                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="Email1" placeholder="Masukkan Email" required value="{{ old('email', $users->email) }}">
                                                                        @error('email')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Alamat:</div>
                                                                    <div class="form-group col-pelanggan">
                                                                        <textarea class="form-control col-pelanggan @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3" required>{{ old('alamat', $users->alamat) }}</textarea>
                                                                        <trix-editor input="alamat"></trix-editor>
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
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

@endsection