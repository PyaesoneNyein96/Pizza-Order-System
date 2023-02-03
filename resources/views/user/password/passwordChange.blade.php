@extends('layout.master')

@section('title', 'Password Change')
@section('content')
    <div class="login-logo">
        <a href="#" class="text-decoration-none">
            <img src="{{ asset('admin/images/icon/pizza.png') }}" class="w-25 shadow-sm" alt="CoolAdmin">
            <h3 class="brand-font text-orange">Change Password</h3>
        </a>
    </div>
    <div class="login-form">

        <form action="{{ route('auth@changePage') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <h5 class="text-muted">Your email? </h5> <span> xxxx@gmail.com</span>
            </div>
            <div class="form-group mb-3">
                <label>Old Password</label>
                <input class="au-input au-input--full" type="password" name="password"
                    placeholder="Your Old Password . . .">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>New Password</label>
                <input class="au-input au-input--full" type="password" name="password" placeholder="New Password . . .">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>confirm Password</label>
                <input class="au-input au-input--full" type="password" name="password" placeholder="Confirm Password . . .">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="au-btn au-btn--block au-btn--green m-t-20" type="submit">
                Update Password
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
