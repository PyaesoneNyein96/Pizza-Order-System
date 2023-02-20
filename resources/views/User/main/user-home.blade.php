@extends('User.layout.user-master')


@section('title', 'Pizza Home')


@section('content')


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->

            <div class="col-lg-3 col-md-4" style="position:relative">
                <!-- Price Start -->
                <div class="wrap" style="position:sticky; top:100px ;">
                    <h5 class="section-title text-uppercase mb-3 ">
                        <span class=" pr-3"> Filter by Categories</span>
                    </h5>
                    <div class="bg-light p-4 mb-30">
                        <form>
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center
                                rounded justify-content-between mb-3 bg-dark-custom text-light pt-2 px-3">
                                {{-- <input type="checkbox" class="custom-control-input" checked id="price-all"> --}}
                                <label class="" for="price-all">All
                                    @if ($status == 'all')
                                        Products
                                    @else
                                        Categories
                                    @endif
                                </label>

                                <span class="badge border font-weight-normal mb-2 text-light">
                                    {{ $status ? count($categories) : count($categories) }}
                                </span>

                            </div>

                            @foreach ($categories as $category)
                                <div class="custom-control custom-checkbox  py-1 text-dark mb-3">
                                    <a href="{{ route('user@filter', $category->id) }}"
                                        class="text-decoration-none w-100 d-block"
                                        onclick="document.getElementById({{ $category->id }}).checked=true"
                                        class="p-1 text-decoration-none text-dark">
                                        <input type="checkbox" id="{{ $category->id }}" class="custom-control-input"
                                            @if ($status == $category->id) checked @endif>
                                        <label class="custom-control-label w-100">
                                            {{ $category->name }}
                                        </label>

                                    </a>
                                </div>
                            @endforeach
                            <div class="custom-control custom-checkbox  py-1 text-dark mb-3">
                                <a href="{{ route(Auth::check() ? 'user@home' : 'home') }}"
                                    class="text-decoration-none w-100 d-block"
                                    onclick="document.getElementById('all').checked=true"
                                    class="p-1 text-decoration-none text-dark">
                                    <input type="checkbox" id="all" class="custom-control-input"
                                        @if ($status == 'all') checked @endif>
                                    <label class="custom-control-label w-100">
                                        All
                                    </label>

                                </a>
                            </div>

                        </form>
                    </div>
                    <!-- Price End -->
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

                                <select name="sorting" id="sortingOption" class="form-control form-control-sm shadow-none">
                                    <option value="" selected hidden disabled>- Order By</option>
                                    <option value="asc">Ascending</option>
                                    <option value="des">Descending</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div id="dataList" class="row">
                        @if ($products->isEmpty())
                            <div class="bg-light shadow p-3 border   rounded text-center mt-5">
                                <span class="text-secondary h3">
                                    <i class="fa-solid fa-square-xmark text-danger"></i> Out of Stock :-(
                                </span>
                            </div>
                        @endif
                        @foreach ($products as $item)
                            <div class="col-lg-4 col-md-6 col-sm-6 pb-1 ">

                                <div class="product-item bg-light mb-4 shadow-sm" id="ajaxData">
                                    <div class="product-img position-relative overflow-hidden">
                                        <img class="img-fluid w-100" src="{{ asset('storage/product/' . $item->image) }}"
                                            alt="" style="height:250px; object-fit:contain">
                                        <div class="product-action">
                                            <a class="btn btn-outline-dark btn-square" href="">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a class="btn btn-outline-dark btn-square" href="">
                                                <i class="far fa-heart"></i>
                                            </a>
                                            <a class="btn btn-outline-dark btn-square"
                                                href="{{ route('user@detail', $item->id) }}">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>

                                        </div>
                                    </div>

                                    <div class="text-center py-4">
                                        <a class="h6 text-decoration-none" href="">
                                            <p class="text-truncate px-2">
                                                {{ $item->name }}
                                        </a>
                                        </p>
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            <h5>$ {{ $item->price }}.00 </h5>
                                            <h6 class="text-muted ml-2">
                                                <del>{{ rand($item->price + 30, $item->price + 100) }} $</del>
                                            </h6>
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
                        @endforeach
                    </div>

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

@endsection

@section('script')
    <script>
        $(document).ready(() => {

            $('#sortingOption').change(() => {
                $eventOption = $('#sortingOption').val();
                if ($eventOption == 'asc') {
                    $.ajax({
                        type: 'get',
                        url: 'http://localhost:8000/ajax/products/list',
                        data: {
                            'status': 'asc'
                        },
                        dataType: 'json',
                        success: (res) => {
                            // console.log(res)
                            $list = '';
                            for ($i = 0; $i < res.length; $i++) {
                                $list += `
                                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                        <div class="product-item bg-light mb-4" id="ajaxData">
                                            <div class="product-img position-relative overflow-hidden">
                                                <img class="img-fluid w-100" src="{{ asset('storage/product/${res[$i].image}') }}"
                                                    alt="" style="height:250px; object-fit:contain">
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
                                                <a class="h6 text-decoration-none" href="">
                                                    <p class="text-truncate px-2">${res[$i].name}</p>
                                                    </a>
                                                <div class="d-flex align-items-center justify-content-center mt-2">
                                                    <h5>${res[$i].price}Kyats</h5>
                                                    <h6 class="text-muted ml-2">
                                                        <del>${Math.floor(Math.random() * (res[$i].price + 70 - res[$i].price ) + res[$i].price)} $</del>
                                                    </h6>
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
                               `;
                                $('#dataList').html($list);
                            }
                        }
                    })

                } else if ($eventOption == 'des') {
                    $.ajax({
                        type: 'get',
                        url: 'http://localhost:8000/ajax/products/list',
                        data: {
                            'status': 'des'
                        },
                        dataType: 'json',
                        success: (res) => {
                            $list = '';
                            for ($i = 0; $i < res.length; $i++) {
                                $list += `
                                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                        <div class="product-item bg-light mb-4" id="ajaxData">
                                            <div class="product-img position-relative overflow-hidden">
                                                <img class="img-fluid w-100" src="{{ asset('storage/product/${res[$i].image}') }}"
                                                    alt="" style="height:250px; object-fit:contain">
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
                                                <a class="h6 text-decoration-none" href="">
                                                    <p class="text-truncate px-2">${res[$i].name}</p>
                                                    </a>
                                                <div class="d-flex align-items-center justify-content-center mt-2">
                                                    <h5>${res[$i].price}Kyats</h5>
                                                    <h6 class="text-muted ml-2">
                                                        <del>${Math.floor(Math.random() * (res[$i].price + 70 - res[$i].price ) + res[$i].price)} $</del>   </h6>
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
                               `;
                                $('#dataList').html($list);
                            }
                        }
                    })
                }

            })



        })
    </script>
@endsection
