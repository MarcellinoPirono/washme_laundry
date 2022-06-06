@extends('layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="{{ "edit_transaksis_".$pelanggan->no_invoice }}" method="post">
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
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" aria-describedby="nameHelp" placeholder="Masukkan nama" required value="{{ old('nama', $pelanggan->nama) }}">
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
                        <div class="input-group mb-3 col-4">
                            <select class="custom-select dynamic @error('item') is-invalid @enderror" name="item" id="item" required>
                                <option value="0" disabled selected>Select Item</option>
                                <option value="{{ $item_id->id }}" selected>{{ old('item', $transaksi1->item) }}</option>
                                @error('item')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </select>
                        </div>
                        <div class="input-group mb-3 col-4">
                            <select class="custom-select dynamic @error('size') is-invalid @enderror" id="size" name="size" data-dependent="item" required>
                                <option value="0" disabled>Select Size</option>
                                @if($transaksi1->size == 'Tidak Ada')
                                <option value="1" selected>{{ old('size', $transaksi1->size) }}</option>
                                <option value="2">Besar</option>
                                <option value="3">Kecil</option>
                                @elseif($transaksi1->size == 'Besar')
                                <option value="1">Tidak Ada</option>
                                <option value="2" selected>{{ old('size', $transaksi1->size) }}</option>
                                <option value="3">Kecil</option>
                                @else
                                <option value="1">Tidak Ada</option>
                                <option value="2">Besar</option>
                                <option value="3" selected>{{ old('size', $transaksi1->size) }}</option>
                                @endif
                                @error('size')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </select>
                        </div>
                        <div class="input-group mb-3 col-4">
                            <input type="number" id="banyak" name="banyak" class="form-control" id="exampleInputName1" aria-describedby="jumlahHelp" value="{{ old('banyak', $transaksi1->jumlah) }}" required>
                        </div>
                    </div>
                    <div class="col-pelanggan scroll-table">
                        <table class="table table-bordered table-light text-center" id="tabel1">
                            <thead>
                                <tr>
                                    <th scope="col">Layanan</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Estimasi Waktu</th>
                                    <th scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody id="table1">
                                @foreach($transaksis as $transaksi)
                                <tr id="baris{{ $loop->iteration }}" name="baris{{ $loop->iteration }}">
                                    <td class="layanan"><input name="layanan_arr[{{ $loop->iteration }}]" id="layanan_arr{{ $loop->iteration }}" class="fieldset border-0 text-center" style="width:70px" readonly value="{{ old('layanan_arr', $transaksi->layanan) }}"></td>
                                    <td class="item"><input name="item_arr[{{ $loop->iteration }}]" id="item_arr{{ $loop->iteration }}" class="fieldset border-0 text-center" style="width:100px" readonly value="{{ old('item_arr', $transaksi->item) }}"></td>
                                    <td class="size"><input name="size_arr[{{ $loop->iteration }}]" id="size_arr{{ $loop->iteration }}" class="fieldset border-0 text-center" style="width:100px" readonly value="{{ old('size_arr', $transaksi->size) }}"></td>
                                    <td class="jumlah"><input name="jumlah_arr[{{ $loop->iteration }}]" id="jumlah_arr{{ $loop->iteration }}" class="fieldset border-0 text-center" style="width:70px" readonly value="{{ old('jumlah_arr', $transaksi->jumlah) }}"></td>
                                    <td class="waktu"><input name="waktu_arr[{{ $loop->iteration }}]" id="waktu_arr{{ $loop->iteration }}" class="fieldset border-0 text-center" style="width:70px" readonly value="{{ old('waktu_arr', $nota_satuan[$loop->iteration-1]->estimasi_waktu)  }}"></td>
                                    <td class="total"><input name="total_arr[{{ $loop->iteration }}]" id="total_arr{{ $loop->iteration }}" class="fieldset border-0 text-center" style="width:70px" readonly value="{{ old('total_arr', $transaksi->harga) }}"></td>
                                </tr>
                                @endforeach
                                <tr id='baris_total' name='baris$total_transaksi'>
                                    <td colspan="7"><span class="font-weight-bold">Total Pesanan: </span><input name="tot_pesanan" id="tot_pesanan" class="fieldset border-0 text-center font-weight-bold" style="width:70px" value="{{ old('tot_pesanan', $total_transaksi) }}" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row col-pelanggan d-flex justify-content-between align-items-center">
                        <div class="form-group col-5 mt-3">
                            <a class="btn btn-orange" id="tambah"><i class="fas fa-plus mr-2"></i>Tambah</a>
                        </div>
                        <div class="form-group mt-3">
                            <a class="btn btn-danger" id="hapus"><i class="fas fa-trash mr-2"></i>Hapus</a>
                        </div>
                    </div>
                    <div class="row col-pelanggan d-flex justify-content-between align-items-center">
                        <div class="form-group col-5 mt-3">
                            <a class="btn btn-warning" id="simpan"><i class="fas fa-save mr-2"></i>Simpan</a>
                        </div>
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Estimasi Waktu</div>
                    <div class="form-group col-pelanggan">
                        <input type="number" class="form-control" onkeyup="jumlah();" id="waktu_id" name="waktu_id" aria-describedby="numberHelp" readonly value="{{ old('waktu_id', $nota_satuan[0]->estimasi_waktu) }}">
                        @error('waktu_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Tanggal Masuk:</div>
                    <div class="form-group col-pelanggan">
                        <input type="date" class="form-control @error('mulai') is-invalid @enderror" onkeyup="jumlah();" id="mulai" name="mulai" aria-describedby="date1Help" placeholder="dd/mm/yy" required value="{{ old('mulai', $nota_satuan[0]->mulai) }}">
                        @error('mulai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Tanggal Keluar:</div>
                    <div class="form-group col-pelanggan">
                        <input type="date" class="form-control" id="selesai" name="selesai" aria-describedby="date2Help" placeholder="dd/mm/yy" readonly value="{{ old('selesai', $nota_satuan[0]->selesai) }}">
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Keterangan:</div>
                    <div class="form-group col-pelanggan">
                        <textarea class="form-control col-pelanggan @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3" required>{{ old('keterangan', $nota_satuan[0]->keterangan) }}</textarea>
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
                                @if($nota_satuan[0]->via == 'Tunai')
                                <option selected value="Tunai">Tunai</option>
                                <option value="Debit">Debit</option>
                                <option value="Ovo">Ovo</option>
                                <option value="Gopay">Gopay</option>
                                <option value="Lainnya">Lainnya</option>
                                @elseif($nota_satuan[0]->via == 'Debit')
                                <option value="Tunai">Tunai</option>
                                <option selected value="Debit">Debit</option>
                                <option value="Ovo">Ovo</option>
                                <option value="Gopay">Gopay</option>
                                <option value="Lainnya">Lainnya</option>
                                @elseif($nota_satuan[0]->via == 'Ovo')
                                <option value="Tunai">Tunai</option>
                                <option value="Debit">Debit</option>
                                <option selected value="Ovo">Ovo</option>
                                <option value="Gopay">Gopay</option>
                                <option value="Lainnya">Lainnya</option>
                                @elseif($nota_satuan[0]->via == 'Gopay')
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
                        <input type="number" class="mr-5 ml-lg-n5 col-lg-9 h2 text-black-800 border-0 bg-transparent" id="total_biaya" name="total_biaya" value="{{ old('total_biaya', $nota_satuan[0]->total_biaya) }}" readonly>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="text-black-100 ml-3 mb-2 small">Pembayaran Saat Ini:</div>
                            <div class="col-10 input-group mb-3">
                                <input type="number" class="form-control @error('biaya_sekarang') is-invalid @enderror" name="biaya_sekarang" id="biaya_sekarang" placeholder="Input Payment" value="{{ old('biaya_sekarang', $nota_satuan[0]->biaya_sekarang) }}" aria-label="Recipient's username" aria-describedby="button-addon2" required>
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
                                <input type="text" class="form-control" name="sisa_biaya" id="sisa_biaya" placeholder="remaining payment" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ old('sisa_biaya', $nota_satuan[0]->sisa_biaya) }}" readonly>
                            </div>
                        </div>
                        <div class="col-pelanggan mb-2">
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
                        </div>
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
        jQuery('#size').change(function() {
            jQuery('#waktu_id').val('')
            jQuery('#mulai').val('')
            jQuery('#selesai').val('')
            let cid = jQuery(this).val();
            jQuery.ajax({
                url: '/getSize',
                type: 'post',
                data: 'cid=' + cid + '&_token={{csrf_token()}}',
                success: function(result) {
                    jQuery('#item').html(result)
                }
            });
        });
    });

    $(document).ready(function() {
        let baris = parseInt($('#tot_pesanan').val())

        $(document).on('click', '#tambah', function() {
            baris = baris + 1
            var html = "<tr id='baris" + baris + "' name='baris" + baris + "'>"
            html += "<td class='layanan'><input name='layanan_arr[" + baris + "]' id='layanan_arr' class='fieldset border-0' style='width:70px' readonly></td>"
            html += "<td class='item'><input name='item_arr[" + baris + "]' id='item_arr' class='fieldset border-0' style='width:100px' readonly></td>"
            html += "<td class='size'><input name='size_arr[" + baris + "]' id='size_arr' class='fieldset border-0' style='width:100px' readonly></td>"
            html += "<td class='jumlah'><input name='jumlah_arr[" + baris + "]' id='jumlah_arr' class='fieldset border-0' style='width:70px' readonly></td>"
            html += "<td class='waktu'><input name='waktu_arr[" + baris + "]' id='waktu_arr' class='fieldset border-0' style='width:70px' readonly></td>"
            html += "<td class='total'><input name='total_arr[" + baris + "]' id='total_arr' class='fieldset border-0' style='width:70px' readonly></td>"
            html += "</tr>"
            $('#table1').append(html)

            $('#baris_total').remove()

            $('#item').change(function() {
                let jumlah1 = $('#banyak').val('1');
                jumlah = 1;
                let jid = $(this).val();
                $.ajax({
                    url: '/getSize_id',
                    type: 'post',
                    data: {
                        jid: jid,
                        _token: "{{csrf_token()}}"
                    },
                    success: function(res) {
                        console.log(res);
                        if (res.size_id == 1) {
                            size = "Tidak Ada";
                        } else if (res.size_id == 2) {
                            size = "Besar";
                        } else {
                            size = "Kecil";
                        }

                        if (baris == 0) {
                            $('#harga').val('')
                            $('#waktu_id').val('')
                        } else {
                            $('#baris' + baris).html('<td class="layanan"><input name="layanan_arr[' + baris + ']" id="layanan_arr' + baris + '" class="fieldset border-0 text-center" style="width:70px" value="' + res.layanan + '" readonly></td><td class="item"><input name="item_arr[' + baris + ']" id="item_arr' + baris + '" class="fieldset border-0 text-center" style="width:100px" value="' + res.item + '" readonly></td><td class="size"><input name="size_arr[' + baris + ']" id="size_arr' + baris + '" class="fieldset border-0 text-center" style="width:100px" value="' + size + '" readonly></td><td class="jumlah"><input name="jumlah_arr[' + baris + ']" id="jumlah_arr' + baris + '" class="fieldset border-0 text-center" style="width:70px" value="' + jumlah + '" readonly></td><td class="waktu"><input name="waktu_arr[' + baris + ']" id="waktu_arr' + baris + '" class="fieldset border-0 text-center" style="width:70px" value="' + res.estimasi_waktu + '" readonly></td><td class="total"><input name="total_arr[' + baris + ']" id="total_arr' + baris + '" class="fieldset border-0 text-center" style="width:100px" value="' + res.harga * jumlah + '" readonly></td>')
                        }
                    }
                })
            });

            function jumlah() {
                var hari_int = document.getElementById('waktu_id').value;
                var tgl_masuk = document.getElementById('mulai').value;

                var hari = hari_int * 24 * 60 * 60 * 1000;

                var tgl_keluar = new Date(new Date(tgl_masuk).getTime() + (hari));

                document.getElementById('selesai').value = tgl_keluar.toISOString().slice(0, 10);
            }

            $('#banyak').change(function() {
                let jid = $('#item').val();
                let jumlah = $(this).val()
                $.ajax({
                    url: '/getJumlah',
                    type: 'post',
                    data: {
                        jid: jid,
                        _token: "{{csrf_token()}}"
                    },
                    success: function(res) {
                        console.log(res);
                        if (res.size_id == 1) {
                            size = "Tidak Ada";
                        } else if (res.size_id == 2) {
                            size = "Besar";
                        } else {
                            size = "Kecil";
                        }
                        $('#baris' + baris).html('<td class="layanan"><input name="layanan_arr[' + baris + ']" id="layanan_arr' + baris + '" class="fieldset border-0 text-center" style="width:70px" value="' + res.layanan + '" readonly></td><td class="item"><input name="item_arr[' + baris + ']" id="item_arr' + baris + '" class="fieldset border-0 text-center" style="width:100px" value="' + res.item + '" readonly></td><td class="size"><input name="size_arr[' + baris + ']" id="size_arr' + baris + '" class="fieldset border-0 text-center" style="width:100px" value="' + size + '" readonly></td><td class="jumlah"><input name="jumlah_arr[' + baris + ']" id="jumlah_arr' + baris + '" class="fieldset border-0 text-center" style="width:70px" value="' + jumlah + '" readonly></td><td class="waktu"><input name="waktu_arr[' + baris + ']" id="waktu_arr' + baris + '" class="fieldset border-0 text-center" style="width:70px" value="' + res.estimasi_waktu + '" readonly></td><td class="total"><input name="total_arr[' + baris + ']" id="total_arr' + baris + '" class="fieldset border-0 text-center" style="width:100px" value="' + res.harga * jumlah + '" readonly></td>')
                    }
                })
            });
        });

        $(document).on('click', '#hapus', function() {
            let waktu = $('#waktu_id').val('')
            let jumlah = $('#banyak').val('')
            $('#baris' + baris).remove()
            $('#baris_total').remove()
            baris = baris - 1
        })

        $(document).on('click', '#simpan', function() {
            if (baris < 0) {
                baris = 0
                var html = "<tr id='baris_total' name='baris+total'>"
                html += "<td colspan='7'><span class='font-weight-bold'>Total Pesanan: </span><input name='tot_pesanan' id='tot_pesanan' class='fieldset border-0 text-center font-weight-bold' style='width:70px' value='" + baris + "' readonly></td>"
                html += "</tr>"

                $('#table1').append(html)
            } else {
                var html = "<tr id='baris_total' name='baris+total'>"
                html += "<td colspan='7'><span class='font-weight-bold'>Total Pesanan: </span><input name='tot_pesanan' id='tot_pesanan' class='fieldset border-0 text-center font-weight-bold' style='width:70px' value='" + baris + "' readonly></td>"
                html += "</tr>"

                $('#table1').append(html)
            }

            let total = []
            let waktu = []

            // time = waktu[0]
            for (j = 0; j <= baris; j++) {
                total[j] = $('#total_arr' + j).val()
                if (total[j] == undefined) {
                    total[j] = 0
                }
                total[j] = parseInt(total[j])
                waktu[j] = $('#waktu_arr' + j).val()
                if (waktu[j] == undefined) {
                    waktu[j] = 0
                }
                waktu[j] = parseInt(waktu[j])
            }

            time = waktu[0]
            for (k = 0; k <= baris; k++) {
                if (time < waktu[k]) {
                    time = waktu[k]
                }
            }

            const total_all = total.reduce((accumulator, currentvalue) => {
                return accumulator + currentvalue;
            })

            $('#total_biaya').val(total_all);
            $('#waktu_id').val(time);
        })
    });

    $(document).on('blur', '#biaya_sekarang', function() {
        let biaya_sekarang = parseInt($(this).val())
        let total_biaya = parseInt($('#total_biaya').val())
        let sisa_biaya = total_biaya - biaya_sekarang
        $('#sisa_biaya').val(sisa_biaya)
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