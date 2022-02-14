(function ($) {
  $(document).ready(function () {
    $(document).on("click", ".category__item > a ", function (e) {
      e.preventDefault();

      var category = $(this).data("category");
      $("a.active").removeClass("active").addClass("static");
      $(this).removeClass("static").addClass("active");
      $.ajax({
        url: wpAjax.ajaxUrl,
        data: { action: "filter", category: category },
        type: "post",
        success: function (result) {
          // setTimeout(alert("You got posts"), [1000]);
          $(".post__filter").html(result);
        },
        error: function (result) {
          console.warn(result);
        },
      });
    });
  });
})(jQuery);
