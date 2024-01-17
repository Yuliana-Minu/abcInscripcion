<?php
    $info_papa=$objRsInscripcion->info_papito($per_codigo);
    if($info_papa){
        foreach($info_papa as $data_info_papa){
            $per_codigoPapa=$data_info_papa['per_codigo'];
            $per_nombrePapa=$data_info_papa['per_nombre'];
            $per_segundonombrePapa=$data_info_papa['per_segundonombre'];
            $per_primerapellidoPapa=$data_info_papa['per_primerapellido'];
            $per_segundoapellidoPapa=$data_info_papa['per_segundoapellido'];
            $per_fechanacimientoPapa=$data_info_papa['per_fechanacimiento'];
            $per_identificacionPapa=$data_info_papa['per_identificacion'];
            $dba_correoPapa=$data_info_papa['dba_correo'];
            $dba_telefonoPapa=$data_info_papa['dba_telefono'];
            $dba_celularPapa=$data_info_papa['dba_celular'];
            $dba_direccionPapa=$data_info_papa['dba_direccion'];
            $dba_ocupacionPapa=$data_info_papa['dba_ocupacion'];
        }

        $info_adicional_papito=$objRsInscripcion->info_adicional_papito($per_codigoPapa);
        
        foreach($info_adicional_papito as $data_info_add_papa){
            $dpa_vivePapa=$data_info_add_papa['dpa_vive'];
            $dpa_cargoPapa=$data_info_add_papa['dpa_cargo'];
            $dpa_empresaPapa=$data_info_add_papa['dpa_empresa'];
            $dpa_direccionoficinaPapa=$data_info_add_papa['dpa_direccionoficina'];
            $dpa_telefonooficinaPapa=$data_info_add_papa['dpa_telefonooficina'];
            $dpa_niveleducativoPapa=$data_info_add_papa['dpa_niveleducativo'];
        }

        if($dpa_vivePapa==1){
            $vivePapaSi="checked";
            $vivePapaNo="";
        }

        if($dpa_vivePapa==0){
            $vivePapaSi="";
            $vivePapaNo="checked";
        }
    }
?>
<div class="row">
    <div class="col-sm-2 padding_left">
        <div class="form-group">
            <label for="txtIdentificacionPadre" class="font-weight-bold">Identificación*</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtIdentificacionPadre" value="<?php echo $per_identificacionPapa; ?>" name="txtIdentificacionPadre" readonly>
            <div class="alert alert-danger alerta-forcliente" id="error_id_papa" role="alert"></div>
            <input type="hidden" name="codigoPapaNinio" value="<?php echo $per_codigoPapa; ?>">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="txtNombrePadre" class="font-weight-bold">Primer Nombre *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtNombrePadre" name="txtNombrePadre" aria-describedby="textHelp" data-rule-required="true"  value="<?php echo $per_nombrePapa; ?>" onchange="datosPapaRegistro();">
            <div class="alert alert-danger alerta-forcliente" id="error_nombre_papa" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtSegundoNombrePadre" class="font-weight-bold">Segundo Nombre </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtSegundoNombrePadre" name="txtSegundoNombrePadre" value="<?php echo $per_segundonombrePapa; ?>" onchange="datosPapaRegistro();">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="txtPrimerApellidoPadre" class="font-weight-bold">Primer Apellido *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtPrimerApellidoPadre" name="txtPrimerApellidoPadre"  value="<?php echo $per_primerapellidoPapa; ?>"data-rule-required="true" onchange="datosPapaRegistro();">
            <div class="alert alert-danger alerta-forcliente" id="error_1er_apellido_papa" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="textSegundoApellidoPadre" class="font-weight-bold">Segundo Apellido</label>
            <input type="text" class="form-control caja_texto_sizer" id="textSegundoApellidoPadre" value="<?php echo $per_segundoapellidoPapa; ?>" name="textSegundoApellidoPadre" onchange="datosPapaRegistro();">
        </div>
    </div>
     
</div>

