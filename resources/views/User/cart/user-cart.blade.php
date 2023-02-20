@extends('User.layout.user-master')

@section('title', 'Cart')


@section('content')

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products Image</th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle" id="cartTable">

                        @foreach ($carts as $cart)
                            <tr>
                                <td class="align-middle"><img src="{{ asset('storage/product/' . $cart->img) }}"
                                        class="img-thumbnail" style="width: 70px; height:70px; object-fit:cover">

                                </td>
                                <td class="align-middle"> {{ $cart->productName }}</td>

                                {{-- Hidden Value  --}}
                                {{-- <td class="align-middle"> --}}
                                <input type="hidden" id="product_id" value="{{ $cart->product_id }}">
                                <input type="hidden" id="user_id" value="{{ $cart->user_id }}">
                                <input type="hidden" id="card_id" value="{{ $cart->id }}">
                                {{-- </td> --}}

                                {{-- Hidden Value  --}}

                                <td class="align-middle text-success" id="dbPrice">{{ $cart->productPrice }}Kyats
                                </td>

                                <td class="align-middle">

                                    <div class="input-group quantity mx-auto d-flex align-items-center"
                                        style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-warning btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>

                                        <input type="text" id="quantity" disabled
                                            class="form-control form-control-sm bg-light border-3 mx-1 p-1 text-center"
                                            value="{{ $cart->quantity }}">

                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-warning btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>

                                        <input type="hidden" id="hide"
                                            value="{{ $cart->productPrice * $cart->quantity }}">
                                    </div>
                                </td>


                                <td class="align-middle" id='total'>{{ $cart->productPrice * $cart->quantity }} Kyats
                                </td>


                                <td class="align-middle">
                                    <button class="btn btn-sm btn-danger removeBtn">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($carts->isEmpty())
                    <div class="bg-secondary rounded p-4 text-center shadow-sm">
                        <span class="text-light h5">
                            There is no Cart items yet!
                        </span>
                    </div>
                @endif
            </div>


            <div class="col-lg-4">
                <div class="wrap m-0 p-0 shadow" style="position:sticky !important; top:100px !important">
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-light shadow p-2 mx-2">
                            Cart Summary
                        </span>
                    </h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6 id='subtotal'class="text-success"> {{ $total }} Kyats</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">$100</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5 class="text-success" id='final'>{{ $total != 0 ? $total + 100 : $total }} Kyats
                                </h5>
                            </div>
                            <button id="orderBtn" class="btn btn-block btn-outline-primary font-weight-bold my-3 py-3">
                                Proceed To Checkout
                            </button>
                            <button id="clearBtn" class="btn btn-block btn-danger font-weight-bold my-3 py-2">
                                Cancel ALL
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
@endsection


@section('script')

    <script src="{{ asset('user/js/cart.js') }}"></script>

    <script>
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
                    'order_code': $orderCode + '_' + $al + '_Order_Uid:' + $('#user_id').val(),
                })
            });
            // console.log($orderList);
            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/ajax/order',
                data: Object.assign({}, $orderList),
                dataType: 'json',
                success: function(res) {
                    console.log(res.status);
                    if (res.status == true) {
                        window.location.href = 'http://localhost:8000/user/home'
                    }
                }
            })

        });

        // Clear Cart Process

        $('#clearBtn').click(function() {
            // Ajax
            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/ajax/clearCart',
                dataType: 'json',
            });

            $parentNote = $('#cartTable');
            $parentNote.remove();
            $('#subtotal').html('0');
            $('#final').html('0');
        });

        //  Remove cart item Each one
    </script>


@endsection
