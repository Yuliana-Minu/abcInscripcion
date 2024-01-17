<?php
    $info_mama=$objRsInscripcion->info_mamita($per_codigo);
    if($info_mama){
        foreach($info_mama as $data_info_mama){
            $per_codigoMama=$data_info_mama['per_codigo'];
            $per_nombreMama=$data_info_mama['per_nombre'];
            $per_segundonombreMama=$data_info_mama['per_segundonombre'];
            $per_primerapellidoMama=$data_info_mama['per_primerapellido'];
            $per_segundoapellidoMama=$data_info_mama['per_segundoapellido'];
            $per_fechanacimientoMama=$data_info_mama['per_fechanacimiento'];
            $per_identificacionMama=$data_info_mama['per_identificacion'];
            $dba_correoMama=$data_info_mama['dba_correo'];
            $dba_telefonoMama=$data_info_mama['dba_telefono'];
            $dba_celularMama=$data_info_mama['dba_celular'];
            $dba_direccionMama=$data_info_mama['dba_direccion'];
            $dba_ocupacionMama=$data_info_mama['dba_ocupacion'];
        }

        $info_adicional_mamita=$objRsInscripcion->info_adicional_mamita($per_codigoMama);

        if($info_adicional_mamita){
            foreach($info_adicional_mamita as $data_info_add_mama){
                $dpa_viveMama=$data_info_add_mama['dpa_vive'];
                $dpa_cargoMama=$data_info_add_mama['dpa_cargo'];
                $dpa_empresaMama=$data_info_add_mama['dpa_empresa'];
                $dpa_direccionoficinaMama=$data_info_add_mama['dpa_direccionoficina'];
                $dpa_telefonooficinaMama=$data_info_add_mama['dpa_telefonooficina'];
                $dpa_niveleducativoMama=$data_info_add_mama['dpa_niveleducativo'];
            }

            if($dpa_viveMama==1){
                $viveMamaSi="checked";
                $viveMamaNo="";
            }

            if($dpa_viveMama==0){
                $viveMamaSi="";
                $viveMamaNo="checked";
            }
        }
    }
?>

