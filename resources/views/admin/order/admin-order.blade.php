@extends('admin.admin-master')

@section('title', 'Admin-Order')


@section('content')


    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Order List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">

                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>



                    <div class="table-responsive table-responsive-data2 text-center">
                        <div class="d-flex row justify-content-between align-items-center">
                            <div class="col-md-5 col-6 total text-start">
                                Total Orders : <span class="badge badge-pill px-2 rounded-circle h5 bg-info">
                                    {{-- {{ $orders->total() }} --}}
                                    {{ $orders->count() }}
                                </span>
                                <div> Search Key :
                                    <span class="text-danger">
                                        {{ request('searchValue') }}
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-2">

                                <div class="dropdown">
                                    <button class="btn btn-light shadow-sm text-secondary dropdown-toggle btn-sm"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ request()->status == 'all' ? 'All Status' : '' }}
                                        {{ request()->status == 0 ? 'Pending' : '' }}
                                        {{ request()->status == 1 ? 'Confirm' : '' }}
                                        {{ request()->status == 2 ? 'Reject' : '' }}

                                    </button>
                                    <ul class="dropdown-menu sort-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin@switchStatus', ['status' => 'all']) }}">All</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin@switchStatus', ['status' => 0]) }}">Pending</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin@switchStatus', ['status' => 1]) }}">Confirm</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin@switchStatus', ['status' => 2]) }}">Reject</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-5 col-6 searching">
                                <form action="{{ route('admin@orderList') }}" method="get" class="d-flex">
                                    <input type="text" class="shadow-none rounded form-control form-control-sm"
                                        value="{{ request('searchValue') }}" name="searchValue" title="Search here !"
                                        placeholder="Search . . .">

                                    <button type="submit" class="btn btn-outline-info rounded-circle mx-2 bg-dark"><i
                                            class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                    <a href="{{ route('admin@orderList') }}" class="btn btn-success"> Clear </a>
                                </form>
                            </div>


                        </div>
                        <hr>
                        <div class="sms-wrap">
                            @if (session('success'))
                                <div class="col-md-5 float-end alert alert-success alert-dismissible fade show"
                                    role="alert">
                                    <span class="text-success small">{{ session('success') }} <i class="fa fa-check"
                                            aria-hidden="true"></i></sp>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('delMsg'))
                                <div class="col-md-5 float-end alert alert-warning alert-dismissible text-center fade show"
                                    role="alert">
                                    <span class="text-success small">{{ session('delMsg') }}
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('updateMsg'))
                                <div class="col-md-5 float-end alert alert-warning alert-dismissible text-center fade show"
                                    role="alert">
                                    <span class="text-success small">{{ session('updateMsg') }}
                                        {{-- <i class="fas fa-check-double"></i>
                                    <i class="fab fa-check-double    "></i> --}}
                                    </span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>


                        @if (!$orders->isEmpty())
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th> No</th>
                                        <th> Order Users</th>
                                        <th> Order Code</th>
                                        <th> Total Amount</th>
                                        <th> Status</th>
                                        <th> Date</th>



                                    </tr>
                                </thead>
                                <tbody id="orderList">
                                    @foreach ($orders as $order)
                                        <tr class="tr-shadow" title="{{ $order->name }}">

                                            <td>{{ $loop->iteration }}</td>

                                            <input type="hidden" class="order_id" value="{{ $order->id }}">

                                            <td>
                                                <span>{{ $order->user_name }}</span>
                                            </td>

                                            <td title="click to View Detail">
                                                <a href="{{ route('admin@orderDetail', ['code' => $order->order_code]) }}"
                                                    class="text-decoration-none O_code">
                                                    <span class="d-flex align-items-center">
                                                        {{ $order->order_code }}
                                                    </span>
                                                </a>
                                            </td>

                                            <td>
                                                <span class="text-success"> {{ $order->total_price }} .00$</span>
                                            </td>
                                            <td>
                                                <select class="form-select form-select-sm shadow-none statusChange">

                                                    <option value="0" class="text-primary"
                                                        @selected($order->status == 0)>
                                                        pending
                                                    </option>

                                                    <option value="1" class="text-success"
                                                        @selected($order->status == 1)>
                                                        confirm
                                                    </option>

                                                    <option value="2" class="text-danger" @selected($order->status == 2)>
                                                        Reject
                                                    </option>
                                                </select>
                                            </td>

                                            <td>
                                                <span> {{ $order->created_at->format('j - M -Y') }} </span>

                                            </td>

                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="paginate">
                                {{-- {{ $data->links() }} --}}
                                {{-- {{ $orders->appends(request()->query())->links() }} --}}
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

@section('script')
    <script>
        $(document).ready(function() {


            // start status Change
            $('.statusChange').change(function() {
                $status = $(this).val();
                $parent = $(this).parents('tr');
                $val = $parent.find('.order_id').val();

                $data = {
                    'id': $val,
                    'status': $status
                }
                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/admin/order/ajax/status/change',
                    data: $data,
                    dataType: 'json',
                })

            })


        })
    </script>


@endsection
