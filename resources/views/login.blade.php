@extends('layout.master')

@section('title', 'Log-in')
@section('content')
    <div class="login-logo">
        <a href="#" class="text-decoration-none">
            <img src="{{ asset('admin/images/icon/pizza.png') }}" class="w-75 shadow-sm" alt="CoolAdmin">
            <h3 class="brand-font text-orange">Pizza Galaxy Login</h3>
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
