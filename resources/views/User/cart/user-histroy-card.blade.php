@extends('User.layout.user-master')

@section('title', 'Cart')


@section('content')

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 offset-2 table-responsive mb-5" style="height:470px">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Date</th>
                            <th>Order ID</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle" style="cursor: pointer">
                        @foreach ($orders as $order)
                            <tr>
                                <td class="align-middle">{{ $order->created_at->format('j/M - h:i A') }}</td>
                                <td class="align-middle">{{ $order->order_code }}</td>
                                <td class="align-middle">{{ $order->total_price }}</td>

                                @if ($order->status == 0)
                                    <td class="align-middle  text-primary">
                                        Pending <i class="fa-regular fa-clock"></i></td>
                                @elseif($order->status == 1)
                                    <td class="align-middle  text-success">
                                        Confirm <i class="fa-solid fa-square-check"></i>
                                    </td>
                                @else
                                    <td class="align-middle text-danger">
                                        Reject . . <i class="fa-solid fa-triangle-exclamation"></i>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="my-3">
                    {{ $orders->links() }}
                </div>

            </div>



        </div>
    </div>
    <!-- Cart End -->

    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
@endsection


@section('script')

    <script src="{{ asset('user/js/cart.js') }}"></script>

    {{-- <script>
        $('#orderBtn').click(function() {
            $orderList = [];
            $alph = 'ABCDEFGHIJ';
            $al = $alph[Math.floor(Math.random() * $alph.length)];
            $orderCode = Math.floor(Math.random() * (1 + 9999));
            $('#cartTable tr').each(function(index, row) {
                $orderList.push({
                    'user_id': $(row).find('#user_id').val(),
                    'product_id': $(row).find('#product_id').val(),
                    'quantity': $(row).find('#quantity').val(),
                    'total': $(row).find('#hide').val(),
                    'order_code': $orderCode + '_Order_Uid:' + $('#user_id').val() + '_' + $al,
                })
            });
            // console.log($orderList);
            $.ajax({
                type: 'get',
                url: '/ajax/order',
                data: Object.assign({}, $orderList),
                dataType: 'json',
                success: function(res) {
                    console.log(res.status);
                    if (res.status == true) {
                        window.location.href = '/user/home'
                    }
                }
            })

        })
    </script> --}}


@endsection
