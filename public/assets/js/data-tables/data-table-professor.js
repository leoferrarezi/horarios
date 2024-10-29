(function ($) {
  "use strict";
  $(function () {
    $("#listagem-professor").DataTable({
      aLengthMenu: [
        [5, 10, 15, -1],
        [5, 10, 15, "Todos"],
      ],
      iDisplayLength: 10,
      language: {
        search: "",
        url: dataTableLangUrl,
      },
    });
    $("#order-listing").each(function () {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable
        .closest(".dataTables_wrapper")
        .find("div[id$=_filter] input");
      search_input.attr("placeholder", "Search");
      search_input.removeClass("form-control-sm");
      // LENGTH - Inline-Form control
      var length_sel = datatable
        .closest(".dataTables_wrapper")
        .find("div[id$=_length] select");
      length_sel.removeClass("form-control-sm");
    });
  });
})(jQuery);
