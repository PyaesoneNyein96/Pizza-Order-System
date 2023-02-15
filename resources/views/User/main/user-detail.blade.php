@extends('User.layout.user-master')


@section('title', 'Detail')

@section('content')



    {{-- HIDDEN DARA INFO --}}

    <input type="hidden" value="{{ Auth::id() }}" id="userID">
    <input type="hidden" value="{{ $item->id }}" id="pizzaID">

    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('storage/product/' . $item->image) }}" alt="Image">
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <div class="title-wrap  d-flex justify-content-between">
                        <h3 class="d-inline">{{ $item->name }}</h3>
                        {{-- <a href="{{  }}"> --}}
                        <button onclick="history.back()" class="btn px-3 btn-secondary btn-sm">
                            <i class="fa-solid fa-backward-fast"></i>
                            Back</button>
                        {{-- </a> --}}
                    </div>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">
                            <i class="fa-regular fa-eye"></i>
                            ({{ $item->view_count + 125 }})
                        </small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">$ {{ $item->price }}.00</h3>
                    <p class="mb-4">{{ $item->description }}</p>
                    <hr>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-warning btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>

                            {{-- COUNT Value  --}}
                            <input type="text"
                                class="form-control bg-light shadow-sm border-0 text-lg-center
                            mx-2 rounded px-2 text-center border-2"
                                value="0" id="orderCount">





                            <div class="input-group-btn">
                                <button class="btn btn-warning btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-warning text-primary shadow px-3" id="addCartBtn" type="button">
                            <i class="fa fa-shopping-cart mr-1"></i>
                            Add To Cart
                        </button>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                    <span class="h5 text-muted">Category:
                        <span class="text-primary">
                            {{ $item->category->name }}
                        </span></span>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam
                                invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod
                                consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum
                                diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam
                                sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor
                                aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam
                                kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.
                            </p>
                            <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor
                                consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita
                                clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit
                                rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna et.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam
                                invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod
                                consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum
                                diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam
                                sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor
                                aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam
                                kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">1 review for "Product Name"</h4>
                                    <div class="media mb-4">
                                        {{-- <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                            style="width: 45px;"> --}}
                                        <div class="media-body">
                                            <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam
                                                ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod
                                                ipsum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked
                                        *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
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
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="text-secondary bg-light pr-3"> You May Also Like</span>
        </h2>

        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($uMayLike as $uml)
                        <div class="product-item bg-light">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('storage/product/' . $uml->image) }}"
                                    style="width:250px; height:250px; object-fit:cover">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square"
                                        href="{{ route('user@detail', $uml->id) }}">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">{{ $uml->name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{ $uml->price }}</h5>
                                    <h6 class="text-muted ml-2"><del>{{ $uml->price + 30 }}</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>({{ $uml->view_count }})</small>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>

    </div>
    <!-- Products End -->


@endsection

@section('script')
    <script>
        $(document).ready(() => {
            $('#addCartBtn').click(() => {
                $info = {
                    'count': $('#orderCount').val(),
                    'userID': $('#userID').val(),
                    'pizzaID': $('#pizzaID').val(),
                };

                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/user/ajax/cart',
                    data: $info,
                    dataType: 'json',
                    success: (res) => {
                        if (res.status == 'success') {
                            window.location.href = 'http://localhost:8000/user/home';
                        }
                    }
                })

            });



        });
    </script>

@endsection
