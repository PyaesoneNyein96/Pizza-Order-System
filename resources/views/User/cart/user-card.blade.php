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


                                <td class="align-middle" id='total'>{{ $cart->productPrice * $cart->quantity }}Kyats
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
            </div>


            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                        Summary</span></h5>
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
                            <h5 class="text-success" id='final'>{{ $total + 200 }} Kyats</h5>
                        </div>
                        <button class="btn btn-block btn-outline-primary font-weight-bold my-3 py-3">Proceed To
                            Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
@endsection


@section('script')

    <script>
        $(document).ready(() => {
            // Plus
            $('.btn-plus').click(function() {
                $parentNode = $(this).parents('tr');
                calculation();

                // $total Summary
                summary()
            })
            // Minus
            $('.btn-minus').click(function() {
                $parentNode = $(this).parents('tr');
                calculation();
                // $total Summary
                summary()
            });


            // Remove
            $('.removeBtn').click(function() {
                $parentNode = $(this).parents('tr');
                $parentNode.remove();
                // $total Summary
                $subTotal = 0;
                summary();

            });

            function summary() {
                $subTotal = 0;
                $('#cartTable tr').each(function(i, row) {
                    $subTotal += Number($(row).find('#hide').val());
                })
                $('#subtotal').html(`${$subTotal} Kyats`);
                $('#final').html(`${$subTotal + 100} Kyats`);
            }

            function calculation() {
                $Qty = parseInt($parentNode.find('#quantity').val());
                $price = Number($parentNode.find('#dbPrice').html().replace('Kyats', ''));
                $total = $Qty * $price;
                $parentNode.find('#total').html($total + ' ' + 'Kyats');
                $parentNode.find('#hide').val($total);
            }

        })
    </script>


@endsection
