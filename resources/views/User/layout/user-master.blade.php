<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">

    {{-- added bootstrap link psn  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body style="position:relative">



    <!-- Navbar Start -->
    <div class="container-fluid bg-dark-custom mb-30" style="position: sticky; top:0; z-index:100">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">

                <div class="col-lg-12 ">
                    {{-- <a href="#" class="text-decoration-none"> --}}
                    <a href="" class="text-decoration-none d-flex align-items-center">
                        <img src="{{ asset('admin/images/logo-icon/online-shopping.png') }}"
                            style="width: 60px; --fa-animation-duration: 3.1s;" class="fa-shake" />
                        <span class="h2 text-warning mx-2 py-2">
                            Galaxy <span class="text-green">Shop</span>.io
                        </span>
                    </a>

                    {{-- </a> --}}
                </div>

            </div>


            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark-custom navbar-dark py-3 py-lg-0 px-0">

                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            @auth
                                <a href="{{ route('user@home') }}"
                                    class="nav-item nav-link @if (url()->current() == route('user@home')) active @endif">Home</a>
                                <a href="{{ route('user@cartList') }}"
                                    class="nav-item nav-link
                                @if (url()->current() == route('user@cartList')) active @endif">
                                    My Cart
                                </a>


                                <a href="{{ route('user@contact') }}"
                                    class="nav-item nav-link @if (url()->current() == route('user@contact')) active @endif">
                                    Contact
                                </a>
                            @endauth
                            {{-- @guest
                                <a href="" class="nav-item nav-link active">Home</a>
                            @endguest --}}


                        </div>

                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            @auth


                                @if (!Auth::user()->order->isEmpty())
                                    <a href="{{ route('user@cartHistory') }}" class="text-decoration-none">
                                        <i class="fa-solid fa-list-check fa-fade text-info fa-lg position-relative pe-1"
                                            style="--fa-animation-duration: 2s;"></i>
                                        <span
                                            class="badge text-light border-danger border rounded-circle
                                        pe-2 translate-middle badge rounded-pill">
                                            {{ count(Auth::user()->order) }}

                                        </span>
                                    </a>
                                @endif

                                <a href="{{ route('user@cartList') }}" class="text-decoration-none">
                                    <i class="fas fa-shopping-cart text-warning fa-bounce fa-lg position-relative pe-1"
                                        style="--fa-animation-duration: 2.5s;"></i>
                                    <span
                                        class="badge text-light border border-danger rounded-circle pe-2   translate-middle badge rounded-pill">
                                        {{ count(Auth::user()->Cart) }}</span>
                                </a>

                            @endauth



                            @auth


                                <div class="dropdown d-inline ms-3">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-toggle="dropdown"
                                        data-bs-display="static">
                                        <i class="fa fa-user text-info"></i>
                                        {{ Auth::user()->name }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end ">
                                        <li class="my-2">
                                            <a href="{{ route('user@profile') }}" class="dropdown-item ">
                                                <i class="fa-solid fa-user-tie me-1"> </i> Account Info</a>
                                        </li>
                                        <li class="my-2">
                                            <a href="{{ route('auth@changePage') }}" class="dropdown-item ">
                                                <i class="fa-solid fa-key"></i> Change Password</a>
                                        </li>
                                        <li class="my-2">
                                            <span class="dropdown-item">
                                                <form action="{{ route('logout') }}" class="d-inline " method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn mx-0 px-0">
                                                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                                                    </button>
                                                </form>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                            @guest
                                <div class="mt-3">
                                    <a href="{{ route('auth@login') }}">
                                        <button class="btn btn-outline-info  rounded btn-sm">
                                            Login or Register
                                        </button>
                                    </a>
                                </div>
                            @endguest


                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->





    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-dark-custom text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed
                    dolor. Rebum tempor no vero est magna amet no</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our
                                Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop
                                Detail</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right mr-2"></i>Shopping
                                Cart</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact
                                Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#">
                                <i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#">
                                <i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2">
                                </i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact
                                Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-warning ms-2 text-secondary">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                {{-- <img class="img-fluid" src="img/payments.png" alt=""> --}}
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('user/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('user/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('user/js/main.js') }}"></script>

    {{-- bootstrap link psn  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- jQuery  --}}

</body>
@yield('script')

</html>
