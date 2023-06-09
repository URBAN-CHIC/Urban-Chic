//eliminar

$(document).on("click", ".btn-eliminar", function () {
  if (confirm("¿Está seguro que desea eliminar este registro?")) {
    var id = $(this).data("id");
    $.ajax({
      url: "../back/users.php",
      type: "POST",
      data: { id: id },
      success: function (data) {
        alert("Usuario eliminado correctamente.");
        location.reload();
      },
      error: function () {
        alert("Ocurrió un error al eliminar el registro.");
      },
    });
  }
});

//editar

$(document).ready(function () {
  $(".btn-editar").click(function (event) {
    event.preventDefault();
    var id = $(this).data("id");
    window.location.href = "../back/editaruser.php?id=" + id;
  });
});

//Tiempo de sesion



// Productos

//eliminar

$(document).on("click", ".eliminar-producto", function () {
  if (confirm("¿Está seguro que desea eliminar este registro?")) {
    var id = $(this).data("id");
    $.ajax({
      url: "../back/products.php",
      type: "POST",
      data: { id: id },
      success: function (data) {
        alert("Producto eliminado correctamente.");
        location.reload();
      },
      error: function () {
        alert("Ocurrió un error al eliminar el registro.");
      },
    });
  }
});

//editar

$(document).ready(function () {
  $(".editar-producto").click(function (event) {
    event.preventDefault();
    var id = $(this).data("id");
    window.location.href = "../back/editarproductos.php?id=" + id;
  });
});

//agregar

$(document).ready(function () {
  $(".agregar-producto").click(function (event) {
    event.preventDefault();
    var id = $(this).data("id");
    window.location.href = "../back/addProduct.php?id=" + id;
  });
});
