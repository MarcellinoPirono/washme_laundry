<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Washme Laundry | Home</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/image/washing_machine1600.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    @include('includes.home.style')

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="assets/image/Asset 20.png" width="80" height="38.98"
                    alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#how-we-work">How We Work</a></li>
                    <li class="nav-item"><a class="nav-link" href="#our-services">Our Services</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#portfolio" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Pricing
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#cuci-kiloan">Cuci Kiloan</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#cuci-satuan">Cuci Satuan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#about-us">About Us</a></li>
                    <li class="nav-item">
                        <a class="btn btn-login-primary login-button" href="{{ url('/login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{ $slot }}
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start text-light">@2021 DRINSED. All right reserved</div>
                <div class="col-lg-5 my-3 my-lg-0  text-left">
                    <a class="link-light text-decoration-none me-4" href="#!">About Us</a>
                    <a class="link-light text-decoration-none me-4" href="#!">Contact Us</a>
                    <a class="link-light text-decoration-none me-4" href="#!">Terms & Conditions</a>
                    <a class="link-light text-decoration-none me-4" href="#!">Services</a>
                    <a class="link-light text-decoration-none me-4 ml-2" href="#!">FAQ's</a>
                    <a class="link-light text-decoration-none me-4 ml-6" href="#!">Privacy Policy</a>
                </div>
                <div class="col-lg-3 text-lg-end">
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="card-title mb-5"><strong>Setrika</strong></h2>
                                <span class="dot6 mt-3"></span>
                                <span class="dot7"></span>
                                <img class="img-fluid d-block mx-auto" src="assets/image/Asset 13.png" alt="..." />
                                <p>Layanan Setrika merupakan layanan yang hanya menyetrika pakaian anda, ditambah dengan
                                    pengharum dan di packing dengan baik dan rapi.</p>
                                <ul class="list-inline">
                                    <h5><strong>Harga</strong></h5>
                                    <div class="listharga">
                                        <li class="text-left">
                                            <strong>Express:</strong>
                                            Rp.12.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-3'
                                                style='font-size:24px'></i>1 Hari</h5>
                                        <li class="text-left">
                                            <strong>Normal:</strong>
                                            Rp.6.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-6'
                                                style='font-size:24px'></i>3 Hari</h5>
                                    </div>
                                </ul>
                            </div>
                            <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal"
                                type="button">
                                <i class="fas fa-times me-1"></i>
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Portfolio item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="card-title mb-5"><strong>Cuci</strong></h2>
                                <span class="dot6 mt-3"></span>
                                <span class="dot7"></span>
                                <img class="img-fluid d-block mx-auto" src="assets/image/Asset 12.png" width="347.32"
                                    height="316" alt="..." />
                                <p> Layanan cuci kering merupakan layanan yang hanya mencuci pakaian anda ,lalu
                                    dikeringkan dengan baik setelah itu kami berikan kepada anda.</p>
                                <ul class="list-inline">
                                    <h5><strong>Harga</strong></h5>
                                    <div class="listharga">
                                        <li class="text-left">
                                            <strong>Express:</strong>
                                            Rp.14.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-3'
                                                style='font-size:24px'></i>1 Hari</h5>
                                        <li class="text-left">
                                            <strong>Normal:</strong>
                                            Rp.7.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-6'
                                                style='font-size:24px'></i>3 Hari</h5>
                                    </div>
                                </ul>
                            </div>
                            <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal"
                                type="button">
                                <i class="fas fa-times me-1"></i>
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Portfolio item 3 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="card-title mb-5"><strong>Cuci + Setrika</strong></h2>
                                <span class="dot6 mt-3"></span>
                                <span class="dot7"></span>
                                <img class="img-fluid d-block mx-auto" src="assets/image/Asset 1.png" width="457.49"
                                    height="316" alt="..." />
                                <p>Layanan Cuci setrika merupakan layanan yang menangani pakaian anda, mulai dari proses
                                    pencucian hingga bersih lalu lanjut ke proses pengeringan oleh mesin setelah itu
                                    pakaian anda akan di setrika dengan setrika uap, diberikan pengharum dan di packing
                                    hingga rapi. Sehingga baju anda akan terjaga keamanannya dan kebersihannya.</p>
                                <ul class="list-inline">
                                    <h5><strong>Harga</strong></h5>
                                    <div class="listharga">
                                        <li class="text-left">
                                            <strong>Express:</strong>
                                            Rp.18.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-3'
                                                style='font-size:24px'></i>1 Hari</h5>
                                        <li class="text-left">
                                            <strong>Normal:</strong>
                                            Rp.9.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-6'
                                                style='font-size:24px'></i>3 Hari</h5>
                                    </div>
                                </ul>
                                <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-times me-1"></i>
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 4 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="card-title mb-5"><strong>Bed Cover</strong></h2>
                                <span class="dot6 mt-3"></span>
                                <span class="dot7"></span>
                                <img class="img-fluid d-block mx-auto" src="assets/image/Asset 19.png" width="286.63"
                                    height="316" alt="..." />
                                <p>Kami menerima berbagai macam ukuran dari kecil hingga yang besar dengan harga yang
                                    sama</p>
                                <ul class="list-inline">
                                    <h5><strong>Harga</strong></h5>
                                    <div class="listharga">
                                        <li>
                                            <h5>Rp.25.000</h5>
                                        </li>
                                        <li class="mt-2">
                                            <h5><i class='far fa-clock mr-6' style='font-size:24px'></i>3 Hari</h5>
                                        </li>
                                    </div>
                                </ul>
                                <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-times me-1"></i>
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 5 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="card-title mb-5"><strong>Bantal</strong></h2>
                                <span class="dot6 mt-3"></span>
                                <span class="dot7"></span>
                                <img class="img-fluid d-block mx-auto" src="assets/image/Asset 8.png" width="546.81"
                                    height="316" alt="..." />
                                <p>Kami menerima berbagai macam ukuran dari kecil hingga yang besar dengan harga yang
                                    berbeda</p>
                                <ul class="list-inline">
                                    <h5><strong>Harga</strong></h5>
                                    <div class="listharga">
                                        <li class="text-left">
                                            <strong>Kecil:</strong>
                                            Rp.10.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-3'
                                                style='font-size:24px'></i>5 Hari</h5>
                                        <li class="text-left">
                                            <strong>Besar:</strong>
                                            Rp.15.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-7'
                                                style='font-size:24px'></i>5 Hari</h5>
                                    </div>
                                </ul>
                                <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-times me-1"></i>
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 6 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="card-title mb-5"><strong>Boneka</strong></h2>
                                <span class="dot6 mt-3"></span>
                                <span class="dot7"></span>
                                <img class="img-fluid d-block mx-auto" src="assets/image/Asset 9.png" width="262.5"
                                    height="316" alt="..." />
                                <p>Kami menerima berbagai macam ukuran dari kecil hingga yang besar dengan harga yang
                                    berbeda</p>
                                <ul class="list-inline">
                                    <h5><strong>Harga</strong></h5>
                                    <div class="listharga">
                                        <li class="text-left">
                                            <strong>Kecil:</strong>
                                            Rp.15.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-3'
                                                style='font-size:24px'></i>5 Hari</h5>
                                        <li class="text-left">
                                            <strong>Besar:</strong>
                                            Rp.20.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-7'
                                                style='font-size:24px'></i>5 Hari</h5>
                                    </div>
                                </ul>
                                <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-times me-1"></i>
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 7 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="card-title mb-5"><strong>Sprei</strong></h2>
                                <span class="dot6 mt-3"></span>
                                <span class="dot7"></span>
                                <img class="img-fluid d-block mx-auto" src="assets/image/Asset 4.png" width="461.52"
                                    height="316" alt="..." />
                                <p>Kami menerima berbagai macam ukuran dari kecil hingga yang besar dengan harga yang
                                    sama</p>
                                <ul class="list-inline">
                                    <h5><strong>Harga</strong></h5>
                                    <div class="listharga">
                                        <li>
                                            <h5>Rp.20.000</h5>
                                        </li>
                                        <li class="mt-2">
                                            <h5><i class='far fa-clock mr-6' style='font-size:24px'></i>3 Hari</h5>
                                        </li>
                                    </div>
                                </ul>
                                <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-times me-1"></i>
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop Up Lacak Pesanan -->      
    <div class=" modal fade" id="lacakModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title" id="exampleModalLabel">Hasil Tracking</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="d-flex my-2">
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">No. Invoice</div>
                    <div class="text-black-100 ml-7 mt-2 mb-1 small">: C02123</div>
                </div>
                <!-- Divider -->
                <hr class="dropdown-divider">
                <div class="d-flex my-2">
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Tanggal Transaksi</div>
                    <div class="text-black-100 ml-5 mt-2 mb-1 small">: 19/02/2022</div>
                </div>
                <!-- Divider -->
                <hr class="dropdown-divider">
                <div class="d-flex my-2">
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Nama</div>
                    <div class="text-black-100 ml-8 mt-2 mb-1 small">: Muh Rajab</div>
                </div>
                <!-- Divider -->
                <hr class="dropdown-divider">
                <div class="d-flex my-2">
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Alamat</div>
                    <div class="text-black-100 ml-9 mt-2 mb-1 small">: Jl. A.P. Pettarani 1 NO. 25 A , Makasssar</div>
                </div>
                <!-- Divider -->
                <hr class="dropdown-divider">
                <div class="d-flex my-2 mb-3">
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Proses</div>
                    <div class="text-black-100 ml-10 mt-2 mb-1 small">:</div>
                    <div class="proses text-center">Pencucian</div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.home.script')

</body>

</html>