<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body>
    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">

        <thead class="bg-primary1">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>
                    <div style="width: 100px;">
                        No. Invoice
                    </div>
                </th>
                <th>
                    <div style="width: 100px;">
                        Nama
                    </div>
                </th>
                <th>
                    <div style="width: 200px;">
                        Layanan
                    </div>
                </th>
                <th>
                    <div style="width: 100px;">
                        Total Biaya
                    </div>
                </th>
                <th>
                    <div style="width: 120px;">
                        Pembayaran
                    </div>
                </th>
                <th>
                    <div style="width: 120px;">
                        Pengambilan
                    </div>
                </th>
                <th>
                    <div style="width: 120px;">
                        Proses
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $riwayat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $riwayat->tgl_transaksi }}</td>
                <td>{{ $riwayat->no_invoice }}</td>
                <td>{{ $riwayat->nama }}</td>
                <td>{{ $riwayat->layanan }}</td>
                <td>Rp. {{ $riwayat->total_biaya }}</td>
                <td>
                    @if($riwayat->status_pembayaran == 'Belum Lunas')
                    <div class="bg-danger border-table text-white">
                        {{ $riwayat->status_pembayaran }}
                    </div>
                    @else
                    <div class="bg-success border-table text-white">
                        {{ $riwayat->status_pembayaran }}
                    </div>
                    @endif
                </td>
                <td>
                    @if($riwayat->status_pengambilan == 'Belum Diambil')
                    <div class="bg-danger border-table text-white">
                        {{ $riwayat->status_pengambilan }}
                    </div>
                    @else
                    <div class="bg-success border-table text-white">
                        {{ $riwayat->status_pengambilan }}
                    </div>
                    @endif
                </td>
                <td>
                    @if($riwayat->status_proses == 'Pencucian')
                    <div class="bg-danger border-table text-white">
                        {{ $riwayat->status_proses }}
                    </div>
                    @elseif($riwayat->status_proses == 'Pengeringan')
                    <div class="bg-warning border-table text-white">
                        {{ $riwayat->status_proses }}
                    </div>
                    @else
                    <div class="bg-success border-table text-white">
                        {{ $riwayat->status_proses }}
                    </div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>