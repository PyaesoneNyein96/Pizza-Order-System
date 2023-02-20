$(document).ready(() => {
    // Plus
    $('.btn-plus').click(function () {
        $parentNode = $(this).parents('tr');
        calculation();

        // $total Summary
        summary()
    })
    // Minus
    $('.btn-minus').click(function () {
        $parentNode = $(this).parents('tr');
        calculation();
        // $total Summary
        summary()
    });


    // Remove Each One
    $('.removeBtn').click(function () {
        $parentNode = $(this).parents('tr');

        $id = $parentNode.find('#card_id').val();
        console.log($id);
        $.ajax({
            type: 'get',
            url: 'http://localhost:8000/ajax/each/remove',
            data: { 'id': $id },
            dataType: 'json',
        })
        $parentNode.remove();
        // $total Summary
        $subTotal = 0;
        summary();

    });

    function summary() {
        $subTotal = 0;
        $('#cartTable tr').each(function (i, row) {
            $subTotal += Number($(row).find('#hide').val());
        })
        $('#subtotal').html(`${$subTotal} Kyats`);
        if ($subTotal == 0) {
            $('#final').html(`${$subTotal} Kyats`);
        } else {
            $('#final').html(`${$subTotal + 100} Kyats`);
        }
    }

    function calculation() {
        $Qty = parseInt($parentNode.find('#quantity').val());
        $price = Number($parentNode.find('#dbPrice').html().replace('Kyats', ''));
        $total = $Qty * $price;
        $parentNode.find('#total').html($total + ' ' + 'Kyats');
        $parentNode.find('#hide').val($total);
    }

})
