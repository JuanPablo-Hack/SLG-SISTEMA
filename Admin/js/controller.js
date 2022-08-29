// Funciones que definen la funcionalidad de los ingresos de mercancia
async function formIngresoMercancia(e) {
    e.preventDefault();
    var form = document.getElementById("formIngresoMercancia");
    const image = miCanvas.toDataURL("image/png");

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
    });
    swalWithBootstrapButtons
        .fire({
            title: "Estas seguro que la información es la correcta?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, agregar actividad",
            cancelButtonText: "No, cancelar!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.isConfirmed) {
                let data = new FormData(form);
                data.append("accion", "agregar");
                data.append("firma", image);
                fetch("php/almacen_controller.php", {
                        method: "POST",
                        body: data,
                    })
                    .then((result) => result.text())
                    .then((result) => {
                        if (result == 1) {
                            swalWithBootstrapButtons.fire(
                                "Agregado!",
                                "La actividad ha sido agregado en la base de datos.",
                                "success"
                            );
                            form.reset();
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            swalWithBootstrapButtons.fire(
                                "Error",
                                "Hemos tenido un error a la base de datos o la conexión.",
                                "error"
                            );
                            // form.reset();
                            // setTimeout(function() {
                            //     location.reload();
                            // }, 2000);
                        }
                    });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    "Cancelado",
                    "Revise su información de nuevo",
                    "error"
                );
            }
        });
}