<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtFechaNacimientoPadre" class="font-weight-bold">Fecha de Nacimiento *</label>
            <input type="date" class="form-control caja_texto_sizer" id="txtFechaNacimientoPadre" name="txtFechaNacimientoPadre" aria-describedby="textHelp" data-rule-required="true"  value="<?php echo substr($per_fechanacimientoPapa,0,10); ?>" onchange="datosPapaRegistro();">
            <div class="alert alert-danger alerta-forcliente" id="error_fecha_nace_papa" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            <label for="radioVivePadre" class="font-weight-bold">&nbsp;&nbsp;Vive *</label>
            <br>
            <div class="form-check form-check-inline">
                &nbsp;&nbsp;<input class="form-check-input" type="radio" name="radioVivePadre"  id="radioVivePadreSi" value="1" <?php echo $vivePapaSi; ?> onchange="datosPapaRegistro();">
                <label class="form-check-label" for="radioActivo">&nbsp;Si</label>
            </div>
            <div class="form-check form-check-inline">
                &nbsp;&nbsp;<input class="form-check-input" type="radio" name="radioVivePadre"  id="radioVivePadreNo" value="0" <?php echo $vivePapaNo; ?>  onchange="datosPapaRegistro();">
                <label class="form-check-label" for="radioInactivo">&nbsp;No</label>
            </div>
            <div class="alert alert-danger alerta-forcliente" id="error_vivepadre" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-3 padding_right">
        <div class="form-group">
            <label for="txtNivelEducativoPadre" class="font-weight-bold">Nivel Educativo Titulo *</label>
            <select name="txtNivelEducativoPadre" id="txtNivelEducativoPadre"  class="form-control caja_texto_sizer"  onchange="datosPapaRegistro()"  data-rule-required="true" required>
                <option value="">Seleccione...</option>
                <option value="PRIMARIA" <?php if( $dpa_niveleducativoPapa == 'PRIMARIA')  echo 'selected' ?>>PRIMARIA</option>
                <option value="BACHILLER" <?php if( $dpa_niveleducativoPapa == 'BACHILLER')  echo 'selected' ?>>BACHILLER</option>
                <option value="BACHILLER TECNICO" <?php if( $dpa_niveleducativoPapa == 'BACHILLER TECNICO')  echo 'selected' ?>>BACHILLER TECNICO</option>
                <option value="TECNÓLOGO" <?php if( $dpa_niveleducativoPapa == 'TECNÓLOGO')  echo 'selected' ?>>TECNÓLOGO</option>
                <option value="PROFESIONAL" <?php if( $dpa_niveleducativoPapa == 'PROFESIONAL')  echo 'selected' ?>>PROFESIONAL</option>
                <option value="ESPECIALIZACIÓN" <?php if( $dpa_niveleducativoPapa == 'ESPECIALIZACIÓN')  echo 'selected' ?>>ESPECIALIZACIÓN</option>
                <option value="MAESTRIA" <?php if( $dpa_niveleducativoPapa == 'MAESTRIA')  echo 'selected' ?>>MAESTRIA</option>
                <option value="DOCTORADO" <?php if( $dpa_niveleducativoPapa == 'PROFESIONAL')  echo 'selected' ?>>DOCTORADO</option>
            </select>
            <div class="alert alert-danger alerta-forcliente" id="error_nivelPadre" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="txtCorreoPadre" class="font-weight-bold">Correo Electrónico*</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCorreoPadre" name="txtCorreoPadre" aria-describedby="textHelp" value="<?php echo $dba_correoPapa; ?>" onchange="datosPapaRegistro();">
            <div class="alert alert-danger alerta-forcliente" id="error_correopadre" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtOcupacionPadre" class="font-weight-bold">Profesión* </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtOcupacionPadre" name="txtOcupacionPadre" aria-describedby="textHelp" value="<?php echo $dba_ocupacionPapa; ?>"  onchange="datosPapaRegistro();">
            <div class="alert alert-danger alerta-forcliente" id="error_ocupacionpadre" role="alert"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtEmpresaPadre" class="font-weight-bold">Empresa </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtEmpresaPadre" name="txtEmpresaPadre" aria-describedby="textHelp" value="<?php echo $dpa_empresaPapa; ?>" onchange="datosPapaRegistro();">
        </div>
    </div>
    <div class="col-sm-3 padding_right">
        <div class="form-group">
            <label for="txtCargoPadre" class="font-weight-bold">Cargo </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCargoPadre" name="txtCargoPadre" aria-describedby="textHelp" value="<?php echo $dpa_cargoPapa; ?>" onchange="datosPapaRegistro();">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="txtDireccionOficinaPadre" class="font-weight-bold">Direcci&oacute;n Oficina </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtDireccionOficinaPadre" name="txtDireccionOficinaPadre" aria-describedby="textHelp" value="<?php echo $dpa_direccionoficinaPapa; ?>" onchange="datosPapaRegistro();">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtTelefonoOficinaPadre" class="font-weight-bold">Tel&eacute;fono Oficina </label>
            <input type="number" class="form-control caja_texto_sizer" id="txtTelefonoOficinaPadre" name="txtTelefonoOficinaPadre" aria-describedby="textHelp" value="<?php echo $dpa_telefonooficinaPapa; ?>" onchange="datosPapaRegistro();">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtTelefonoResidencia" class="font-weight-bold">Tel&eacute;fono Residencia *</label>
            <input type="number" class="form-control caja_texto_sizer" id="txtTelefonoResidencia" name="txtTelefonoResidencia" aria-describedby="textHelp" value="<?php echo $dba_telefonoPapa; ?>" onchange="datosPapaRegistro();">
        </div>
    </div>
</div>

<div class="row">
    
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtCelularPadre" class="font-weight-bold">N° Celular *</label>
            <input type="number" class="form-control caja_texto_sizer" id="txtCelularPadre" name="txtCelularPadre" aria-describedby="textHelp" value="<?php echo $dba_celularPapa; ?>" onchange="datosPapaRegistro();">
            <div class="alert alert-danger alerta-forcliente" id="error_celular_papa" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtDireccionResidencia" class="font-weight-bold">Direcci&oacute;n Residencia *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtDireccionResidencia" name="txtDireccionResidencia" aria-describedby="textHelp"  value="<?php echo $dba_direccionPapa; ?>" onchange="datosPapaRegistro();">
            <div class="alert alert-danger alerta-forcliente" id="error_direccionpapa" role="alert"></div>
        </div>
    </div>
    
    <!--<div class="col-sm-4">
        <div class="form-group">
            <label for="txtFotoPapito" class="font-weight-bold">Foto Padre *</label>
            <input type="file" class="form-control caja_texto_sizer" id="txtFotoPapito" name="txtFotoPapito" aria-describedby="textHelp">
            <div class="alert alert-danger alerta-forcliente" id="error_foto_papa" role="alert"></div>
        </div>
    </div>-->
</div>

<script type="text/javascript">
    function datosPapaRegistro(){
        var formulario = $('#inscripcionform')[0];
        var data_enviar = new FormData(formulario);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: 'cruddatospapainscripcion',
            data: data_enviar,
            cache: false,
            contentType: false,
            processData: false, 
            success: function (data, status) {
                
            },
            error: function (e) {
                
            }
        });
    }
</script>