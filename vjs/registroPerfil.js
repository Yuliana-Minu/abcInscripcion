/**
 * 23 de Agosto 2020
 * validación formulario persona 
 * TDI AMC
 * 
 * */

function validar_perfilPersona(){

	$("#usuarioform").validate({
		rules: {
			txtalias:{
				required: true,
				minlength: 6,
			},
			
		},

		messages:{
			txtalias:{
				required: "Digite el Nombre del Usuario",
				minlength:"debe ser mayor a 6 caracteres",
			},

		},
		errorPlacement : function(error, element) {
				$(element).closest('.form-group').find('.help-block').html(error.html());
		},
		highlight : function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				$(element).closest('.form-group').find('.help-block').html('');
		},
		submitHandler: function(form){
			
			var url_proceso = $('#url_proceso').val();
			alert(url_proceso);
            
			$.ajax({
                type: "POST",
                url: url_proceso,
                data: $(form).serialize(),
                success: function (data, status) {
                    // ajax done
                    // do whatever & close the modal
					$('#frmModal').modal('hide');
					$("#persona").load("datapersona");
                }
            });		
            return false; 
			
		}
	});


}