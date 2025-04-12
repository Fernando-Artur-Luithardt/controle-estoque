$(document).ready(function() {
    $(document).on('click', '.move_product_trash', function() {
        const id = $(this).attr('id')
        axios.post(`/product/trash/${id}`, {
            active: false
        }).then(response => {
            location.reload()
        }).catch(error => {
        
            });
    })
})