<div class="row">
    <div class="col-sm-2 padding_left">
        <div class="form-group">
            <label for="txtIdentificacionMadre" class="font-weight-bold">Identificación*</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtIdentificacionMadre" value="<?php echo $per_identificacionMama; ?>" name="txtIdentificacionMadre" readonly>
            <input type="hidden" name="codigoMamaNinio" value="<?php echo $per_codigoMama; ?>">
            <div class="alert alert-danger alerta-forcliente" id="error_id_mama" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="txtNombreMadre" class="font-weight-bold">Primer Nombre *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtNombreMadre" name="txtNombreMadre" aria-describedby="textHelp" data-rule-required="true" value="<?php echo $per_nombreMama; ?>" onchange="datosMamaRegistro()">
            <div class="alert alert-danger alerta-forcliente" id="error_1er_nombre_mama" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtSegundoNombreMadre" class="font-weight-bold">Segundo Nombre </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtSegundoNombreMadre" name="txtSegundoNombreMadre" value="<?php echo $per_segundonombreMama; ?>"  onchange="datosMamaRegistro()">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            &nbsp;<label for="txtPrimerApellidoMadre" class="font-weight-bold">Primer Apellido*</label>
            &nbsp;<input type="text" class="form-control caja_texto_sizer" id="txtPrimerApellidoMadre" name="txtPrimerApellidoMadre" value="<?php echo $per_primerapellidoMama; ?>"data-rule-required="true" onchange="datosMamaRegistro()">
            <div class="alert alert-danger alerta-forcliente" id="error_1er_apellido_mama" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="textSegundoApellidoMadre" class="font-weight-bold">Segundo Apellido </label>
            <input type="text" class="form-control caja_texto_sizer" id="textSegundoApellidoMadre"  value="<?php echo $per_segundoapellidoMama; ?>" name="textSegundoApellidoMadre" onchange="datosMamaRegistro()">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtFechaNacimientoMadre" class="font-weight-bold">Fecha de Nacimiento *</label>
            <input type="date" class="form-control caja_texto_sizer" id="txtFechaNacimientoMadre" name="txtFechaNacimientoMadre" aria-describedby="textHelp" data-rule-required="true" value="<?php echo substr($per_fechanacimientoMama,0,10); ?>" onchange="datosMamaRegistro()">
            <div class="alert alert-danger alerta-forcliente" id="error_fecha_nace_mama" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="radioViveMadre" class="font-weight-bold">&nbsp;&nbsp;Vive *</label>
            <br>
            <div class="form-check form-check-inline">
                &nbsp;&nbsp;<input class="form-check-input" type="radio" name="radioViveMadre"  id="radioViveMadreSi" value="1" <?php echo $viveMamaSi; ?> onchange="datosMamaRegistro()">
                <label class="form-check-label" for="radioActivo">&nbsp;Si</label>
            </div>
            <div class="form-check form-check-inline">
                &nbsp;&nbsp;<input class="form-check-input" type="radio" name="radioViveMadre"  id="radioViveMadreNo" value="0" <?php echo $viveMamaNo; ?> onchange="datosMamaRegistro()">
                <label class="form-check-label" for="radioInactivo">&nbsp;No</label>
            </div>
            <div class="alert alert-danger alerta-forcliente" id="error_vivemadre" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-3 padding_right">
        <div class="form-group">
            <label for="txtNivelEducativoMadre" class="font-weight-bold">Nivel Educativo Titulo *</label>
            <select name="txtNivelEducativoMadre" id="txtNivelEducativoMadre"  class="form-control caja_texto_sizer"  onchange="datosMamaRegistro()"  data-rule-required="true" required>
                <option value="">Seleccione...</option>
                <option value="PRIMARIA" <?php if( $dpa_niveleducativoMama == 'PRIMARIA')  echo 'selected' ?>>PRIMARIA</option>
                <option value="BACHILLER" <?php if( $dpa_niveleducativoMama == 'BACHILLER')  echo 'selected' ?>>BACHILLER</option>
                <option value="BACHILLER TECNICO" <?php if( $dpa_niveleducativoMama == 'BACHILLER TECNICO')  echo 'selected' ?>>BACHILLER TECNICO</option>
                <option value="TECNÓLOGO" <?php if( $dpa_niveleducativoMama == 'TECNÓLOGO')  echo 'selected' ?>>TECNÓLOGO</option>
                <option value="PROFESIONAL" <?php if( $dpa_niveleducativoMama == 'PROFESIONAL')  echo 'selected' ?>>PROFESIONAL</option>
                <option value="ESPECIALIZACIÓN" <?php if( $dpa_niveleducativoMama == 'ESPECIALIZACIÓN')  echo 'selected' ?>>ESPECIALIZACIÓN</option>
                <option value="MAESTRIA" <?php if( $dpa_niveleducativoMama == 'MAESTRIA')  echo 'selected' ?>>MAESTRIA</option>
                <option value="DOCTORADO" <?php if( $dpa_niveleducativoMama == 'PROFESIONAL')  echo 'selected' ?>>DOCTORADO</option>
            </select>
            <div class="alert alert-danger alerta-forcliente" id="error_nivelmadre" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="txtCorreoMadre" class="font-weight-bold">Correo Electrónico *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCorreoMadre" name="txtCorreoMadre" aria-describedby="textHelp" value="<?php echo $dba_correoMama; ?>" onchange="datosMamaRegistro()">
            <div class="alert alert-danger alerta-forcliente" id="error_email_mama" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtOcupacionMadre" class="font-weight-bold">Profesión *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtOcupacionMadre" name="txtOcupacionMadre" aria-describedby="textHelp"  value="<?php echo $dba_ocupacionMama; ?>" onchange="datosMamaRegistro()">
            <div class="alert alert-danger alerta-forcliente" id="error_ocupacionmadre" role="alert"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtEmpresaMadre" class="font-weight-bold">Empresa </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtEmpresaMadre" name="txtEmpresaMadre" aria-describedby="textHelp" value="<?php echo $dpa_empresaMama; ?>" onchange="datosMamaRegistro()">
        </div>
    </div>
    <div class="col-sm-3 padding_right">
        <div class="form-group">
            <label for="txtCargoMadre" class="font-weight-bold">Cargo </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCargoMadre" name="txtCargoMadre" aria-describedby="textHelp"  value="<?php echo $dpa_cargoMama; ?>" onchange="datosMamaRegistro()">
        </div>
    </div>
    <div class="col-sm-3 ">
        <div class="form-group">
            <label for="txtDireccionOficinaMadre" class="font-weight-bold">Direcci&oacute;n Oficina </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtDireccionOficinaMadre" name="txtDireccionOficinaMadre" aria-describedby="textHelp" value="<?php echo $dpa_direccionoficinaMama; ?>" onchange="datosMamaRegistro()">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtTelefonoOficinaMadre" class="font-weight-bold">Tel&eacute;fono Oficina </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtTelefonoOficinaMadre" name="txtTelefonoOficinaMadre" aria-describedby="textHelp" value="<?php echo $dpa_telefonooficinaMama; ?>" onchange="datosMamaRegistro()">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtTelefonoResidenciaMadre" class="font-weight-bold">Tel&eacute;fono Residencia *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtTelefonoResidenciaMadre" name="txtTelefonoResidenciaMadre" aria-describedby="textHelp" value="<?php echo $dba_direccionMama; ?>" onchange="datosMamaRegistro()">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtCelularMadre" class="font-weight-bold">N° Celular *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCelularMadre" name="txtCelularMadre" aria-describedby="textHelp" value="<?php echo $dba_celularMama; ?>" onchange="datosMamaRegistro()">
            <div class="alert alert-danger alerta-forcliente" id="error_celular_mama " role="alert"></div>
        </div>
    </div>
    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtDireccionResidenciaMadre" class="font-weight-bold">Direcci&oacute;n Residencia *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtDireccionResidenciaMadre" name="txtDireccionResidenciaMadre" aria-describedby="textHelp" value="<?php echo $dba_direccionMama; ?>" onchange="datosMamaRegistro()">
            <div class="alert alert-danger alerta-forcliente" id="error_direccionmadre" role="alert"></div>
        </div>
    </div>
    
    <!--<div class="col-sm-4">
        <div class="form-group">
            <label for="txtFotoMamita" class="font-weight-bold">Foto Madre *</label>
            <input type="file" class="form-control caja_texto_sizer" id="txtFotoMamita" name="txtFotoMamita" aria-describedby="textHelp">
            <div class="alert alert-danger alerta-forcliente" id="error_foto_mama" role="alert"></div>
        </div>
    </div> -->
</div>

<script type="text/javascript">
    function datosMamaRegistro(){
        var formulario = $('#inscripcionform')[0];
        var data_enviar = new FormData(formulario);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: 'cruddatosmamainscripcion',
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