jQuery(document).ready(function ($) { 

  $("#slides").superslides({
    play: 5000,
    pagination: true
  });

  $(".btn-open").on("click", function() {
    $("nav").css("left", "0%");
  });

  $(".btn-close").on("click", function() {
    $("nav").css("left", "-100%");
  });

  //************* Funciones para enlaces en footer
  function RequestDomains(value) {
    let address = document.location.origin + "/vpsite/links/enlaces.php";
    window.jQuery.ajax({
      url: address,
      method: "GET",
      data: { action: "GetLinks", value: value },
      success: response => {
        $("#response")
          .hide()
          .html(response)
          .fadeIn("800");
      }
    });
  }

  $("#changeLinks").on("change", function() {
    let value = $("#changeLinks").val();
    RequestDomains(value);
    if ($("#hide").hasClass("show")) {
      $("#hide").removeClass("show");
      $("#hide").addClass("hide");
      $("#show").removeClass("hide");
      $("#show").addClass("show");
      $("#response").css("max-height", "250px");
    }
  });

  // Para llenar la seccion con contenido la primera vez.
  let value = $("#changeLinks").val();
  RequestDomains(value);

  $("#show").on("click", function(e) {
    if ($(e.target).hasClass("show")) {
      $(e.target).removeClass("show");
      $(e.target).addClass("hide");
      $("#hide").removeClass("hide");
      $("#hide").addClass("show");
      $("#response").css("max-height", "10000px");
    }
  });
  $("#hide").on("click", function(e) {
    if ($(e.target).hasClass("show")) {
      $(e.target).removeClass("show");
      $(e.target).addClass("hide");
      $("#show").removeClass("hide");
      $("#show").addClass("show");
      $("#response").css("max-height", "250px");
    }
  });

});
