@extends('layout.master')

@section('title', 'Register')

@section('content')
    <div class="container" style="margin-bottom: 200px">
        <div class="login-logo">
            <a href="#" class="text-decoration-none">
                <img src="{{ asset('admin/images/icon/pizza.png') }}" style="width: 50px" class="shadow rounded"
                    alt="CoolAdmin">
                <span class="h3 brand-font text-orange">Pizza Galaxy</span>
                <span class="h4 brand-font d-block text-orange">Registration Form</span>
            </a>
        </div>
        <div class="login-form">
            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="err-box">
                    @error('terms')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="form-group m-b-10">
                    <label>Username</label>
                    <input class="au-input au-input--full" type="text" name="name" placeholder="Username">
                    @error('username')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group m-b-10">
                    <label>Email Address</label>
                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                    @error('email')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="form-group m-b-10">
                    <label>Phone Number</label>
                    <input class="au-input au-input--full" type="phone" name="phone" placeholder="09 - xxx - xxx - xxx">
                    @error('phone')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="form-group m-b-10">
                    <label>Home Address</label>
                    <input class="au-input au-input--full" type="text" name="address" placeholder="Address">
                    @error('address')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="form-group m-b-10">
                    <label>Password</label>
                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                    @error('password')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group m-b-10">
                    <label>Password</label>
                    <input class="au-input au-input--full" type="password" name="password_confirmation"
                        placeholder="Confirm Password">
                    @error('password_confirmation')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <button class="au-btn au-btn--block au-btn--green m-t-20" type="submit">register</button>

            </form>
            <div class="register-link">
                <p>
                    Already have account?
                    <a href="{{ route('auth@login') }}">Sign In</a>
                </p>
            </div>
        </div>
    </div>
@endsection
