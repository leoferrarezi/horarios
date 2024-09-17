(function($) {    
    $(function() {  
      $("#cadastroProfessor").validate({
        submitHandler: function(form) {
            alert("submitted!");
          //  form.submit();
          },
        rules: {
          nome: "required",
          siape: {
            minlength: 7,
            digits: true
          },
          email: {
            required: true,
            email: true
          }
        },
        messages: {
          nome: "Campo Obrigatório",
          siape: {
            minlength: "A matrícula deve conter no mínimo 7 (sete) números",
            digits: "Este campo aceita somente números"
          },
          email:{
            email:"Insira um email válido",
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
        }
      });
    });

  })(jQuery);