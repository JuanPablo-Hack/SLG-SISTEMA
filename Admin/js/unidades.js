function fnFormatDetails(oTable, nTr) {
  var aData = oTable.fnGetData(nTr);
  var sOut =
    '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
  sOut += "<tr><td>Modelo:</td><td>" + aData[1] + "</td></tr>";
  sOut += "<tr><td>Año:</td><td>" + aData[6] + "</td></tr>";
  sOut += "<tr><td>Color:</td><td>" + aData[7] + "</td></tr>";
  sOut += "<tr><td>Placas:</td><td>" + aData[2] + "</td></tr>";
  sOut += "<tr><td>No. Economico:</td><td>" + aData[8] + "</td></tr>";
  sOut += "<tr><td>Capacidad:</td><td>" + aData[3] + "</td></tr>";
  sOut += "<tr><td>Tipo de unidad:</td><td>" + aData[5] + "</td></tr>";
  sOut += "<tr><td>Tipo Combustible:</td><td>" + aData[4] + "</td></tr>";
  sOut += "<tr><td>Serie:</td><td>" + aData[9] + "</td></tr>";
  sOut += "<tr><td>Descripción:</td><td>" + aData[10] + "</td></tr>";
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
function eliminarUnidad(id) {
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
        data.append("accion", "eliminar");
        fetch("php/unidad_controller.php", {
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
              setTimeout(function () {
                location.reload();
              }, 3000);
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
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("FormUnidad").addEventListener("submit", crearUnidad);
});
async function crearUnidad(e) {
  e.preventDefault();
  var form = document.getElementById("FormUnidad");
  let data = new FormData(form);
  data.append("accion", "agregar");
  fetch("php/unidad_controller.php", {
    method: "POST",
    body: data,
  })
    .then((result) => result.text())
    .then((result) => {
      if (result == 1) {
        document.getElementById("success").style.display = "inherit";
        document.getElementById("wrong").style.display = "none";
        setTimeout(function () {
          location.reload();
        }, 2000);
      } else {
        document.getElementById("success").style.display = "none";
        document.getElementById("wrong").style.display = "inherit";
      }
    });
}
