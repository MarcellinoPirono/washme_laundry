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
                        Pemasukan
                    </div>
                </th>
                <th>
                    <div style="width: 120px;">
                        Pengeluaran
                    </div>
                </th>
                <th>
                    <div style="width: 200px;">
                        Keterangan
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $laporan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $laporan['tanggal'] }}</td>
                @if($laporan['jumlah'] == NULL)
                <td>0</td>
                @else
                <td>{{ $laporan['jumlah'] }}</td>
                @endif
                @if($laporan['kurang'] == NULL)
                <td>0</td>
                @else
                <td>{{ $laporan['kurang'] }}</td>
                @endif
                @if($laporan['keterangan'] == NULL)
                <td>-</td>
                @else
                <td>{{ $laporan['keterangan'] }}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</body>