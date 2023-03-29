$(document).ready(function () {
  $(".sidebar-link").click(function (event) {
    event.preventDefault();
    var view = $(this).data("view");
    $.get(view + ".php", function (data) {
      $("#content").html(data);
    });
  });
});

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
