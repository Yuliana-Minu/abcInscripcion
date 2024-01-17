<?php
$datos_acudiente=$objRsMatricula->datos_acudiente($personaSistema);
if($datos_acudiente){
    foreach($datos_acudiente as $data_acudiente){
        $per_codigoAcudiente=$data_acudiente['per_codigo'];
        $per_nombreAcudiente=$data_acudiente['per_nombre'];
        $per_primerapellidoAcudiente=$data_acudiente['per_primerapellido']; 
        $per_segundoapellidoAcudiente=$data_acudiente['per_segundoapellido'];
        $per_personacreoAcudiente=$data_acudiente['per_personacreo'];
        $per_personamodificoAcudiente=$data_acudiente['per_personamodifico'];
        $per_fechacreoAcudiente=$data_acudiente['per_fechacreo'];
        $per_fechamodificoAcudiente=$data_acudiente['per_fechamodifico'];
        $per_generoAcudiente=$data_acudiente['per_genero'];
        $per_tipoidentificacionAcudiente=$data_acudiente['per_tipoidentificacion'];
        $per_identificacionAcudiente=$data_acudiente['per_identificacion'];
        $per_estadoAcudiente=$data_acudiente['per_estado'];
        $per_segundonombreAcudiente=$data_acudiente['per_segundonombre'];
        $per_fechanacimientoAcudiente=$data_acudiente['per_fechanacimiento'];
        $per_municipionacimientoAcudiente=$data_acudiente['per_municipionacimiento'];
        $dba_municipioresidenciaAcudiente=$data_acudiente['dba_municipioresidencia'];
        $dba_correoAcudiente=$data_acudiente['dba_correo'];
        $dba_telefonoAcudiente=$data_acudiente['dba_telefono'];
        $dba_celularAcudiente=$data_acudiente['dba_celular'];
        $dba_lugarexpedicionAcudiente=$data_acudiente['dba_celular'];
        $dba_direccionAcudiente=$data_acudiente['dba_direccion'];
        $per_nacionalidadAcudiente=$data_acudiente['per_nacionalidad'];
        $per_otranacionalidadAcudiente=$data_acudiente['per_otranacionalidad'];
        $dba_ocupacionAcudiente=$data_acudiente['dba_ocupacion'];
        $per_fotoAcudiente=$data_acudiente['per_foto'];
    }

    if($per_fechanacimientoAcudiente){
        $fecha_actual = date('Y-m-d');
        
        $diferencia_fechas= abs(strtotime($fecha_actual) - strtotime($per_fechanacimientoAcudiente));
        
        $edad_acudiente = floor($diferencia_fechas / (365*60*60*24));
    }
    else{
        echo $edad_acudiente=' ';
    }

    if($per_nacionalidadAcudiente==1){
        $checkedColombianoAcudiente="checked";
        $checkedOtraNacionalidadAcudiente="";
        $nacionalidad_acudiente_colombiano="block";
        $nacionalidad_acudiente_otra="none";
        $nacionalidad_acudiente="";
        if($per_municipionacimientoAcudiente>0){
            $dep_naciemientoacudiente=$objRsMatricula->dep_nacimiento($per_municipionacimientoAcudiente);
        }
        else{
            $dep_naciemientoacudiente="";
        }
    }

     
    if($per_nacionalidadAcudiente==0){
        $checkedColombianoAcudiente="";
        $checkedOtraNacionalidadAcudiente="checked";
        $nacionalidad_acudiente_colombiano="none";
        $nacionalidad_acudiente_otra="block";
        $nacionalidad_acudiente=$per_otranacionalidadAcudiente;
    }

    $info_adicional_acudiente=$objRsInscripcion->info_adicional_mamita($per_codigoAcudiente);

    if($info_adicional_acudiente){
        foreach($info_adicional_acudiente as $data_info_add_acudiente){
            $dpa_viveAcudiente=$data_info_add_acudiente['dpa_vive'];
            $dpa_cargoAcudiente=$data_info_add_acudiente['dpa_cargo'];
            $dpa_empresaAcudiente=$data_info_add_acudiente['dpa_empresa'];
            $dpa_direccionoficinaAcudiente=$data_info_add_acudiente['dpa_direccionoficina'];
            $dpa_telefonooficinaAcudiente=$data_info_add_acudiente['dpa_telefonooficina'];
            $dpa_niveleducativoAcudiente=$data_info_add_acudiente['dpa_niveleducativo'];
        }
    }
}
?>
<div class="row">
    <div class="col-sm-2 padding_left">
        <div class="form-group">
            <label for="txtIdentificacionAcudiente" class="font-weight-bold">Identificación* </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtIdentificacionAcudiente" onchange="datosAcudiente()" value="<?php echo $per_identificacionAcudiente; ?>" name="txtIdentificacionAcudiente" readonly>
            <div class="alert alert-danger alerta-forcliente" id="error_id_acudiente" role="alert"></div>
            <input type="hidden" name="codigoAcudiente" value="<?php echo $per_codigoAcudiente; ?>">
        </div>
    </div>
    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtNombreAcudiente" class="font-weight-bold">Primer Nombre *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtNombreAcudiente" name="txtNombreAcudiente" aria-describedby="textHelp" data-rule-required="true" onchange="datosAcudiente()" value="<?php echo $per_nombreAcudiente; ?>" required>
            <div class="alert alert-danger alerta-forcliente" id="error_1er_nombre_acudiente" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtSegundoNombreAcudiente" class="font-weight-bold">Segundo Nombre </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtSegundoNombreAcudiente" name="txtSegundoNombreAcudiente" onchange="datosAcudiente()" value="<?php echo $per_segundoapellidoAcudiente; ?>">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            &nbsp;<label for="txtPrimerApellidoAcudiente" class="font-weight-bold">Primer Apellido *</label>
            &nbsp;<input type="text" class="form-control caja_texto_sizer" id="txtPrimerApellidoAcudiente" name="txtPrimerApellidoAcudiente" onchange="datosAcudiente()" value="<?php echo $per_primerapellidoAcudiente; ?>" data-rule-required="true" required>
            <div class="alert alert-danger alerta-forcliente" id="error_1er_apellido_acudiente" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="textSegundoApellidoAcudiente" class="font-weight-bold">Segundo Apellido </label>
            <input type="text" class="form-control caja_texto_sizer" id="textSegundoApellidoAcudiente" onchange="datosAcudiente()" value="<?php echo $per_segundoapellidoAcudiente; ?>" name="textSegundoApellidoAcudiente">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtFechaNacimientoAcudiente" class="font-weight-bold">Fecha de Nacimiento *</label>
            <input type="date" class="form-control caja_texto_sizer" id="txtFechaNacimientoAcudiente" name="txtFechaNacimientoAcudiente" aria-describedby="textHelp" data-rule-required="true" onchange="datosAcudiente()" value="<?php echo substr($per_fechanacimientoAcudiente,0,10); ?>" required>
            <div class="alert alert-danger alerta-forcliente" id="error_fecha_nace_acudiente" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            <label for="radioNacionalidadAcudiente" class="font-weight-bold">Nacionalidad</label>
            <br>
            <div class="form-check form-check-inline">
                &nbsp;<input class="form-check-input acudienteNacionalidad" type="radio" name="radioNacionalidadAcudiente"  id="radioNacionalidadAcudienteColombiana" onchange="datosAcudiente()" value="1" <?php echo $checkedColombianoAcudiente; ?> required>
                <label class="form-check-label" for="radioNacionalidadAcudienteColombiana">&nbsp;Colombiana</label>
            </div>
            <div class="form-check form-check-inline">
                &nbsp;<input class="form-check-input acudienteNacionalidad" type="radio" name="radioNacionalidadAcudiente"  id="radioNacionalidadAcudienteOtra" onchange="datosAcudiente()" value="0" <?php echo $checkedOtraNacionalidadAcudiente; ?> required>
                <label class="form-check-label" for="radioNacionalidadAcudienteOtra">&nbsp;Otra</label>
            </div>
            <div class="alert alert-danger alerta-forcliente" id="error_nacionalidad_acudiente" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-2 acudienteColombiano" style="display: <?php echo $nacionalidad_acudiente_colombiano; ?>">
        <div class="form-group">
            <label for="SelDepNacimientoAcudiente" class="font-weight-bold">Departamento de Nacimiento *</label>
            <select name="SelDepNacimientoAcudiente" id="SelDepNacimientoAcudiente"  class="form-control caja_texto_sizer" data-rule-required="true" required>
                <option value="0">Seleccione...</option>
                <?php
                    foreach ($select_departamento as $data_departamento) {
                        $dep_codigo=$data_departamento['dep_codigo'];
                        $dep_nombre=$data_departamento['dep_nombre'];
                        $dep_dane=$data_departamento['dep_dane'];

                        if($dep_naciemientoacudiente==$dep_codigo){
                            $selected_departamento_acu="selected";
                        }
                        else{
                            $selected_departamento_acu="";
                        }
                ?>
                    <option value="<?php echo  $dep_codigo; ?>" data-codigodep="<?php echo $dep_dane; ?>" <?php echo $selected_departamento_acu; ?> ><?php echo $dep_nombre; ?></option>
                <?php
                    }
                ?>
            </select>
            <div class="alert alert-danger alerta-forcliente" id="error_dep_nace_acudiente" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-2 acudienteColombiano" style="display: <?php echo $nacionalidad_acudiente_colombiano; ?>">
        <div class="form-group">
            <label for="selMunNacimientoAcudiente" class="font-weight-bold">Municipio de Nacimiento *</label>
            <div class="munNaceAcudiente">
                <select name="selMunNacimientoAcudiente" id="selMunNacimientoAcudiente" onchange="datosAcudiente()" class="form-control caja_texto_sizer" data-rule-required="true" required>
                    <option value="0">Seleccione el Departamento...</option>
                    <?php
                    if($dep_naciemientoacudiente>0){

                        $dataMunicipio=$objRsInscripcion->select_municipio_depa($dep_naciemientoacudiente);
                        foreach ($dataMunicipio as $data_municipio) {
                            $mun_codigo=$data_municipio['mun_codigo'];
                            $mun_nombre=$data_municipio['mun_nombre'];

                            if($per_municipionacimientoAcudiente==$mun_codigo){
                                $select_municipio="selected";
                            }
                            else{
                                $select_municipio="";
                            }
                    ?>
                        <option value="<?php echo  $mun_codigo; ?>" <?php echo $select_municipio; ?> ><?php echo $mun_nombre; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="alert alert-danger alerta-forcliente" id="error_mun_nace_acudiente" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-4 acudienteOtroNacionalidad" style="display: <?php echo $nacionalidad_acudiente_otra; ?>">
        <div class="form-group">
            <label for="txtCualAcudiente" class="font-weight-bold">¿Cu&aacute;l *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCualAcudiente" name="txtCualAcudiente" aria-describedby="textHelp" onchange="datosAcudiente()" value="<?php echo $nacionalidad_acudiente; ?>" >
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="txtOcupacionAcudiente" class="font-weight-bold">Profesi&oacute;n *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtOcupacionAcudiente" name="txtOcupacionAcudiente" aria-describedby="textHelp" onchange="datosAcudiente()" value="<?php echo $dba_ocupacionAcudiente; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_ocupacioacudiente" role="alert"></div>
        </div>
    </div>

</div>

<div class="row">  
    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtEmpresaAcudiente" class="font-weight-bold">Empresa donde Trabaja </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtEmpresaAcudiente" name="txtEmpresaAcudiente" aria-describedby="textHelp" onchange="datosAcudiente()" value="<?php echo $dpa_empresaAcudiente; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_empresaacudiente" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtTelefonoResidenciaAcudiente" class="font-weight-bold">Tel&eacute;fono </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtTelefonoResidenciaAcudiente" name="txtTelefonoResidenciaAcudiente" aria-describedby="textHelp" onchange="datosAcudiente()" value="<?php echo $dba_telefonoAcudiente; ?>" >
        </div>
    </div>
    
    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtCelularAcudiente" class="font-weight-bold">N° Celular *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCelularAcudiente" name="txtCelularAcudiente" aria-describedby="textHelp" onchange="datosAcudiente()"  value="<?php echo $dba_celularAcudiente; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_celular_acudiente" role="alert"></div>
        </div>
    </div>
        <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtCargoAcudiente" class="font-weight-bold">Cargo  que Desempeña</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCargoAcudiente" name="txtCargoAcudiente" aria-describedby="textHelp" onchange="datosAcudiente()"  value="<?php echo $dpa_cargoAcudiente; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_cargoacudiente" role="alert"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4 padding_left">
        <div class="form-group">
            <label for="txtCorreoAcudiente" class="font-weight-bold">Correo Electrónico *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCorreoAcudiente" name="txtCorreoAcudiente" aria-describedby="textHelp" onchange="datosAcudiente()" value="<?php echo $dba_correoAcudiente; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_email_acudiente" role="alert"></div>
        </div>
    </div>       
    
</div>
<script type="text/javascript">

    function datosAcudiente(){
        var formulario = $('#matriculaform')[0];
        var data_enviar = new FormData(formulario);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: 'cruddatosacudientematricula',
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