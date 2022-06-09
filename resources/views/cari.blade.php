<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nota Hilang</title>
    <link rel="icon" type="image/x-icon" href="assets/img/image/washing_machine1600.png" />

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid mt-5">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between shape-dashboard">
                <h1 class="h3 mb-0 text-black-800 ml-3">Hasil Pencarian</h1>
            </div>

            <!-- Content Row -->

            <div class="row">
                <!-- Container Card -->
                <div class="col-xl-12 col-lg-12 mb-4">
                    <div class="card-pesanan1 shadow">

                        <div class="row ml-3">
                            <form class="col-6" action="#">
                                <div class="d-flex my-2">
                                    <div class="text-black-100 ml-3 mt-2 mb-1 small">No. Invoice</div>
                                    <div class="text-black-100 ml-7 mt-2 mb-1 small">: {{ $riwayattransaksis->no_invoice }}</div>
                                </div>
                                <!-- Divider -->
                                <hr class="dropdown-divider">
                                <div class="d-flex my-2">
                                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Tanggal Transaksi</div>
                                    <div class="text-black-100 ml-6 mt-2 mb-1 small">: {{ $riwayattransaksis->tgl_transaksi }}</div>
                                </div>
                                <!-- Divider -->
                                <hr class="dropdown-divider">
                                <div class="d-flex my-2">
                                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Nama</div>
                                    <div class="text-black-100 ml-82 mt-2 mb-1 small">: {{ $riwayattransaksis->nama }}</div>
                                </div>
                                <!-- Divider -->
                                <hr class="dropdown-divider">
                                <div class="d-flex my-2 mb-3">
                                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Proses</div>
                                    <div class="text-black-100 ml-83 mt-2 mb-1 small">:</div>
                                    <div class="proses text-center align-items-center">{{ $riwayattransaksis->status_proses }}</div>
                                </div>
                                <div class="col-pelanggan d-flex justify-content-end align-item-center">
                                    <div class="form-group col-sm-9 col-lg-5 col-xl-5 col-md-5">
                                        <a href="{{ url('/') }}" class="btn btn-primary col-6">Kembali</a>
                                    </div>
                                </div>
                            </form>
                            <img class="col-6 justify-content-end" src="assets/img/image/Asset 18.png">
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Washme Laundry 2022</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </bo>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="../../Landing-Page/index.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-bar-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>