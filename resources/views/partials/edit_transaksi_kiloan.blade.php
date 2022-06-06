@extends('layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="{{ "edit_transaksi_".$pelanggan->no_invoice }}" method="post">    
        @csrf
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between shape-dashboard">
            <h1 class="h3 mb-0 text-black-800 ml-3">Edit Transaksi</h1>
            <h1 class="h3 mb-0 text-black-800 text-right ml-lg-4 mr-lg-n5 col-lg-5">No. Invoice:</h1>
            <input id="no_invoice" name="no_invoice" class="h3 mb-0 col-lg-4 text-right text-black-800 mr-3 border-0 bg-transparent" value="{{ old('no_invoice', $pelanggan->no_invoice) }}" readonly>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Card Transaksi -->
            <div class="col-xl-5 col-md-6 col-sm-6 col-lg-6">
                <!-- Card Header -->
                <div class=" text-black-600 card-header">
                    Data Pelanggan
                </div>
                <!-- Card Body -->
                <div class="card-pesanan1 shadow">
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Nama:</div>
                    <div class="form-group col-pelanggan">
                        <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" aria-describedby="nameHelp" placeholder="Masukkan nama" required value="{{ old('nama', $pelanggan->nama) }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">No. Telp:</div>
                    <div class="form-group col-pelanggan">
                        <input name="handphone" type="text" class="form-control @error('handphone') is-invalid @enderror" id="handphone" name="handphone" aria-describedby="telpHelp" placeholder="Masukkan no.telp" required value="{{ old('handphone', $pelanggan->handphone) }}">
                        @error('handphone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Email:</div>
                    <div class="form-group col-pelanggan">
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukkan email" value="{{ old('email', $pelanggan->email) }}">
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Alamat:</div>
                    <div class="form-group col-pelanggan">
                        <textarea class="form-control col-pelanggan @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Card Transaksi -->
            <div class="col-xl-7 col-md-6 col-sm-6 col-lg-6 mb-4">
                <!-- Card Header -->
                <div class=" text-black-600 card-header">
                    Data Pesanan
                </div>
                <!-- Card Body -->
                <div class="card-pesanan1 shadow">
                    <div class="dropdown col-pelanggan mt-3 row">
                        <div class="input-group mb-3 col-5">
                            <select class="custom-select dynamic @error('layanan') is-invalid @enderror" name="layanan" id="layanan" required>
                                <option value="0" disabled>Select Layanan</option>
                                <option value="{{ $jenis_new_id->id }}" selected>{{ old('layanan', $transaksi->layanan) }}</option>
                                @error('layanan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </select>
                        </div>
                        <div class="input-group mb-3 col-5">
                            <select class="custom-select dynamic @error('jenis') is-invalid @enderror" id="jenis" name="jenis" data-dependent="layanan" required>
                                <option value="0" disabled>Select Jenis</option>
                                @if($transaksi->jenis == 'Express')
                                <option value="1" selected>{{ old('jenis', $transaksi->jenis) }}</option>
                                <option value="2">Normal</option>
                                @else
                                <option value="1">Express</option>
                                <option value="2" selected>{{ old('jenis', $transaksi->jenis) }}</option>
                                @endif
                                @error('jenis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="col-pelanggan scroll-table">
                        <table class="table table-bordered table-light text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Layanan</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Estimasi Waktu</th>
                                    <th scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="table" name="table">
                                    <td>{{ old('layanan', $transaksi->layanan) }}</td>
                                    <td>{{ old('jenis', $transaksi->jenis) }}</td>
                                    <td>{{ old('estimasi_waktu', $nota_kiloan->estimasi_waktu) }}</td>
                                    <td>{{ old('harga', $transaksi->harga) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Estimasi Waktu</div>
                    <div class="form-group col-pelanggan">
                        <input type="number" class="form-control" onkeyup="jumlah();" id="waktu_id" name="waktu_id" aria-describedby="numberHelp" readonly value="{{ old('waktu_id', $nota_kiloan->estimasi_waktu) }}">
                        @error('waktu_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Harga</div>
                    <div class="form-group col-pelanggan">
                        <input type="number" class="form-control harga @error('harga') is-invalid @enderror" id="harga" name="harga" aria-describedby="numberHelp" readonly value="{{ old('harga', $transaksi->harga) }}">
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Berat (KG):</div>
                    <div class="form-group col-pelanggan">
                        <input type="number" class="form-control @error('berat') is-invalid @enderror" id="berat" name="berat" aria-describedby="numberHelp" placeholder="Masukkan Berat" required value="{{ old('berat', $transaksi->berat) }}">
                        @error('berat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Tanggal Masuk:</div>
                    <div class="form-group col-pelanggan">
                        <input type="date" class="form-control @error('mulai') is-invalid @enderror" onkeyup="jumlah();" id="mulai" name="mulai" aria-describedby="date1Help" placeholder="dd/mm/yy" required value="{{ old('mulai', $transaksi->mulai) }}">
                        @error('mulai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Tanggal Keluar:</div>
                    <div class="form-group col-pelanggan">
                        <input type="date" class="form-control" id="selesai" name="selesai" aria-describedby="date2Help" placeholder="dd/mm/yy" readonly value="{{ old('selesai', $transaksi->selesai) }}">
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Keterangan:</div>
                    <div class="form-group col-pelanggan">
                        <textarea class="form-control col-pelanggan @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3" required>{{ old('keterangan', $transaksi->keterangan) }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row col-pelanggan">
                        <div class="text-black-100 ml-3 mt-2 mb-1 small">Via Pembayaran:</div>
                        <div class="input-group mb-3 col-4">
                            <select class="custom-select @error('via') is-invalid @enderror" id="via" name="via" required>
                                @if($transaksi->via == 'Tunai')
                                <option selected value="Tunai">Tunai</option>
                                <option value="Debit">Debit</option>
                                <option value="Ovo">Ovo</option>
                                <option value="Gopay">Gopay</option>
                                <option value="Lainnya">Lainnya</option>
                                @elseif($transaksi->via == 'Debit')
                                <option value="Tunai">Tunai</option>
                                <option selected value="Debit">Debit</option>
                                <option value="Ovo">Ovo</option>
                                <option value="Gopay">Gopay</option>
                                <option value="Lainnya">Lainnya</option>
                                @elseif($transaksi->via == 'Ovo')
                                <option value="Tunai">Tunai</option>
                                <option value="Debit">Debit</option>
                                <option selected value="Ovo">Ovo</option>
                                <option value="Gopay">Gopay</option>
                                <option value="Lainnya">Lainnya</option>
                                @elseif($transaksi->via == 'Gopay')
                                <option value="Tunai">Tunai</option>
                                <option value="Debit">Debit</option>
                                <option value="Ovo">Ovo</option>
                                <option selected value="Gopay">Gopay</option>
                                <option value="Lainnya">Lainnya</option>
                                @else
                                <option value="Tunai">Tunai</option>
                                <option value="Debit">Debit</option>
                                <option value="Ovo">Ovo</option>
                                <option value="Gopay">Gopay</option>
                                <option selected value="Lainnya">Lainnya</option>
                                @endif
                                @error('via')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h2 text-black-800 ml-3 col-lg-3 text-center">Rp. </h1>
                        <input type="number" class="mr-5 ml-lg-n5 col-lg-9 h2 text-black-800 border-0 bg-transparent" id="total_biaya" name="total_biaya" value="{{ old('total_biaya', $transaksi->total_biaya) }}" readonly>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="text-black-100 ml-3 mb-2 small">Pembayaran Saat Ini:</div>
                            <div class="col-10 input-group mb-3">
                                <input type="number" class="form-control @error('biaya_sekarang') is-invalid @enderror" name="biaya_sekarang" id="biaya_sekarang" value="{{ old('biaya_sekarang', $transaksi->biaya_sekarang) }}" placeholder="Input Payment" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                @error('biaya_sekarang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-5 ml-n5">
                            <div class="text-black-100 ml-3 mb-2 small">Sisa Pembayaran:</div>
                            <div class="col-12 input-group mb-3">
                                <input type="text" class="form-control" name="sisa_biaya" id="sisa_biaya" value="{{ old('sisa_biaya', $transaksi->sisa_biaya) }}" placeholder="remaining payment" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Status Pengambilan:</div>
                    <div class="col-pelanggan d-flex mb-2">
                        @if($pelanggan->status_pengambilan == 'Belum Diambil')
                        <div class="form-check">
                            <input value="Belum Diambil" class="form-check-input" type="radio" name="status_pengambilan" id="status_pengambilan" checked>
                            <label class="form-check-label text-black-100 small" for="status_pengambilan">
                                Belum Diambil
                            </label>
                        </div>
                        <div class="form-check ml-2">
                            <input value="Sudah Diambil" class="form-check-input" type="radio" name="status_pengambilan" id="status_pengambilan">
                            <label class="form-check-label text-black-100 small" for="status_pengambilan">
                                Sudah Diambil
                            </label>
                        </div>
                        @else
                        <div class="form-check">
                            <input value="Belum Diambil" class="form-check-input" type="radio" name="status_pengambilan" id="status_pengambilan">
                            <label class="form-check-label text-black-100 small" for="status_pengambilan">
                                Belum Diambil
                            </label>
                        </div>
                        <div class="form-check ml-2">
                            <input value="Sudah Diambil" class="form-check-input" type="radio" name="status_pengambilan" id="status_pengambilan" checked>
                            <label class="form-check-label text-black-100 small" for="status_pengambilan">
                                Sudah Diambil
                            </label>
                        </div>
                        @endif
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Proses:</div>
                    <div class="col-pelanggan d-flex mb-2">
                        @if($pelanggan->status_proses == 'Pencucian')
                        <div class="form-check">
                            <input value="Pencucian" class="form-check-input" type="radio" name="status_proses" id="status_proses" checked>
                            <label class="form-check-label text-black-100 small" for="status_proses">
                                Pencucian
                            </label>
                        </div>
                        <div class="form-check ml-2">
                            <input value="Pengeringan" class="form-check-input" type="radio" name="status_proses" id="status_proses">
                            <label class="form-check-label text-black-100 small" for="status_proses">
                                Pengeringan
                            </label>
                        </div>
                        <div class="form-check ml-2">
                            <input value="Selesai" class="form-check-input" type="radio" name="status_proses" id="status_proses">
                            <label class="form-check-label text-black-100 small" for="status_proses">
                                Selesai
                            </label>
                        </div>
                        @elseif($pelanggan->status_proses == 'Pengeringan')
                        <div class="form-check">
                            <input value="Pencucian" class="form-check-input" type="radio" name="status_proses" id="flexRadioDefault3">
                            <label class="form-check-label text-black-100 small" for="flexRadioDefault3">
                                Pencucian
                            </label>
                        </div>
                        <div class="form-check ml-2">
                            <input value="Pengeringan" class="form-check-input" type="radio" name="status_proses" id="status_proses" checked>
                            <label class="form-check-label text-black-100 small" for="status_proses">
                                Pengeringan
                            </label>
                        </div>
                        <div class="form-check ml-2">
                            <input value="Selesai" class="form-check-input" type="radio" name="status_proses" id="status_proses">
                            <label class="form-check-label text-black-100 small" for="status_proses">
                                Selesai
                            </label>
                        </div>
                        @else
                        <div class="form-check">
                            <input value="Pencucian" class="form-check-input" type="radio" name="status_proses" id="status_proses">
                            <label class="form-check-label text-black-100 small" for="status_proses">
                                Pencucian
                            </label>
                        </div>
                        <div class="form-check ml-2">
                            <input value="Pengeringan" class="form-check-input" type="radio" name="status_proses" id="status_proses">
                            <label class="form-check-label text-black-100 small" for="status_proses">
                                Pengeringan
                            </label>
                        </div>
                        <div class="form-check ml-2">
                            <input value="Selesai" class="form-check-input" type="radio" name="status_proses" id="status_proses" checked>
                            <label class="form-check-label text-black-100 small" for="status_proses">
                                Selesai
                            </label>
                        </div>
                        @endif
                    </div>
                    <div class="form-group col-pelanggan d-flex justify-content-between align-item-center">
                        <button type="submit" value="Simpan Transaksi" class="btn btn-warning">Simpan Transaksi</button>
                        <a href="/riwayat_transaksi" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- End of Main Content -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('#jenis').change(function() {
            let cid = jQuery(this).val();
            jQuery('#table').html('')
            jQuery('#waktu_id').val('')
            jQuery('#harga').val('')
            jQuery('#berat').val('')
            jQuery('#mulai').val('')
            jQuery('#selesai').val('')
            jQuery('#biaya_sekarang').val('')
            jQuery('#sisa_biaya').val('')
            jQuery('#total_biaya').val('0')
            jQuery.ajax({
                url: '/getLayanan',
                type: 'post',
                data: 'cid=' + cid + '&_token={{csrf_token()}}',
                success: function(result) {
                    jQuery('#layanan').html(result)
                }
            });
        });

        jQuery('#layanan').change(function() {
            let sid = jQuery(this).val();
            jQuery.ajax({
                url: '/getLayanan_id',
                type: 'post',
                data: 'sid=' + sid + '&_token={{csrf_token()}}',
                success: function(result) {
                    jQuery('#table').html(result)
                }
            });
        });

        $('#layanan').change(function() {
            let wid = $(this).val();
            $.ajax({
                url: '/getHarga',
                type: 'post',
                data: {
                    wid: wid,
                    _token: "{{csrf_token()}}"
                },
                success: function(res) {
                    console.log(res);
                    $('#harga').val(res.harga)
                    $('#waktu_id').val(res.estimasi_waktu)
                }
            })
        });
    });

    $(document).on('blur', '#harga', function() {
        let harga = parseInt($(this).val())
        let berat = parseInt($('#berat').val())
        $('#total_biaya').val(berat * harga)
    });

    $(document).on('blur', '#berat', function() {
        let berat = parseInt($(this).val())
        let harga = parseInt($('#harga').val())
        $('#total_biaya').val(berat * harga)
    });

    $(document).on('blur', '#biaya_sekarang', function() {
        let biaya_sekarang = parseInt($(this).val())
        let berat = parseInt($('#berat').val())
        let harga = parseInt($('#harga').val())
        let total_biaya = (berat * harga) - biaya_sekarang
        $('#sisa_biaya').val(total_biaya)
    });

    function jumlah() {
        var hari_int = document.getElementById('waktu_id').value;
        var tgl_masuk = document.getElementById('mulai').value;
        var hari = hari_int * 24 * 60 * 60 * 1000;

        var tgl_keluar = new Date(new Date(tgl_masuk).getTime() + (hari));

        document.getElementById('selesai').value = tgl_keluar.toISOString().slice(0, 10);
    }
</script>
@endsection