function validar_formregistropersona(){
    var txtIdentificacion = $('#txtIdentificacion').val();
    var txtNombre = $('#txtNombre').val();
    var txtPrimerApellido = $('#txtPrimerApellido').val();
    var radioNacionalidadNinio = $('input:radio[name=radioNacionalidadNinio]:checked').val();
    var SelDepNacimiento = $('#SelDepNacimiento').val();
    var selMunNacimiento = $('#selMunNacimiento').val();
    var txtCualNinio = $('#txtCualNinio').val();
    var txtFechaNacimiento = $('#txtFechaNacimiento').val();
    var txtDireccion = $('#txtDireccion').val();
    var radioFamiliar=$('input:radio[name=radioFamiliar]:checked').val();
    var txtViveCon = $('#txtViveCon').val(); 
    var SelDepResidencia = $('#SelDepResidencia').val();
    var selMunResidencia = $('#selMunResidencia').val();
    var txtTelefono = $('#txtTelefono').val();
    var selGradoIngresar=$('#selGradoIngresar').val();
    var radioTablaEstudios= $('input:radio[name=radioTablaEstudios]:checked').val();
    var txtIdentificacionPadre = $('#txtIdentificacionPadre').val();
    var txtNombrePadre = $('#txtNombrePadre').val();
    var txtPrimerApellidoPadre = $('#txtPrimerApellidoPadre').val();
    var txtFechaNacimientoPadre = $('#txtFechaNacimientoPadre').val();
    var radioVivePadre= $('input:radio[name=radioVivePadre]:checked').val();
    var txtNivelEducativoPadre = $('#txtNivelEducativoPadre').val();
    var txtOcupacionPadre = $('#txtOcupacionPadre').val();
    var txtCorreoPadre = $('#txtCorreoPadre').val();
    var txtCelularPadre = $('#txtCelularPadre').val();
    var txtDireccionResidencia= $('#txtDireccionResidencia').val();
    var txtIdentificacionMadre = $('#txtIdentificacionMadre').val();
    var txtNombreMadre = $('#txtNombreMadre').val();
    var txtPrimerApellidoMadre = $('#txtPrimerApellidoMadre').val();
    var txtFechaNacimientoMadre = $('#txtFechaNacimientoMadre').val();
    var radioViveMadre= $('input:radio[name=radioViveMadre]:checked').val();
    var txtNivelEducativoMadre = $('#txtNivelEducativoMadre').val();
    var txtOcupacionMadre = $('#txtOcupacionMadre').val();
    var txtDireccionResidenciaMadre = $('#txtDireccionResidenciaMadre').val();
    var txtCorreoMadre = $('#txtCorreoMadre').val();
    var txtCelularMadre = $('#txtCelularMadre').val();
    var txtFechaMatrimonio = $('#txtFechaMatrimonio').val();
    var papa_validar = $('#papa_validar').val();
    var mama_validar = $('#mama_validar').val();

    


    if(txtIdentificacion == '' || txtIdentificacion == 0){
        $("#error_identificacion").fadeIn('300');
        $("#error_identificacion").html('Ingrese la Identificación');
        document.getElementById("txtIdentificacion").focus();
        return false;
    }
    else{
        $("#error_identificacion").fadeOut('300');
    }
    
    if(txtNombre.trim() == ''){
        $("#error_1er_nombre").fadeIn('300');
        $("#error_1er_nombre").html('Ingrese el primer nombre');
        document.getElementById("txtNombre").focus();
        return false;
    }
    else{
        $("#error_1er_nombre").fadeOut('300');
    }

    if(txtPrimerApellido.trim() == ''){
        $("#error_1er_apellido").fadeIn('300');
        $("#error_1er_apellido").html('Ingrese el primer apellido');
        document.getElementById("txtPrimerApellido").focus();
        return false;
    }
    else{
        $("#error_1er_apellido").fadeOut('300');
    }

    if(!radioNacionalidadNinio){
        $("#error_nacionalidad_ninio").fadeIn('300');
        $("#error_nacionalidad_ninio").html('Seleccione una Opción');
        document.getElementById("radioNacionalidadNinioColombiana").focus();
        return false;
    }
    else{
        $("#error_nacionalidad_ninio").fadeOut('300');
    }

    if(radioNacionalidadNinio == 1){
        if(SelDepNacimiento == 0){
            $("#error_dep_ninio").fadeIn('300');
            $("#error_dep_ninio").html('Seleccione una Opción');
            document.getElementById("SelDepNacimiento").focus();
            return false;
        }
        else{
            $("#error_dep_ninio").fadeOut('300');
        }

        if(selMunNacimiento == 0){
            $("#error_mun_ninio").fadeIn('300');
            $("#error_mun_ninio").html('Seleccione una Opción');
            document.getElementById("selMunNacimiento").focus();
            return false;
        }
        else{
            $("#error_mun_ninio").fadeOut('300');
        }
    }
    else{
        if(txtCualNinio == ''){
            $("#error_nacionalidad_ninio").fadeIn('300');
            $("#error_nacionalidad_ninio").html('Ingrese la Nacionalidad');
            document.getElementById("txtCualNinio").focus();
            return false;
        }
        else{
            $("#error_nacionalidad_ninio").fadeOut('300');
        }
    }

    if(txtFechaNacimiento == ''){
        $("#error_date_nacimiento_ninio").fadeIn('300');
        $("#error_date_nacimiento_ninio").html('Seleccione la Fecha');
        document.getElementById("txtFechaNacimiento").focus();
        return false;
    }
    else{
        $("#error_date_nacimiento_ninio").fadeOut('300');
    }
    if(txtViveCon.trim() == ''){
        $("#error_vivecon_ninio").fadeIn('300');
        $("#error_vivecon_ninio").html('Ingrese con quién vive ');
        document.getElementById("txtViveCon").focus();
        return false;
    }
    else{
        $("#error_vivecon_ninio").fadeOut('300');
    }

    if(txtTelefono.trim() == ''){
        $("#error_telefono").fadeIn('300');
        $("#error_telefono").html('Ingrese el Telefono');
        document.getElementById("txtTelefono").focus();
        return false;
    }
    else{
        $("#error_telefono").fadeOut('300');
    }

    if(txtDireccion.trim() == ''){
        $("#error_direccion_ninio").fadeIn('300');
        $("#error_direccion_ninio").html('Ingrese la Dirección');
        document.getElementById("txtDireccion").focus();
        return false;
    }
    else{
        $("#error_direccion_ninio").fadeOut('300');
    }
    
    if(SelDepResidencia == 0){
        $("#error_dep_residencia_ninio").fadeIn('300');
        $("#error_dep_residencia_ninio").html('Seleccione una Opción');
        document.getElementById("SelDepResidencia").focus();
        return false;
    }
    else{
        $("#error_dep_residencia_ninio").fadeOut('300');
    }
    
    if(selMunResidencia == 0){
        $("#error_mun_residencia_ninio").fadeIn('300');
        $("#error_mun_residencia_ninio").html('Seleccione una Opción');
        document.getElementById("selMunResidencia").focus();
        return false;
    }
    else{
        $("#error_mun_residencia_ninio").fadeOut('300');
    }
 
    if(!radioFamiliar){
        $("#error_radioFamiliar_ninio").fadeIn('300');
        $("#error_radioFamiliar_ninio").html('Seleccione una Opción');
        document.getElementById("radioFamiliaSi").focus();
        return false;
    }
    else{
        $("#error_radioFamiliar_ninio").fadeOut('300');
    }

    if(selGradoIngresar == 0){
        $("#error_grado_ingresar").fadeIn('300');
        $("#error_grado_ingresar").html('Seleccione una Opción');
        document.getElementById("selGradoIngresar").focus();
        return false;
    }
    else{
        $("#error_grado_ingresar").fadeOut('300');
    }
   
    if(!radioTablaEstudios){
        $("#error_radioTablaEstudios_ninio").fadeIn('300');
        $("#error_radioTablaEstudios_ninio").html('Seleccione una Opción');
        document.getElementById("radioActivo").focus();
        return false;
    }
    else{
        $("#error_radioTablaEstudios_ninio").fadeOut('300');
    }

    if(radioTablaEstudios == 1){
        var validar_vacios_elementos = 0
        $("input[name='nombre_grado[]']").each(function(indc, elementh) {
            var nombre_grado = $(elementh).val();
            if(nombre_grado.trim() == ""){
                validar_vacios_elementos++;
            }
        });

        $("input[name='nombre_colegio[]']").each(function(indc, elementh) {
            var nombre_colegio = $(elementh).val();
            if(nombre_colegio.trim() == ""){
                validar_vacios_elementos++;
            }
        });

        $("input[name='nombre_direccion[]']").each(function(indc, elementh) {
            var nombre_colegio = $(elementh).val();
            if(nombre_colegio.trim() == ""){
                validar_vacios_elementos++;
            }
        });

        $("input[name='numero_year[]']").each(function(indc, elementh) {
            var nombre_colegio = $(elementh).val();
            if(nombre_colegio.trim() == ""){
                validar_vacios_elementos++;
            }
        });

        if(validar_vacios_elementos > 0){
            $("#error_radioTablaEstudios_ninio").fadeIn('300');
            $("#error_radioTablaEstudios_ninio").html('Debe Diligenciar los datos de la tabla estudios Anteriores');
            document.getElementById("radioActivo").focus();
            return false;
        }
    }

    if(papa_validar == 0){
        $("#error_id_papa").fadeIn('300');
        $("#error_id_papa").html('Debe registrar los datos del papá');
        document.getElementById("txtIdentificacionPadre").focus();
        return false;
    }
    else{
        $("#error_id_papa").fadeOut('300');
    }
   
    if(txtNombrePadre.trim() == ''){
        $("#error_nombre_papa").fadeIn('300');
        $("#error_nombre_papa").html('Ingrese el primer nombre');
        document.getElementById("txtNombrePadre").focus();
        return false;
    }
    else{
        $("#error_nombre_papa").fadeOut('300');
    }
    
    if(txtPrimerApellidoPadre.trim() == ''){
        $("#error_1er_apellido_papa").fadeIn('300');
        $("#error_1er_apellido_papa").html('Ingrese el primer apellido');
        document.getElementById("txtPrimerApellidoPadre").focus();
        return false;
    }
    else{
        $("#error_1er_apellido_papa").fadeOut('300');
    }

    if(txtIdentificacionPadre.trim() == ''){
        $("#error_id_papa").fadeIn('300');
        $("#error_id_papa").html('Ingrese el número de Identificación');
        document.getElementById("txtIdentificacionPadre").focus();
        return false;
    }
    else{
        $("#error_id_papa").fadeOut('300');
    }

    if(txtFechaNacimientoPadre == 0){
        $("#error_fecha_nace_papa").fadeIn('300');
        $("#error_fecha_nace_papa").html('Ingrese la fecha de Nacimiento');
        document.getElementById("txtFechaNacimientoPadre").focus();
        return false;
    }
    else{
        $("#error_fecha_nace_papa").fadeOut('300');
    }
 
    if(txtNivelEducativoPadre.trim() == ''){
        $("#error_nivelPadre").fadeIn('300');
        $("#error_nivelPadre").html('Ingrese el Nivel Educativo');
        document.getElementById("txtNivelEducativoPadre").focus();
        return false;
    }
    else{
        $("#error_nivelPadre").fadeOut('300');
    }
    if(!radioVivePadre){
            $("#error_vivepadre").fadeIn('300');
            $("#error_vivepadre").html('Seleccione una Opción');
            document.getElementById("radioVivePadreSi").focus();
            return false;
        }
        else{
            $("#error_vivepadre").fadeOut('300');
        }
    if(txtCorreoPadre.trim() == ''){
        $("#error_correopadre").fadeIn('300');
        $("#error_correopadre").html('Ingrese el Correo Electronico');
        document.getElementById("txtCorreoPadre").focus();
        return false;
    }
    else{
        $("#error_correopadre").fadeOut('300');
    }

    if(txtOcupacionPadre.trim() == ''){
        $("#error_ocupacionpadre").fadeIn('300');
        $("#error_ocupacionpadre").html('Ingrese la Ocupación');
        document.getElementById("txtOcupacionPadre").focus();
        return false;
    }
    else{
        $("#error_ocupacionpadre").fadeOut('300');
    }
    
    if(txtDireccionResidencia.trim() == ''){
        $("#error_direccionpapa").fadeIn('300');
        $("#error_direccionpapa").html('Ingrese la Direccion de Residencia');
        document.getElementById("txtDireccionResidencia").focus();
        return false;
    }
    else{
        $("#error_direccionpapa").fadeOut('300');
    }

    if(txtCelularPadre.trim() == ''){
        $("#error_celular_papa").fadeIn('300');
        $("#error_celular_papa").html('Ingrese el número de Celular');
        document.getElementById("txtCelularPadre").focus();
        return false;
    }
    else{
        $("#error_celular_papa").fadeOut('300');
    }

    if(mama_validar == 0){
        $("#error_id_mama").fadeIn('300');
        $("#error_id_mama").html('Debe registrar los datos de la mamá');
        document.getElementById("txtIdentificacionPadre").focus();
        return false;
    }
    else{
        $("#error_id_mama").fadeOut('300');
    }

    if(txtNombreMadre.trim() == ''){
        $("#error_1er_nombre_mama").fadeIn('300');
        $("#error_1er_nombre_mama").html('Ingrese el primer nombre');
        document.getElementById("txtNombreMadre").focus();
        return false;
    }
    else{
        $("#error_1er_nombre_mama").fadeOut('300');
    } 
    
    if(txtPrimerApellidoMadre.trim() == ''){
        $("#error_1er_apellido_mama").fadeIn('300');
        $("#error_1er_apellido_mama").html('Ingrese el primer apellido');
        document.getElementById("txtPrimerApellidoMadre").focus();
        return false;
    }
    else{
        $("#error_1er_apellido_mama").fadeOut('300');
    }

    if(txtIdentificacionMadre.trim() == ''){
        $("#error_id_mama").fadeIn('300');
        $("#error_id_mama").html('Ingrese el número de Identificación');
        document.getElementById("txtIdentificacionMadre").focus();
        return false;
    }
    else{
        $("#error_id_mama").fadeOut('300');
    }

    if(txtFechaNacimientoMadre == 0){
        $("#error_fecha_nace_mama").fadeIn('300');
        $("#error_fecha_nace_mama").html('Ingrese la Fecha de Nacimiento');
        document.getElementById("txtFechaNacimientoMadre").focus();
        return false;
    }
    else{
        $("#error_fecha_nace_mama").fadeOut('300');
    }
    if(!radioViveMadre){
        $("#error_vivemadre").fadeIn('300');
        $("#error_vivemadre").html('Seleccione una Opción');
        document.getElementById("radioViveMadreSi").focus();
        return false;
    }
    else{
        $("#error_vivemadre").fadeOut('300');
    }
   
    if(txtNivelEducativoMadre.trim() == ''){
        $("#error_nivelmadre").fadeIn('300');
        $("#error_nivelmadre").html('Ingrese el Nivel Educativo');
        document.getElementById("txtNivelEducativoMadre").focus();
        return false;
    }
    else{
        $("#error_nivelmadre").fadeOut('300');
    } 
    if(txtCorreoMadre.trim() == ''){
        $("#error_email_mama").fadeIn('300');
        $("#error_email_mama").html('Ingrese el Correo Electronico');
        document.getElementById("txtCorreoMadre").focus();
        return false;
    }
    else{
        $("#error_email_mama").fadeOut('300');
    }
     if(txtOcupacionMadre.trim() == ''){
        $("#error_ocupacionmadre").fadeIn('300');
        $("#error_ocupacionmadre").html('Ingrese la Ocupación');
        document.getElementById("txtOcupacionMadre").focus();
        return false;
    }
    else{
        $("#error_ocupacionmadre").fadeOut('300');
    }
    if(txtDireccionResidenciaMadre.trim() == ''){
        $("#error_direccionmadre").fadeIn('300');
        $("#error_direccionmadre").html('Ingrese la Dirección de Residencia');
        document.getElementById("txtDireccionResidenciaMadre").focus();
        return false;
    }
    else{
        $("#error_direccionmadre").fadeOut('300');
    }
   

    if(txtCelularMadre.trim() == ''){
        $("#error_celular_mama").fadeIn('300');
        $("#error_celular_mama").html('Ingrese el número de Celular');
        document.getElementById("txtCelularMadre").focus();
        return false;
    }
    else{
        $("#error_celular_mama").fadeOut('300');
    }

    if(txtFechaMatrimonio == 0){
        $("#error_fechamatrimonio").fadeIn('300');
        $("#error_fechamatrimonio").html('Ingrese la Fecha de Matrimonio');
        document.getElementById("txtFechaMatrimonio").focus();
        return false;
    }
    else{
        $("#error_fechamatrimonio").fadeOut('300');
    }

    var user=$('#user').val();
    var formulario = $('#inscripcionform')[0];
    var data_enviar = new FormData(formulario);

    //alert(data_enviar);
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: 'finalizarforminscripcion',
        data: data_enviar,
        cache: false,
        contentType: false,
        processData: false, 
        success: function (data, status) {
            window.location.replace('procesoninio?'+user);
        },
        error: function (e) {
            alert("Error en el Proceso");
        }
    });

          
}

