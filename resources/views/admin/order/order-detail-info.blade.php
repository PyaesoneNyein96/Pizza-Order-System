@extends('admin.admin-master')
@section('title', 'order-detail')


@section('content')


    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Order Detail Info</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            {{-- <a href="{{ route('admin@createProductPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add Product
                                </button>
                            </a> --}}
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>



                    <div class="table-responsive table-responsive-data2 text-center">

                        <div class="user-info-wrap ">

                            <div class="row align-items-center d-flex justify-content-start">
                                {{-- <div class="col-md-3 bg-info shadow-sm p-0 m-0">
                                    @if ($user->user_image == null && $user->user_gender == 'female')
                                        <img src="{{ asset('image/avators/female.jpg') }}" class="detail-user-img">
                                    @elseif($user->user_image == null && $user->user_gender == 'male')
                                        <img src="{{ asset('image/avators/images.jpg') }}" class="detail-user-img">
                                    @else
                                        <img src="{{ asset('storage/' . $user->user_image) }}" class="detail-user-img">
                                    @endif
                                </div> --}}
                                <div class="col-md-7   text-start px-3">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">User Name : <h5 class=" text-secondary d-inline">
                                                {{ strtoupper($user->user_name) }}</h5>
                                        </li>
                                        <li class="list-group-item">Order Code :
                                            <span class="text-primary">
                                                {{ $user->order_code }}
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            Order Date : {{ $user->created_at->format('j-M-Y') }}
                                            <span
                                                class="d-block small text-muted">-{{ $user->created_at->diffForHumans() }}</span>
                                        </li>

                                        <li class="list-group-item">contact : {{ $user->phone }}</li>
                                        <li class="list-group-item">Total Amount : <span
                                                class="text-success">{{ $total->total_price }} .00$</span>
                                            <span class="text-danger small">
                                                (Including transportation charges)
                                            </span>
                                        </li>
                                    </ul>

                                </div>
                            </div>


                        </div>
                        <hr>


                        @if (!$info->isEmpty())
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th> No</th>
                                        <th> Order Users</th>
                                        <th> product Image</th>
                                        <th> product Name</th>
                                        <th> product Quantity</th>
                                        <th> Price per item</th>
                                        <th> Total Amount</th>
                                        {{-- <th> Status</th> --}}
                                        <th> Date</th>



                                    </tr>
                                </thead>
                                <tbody id="orderList">
                                    @foreach ($info as $info_item)
                                        <tr class="tr-shadow" title="{{ $info_item->name }}">

                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td>{{ $loop->index + $info->firstItem() }}</td> --}}
                                            {{-- <td>{{ $loop->iteration + $info->firstItem() }}</td> --}}

                                            <input type="hidden" class="order_id" value="{{ $info_item->id }}">

                                            <td>
                                                <span>{{ $info_item->user_name }}</span>
                                            </td>
                                            <td>
                                                <img class="order-detail-img"
                                                    src="{{ asset('storage/product/' . $info_item->product_image) }}">
                                            </td>
                                            <td>
                                                <span>{{ $info_item->product_name }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $info_item->quantity }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $info_item->total / $info_item->quantity }}
                                                    <span class="text-success"> .00 $ </span>
                                                </span>
                                            </td>

                                            <td>
                                                <span class="text-success"> {{ $info_item->total }} .00$</span>
                                            </td>
                                            {{-- <td>
                                                <select class="form-select form-select-sm shadow-none statusChange">

                                                    <option value="0" class="text-primary"
                                                        @selected($info_item->status == 0)>
                                                        pending
                                                    </option>

                                                    <option value="1" class="text-success"
                                                        @selected($info_item->status == 1)>
                                                        confirm
                                                    </option>

                                                    <option value="2" class="text-danger" @selected($info_item->status == 2)>
                                                        Reject
                                                    </option>
                                                </select>
                                            </td> --}}

                                            <td>
                                                <span> {{ $info_item->created_at->format('j - M -Y') }} </span>

                                            </td>

                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="paginate">
                                {{-- {{ $data->links() }} --}}
                                {{-- {{ $info->appends(request()->query())->links() }} --}}
                            </div>
                        @else
                            <div class="py-3 mt-5 d-flex justify-content-center">
                                <div class="wrap  shadow  w-50 bg-secondary  py-4 rounded d-flex justify-content-center">
                                    <h4 class="w-50 text-light">There is no Orders </h4>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>

@endsection
