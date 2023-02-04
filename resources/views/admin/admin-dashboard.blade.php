@extends('admin.admin-master')

@section('title', 'dashboard')


@section('content')





    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->



                    <div class="container">
                        <h1>Admin Dashboard</h1>
                        <h4>Role --{{ Auth::user()->role }}</h4>
                        <a href="{{ route('admin@categoryList') }}" class="mb-2">
                            <button class="btn btn-info">Go to List</button>
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-secondary">Logout</button>
                        </form>
                    </div>


                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
@endsection
