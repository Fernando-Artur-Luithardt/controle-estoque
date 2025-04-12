$(document).ready(function() {
    $(document).on('click', '.move_product_trash', function() {
        removeProduto($(this).attr('id'));
    });

    function removeProduto(id) {
        Swal.fire({
            title: "Deseja remover o produto?",
            showDenyButton: true,
            confirmButtonText: "Sim",
            denyButtonText: 'Não'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.showLoading();
                axios.post(`/product/trash/${id}`, {
                    active: false
                }).then(response => {
                    Swal.close();
                    location.reload();
                }).catch(error => {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        text: 'Erro ao remover o produto!',
                    });
                });
            }
        });
    }
})