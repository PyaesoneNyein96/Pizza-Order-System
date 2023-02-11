@extends('layout.master')

@section('title', 'Password Change')


@if (Auth::user()->role == 'user')
    <div class="container-fluid mb-30" style="margin-buttom:100px; background-color:#3d464d">
        <div class="row px-xl-5 align-items-center">
            <div class="col-lg-3 d-none d-lg-block">

                <div class="col-lg-12  py-1">
                    <a href="#" class="text-decoration-none">
                        <a href="#" class="text-decoration-none d-flex align-items-center ">
                            <img src="{{ asset('admin/images/icon/pizza.png') }}" style="width: 50px";
                                alt="Cool Admin" />
                            <span class="h2 brand-font text-warning mx-2 mt-2"> Pizza Galaxy</span>
                        </a>

                    </a>
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
                                <a href="{{ route('user@home') }}" class="nav-item nav-link active">Home</a>
                            @endauth
                            @guest
                                <a href="" class="nav-item nav-link active">Home</a>
                            @endguest
                            <a href="cart.html" class="nav-item nav-link">My Cart</a>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>

                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">


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
                                            <a href="" class="dropdown-item ">
                                                <i class="fa-solid fa-user-tie me-1"> </i> Account Info</a>
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
                                <span>
                                    <a href="{{ route('auth@login') }}">
                                        <button class="btn btn-outline-info  rounded btn-sm">
                                            Login or Register
                                        </button>
                                    </a>
                                </span>
                            @endguest


                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="" style="height:50px;  background: #e5e5e5;"></div>
@endif



@section('content')

    <div class="login-logo">
        <a href="#" class="text-decoration-none">
            <img src="{{ asset('admin/images/icon/pizza.png') }}" class="w-25 shadow-sm" alt="CoolAdmin">
            <h3 class="brand-font text-orange"> <i class="zmdi zmdi-key"></i> Change Password </h3>
        </a>
    </div>
    <div class="login-form">

        <form action="{{ route('change@pass') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <h5 class="text-muted">Your email? </h5> <span class="text-success">{{ Auth::user()->email }},
                    {{ Auth::user()->role }}</span>
            </div>
            <div class="form-group mb-3">
                <label>Old Password</label>
                <input name="oldPassword"
                    class="form-control @error('OldPassword') is-invalid @enderror @if (session('errMsg')) is-invalid @endif"
                    type="password" placeholder="Your Old Password . . .">
                @error('oldPassword')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                @if (session('errMsg'))
                    <small class="text-danger">
                        {{ session('errMsg') }}
                    </small>
                @endif
            </div>

            <div class="form-group mb-3">
                <label>New Password</label>
                <input name="newPassword" class="form-control @error('newPassword') is-invalid @enderror" type="password"
                    placeholder="New Password . . .">
                @error('newPassword')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>confirm Password</label>
                <input name="confirmPassword" class="form-control @error('confirmPassword') is-invalid @enderror"
                    type="password" placeholder="Confirm Password . . .">
                @error('confirmPassword')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="au-btn au-btn--block au-btn--green m-t-20" type="submit">
                Update Password <i class="fa fa-key" aria-hidden="true"></i>
            </button>

        </form>
        {{-- <div class="register-link">
        <p>
            Don't you remember old password ?
            <a href="{{ route('auth@register') }}">Sign Up Here</a>
        </p>
    </div> --}}
    </div>
@endsection
