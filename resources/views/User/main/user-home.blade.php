@extends('User.layout.user-master')


@section('title', 'Pizza Home')


@section('content')


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5 ">
            <!-- Shop Sidebar Start -->

            <div class="col-lg-3 col-md-4 ">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter
                        by Categories</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center
                                rounded justify-content-between mb-3 bg-dark text-light pt-2 px-3">
                            {{-- <input type="checkbox" class="custom-control-input" checked id="price-all"> --}}
                            <label class="" for="price-all">All Categories</label>
                            <span class="badge border font-weight-normal mb-2 text-light">{{ count($categories) }}</span>
                        </div>

                        @foreach ($categories as $category)
                            <div
                                class="custom-control custom-checkbox  py-1
                                d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" id="{{ $category->id }}">
                                <label class="custom-control-label" for="{{ $category->id }}">{{ $category->name }}</label>
                                {{-- <span class="badge border font-weight-normal text-dark">{{ $category }}</span> --}}
                            </div>
                        @endforeach

                    </form>
                </div>
                <!-- Price End -->



                <div class="">
                    <button class="btn btn btn-warning w-100">Order</button>
                </div>
            </div>


            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($products as $item)
                        <a href="detail.html">
                            <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                <div class="product-item bg-light mb-4">
                                    <div class="product-img position-relative overflow-hidden">
                                        <img class="img-fluid w-100" src="{{ asset('storage/product/' . $item->image) }}"
                                            alt="" style="height:250px; object-fit:cover">
                                        <div class="product-action">
                                            <a class="btn btn-outline-dark btn-square" href="">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a class="btn btn-outline-dark btn-square" href="">
                                                <i class="far fa-heart"></i>
                                            </a>
                                            <a class="btn btn-outline-dark btn-square" href="">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>

                                        </div>
                                    </div>
                                    <div class="text-center py-4">
                                        <a class="h6 text-decoration-none text-truncate"
                                            href="">{{ $item->name }}</a>
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            <h5>{{ $item->price }} Kyats</h5>
                                            <h6 class="text-muted ml-2"><del>25000</del></h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mb-1">
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


@endsection
