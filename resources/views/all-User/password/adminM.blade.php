<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet') }}" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Vendor CSS-->
    <link href="{{ asset('admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('admin/vendor/wow/animate.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/slick/slick.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.') }}css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Gemstones&display=swap" rel="stylesheet">

    <!-- Main CSS-->
    <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">


        <!-- PAGE CONTAINER-->
        {{-- <div class="page-container"> --}}
        <!-- HEADER DESKTOP-->
        <header class="container-fluid bg-dark-custom mb-30" style="opacity: 1.85; margin-bottom: 10px; height:70px">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">

                        <div class="text-danger mx-0">
                            <div class="col-lg-12   py-1">
                                <a href="#" class="text-decoration-none d-flex align-items-center ">
                                    <img src="{{ asset('admin/images/logo-icon/online-shopping.png') }}"
                                        style="width: 60px; --fa-animation-duration: 3.1s;" alt="Cool Admin"
                                        class="fa-shake" />
                                    <span class="h2 brand-font text-warning mx-2 mt-2">
                                        Galaxy <span class="text-green">Shop</span>.io
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex w-50 text-light mr-auto py-0 d-flex">
                            @if (Auth::user()->role == 'admin')
                                <a href="{{ route('user@home') }}" class="nav-item me-3 nav-link">Dashboard</a>
                            @elseif (Auth::user()->role == 'user')
                                <a href="{{ route('user@home') }}"
                                    class="nav-item me-3 nav-link @if (url()->current() == route('user@home')) active @endif">
                                    Home</a>

                                <a href="contact.html" class="nav-item nav-link me-3">Contact</a>

                                <a href="{{ route('user@cartList') }}"
                                    class="nav-item nav-link me-3
                                @if (url()->current() == route('user@cartList')) active @endif">
                                    My Cart</a>
                            @endif


                            @guest
                                <a href="" class="nav-item nav-link active me-3">Home</a>
                            @endguest

                        </div>

                        <div class="header-button">

                            @if (Auth::user()->role != 'user')
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        @if (Auth::user()->image == null && Auth::user()->gender == 'male')
                                            <img src="{{ asset('image/avators/images.jpg') }}"
                                                class=" rounded-circle" />
                                        @elseif (Auth::user()->image == null && Auth::user()->gender == 'female')
                                            <img src="{{ asset('image/avators/female.jpg') }}"
                                                class=" rounded-circle" />
                                        @elseif(Auth::user()->image == null)
                                            <img src="{{ asset('image/avators/genderless.jpg') }}" alt="">
                                        @endif
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="">
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn text-decoration-none text-light"
                                            href="#">{{ Auth::user()->name }}
                                            <span class="badge bg-info  rounded-pill p-1 ">
                                                {{ Auth::user()->role }}
                                            </span>
                                        </a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    @if (Auth::user()->image == null && Auth::user()->gender == 'male')
                                                        <img src="{{ asset('image/avators/images.jpg') }}" />
                                                    @elseif (Auth::user()->image == null && Auth::user()->gender == 'female')
                                                        <img src="{{ asset('image/avators/female.jpg') }}" />
                                                    @elseif(Auth::user()->image == null)
                                                        <img src="{{ asset('image/avators/genderless.jpg') }}"
                                                            alt="">
                                                    @endif
                                                    <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">{{ Auth::user()->name }}</a>
                                                </h5>
                                                <span class="email">{{ Auth::user()->email }}</span>
                                            </div>
                                        </div>

                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="{{ route('admin@profile') }}">
                                                    <i class="zmdi zmdi-account"></i>Account
                                                </a>
                                            </div>
                                            @if (url()->current() != route('auth@changePage'))
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('auth@changePage') }}">
                                                        <i class="zmdi zmdi-key"></i>
                                                        Change Password
                                                    </a>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="account-dropdown__footer">
                                            <form action="{{ route('logout') }}" method="POST"
                                                class="logout-custom ">
                                                <div class="btn-wrap ">
                                                    <button class="btn mx-0 px-0" type="submit">
                                                        @csrf
                                                        <i class="zmdi zmdi-power me-3"></i>Logout
                                                    </button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        @yield('content')
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
        {{-- </div> --}}

    </div>

    <!-- Jquery JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script> --}}
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <!-- Vendor JS       -->
    <script src="{{ asset('admin/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('admin/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->
