(function($) {    
    $(function() {  
      $("#cadastroDisciplina").validate({
        submitHandler: function(form) {
            alert("submitted!");
          //  form.submit();
          },
        rules: {
          nome: "required",
          codigo: {
            digits: true,
            required: true
          },
          carga_horaria: {
            digits: true,
            required: true
          },
          maximo_tempo: {
            digits: true,
            required: false
          },
          periodo: {
            digits: true,
            required: true
          },
          abreviatura: {
            required: false
          },
          ambiente: {
            digits: false,
            required: false
          },
        messages: {
          nome: "Campo Obrigatório",
          codigo: {
            required: "Campo Obrigatório",
            digits: "Este campo aceita somente números"
          },
          carga_horaria:{
            digits: "Este campo aceita somente números",
            required: "Campo Obrigatório" 
          },
          maximo_tempo:{
            required: false 
          },
          periodo:{
            digits: "Este campo aceita somente números",
            required: "Campo Obrigatório"
          }
          },
          ambiente:{
            required: "Campo Obrigatório"    
          } 
        },

        errorPlacement: function(label, element) {
          label.addClass('mt-2 text-danger');
          label.insertAfter(element);
        },
        highlight: function(element, errorClass) {
          $(element).parent().addClass('has-danger')
          $(element).addClass('form-control-danger')
          $(element).removeClass('form-control-success')
        },
        unhighlight: function(element, errorClass) {
          $(element).parent().removeClass('has-danger')
          $(element).addClass('form-control-success')
          $(element).removeClass('form-control-danger')
        }
      });
    });

  })(jQuery);