$(document).ready(function() {
    $(document).on('click', '.active_product', function() {
        const id = $(this).attr('id')

        axios.post(`/product/trash/${id}`, {
            active: true
        }).then(response => {
            location.reload()
        }).catch(error => {
        
            });
    })
})