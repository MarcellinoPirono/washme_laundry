@extends('layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="/after_transaksi_satuan" method="post">
        @csrf
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between shape-dashboard">
            <h1 class="h3 mb-0 text-black-800 ml-3">Transaksi Baru</h1>
            <h1 class="h3 mb-0 text-black-800 text-right ml-lg-4 mr-lg-n5 col-lg-5">No. Invoice:</h1>
            <input id="no_invoice" name="no_invoice" class="h3 mb-0 col-lg-4 text-right text-black-800 mr-3 border-0 bg-transparent" value="{{ $nomor }}" readonly>
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
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" aria-describedby="nameHelp" placeholder="Masukkan nama" required value="{{ old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">No. Telp:</div>
                    <div class="form-group col-pelanggan">
                        <input name="handphone" type="text" class="form-control @error('handphone') is-invalid @enderror" id="handphone" name="handphone" aria-describedby="telpHelp" placeholder="Masukkan no.telp" required value="{{ old('handphone') }}">
                        @error('handphone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Email:</div>
                    <div class="form-group col-pelanggan">
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukkan email" value="{{ old('email') }}">
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Alamat:</div>
                    <div class="form-group col-pelanggan">
                        <textarea class="form-control col-pelanggan @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
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
                                @error('item')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </select>
                        </div>
                        <div class="input-group mb-3 col-4">
                            <select class="custom-select dynamic @error('size') is-invalid @enderror" id="size" name="size" data-dependent="item" required>
                                <option value="0" disabled selected>Select Size</option>
                                @foreach ($itemSize as $size)
                                <option value="{{ $size->id }}">{{ $size->size_item }}</option>
                                @endforeach
                                @error('size')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </select>
                        </div>
                        <div class="input-group mb-3 col-4">
                            <input type="number" id="banyak" name="banyak" class="form-control" id="exampleInputName1" aria-describedby="jumlahHelp" placeholder="jumlah" required>
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
                                <tr id="baris" name="baris">
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
                        <input type="number" class="form-control" onkeyup="jumlah();" id="waktu_id" name="waktu_id" aria-describedby="numberHelp" readonly value="{{ old('waktu_id') }}">
                        @error('waktu_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Tanggal Masuk:</div>
                    <div class="form-group col-pelanggan">
                        <input type="date" class="form-control @error('mulai') is-invalid @enderror" onkeyup="jumlah();" id="mulai" name="mulai" aria-describedby="date1Help" placeholder="dd/mm/yy" required value="{{ old('mulai') }}">
                        @error('mulai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Tanggal Keluar:</div>
                    <div class="form-group col-pelanggan">
                        <input type="date" class="form-control" id="selesai" name="selesai" aria-describedby="date2Help" placeholder="dd/mm/yy" readonly value="{{ old('selesai') }}">
                    </div>
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Keterangan:</div>
                    <div class="form-group col-pelanggan">
                        <textarea class="form-control col-pelanggan @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3" required>{{ old('keterangan') }}</textarea>
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
                                <option value="Tunai">Tunai</option>
                                <option value="Debit">Debit</option>
                                <option value="Ovo">Ovo</option>
                                <option value="Gopay">Gopay</option>
                                <option value="Lainnya">Lainnya</option>
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
                        <input type="number" class="mr-5 ml-lg-n5 col-lg-9 h2 text-black-800 border-0 bg-transparent" id="total_biaya" name="total_biaya" value="0" readonly>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="text-black-100 ml-3 mb-2 small">Pembayaran Saat Ini:</div>
                            <div class="col-10 input-group mb-3">
                                <input type="number" class="form-control @error('biaya_sekarang') is-invalid @enderror" name="biaya_sekarang" id="biaya_sekarang" placeholder="Input Payment" aria-label="Recipient's username" aria-describedby="button-addon2" required>
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
                                <input type="text" class="form-control" name="sisa_biaya" id="sisa_biaya" placeholder="remaining payment" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-pelanggan d-flex justify-content-between align-item-center">
                        <button id="buat" name="buat" type="submit" value="Buat Transaksi" class="btn btn-success">Buat Transaksi</button>
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
        let baris = 1

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
                            $('#baris' + baris).html('<td class="layanan"><input name="layanan_arr[' + (baris - 2) + ']" id="layanan_arr' + (baris - 2) + '" class="fieldset border-0 text-center" style="width:70px" value="' + res.layanan + '" readonly></td><td class="item"><input name="item_arr[' + (baris - 2) + ']" id="item_arr' + (baris - 2) + '" class="fieldset border-0 text-center" style="width:100px" value="' + res.item + '" readonly></td><td class="size"><input name="size_arr[' + (baris - 2) + ']" id="size_arr' + (baris - 2) + '" class="fieldset border-0 text-center" style="width:100px" value="' + size + '" readonly></td><td class="jumlah"><input name="jumlah_arr[' + (baris - 2) + ']" id="jumlah_arr' + (baris - 2) + '" class="fieldset border-0 text-center" style="width:70px" value="' + jumlah + '" readonly></td><td class="waktu"><input name="waktu_arr[' + (baris - 2) + ']" id="waktu_arr' + (baris - 2) + '" class="fieldset border-0 text-center" style="width:70px" value="' + res.estimasi_waktu + '" readonly></td><td class="total"><input name="total_arr[' + (baris - 2) + ']" id="total_arr' + (baris - 2) + '" class="fieldset border-0 text-center" style="width:100px" value="' + res.harga * jumlah + '" readonly></td>')
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
                        $('#baris' + baris).html('<td class="layanan"><input name="layanan_arr[' + (baris - 2) + ']" id="layanan_arr' + (baris - 2) + '" class="fieldset border-0 text-center" style="width:70px" value="' + res.layanan + '" readonly></td><td class="item"><input name="item_arr[' + (baris - 2) + ']" id="item_arr' + (baris - 2) + '" class="fieldset border-0 text-center" style="width:100px" value="' + res.item + '" readonly></td><td class="size"><input name="size_arr[' + (baris - 2) + ']" id="size_arr' + (baris - 2) + '" class="fieldset border-0 text-center" style="width:100px" value="' + size + '" readonly></td><td class="jumlah"><input name="jumlah_arr[' + (baris - 2) + ']" id="jumlah_arr' + (baris - 2) + '" class="fieldset border-0 text-center" style="width:70px" value="' + jumlah + '" readonly></td><td class="waktu"><input name="waktu_arr[' + (baris - 2) + ']" id="waktu_arr' + (baris - 2) + '" class="fieldset border-0 text-center" style="width:70px" value="' + res.estimasi_waktu + '" readonly></td><td class="total"><input name="total_arr[' + (baris - 2) + ']" id="total_arr' + (baris - 2) + '" class="fieldset border-0 text-center" style="width:100px" value="' + res.harga * jumlah + '" readonly></td>')
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
            if(baris<0)
            {
                baris = 1
                var html = "<tr id='baris_total' name='baris+total'>"
                html += "<td colspan='7'><span class='font-weight-bold'>Total Pesanan: </span><input name='tot_pesanan' id='tot_pesanan' class='fieldset border-0 text-center font-weight-bold' style='width:70px' value='" + (baris - 1) + "' readonly></td>"
                html += "</tr>"

                $('#table1').append(html)
            }
            else
            {
                var html = "<tr id='baris_total' name='baris+total'>"
                html += "<td colspan='7'><span class='font-weight-bold'>Total Pesanan: </span><input name='tot_pesanan' id='tot_pesanan' class='fieldset border-0 text-center font-weight-bold' style='width:70px' value='" + (baris - 1) + "' readonly></td>"
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