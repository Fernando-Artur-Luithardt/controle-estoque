$(document).ready(function() {
    $(document).on('click', '.active_product', function() {
        restauraProduto($(this).attr('id'))
    })
    function restauraProduto(id) {
        Swal.fire({
            title: "Deseja ativar o produto?",
            showDenyButton: true,
            confirmButtonText: "Sim",
            denyButtonText: 'Não'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.showLoading();
                axios.post(`/product/trash/${id}`, {
                    active: true
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