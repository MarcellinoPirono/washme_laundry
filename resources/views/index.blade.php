<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Washme Laundry</title>
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
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/style.css" rel="stylesheet" />
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- CSS Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="assets/image/Asset 20.png" width="80" height="38.98" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#how-we-work">How We Work</a></li>
                    <li class="nav-item"><a class="nav-link" href="#our-services">Our Services</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#portfolio" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <!-- Masthead-->
    <header class="masthead" id="home">
        <div class="container">
            <img class="image-logo" src="assets/image/Asset 14.png" width="310" height="108.43" alt="...">
            <!-- <div class="masthead-subheading">Solusi Untuk</div> -->
            <div class="label-text1"> Solusi Untuk</div>
            <div class="label-text2 mb-3"> Pakaian Kotor Anda</div>
            <!-- No Invoice Input-->
            <form class="form-inline justify-content-center" action="/cari" method="GET">
                <div class="form-group mx-sm-0 mb-2 ">
                    <label for="inputNoInvoice" class="sr-only">No Invoice</label>
                    <input type="text" class="form-control" id="inputNoInvoice" placeholder="Input No Invoice" name="cari">
                </div>
                <button type="submit" class="btn btn-lacak mb-2" data-bs-toggle="modal">Lacak Pesanan
                    <i class="fas fa-angle-right" style="margin: auto;"></i>
                </button>
            </form>
        </div>
    </header>
    <!-- How We Work-->
    <section class="page-section" id="how-we-work">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading">How We Work?</h2>
            </div>
            <div class="card-deck">
                <div class="card">
                    <span class="dot1 mt-3"></span>
                    <span class="dot2"></span>
                    <img class="image-margin-center" src="assets/image/Asset 15.png" width="100" height="161.99" alt="...">
                    <span class="dot3">1</span>
                    <div class="card-body ">
                        <h5 class="card-title">We Collect</h5>
                        <p class="card-text">Kami mengumpulkan laundry Anda, setiap hari dalam seminggu, termasuk hari
                            Minggu</p>
                    </div>
                </div>
                <div class="card">
                    <span class="dot1 mt-3"></span>
                    <span class="dot2"></span>
                    <img class="image-margin-center" src="assets/image/Asset 16.png" width="180" height="162" alt="...">
                    <span class="dot3">2</span>
                    <div class="card-body ">
                        <h5 class="card-title">We Clean</h5>
                        <p class="card-text">Kami menggunakan deterjen ramah lingkungan dan membersihkan pakaian Anda
                            dengan sangat hati-hati</p>
                    </div>
                </div>
                <div class="card">
                    <span class="dot1 mt-3"></span>
                    <span class="dot2"></span>
                    <img class="image-margin-center1" src="assets/image/Asset 17.png" width="140" height="179.78" alt="...">
                    <span class="dot3">3</span>
                    <div class="card-body ">
                        <h5 class="card-title">We Deliver</h5>
                        <p class="card-text">Kami mengantarkan cucian Anda yang bersih dan segar kembali pada waktu yang
                            Anda pilih</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Services-->
    <section class="page-section1" id="our-services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading mb-6">Our Services</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-3">
                    <div class="card1">
                        <img class="image-margin-center2" src="assets/image/1.png" width="100" height="100" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Laundry</h5>
                            <p class="card-text">Dicuci, dikeringkan dan dilipat, harga berdasarkan berat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card1">
                        <img class="image-margin-center2" src="assets/image/2.png" width="100" height="100" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Laundry With Ironing Services</h5>
                            <p class="card-text">Pakaian dibersihkan secara terpisah, dicuci lalu diperas dan digantung
                                di gantungan baju</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card1">
                        <img class="image-margin-center2" src="assets/image/3.png" width="84.63" height="100" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Dry Cleaning Services</h5>
                            <p class="card-text">Pakaian dibersihkan secara terpisah, dicuci atau dikeringkan lalu
                                diperas dan digantung di gantungan baju</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card1">
                        <img class="image-margin-center2" src="assets/image/4.png" width="124.28" height="90" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Home and Bedding</h5>
                            <p class="card-text">Barang yang lebih besar memang membutuhkan proses pembersihan yang
                                berbeda, jadi bisa memakan waktu 120 jam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card1">
                        <img class="image-margin-center2" src="assets/image/5.png" width="89.94" height="90" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Ironing Only Services</h5>
                            <p class="card-text">Semua barang yang sudah dicuci sebelumnya dan hanya perlu disetrika,
                                harga per barang</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Pricing-->
    <div class="card shadow mb-4" id="portfolio">
        <div class="card-body">
            <div class="text-center page-section2">
                <h2 class="section-heading">Pricing</h2>
            </div>
            <div class="kiloan">
                <h3 class="section-heading margin-kiloan" id="cuci-kiloan">Cuci Kiloan</h3>
                <div class="slider owl-carousel">
                    <div class="portfolio-item">
                        <div class="card3">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fa fa-mouse-pointer" style="font-size:48px"></i></div>
                                </div>
                                <span class="dot4 mt-3"></span>
                                <span class="dot5"></span>
                                <img class="image-margin-center3" src="assets/image/Asset 13.png" width="80" height="81" alt="..." />
                                <div class="card-body ">
                                    <h5 class="card-title1">Setrika</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="portfolio-item">
                        <div class="card3">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fa fa-mouse-pointer" style="font-size:48px"></i></div>
                                </div>
                                <span class="dot4 mt-3"></span>
                                <span class="dot5"></span>
                                <img class="image-margin-center3" src="assets/image/Asset 12.png" width="80" height="81" alt="...">
                                <div class="card-body ">
                                    <h5 class="card-title1">Cuci</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="portfolio-item">
                        <div class="card3">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fa fa-mouse-pointer" style="font-size:48px"></i></div>
                                </div>
                                <span class="dot4 mt-3"></span>
                                <span class="dot5"></span>
                                <img class="image-margin-center4" src="assets/image/Asset 1.png" width="100" height="81" alt="...">
                                <div class="card-body ">
                                    <h5 class="card-title1">Cuci + Setrika</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="float-right">
                <img class="image-kiloan" src="assets/image/duotone (4).png" width="550" height="596.34" alt="...">
            </div>
            <div class="satuan">
                <h3 class="section-heading margin-kiloan" id="cuci-satuan">Cuci Satuan</h3>
                <div class="slider1 owl-carousel">
                    <div class="portfolio-item">
                        <div class="card3">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fa fa-mouse-pointer" style="font-size:48px"></i></div>
                                </div>
                                <span class="dot4 mt-3"></span>
                                <span class="dot5"></span>
                                <img class="image-margin-center5" src="assets/image/Asset 19.png" height="81" alt="...">
                                <div class="card-body ">
                                    <h5 class="card-title1">Bed Cover</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="portfolio-item">
                        <div class="card3">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fa fa-mouse-pointer" style="font-size:48px"></i></div>
                                </div>
                                <span class="dot4 mt-3"></span>
                                <span class="dot5"></span>
                                <img class="image-margin-center6" src="assets/image/Asset 8.png" width="140.16" height="81" alt="...">
                                <div class="card-body ">
                                    <h5 class="card-title1">Bantal</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="portfolio-item">
                        <div class="card3">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fa fa-mouse-pointer" style="font-size:48px"></i></div>
                                </div>
                                <span class="dot4 mt-3"></span>
                                <span class="dot5"></span>
                                <img class="image-margin-center7" src="assets/image/Asset 9.png" width="67.29" height="81" alt="...">
                                <div class="card-body ">
                                    <h5 class="card-title1">Boneka</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="portfolio-item">
                        <div class="card3">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal7">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fa fa-mouse-pointer" style="font-size:48px"></i></div>
                                </div>
                                <span class="dot4 mt-3"></span>
                                <span class="dot5"></span>
                                <img class="image-margin-center8" src="assets/image/Asset 4.png" width="118.3" height="81" alt="...">
                                <div class="card-body ">
                                    <h5 class="card-title1">Sprei</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="float-left">
                <img class="image-kiloan1" src="assets/image/duotone.png" width="550" height="596.34" alt="...">
            </div>
        </div>
    </div>

    <!-- About US -->
    <section class="page-section3" id="about-us">
        <div class="container cf">
            <div class="kotak">
                <h2 class="tahun">05</h2>
                <div class="isitahun">
                    <h3 class="desktahun text-uppercase text-black">Years Experiences</h3>
                </div>
                <h2 class="tahun1">12/<span class="tujuh">7</span></h2>
                <div class="isiserv">
                    <h3 class="desktahun text-uppercase text-black">SERVICE ANY DAY OF THE WEEK</h3>
                </div>
                <img class="image-about" src="assets/image/Asset 18.png" width="300" height="341.11" alt="...">
            </div>
            <div class="isiabout float-right">
                <h2 class="section-heading margin-about">About Us</h2>
                <h3 class="about1 text-black">Kami dari team Wash Me Laundry dengan pengalaman lebih dari 5 tahun dalam
                    membantu kebutuhan laundry Anda. Menghilangkan kerepotan dari pekerjaan laundry dan menyetrika Anda,
                    kami menyediakan waktu yang sesuai untuk Anda.</h3>
                <h2 class="section-heading margin-location">Location</h2>
                <h3 class="about1 text-black font-weight-bold">Jl. Serigala No. 32 A, Makassar, 90135</h3>
                <h2 class="section-heading margin-location">Contact</h2>
                <h3 class="about1 text-black font-weight-bold">0813-5466-6538</h3>
            </div>
        </div>
    </section>
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
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
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
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-3' style='font-size:24px'></i>1 Hari</h5>
                                        <li class="text-left">
                                            <strong>Normal:</strong>
                                            Rp.6.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-6' style='font-size:24px'></i>3 Hari</h5>
                                    </div>
                                </ul>
                            </div>
                            <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
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
    <!-- Portfolio item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="card-title mb-5"><strong>Cuci</strong></h2>
                                <span class="dot6 mt-3"></span>
                                <span class="dot7"></span>
                                <img class="img-fluid d-block mx-auto" src="assets/image/Asset 12.png" width="347.32" height="316" alt="..." />
                                <p> Layanan cuci kering merupakan layanan yang hanya mencuci pakaian anda ,lalu
                                    dikeringkan dengan baik setelah itu kami berikan kepada anda.</p>
                                <ul class="list-inline">
                                    <h5><strong>Harga</strong></h5>
                                    <div class="listharga">
                                        <li class="text-left">
                                            <strong>Express:</strong>
                                            Rp.14.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-3' style='font-size:24px'></i>1 Hari</h5>
                                        <li class="text-left">
                                            <strong>Normal:</strong>
                                            Rp.7.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-6' style='font-size:24px'></i>3 Hari</h5>
                                    </div>
                                </ul>
                            </div>
                            <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
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
    <!-- Portfolio item 3 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="card-title mb-5"><strong>Cuci + Setrika</strong></h2>
                                <span class="dot6 mt-3"></span>
                                <span class="dot7"></span>
                                <img class="img-fluid d-block mx-auto" src="assets/image/Asset 1.png" width="457.49" height="316" alt="..." />
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
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-3' style='font-size:24px'></i>1 Hari</h5>
                                        <li class="text-left">
                                            <strong>Normal:</strong>
                                            Rp.9.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-6' style='font-size:24px'></i>3 Hari</h5>
                                    </div>
                                </ul>
                                <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
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
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="card-title mb-5"><strong>Bed Cover</strong></h2>
                                <span class="dot6 mt-3"></span>
                                <span class="dot7"></span>
                                <img class="img-fluid d-block mx-auto" src="assets/image/Asset 19.png" width="286.63" height="316" alt="..." />
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
                                <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
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
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="card-title mb-5"><strong>Bantal</strong></h2>
                                <span class="dot6 mt-3"></span>
                                <span class="dot7"></span>
                                <img class="img-fluid d-block mx-auto" src="assets/image/Asset 8.png" width="546.81" height="316" alt="..." />
                                <p>Kami menerima berbagai macam ukuran dari kecil hingga yang besar dengan harga yang
                                    berbeda</p>
                                <ul class="list-inline">
                                    <h5><strong>Harga</strong></h5>
                                    <div class="listharga">
                                        <li class="text-left">
                                            <strong>Kecil:</strong>
                                            Rp.10.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-3' style='font-size:24px'></i>5 Hari</h5>
                                        <li class="text-left">
                                            <strong>Besar:</strong>
                                            Rp.15.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-7' style='font-size:24px'></i>5 Hari</h5>
                                    </div>
                                </ul>
                                <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
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
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="card-title mb-5"><strong>Boneka</strong></h2>
                                <span class="dot6 mt-3"></span>
                                <span class="dot7"></span>
                                <img class="img-fluid d-block mx-auto" src="assets/image/Asset 9.png" width="262.5" height="316" alt="..." />
                                <p>Kami menerima berbagai macam ukuran dari kecil hingga yang besar dengan harga yang
                                    berbeda</p>
                                <ul class="list-inline">
                                    <h5><strong>Harga</strong></h5>
                                    <div class="listharga">
                                        <li class="text-left">
                                            <strong>Kecil:</strong>
                                            Rp.15.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-3' style='font-size:24px'></i>5 Hari</h5>
                                        <li class="text-left">
                                            <strong>Besar:</strong>
                                            Rp.20.000
                                        </li>
                                        <h5 class="text-right mb-7"><i class='far fa-clock mr-7' style='font-size:24px'></i>5 Hari</h5>
                                    </div>
                                </ul>
                                <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
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
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="card-title mb-5"><strong>Sprei</strong></h2>
                                <span class="dot6 mt-3"></span>
                                <span class="dot7"></span>
                                <img class="img-fluid d-block mx-auto" src="assets/image/Asset 4.png" width="461.52" height="316" alt="..." />
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
                                <button class="btn btn-primary3 btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
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
    <!-- <div class="modal fade" id="lacakModal" tabindex="-1" role="dialog" aria-labelledby="lacakModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda yakin untuk menghapus data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-danger" href="#">Hapus</a>
                </div>
            </div>
        </div>
    </div> -->
    <div class=" modal fade" id="lacakModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title" id="exampleModalLabel">Hasil Tracking</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
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
                <div class="d-flex my-2 mb-3">
                    <div class="text-black-100 ml-3 mt-2 mb-1 small">Proses</div>
                    <div class="text-black-100 ml-10 mt-2 mb-1 small">:</div>
                    <div class="proses text-center">Pencucian</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".slider").owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverpause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 3,
                    nav: false
                }
            }
        });
    </script>
    <script>
        $(".slider1").owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverpause: true,
            rtl: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 3,
                    nav: false
                }
            }
        });
    </script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>