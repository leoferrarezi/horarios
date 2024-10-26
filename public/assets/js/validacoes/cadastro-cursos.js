(function ($) {
    $(function () {
      $("#cadastroCursos").validate({
        submitHandler: function (form) {
          form.submit();
        },
        rules: {
          nome: "required",
        },
        messages: {
          nome: "Campo Obrigatório",
        },
        errorPlacement: function (label, element) {
          label.addClass('mt-2 text-danger');
          label.insertAfter(element);
        },
        highlight: function (element, errorClass) {
          $(element).parent().addClass('has-danger')
          $(element).addClass('form-control-danger')
          $(element).removeClass('form-control-success')
        },
        unhighlight: function (element, errorClass) {
          $(element).parent().removeClass('has-danger')
          $(element).addClass('form-control-success')
          $(element).removeClass('form-control-danger')
        }
      });
    });
  })(jQuery);