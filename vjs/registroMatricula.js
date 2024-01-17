function validar_prematricula(){
    
    var txtFechaPreMatricula = $('#txtFechaPreMatricula').val();
    var selGradoIngresar = $('#selGradoIngresar').val();
    var selTipoIdentificacion = $('#selTipoIdentificacion').val();
    var txtIdentificacion = $('#txtIdentificacion').val();
    var txtLugarExpedicion = $('#txtLugarExpedicion').val();
    var txtNombre = $('#txtNombre').val();
    var txtPrimerApellido = $('#txtPrimerApellido').val();
    var radioNacionalidadNinio = $('input:radio[name=radioNacionalidadNinio]:checked').val();
    var SelDepNacimiento = $('#SelDepNacimiento').val();
    var selMunNacimiento = $('#selMunNacimiento').val();
    var txtCualNinio = $('#txtCualNinio').val();
    var txtFechaNacimiento = $('#txtFechaNacimiento').val();
    var txtDireccion = $('#txtDireccion').val();
    var SelDepResidencia = $('#SelDepResidencia').val();
    var selMunResidencia = $('#selMunResidencia').val();
    var txtTelefono = $('#txtTelefono').val();
    var txtCelular = $('#txtCelular').val();
    var txtCorreo = $('#txtCorreo').val();
    var selEps = $('#selEps').val();
    var selRh = $('#selRh').val();
    var txtEstrato = $('#txtEstrato').val();
    var radioSisben = $('input:radio[name=radioSisben]:checked').val();
    var txtFechaPreMatricula = $('#txtFechaPreMatricula').val();
    var txtFechaPreMatricula = $('#txtFechaPreMatricula').val();
    var txtFechaPreMatricula = $('#txtFechaPreMatricula').val();
    var txtIdentificacionPadre = $('#txtIdentificacionPadre').val();
    var txtNombrePadre = $('#txtNombrePadre').val();
    var txtPrimerApellidoPadre = $('#txtPrimerApellidoPadre').val();
    var txtFechaNacimientoPadre = $('#txtFechaNacimientoPadre').val();
    var radioNacionalidadPadre = $('input:radio[name=radioNacionalidadPadre]:checked').val();
    var SelDepNacimientoPadre = $('#SelDepNacimientoPadre').val();
    var selMunNacimientoPadre = $('#selMunNacimientoPadre').val();
    var txCualPadre = $('#txCualPadre').val();
    var selMunNacimientoPadre = $('#selMunNacimientoPadre').val();
    var txtOcupacionPadre = $('#txtOcupacionPadre').val();
    var txtCorreoPadre = $('#txtCorreoPadre').val();
    var txtEmpresaPadre = $('#txtEmpresaPadre').val();
    var txtCelularPadre = $('#txtCelularPadre').val();
    var txtCargoPadre = $('#txtCargoPadre').val();
    var txtIdentificacionMadre = $('#txtIdentificacionMadre').val();
    var txtNombreMadre = $('#txtNombreMadre').val();
    var txtPrimerApellidoMadre = $('#txtPrimerApellidoMadre').val();
    var txtFechaNacimientoMadre = $('#txtFechaNacimientoMadre').val();
    var radioNacionalidadMadre = $('input:radio[name=radioNacionalidadMadre]:checked').val();
    var SelDepNacimientoMadre = $('#SelDepNacimientoMadre').val();
    var selMunNacimientoMadre = $('#selMunNacimientoMadre').val();
    var txtOcupacionMadre = $('#txtOcupacionMadre').val();
    var txtCualMadre = $('#txtCualMadre').val();
    var txtCorreoMadre = $('#txtCorreoMadre').val();
    var txtCelularMadre = $('#txtCelularMadre').val();
    var txtEmpresaMadre = $('#txtEmpresaMadre').val();
    var txtIdentificacionAcudiente = $('#txtIdentificacionAcudiente').val();
    var txtNombreAcudiente = $('#txtNombreAcudiente').val();
    var txtPrimerApellidoAcudiente = $('#txtPrimerApellidoAcudiente').val();
    var txtFechaNacimientoAcudiente = $('#txtFechaNacimientoAcudiente').val();
    var radioNacionalidadAcudiente = $('input:radio[name=radioNacionalidadAcudiente]:checked').val();
    var SelDepNacimientoAcudiente = $('#SelDepNacimientoAcudiente').val();
    var selMunNacimientoAcudiente = $('#selMunNacimientoAcudiente').val();
    var txtCualAcudiente = $('#txtCualAcudiente').val();
    var txtOcupacionAcudiente = $('#txtOcupacionAcudiente').val();
    var txtEmpresaAcudiente = $('#txtEmpresaAcudiente').val();
    var txtCargoAcudiente = $('#txtCargoAcudiente').val();
    var txtCorreoAcudiente = $('#txtCorreoAcudiente').val();
    var txtCelularAcudiente = $('#txtCelularAcudiente').val();
    var validar_papa = $('#validar_papa').val();
    var validar_mama = $('#validar_mama').val();
    var validar_acudiente = $('#validar_acudiente').val();

    
    if(validar_papa == 0){
        $("#error_id_papa").fadeIn('300');
        $("#error_id_papa").html('Debe registrar los datos del papá');
        document.getElementById("txtIdentificacionPadre").focus();
        return false;
    }
    else{
        $("#error_id_papa").fadeOut('300');
    }

    if(validar_mama == 0){
        $("#error_id_mama").fadeIn('300');
        $("#error_id_mama").html('Debe registrar los datos de la mamá');
        document.getElementById("txtIdentificacionPadre").focus();
        return false;
    }
    else{
        $("#error_id_mama").fadeOut('300');
    }

    
    if(validar_acudiente == 0){
        $("#error_id_acudiente").fadeIn('300');
        $("#error_id_acudiente").html('Debe registrar los datos del acudiente');
        document.getElementById("identificacion_acudiente").focus();
        return false;
    }
    else{
        $("#error_id_acudiente").fadeOut('300');
    }
    
    if(txtFechaPreMatricula == ''){
        $("#error_fecha_matricula").fadeIn('300');
        $("#error_fecha_matricula").html('Seleccione una Fecha');
        document.getElementById("txtFechaPreMatricula").focus();
        return false;
    }
    else{
        $("#error_fecha_matricula").fadeOut('300');
    }

    if(selGradoIngresar == 0){
        $("#error_grado_ingresar").fadeIn('300');
        $("#error_grado_ingresar").html('Selecciones una Opción');
        document.getElementById("selGradoIngresar").focus();
        return false;
    }
    else{
        $("#error_grado_ingresar").fadeOut('300');
    }

    if(selTipoIdentificacion == 0){
        $("#error_tipo_id").fadeIn('300');
        $("#error_tipo_id").html('Selecciones una Opción');
        document.getElementById("selTipoIdentificacion").focus();
        return false;
    }
    else{
        $("#error_tipo_id").fadeOut('300');
    }

    if(txtIdentificacion == '' || txtIdentificacion == 0){
        $("#error_identificacion").fadeIn('300');
        $("#error_identificacion").html('Ingrese la Identificación');
        document.getElementById("txtIdentificacion").focus();
        return false;
    }
    else{
        $("#error_identificacion").fadeOut('300');
    }
    if(txtLugarExpedicion == '' || txtLugarExpedicion == 0){
        $("#error_lugarExpedicion").fadeIn('300');
        $("#error_lugarExpedicion").html('Ingrese el Lugar');
        document.getElementById("txtLugarExpedicion").focus();
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
        document.getElementById("radioNacionalidadNinioOtra").focus();
        return false;
    }
    else{
        $("#error_nacionalidad_ninio").fadeOut('300');
    }

    if(radioNacionalidadNinio == 1){
        if(SelDepNacimiento == 0){
            $("#error_dep_ninio").fadeIn('300');
            $("#error_dep_ninio").html('Selecciones una Opción');
            document.getElementById("SelDepNacimiento").focus();
            return false;
        }
        else{
            $("#error_dep_ninio").fadeOut('300');
        }

        if(selMunNacimiento == 0){
            $("#error_mun_ninio").fadeIn('300');
            $("#error_mun_ninio").html('Selecciones una Opción');
            document.getElementById("selMunNacimiento").focus();
            return false;
        }
        else{
            $("#error_mun_ninio").fadeOut('300');
        }
    }
    else{
        if(txtCualNinio.trim() == ''){
            $("#error_nacionalidad_ninio").fadeIn('300');
            $("#error_nacionalidad_ninio").html('Digite el Nombre');
            document.getElementById("txtCualNinio").focus();
            return false;
        }
        else{
            $("#error_nacionalidad_ninio").fadeOut('300');
        }
    }

    if(txtFechaNacimiento == ''){
        $("#error_date_nacimiento_ninio").fadeIn('300');
        $("#error_date_nacimiento_ninio").html('Selecciones la Fecha');
        document.getElementById("txtFechaNacimiento").focus();
        return false;
    }
    else{
        $("#error_date_nacimiento_ninio").fadeOut('300');
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
    
    if(txtTelefono.trim() == ''){
        $("#error_telefono").fadeIn('300');
        $("#error_telefono").html('Ingrese E-mail del niño');
        document.getElementById("txtTelefono").focus();
        return false;
    }
    else{
        $("#error_telefono").fadeOut('300');
    }

    if(txtCelular.trim() == ''){
        $("#error_celular").fadeIn('300');
        $("#error_celular").html('Ingrese E-mail del niño');
        document.getElementById("txtCelular").focus();
        return false;
    }
    else{
        $("#error_celular").fadeOut('300');
    }
    if(txtCorreo.trim() == ''){
        $("#error_email_ninio").fadeIn('300');
        $("#error_email_ninio").html('Ingrese E-mail del niño');
        document.getElementById("txtCorreo").focus();
        return false;
    }
    else{
        $("#error_email_ninio").fadeOut('300');
    }

    if(selEps == 0){
        $("#error_eps_ninio").fadeIn('300');
        $("#error_eps_ninio").html('Seleccione una Opción');
        document.getElementById("selEps").focus();
        return false;
    }
    else{
        $("#error_eps_ninio").fadeOut('300');
    }

    
    if(selRh == 0){
        $("#error_rh_ninio").fadeIn('300');
        $("#error_rh_ninio").html('Seleccione una Opción');
        document.getElementById("selRh").focus();
        return false;
    }
    else{
        $("#error_rh_ninio").fadeOut('300');
    }

    if(txtEstrato.trim() == ''){
        $("#error_estrato").fadeIn('300');
        $("#error_estrato").html('Ingrese el Estrato');
        document.getElementById("txtEstrato").focus();
        return false;
    }
    else{
        $("#error_estrato").fadeOut('300');
    }
    if(!radioSisben){
        $("#error_sisben_ninio").fadeIn('300');
        $("#error_sisben_ninio").html('Seleccione una Opción');
        document.getElementById("radioSisbenNo").focus();
        return false;
    }
    else{
        $("#error_sisben_ninio").fadeOut('300');
    }

    if(txtIdentificacionPadre == ''){
        $("#error_id_papa").fadeIn('300');
        $("#error_id_papa").html('Ingrese el número de Identificación');
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

    if(txtFechaNacimientoPadre == ''){
        $("#error_fecha_nace_papa").fadeIn('300');
        $("#error_fecha_nace_papa").html('Ingrese la fecha de Nacimiento');
        document.getElementById("error_fecha_nace_papa").focus();
        return false;
    }
    else{
        $("#error_fecha_nace_papa").fadeOut('300');
    }

    if(!radioNacionalidadPadre){
        $("#error_nacionalidad_papa").fadeIn('300');
        $("#error_nacionalidad_papa").html('Seleccione una Opción');
        document.getElementById("radioNacionalidadPadre").focus();
        return false;
    }
    else{
        $("#error_nacionalidad_papa").fadeOut('300');
    }

    if(radioNacionalidadPadre == 1){
        if(SelDepNacimientoPadre == 0){
            $("#error_dep_nace_papa").fadeIn('300');
            $("#error_dep_nace_papa").html('Selecciones una Opción');
            document.getElementById("SelDepNacimientoPadre").focus();
            return false;
        }
        else{
            $("#error_dep_nace_papa").fadeOut('300');
        }

        if(selMunNacimientoPadre == 0){
            $("#error_mun_nace_papa").fadeIn('300');
            $("#error_mun_nace_papa").html('Selecciones una Opción');
            document.getElementById("selMunNacimientoPadre").focus();
            return false;
        }
        else{
            $("#error_mun_nace_papa").fadeOut('300');
        }
    }
    else{
        if(txCualPadre.trim() == ''){
            $("#error_cual_nacionalidad_papa").fadeIn('300');
            $("#error_cual_nacionalidad_papa").html('Digite el Nombre');
            document.getElementById("txCualPadre").focus();
            return false;
        }
        else{
            $("#error_cual_nacionalidad_papa").fadeOut('300');
        }
    }
    
    if(txtOcupacionPadre.trim() == ''){
        $("#error_ocupacionpadre").fadeIn('300');
        $("#error_ocupacionpadre").html('Ingrese la Profesión');
        document.getElementById("txtOcupacionPadre").focus();
        return false;
    }
    else{
        $("#error_ocupacionpadre").fadeOut('300');
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
    if(txtEmpresaPadre.trim() == ''){
        $("#error_empresaPadre").fadeIn('300');
        $("#error_empresaPadre").html('Ingrese la Empresa');
        document.getElementById("txtEmpresaPadre").focus();
        return false;
    }
    else{
        $("#error_empresaPadre").fadeOut('300');
    }
    
    if(txtCargoPadre.trim() == ''){
        $("#error_cargopadre").fadeIn('300');
        $("#error_cargopadre").html('Ingrese el Cargo');
        document.getElementById("txtCargoPadre").focus();
        return false;
    }
    else{
        $("#error_cargopadre").fadeOut('300');
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

    if(txtNombreMadre.trim() == ''){
        $("#error_1er_nombre_mama").fadeIn('300');
        $("#error_1er_nombre_mama").html('Ingrese el primer nombre');
        document.getElementById("txtNombreMadre").focus();
        return false;
    }
    else{
        $("#error_1er_nombre_mama").fadeOut('300');
    } 
    if(txtIdentificacionMadre == ''){
        $("#error_id_mama").fadeIn('300');
        $("#error_id_mama").html('Ingrese el número de Identificación');
        document.getElementById("txtIdentificacionMadre").focus();
        return false;
    }
    else{
        $("#error_id_mama").fadeOut('300');
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

    if(txtFechaNacimientoMadre == ''){
        $("#error_fecha_nace_mama").fadeIn('300');
        $("#error_fecha_nace_mama").html('Ingrese la Fecha de Nacimiento');
        document.getElementById("txtFechaNacimientoMadre").focus();
        return false;
    }
    else{
        $("#error_fecha_nace_mama").fadeOut('300');
    }

    if(!radioNacionalidadMadre){
        $("#error_nacionalidad_mama").fadeIn('300');
        $("#error_nacionalidad_mama").html('Seleccione una Opción');
        document.getElementById("radioNacionalidadMadreColombiana").focus();
        return false;
    }
    else{
        $("#error_nacionalidad_mama").fadeOut('300');
    }

    if(radioNacionalidadMadre == 1){
        if(SelDepNacimientoMadre == 0){
            $("#error_dep_nace_mama").fadeIn('300');
            $("#error_dep_nace_mama").html('Seleccione una Opción');
            document.getElementById("SelDepNacimientoMadre").focus();
            return false;
        }
        else{
            $("#error_dep_nace_mama").fadeOut('300');
        }

        if(selMunNacimientoMadre == 0){
            $("#error_mun_nace_mama").fadeIn('300');
            $("#error_mun_nace_mama").html('Seleccione una Opción');
            document.getElementById("selMunNacimientoMadre").focus();
            return false;
        }
        else{
            $("#error_mun_nace_mama").fadeOut('300');
        }
    }
    else{
        if(txtCualMadre.trim() == ''){
            $("#error_cual_nacionalidad_mama").fadeIn('300');
            $("#error_cual_nacionalidad_mama").html('Digite el Nombre');
            document.getElementById("txtCualMadre").focus();
            return false;
        }
        else{
            $("#error_cual_nacionalidad_mama").fadeOut('300');
        }
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
    if(txtEmpresaMadre.trim() == ''){
        $("#error_empresamadre").fadeIn('300');
        $("#error_empresamadre").html('Ingrese la Empresa');
        document.getElementById("txtEmpresaMadre").focus();
        return false;
    }
    else{
        $("#error_empresamadre").fadeOut('300');
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

    if(txtCelularMadre.trim() == ''){
        $("#error_celular_mama").fadeIn('300');
        $("#error_celular_mama").html('Ingrese el número de Celular');
        document.getElementById("txtCelularMadre").focus();
        return false;
    }
    else{
        $("#error_celular_mama").fadeOut('300');
    }

    if(txtNombreAcudiente.trim() == ''){
        $("#error_1er_nombre_acudiente").fadeIn('300');
        $("#error_1er_nombre_acudiente").html('Ingrese el primer nombre');
        document.getElementById("txtNombreAcudiente").focus();
        return false;
    }
    else{
        $("#error_1er_nombre_acudiente").fadeOut('300');
    }
     if(txtPrimerApellidoAcudiente.trim() == ''){
        $("#error_1er_apellido_acudiente").fadeIn('300');
        $("#error_1er_apellido_acudiente").html('Ingrese el primer apellido');
        document.getElementById("txtPrimerApellidoAcudiente").focus();
        return false;
    }
    else{
        $("#error_1er_apellido_acudiente").fadeOut('300');
    }

    if(txtIdentificacionAcudiente == ''){
        $("#error_id_acudiente").fadeIn('300');
        $("#error_id_acudiente").html('Ingrese el número de Identificación');
        document.getElementById("txtIdentificacionAcudiente").focus();
        return false;
    }
    else{
        $("#error_id_acudiente").fadeOut('300');
    }

    if(txtFechaNacimientoAcudiente == ''){
        $("#error_fecha_nace_acudiente").fadeIn('300');
        $("#error_fecha_nace_acudiente").html('Ingrese la Fecha de Nacimiento');
        document.getElementById("txtFechaNacimientoAcudiente").focus();
        return false;
    }
    else{
        $("#error_fecha_nace_acudiente").fadeOut('300');
    }

    if(!radioNacionalidadAcudiente){
        $("#error_nacionalidad_acudiente").fadeIn('300');
        $("#error_nacionalidad_acudiente").html('Seleccione una Opción');
        document.getElementById("radioNacionalidadAcudienteColombiana").focus();
        return false;
    }
    else{
        $("#error_nacionalidad_acudiente").fadeOut('300');
    }

    if(radioNacionalidadAcudiente == 1){
        if(SelDepNacimientoAcudiente == 0){
            $("#error_dep_nace_acudiente").fadeIn('300');
            $("#error_dep_nace_acudiente").html('Seleccione una Opción');
            document.getElementById("SelDepNacimientoAcudiente").focus();
            return false;
        }
        else{
            $("#error_dep_nace_acudiente").fadeOut('300');
        }

        if(selMunNacimientoAcudiente == 0){
            $("#error_mun_nace_acudiente").fadeIn('300');
            $("#error_mun_nace_acudiente").html('Seleccione una Opción');
            document.getElementById("selMunNacimientoAcudiente").focus();
            return false;
        }
        else{
            $("#error_mun_nace_acudiente").fadeOut('300');
        }
    }
    else{
        if(txtCualAcudiente.trim() == ''){
            $("#error_cual_nacionalidad_acudiente").fadeIn('300');
            $("#error_cual_nacionalidad_acudiente").html('Digite el Nombre');
            document.getElementById("txtCualAcudiente").focus();
            return false;
        }
        else{
            $("#error_cual_nacionalidad_acudiente").fadeOut('300');
        }
    }

    
    if(txtOcupacionAcudiente.trim() == ''){
        $("#error_ocupacioacudiente").fadeIn('300');
        $("#error_ocupacioacudiente").html('Ingrese la Profesión');
        document.getElementById("txtOcupacionAcudiente").focus();
        return false;
    }
    else{
        $("#error_ocupacioacudiente").fadeOut('300');
    }
    if(txtEmpresaAcudiente.trim() == ''){
        $("#error_empresaacudiente").fadeIn('300');
        $("#error_empresaacudiente").html('Ingrese la Empresa');
        document.getElementById("txtEmpresaAcudiente").focus();
        return false;
    }
    else{
        $("#error_empresaacudiente").fadeOut('300');
    }

    if(txtCelularAcudiente.trim() == ''){
        $("#error_celular_acudiente").fadeIn('300');
        $("#error_celular_acudiente").html('Ingrese el número de Celular');
        document.getElementById("txtCelularAcudiente").focus();
        return false;
    }
    else{
        $("#error_celular_acudiente").fadeOut('300');
    }
    
    if(txtCargoAcudiente.trim() == ''){
        $("#error_cargoacudiente").fadeIn('300');
        $("#error_cargoacudiente").html('Ingrese el Cargo');
        document.getElementById("txtCargoAcudiente").focus();
        return false;
    }
    else{
        $("#error_cargoacudiente").fadeOut('300');
    }  
    if(txtCorreoAcudiente.trim() == ''){
        $("#error_email_acudiente").fadeIn('300');
        $("#error_email_acudiente").html('Ingrese el Correo Electronico');
        document.getElementById("txtCorreoAcudiente").focus();
        return false;
    }
    else{
        $("#error_email_acudiente").fadeOut('300');
    }
   
  
    var user=$('#txtIdentificacionN').val();
    var formulario = $('#matriculaform')[0];
    var data_enviar = new FormData(formulario);
    
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: 'finalizarformmatricula',
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
