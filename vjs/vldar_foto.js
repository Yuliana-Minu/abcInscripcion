function validar_foto(){
    
	$("#formFoto").validate({
		rules: {
			
		},

		messages:{

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
			
            var url_direccion = $('#url_direccion').val();
            var formulario = $('#formFoto')[0];
            
            var data_enviar = new FormData(formulario);

            document.getElementById('botonGuardar').disabled=true;
			$('#carga_guardar').fadeIn(1);
		
			$.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: 'crudfoto',
                data: data_enviar,
                cache: false,
                contentType: false,
                processData: false, 
                success: function (data, status) {
                    location.href = url_direccion;
                    $('#frmModal').modal('hide');
                },
                error: function (e) {
                    alert("Error en el Proceso");
                }
            });
			
            return false; 
		
		}
	});
	
}

