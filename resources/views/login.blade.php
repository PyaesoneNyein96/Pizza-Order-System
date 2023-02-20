@extends('layout.master')

@section('title', 'Log-in')
@section('content')
    <div class="login-logo">
        <a href="#" class="text-decoration-none">
            <img src="{{ asset('admin/images/logo-icon/online-shopping.png') }}" class="w-75 shadow-sm" alt="CoolAdmin">
            <span class="h2 text-warning mx-2 py-2">
                Galaxy <span class="text-green">Shop</span>.io
            </span>
        </a>
    </div>
    <div class="login-form">
        @if (session('successMsg'))
            <p class=" rounded bg-info text-center">
                <small class="text-light">
                    {{ session('successMsg') }}
                </small>
            </p>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label>Email Address</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                    placeholder="Email">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                    placeholder="Password">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="au-btn au-btn--block au-btn--green m-t-20" type="submit">sign
                in</button>

        </form>
        <div class="register-link">
            <p>
                Don't you have account?
                <a href="{{ route('auth@register') }}">Sign Up Here</a>
            </p>
        </div>
    </div>
@endsection
