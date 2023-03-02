@extends('admin.admin-master')

@section('title', 'Main-Dashboard')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Admin Dashboard</h2>

                        </div>
                    </div>
                </div>
                <div class="row m-t-25">


                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c5">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="fa-solid fa-signal"></i>
                                    </div>
                                    <div class="text">
                                        <h2>Good</h2>
                                        <span>Status</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChar1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{ $user->count() }}</h2>
                                        <span>Customers</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">

                                        <i class="zmdi zmdi-shopping-cart"></i>

                                    </div>
                                    <div class="text">
                                        <h2>{{ $order->count() }}</h2>
                                        <span>Total Orders</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart4"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        {{-- <i class="fa-solid fa-clipboard-list"></i> --}}
                                        <i class="fa-solid fa-comment-dots"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{ $contact->count() }}</h2>
                                        <span>Messages</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c6">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        {{-- <i class="fa-solid fa-clipboard-list"></i> --}}
                                        <i class="fa-solid fa-box-archive"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{ $product->count() }}</h2>
                                        <span>Total Products</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c6">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        {{-- <i class="fa-solid fa-clipboard-list"></i> --}}
                                        <i class="fa-solid fa-list-check"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{ $category->count() }}</h2>
                                        <span>Categories</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>


            </div>
        </div>
    </div>


@endsection
