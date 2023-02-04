@extends('layout.master')

@section('title', 'Password Change')
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
