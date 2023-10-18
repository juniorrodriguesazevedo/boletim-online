(function () {
    $(".btn-delete").on("click", function (e) {
        var form = $(this).closest("form").first();
        Swal.fire({
            title: "Você tem certeza?",
            text: "Uma vez deletado, você não poderá recuperar esse item novamente!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Sim, deletar!",
        }).then((result) => {
            console.log(result.isConfirmed);
            if (result.isConfirmed) {
                $(form).submit();
            }
        });
    });
})();
