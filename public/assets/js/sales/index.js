$(document).ready(function() {
    $(document).on('change', '[name="product_id"]', getDadosProduto)
    getDadosProduto();

    //Mostra Dados do Produto selecionado
    function getDadosProduto() {
        const productId = $('[name="product_id"]').val()

        axios.get(`/products/get/${productId}`)
            .then(response => {
            const product = response.data;

                $('[name="price"]').val(product.price)
                $('#span_amount').html('(limite: ' + product.inventory_level + ')')
            })
            .catch(error => {
        
            });
    }


    $(document).on('change', '[name="amount"]', totalAmount)
    $(document).on('change', '[name="price"]', totalAmount)
    function totalAmount() {
        const amount = parseFloat($('[name="amount"]').val());
        const price = parseFloat($('[name="price"]').val());
        const totalAmountInput = $(document).find('#total_amount');

        console.log(!isNaN(amount) && !isNaN(price))
        totalAmountInput.val('');
        if (!isNaN(amount) && !isNaN(price)) {
            const total = amount * price;
            const totalComDuasCasas = total.toFixed(2);
            console.log(totalComDuasCasas)
            totalAmountInput.val(totalComDuasCasas);
        }
    }
})