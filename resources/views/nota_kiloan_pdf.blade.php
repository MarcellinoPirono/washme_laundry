<!DOCTYPE html>
<html lang="en">

<head>

        <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body>
    <div class="roe">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="col-md-6"><label><strong>Customer Details</strong></label></div>
            &nbsp;
            &nbsp;
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No Invoice</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Layanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{ $no_invoice }}</th>
                            <th>{{ $nama }}</th>
                            <th>{{ $email }}</th>
                            <th>{{ $layanan }}</th>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
    <!-- End of Main Content -->
</body>