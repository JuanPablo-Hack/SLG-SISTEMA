/* Formating function for row details */
function fnFormatDetails(oTable, nTr) {
  var aData = oTable.fnGetData(nTr);
  var sOut =
    '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
  sOut += "<tr><td>Fecha:</td><td>" + aData[17] + "</td></tr>";
  sOut += "<tr><td>Tipo de unidad:</td><td>Propia</td></tr>";
  sOut += "<tr><td>Unidad:</td><td>" + aData[1] + "</td></tr>";
  sOut += "<tr><td>Tipo de servicio:</td><td>" + aData[6] + "</td></tr>";
  sOut += "<tr><td>Tipo de carga:</td><td>" + aData[2] + "</td></tr>";
  sOut += "<tr><td>Tipo de contenedor:</td><td>" + aData[7] + "</td></tr>";
  sOut += "<tr><td>No.contenedores:</td><td>" + aData[18] + "</td></tr>";
  sOut += "<tr><td>Operador:</td><td>" + aData[3] + "</td></tr>";
  sOut +=
    '<tr><td>DEC:</td><td><a href="../viajes/locales/' +
    aData[17] +
    "/" +
    aData[8] +
    '" target="_blank" rel="noopener noreferrer"> <i class="fa fa-file"></i></a></td></tr>';
  sOut += "<tr><td>Terminal:</td><td>" + aData[4] + "</td></tr>";
  sOut += "<tr><td>Peso neto:</td><td>" + aData[9] + "</td></tr>";
  sOut += "<tr><td>Peso tara:</td><td>" + aData[10] + "</td></tr>";
  sOut += "<tr><td>Peso bruto:</td><td>" + aData[11] + "</td></tr>";
  sOut += "<tr><td>Destino:</td><td>" + aData[12] + "</td></tr>";
  sOut += "<tr><td>Naviera:</td><td>" + aData[13] + "</td></tr>";
  sOut +=
    '<tr><td>EIR:</td><td><a href="../viajes/locales/' +
    aData[17] +
    "/" +
    aData[14] +
    '" target="_blank" rel="noopener noreferrer"> <i class="fa fa-file"></i></a></td></tr>';
  sOut +=
    "<tr><td>Fecha de inicio de estadias:</td><td>" + aData[15] + "</td></tr>";
  sOut +=
    "<tr><td>Fecha de termino de estadias:</td><td>" + aData[16] + "</td></tr>";
  sOut += "</table>";

  return sOut;
}

$(document).ready(function () {
  /*
   * Insert a 'details' column to the table
   */
  var nCloneTh = document.createElement("th");
  var nCloneTd = document.createElement("td");
  nCloneTd.innerHTML =
    '<img src="../assets/lib/advanced-datatable/images/details_open.png">';
  nCloneTd.className = "center";

  $("#hidden-table-info thead tr").each(function () {
    this.insertBefore(nCloneTh, this.childNodes[0]);
  });

  $("#hidden-table-info tbody tr").each(function () {
    this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
  });

  /*
   * Initialse DataTables, with no sorting on the 'details' column
   */
  var oTable = $("#hidden-table-info").dataTable({
    aoColumnDefs: [
      {
        bSortable: false,
        aTargets: [0],
      },
    ],
    aaSorting: [[1, "asc"]],
  });

  /* Add event listener for opening and closing details
   * Note that the indicator for showing which row is open is not controlled by DataTables,
   * rather it is done here
   */
  $("#hidden-table-info tbody td img").live("click", function () {
    var nTr = $(this).parents("tr")[0];
    if (oTable.fnIsOpen(nTr)) {
      /* This row is already open - close it */
      this.src = "../assets/lib/advanced-datatable/images/details_open.png";
      oTable.fnClose(nTr);
    } else {
      /* Open this row */
      this.src = "../assets/lib/advanced-datatable/images/details_close.png";
      oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), "details");
    }
  });
});
function eliminarViaje(id) {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-danger",
    },
    buttonsStyling: false,
  });

  swalWithBootstrapButtons
    .fire({
      title: "Estas seguro?",
      text: "¡No podrás revertir esto!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Si, eliminar",
      cancelButtonText: "No, cancelar!",
      reverseButtons: true,
    })
    .then((result) => {
      if (result.isConfirmed) {
        let data = new FormData();
        data.append("id", id);
        data.append("accion", "eliminar_viajelocal");
        fetch("php/viajes_controller.php", {
          method: "POST",
          body: data,
        })
          .then((result) => result.text())
          .then((result) => {
            if (result == 1) {
              swalWithBootstrapButtons.fire(
                "Eliminado!",
                "Su archivo ha sido eliminado.",
                "success"
              );
              setTimeout(function () {
                location.reload();
              }, 3000);
            } else {
              swalWithBootstrapButtons.fire(
                "Error",
                "Hemos tenido un error a la base de datos o la conexión.",
                "error"
              );
              //   setTimeout(function () {
              //     location.reload();
              //   }, 3000);
            }
          });
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          "Cancelado",
          "Tu archivo ha sido salvado",
          "error"
        );
      }
    });
}
