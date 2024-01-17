// JavaScript Document
/*******************************
*	Valida envio el  login     *
*	Creacion 03 de abril 2013  *
*	ANDRES MORENO COLLAZOS     *
********************************/

function validar_asopano(){
	//$("#formulario").validate();


	$("#accesoinscripcionform").validate({
		rules: {
			textUsuario:{
				required: true,
				minlength: 6
			}
		},

		messages:{
			textUsuario:{
				required: "Digite el número de Identificación",
				minlength:"debe ser mayor a 6 caracteres",
			}

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
			
			var user = $('#inputUsuario').val();
			var passwd = $('#inputUsuario').val();

			var oculto_srnm=hex_md5(user);
			var oculto_psswd=hex_sha1(passwd);

			//alert(oculto_srnm + 'ok' + oculto_psswd);

			$.ajax({
				type: "POST",
				url:'acceso',
				data:'user='+oculto_srnm+'&pswd='+oculto_psswd,
				success: function(response)
				{
					response = response.trim();
					//alert(response);
					if(response == 'acceso_ok'){
						window.location.replace('procesoninio?'+user);
					}
					else{
						//alert("nooo "+response);
						$(".error_login").html("<strong>Usuario y/ó Contraseña incorrectas</strong>");
					}
				}
			});		
		//alert(user+'ok'+passwd);
			
		}
	});
}