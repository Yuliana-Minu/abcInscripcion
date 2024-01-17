function validar_formregistropersona(){

    $("#personaform").validate({
        rules: {
            selTipoIdentificacion:{
				selTipoIde: true,
			},
            txtIdentificacion:{
              required: true,
              minlength:3,
            },
            txtNombre:{
              required: true,
              minlength:3,
            },
            txtPrimerApellido:{
              required: true,
              minlength:3,
            },
            radioGenero:{
                required: true,
            },
            selRh:{
                selectRh: true,
            },
            selEstadoCivil:{
                selectEstadoCivil:true, 
            }, 
            selProfesion:{
                selectProfesion:true, 
            },
            txtFechaNacimiento:{
                required:true, 
            },
            SelDepNacimiento:{
                selectDepNace:true, 
            },
            selMunNacimiento:{
                selectMunNace: true,
            },
            txtDireccion:{
                required: true,
            },
            SelDepResidencia:{
                selectDepVive:true, 
            },
            selMunResidencia:{
                selectMunVive: true,
            },
            txtCelularPersonal:{
                required: true,
            },
            radioEstado:{
                required:true,
            }
        },
        messages:{
            txtIdentificacion:{
                required: "Digite número de identificación",
                minlength: "Debe ser mayor a 3 Digitos",
            },
            txtNombre:{
                required: "Digite el Primer Nombre",
                minlength: "Debe ser mayor a 3 caracteres",
            },
            txtPrimerApellido:{
                required: "Digite el Primer Apellido",
                minlength: "Debe ser mayor a 3 caracteres",
            },
            radioGenero:{
                required: "Seleccione genero",
            },
            txtFechaNacimiento:{
                required: "Ingrese la Fecha de Nacimiento",
            },
            txtDireccion:{
                required: "Digite la Dirección",
            },
            txtCelularPersonal:{
                required: "DIgite el Número de Celular",
            },
            radioEstado:{
                required: "Seleccione el estado",
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
          var url=$('#url').val();
          var accion=$('#accion').val();
          var recarga=$('#recargar').val();
          //alert(url);
			     $.ajax({
                type: "POST",
                url: url,
                data: $(form).serialize(),
                success: function (data, status) {
                   
                    if(accion=="guardar"){
                        $('#frmModal').modal('hide');
                        $('#Persona').load(recarga);
                    }
                    else{
                        $('#frmModal').modal('hide');
                        $('#Persona').load(recarga);
                    }
                  
                }
            });
            return false;
		}

    });

    
    jQuery.validator.addMethod('selTipoIde', function (value) {
		return (value != '0');
    }, "Seleccione el Tipo de Idenificación");

    jQuery.validator.addMethod('selectRh', function (value) {
		return (value != '0');
    }, "Seleccione el RH");

    jQuery.validator.addMethod('selectEstadoCivil', function (value) {
		return (value != '0');
    }, "Seleccione el Estado Civil");

    jQuery.validator.addMethod('selectProfesion', function (value) {
		return (value != '0');
    }, "Seleccione la Profesión");

    jQuery.validator.addMethod('selectDepNace', function (value) {
		return (value != '0');
    }, "Seleccione el Departamento de Nacimiento");

    jQuery.validator.addMethod('selectMunNace', function (value) {
		return (value != '0');
    }, "Seleccione el Municipio de Nacimiento");  

    jQuery.validator.addMethod('selectDepVive', function (value) {
		return (value != '0');
    }, "Seleccione el Departamento de Residencia");

    jQuery.validator.addMethod('selectMunVive', function (value) {
		return (value != '0');
    }, "Seleccione el Municipio de Residencia");

}
