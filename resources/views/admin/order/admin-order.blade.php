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
                                <select id="orderStatus" class="form-select form-select-sm shadow-none">
                                    <option value="0">Pending</option>
                                    <option value="1">Confirm</option>
                                    <option value="2">Reject</option>
                                    <option value="all" selected>All</option>
                                </select>
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
                                        <th> Detail</th>


                                    </tr>
                                </thead>
                                <tbody id="orderList">
                                    @foreach ($orders as $order)
                                        <tr class="tr-shadow" title="{{ $order->name }}">

                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td>{{ $loop->index + $orders->firstItem() }}</td> --}}
                                            {{-- <td>{{ $loop->iteration + $orders->firstItem() }}</td> --}}

                                            <input type="hidden" id="order_id" value="{{ $order->id }}">

                                            <td>
                                                <span>{{ $order->user_name }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $order->order_code }}</span>
                                            </td>

                                            <td>
                                                <span class="text-success"> {{ $order->total_price }} .00$</span>
                                            </td>
                                            <td>
                                                <select class="form-select form-select-sm shadow-none" id="statusChange">

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
                                            <td class="text-end">
                                                <a href="">
                                                    <i class="fa-solid fa-circle-info fa-2xl text-primary "></i>
                                                </a>
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

            $('#orderStatus').change(function() {
                $status = $('#orderStatus').val();

                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/admin/order/ajax/status',
                    data: {
                        'status': $status
                    },
                    dataType: 'json',
                    success: (res) => {
                        $list = '';
                        for ($i = 0; $i < res.length; $i++) {

                            $months = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July',
                                'Aug', 'Spet', 'Oct', 'Nov', 'Dec'
                            ];
                            $dbDate = new Date(res[$i].created_at);
                            $finalDate = $months[$dbDate.getMonth()] + '-' + $dbDate.getDate() +
                                '-' + $dbDate.getFullYear();

                            $list +=
                                `
                                <tr class="tr-shadow">
                                    <td> ${$i +1 } </td>
                                    <td>
                                        <span> ${res[$i] . user_name} </span>
                                    </td>
                                    <td>
                                        <span>${res[$i].order_code}</span>
                                    </td>

                                    <td>
                                        <span class="text-success"> ${res[$i].total_price} .00$</span>
                                    </td>
                                    <td>
                                        <select name="status" class="form-select form-select-sm shadow-none">

                                            <option value="0" class="text-primary" ${res[$i].status == 0 ? 'selected' : '' } >
                                                pending
                                            </option>

                                            <option value="1" class="text-success"  ${res[$i].status == 1 ? 'selected' : '' } >
                                                confirm
                                            </option>

                                            <option value="2" class="text-danger" ${res[$i].status == 2 ? 'selected' : '' }>
                                                Reject
                                            </option>
                                        </select>
                                    </td>

                                    <td>
                                        <span> ${$finalDate}  </span>

                                    </td>
                                    <td class="text-end">
                                        <a href="">
                                            <i class="fa-solid fa-circle-info fa-2xl text-secondary "></i>
                                        </a>
                                    </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                            `;
                            $('#orderList').html($list)
                        }
                        // for loop end
                    }
                })
                // ajax end

            })
            // filter status


            // start status Change
            $('#statusChange').change(function() {
                $val = $(this).val();
                console.log($val);

            })


        })
    </script>


@endsection