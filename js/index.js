$(document).ready(function () {
  $(".sidebar-link").click(function (event) {
    event.preventDefault();
    var view = $(this).data("view");
    $.get(view + ".php", function (data) {
      $("#content").html(data);
    });
  });
});





var button1 = document.getElementById("buttoni");

button1.addEventListener("click", function() {
  location.href = "../views/urbanChics.html";
});