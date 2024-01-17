<?php 
    $datos_mama=$objRsMatricula->datos_mama($personaSistema);
    if($datos_mama){

        foreach($datos_mama as $datos_mama){
            $per_codigoMama=$datos_mama['per_codigo'];
            $per_nombreMama=$datos_mama['per_nombre'];
            $per_primerapellidoMama=$datos_mama['per_primerapellido']; 
            $per_segundoapellidoMama=$datos_mama['per_segundoapellido'];
            $per_personacreoMama=$datos_mama['per_personacreo'];
            $per_personamodificoMama=$datos_mama['per_personamodifico'];
            $per_fechacreoMama=$datos_mama['per_fechacreo'];
            $per_fechamodificoMama=$datos_mama['per_fechamodifico'];
            $per_generoMama=$datos_mama['per_genero'];
            $per_tipoidentificacionMama=$datos_mama['per_tipoidentificacion'];
            $per_identificacionMama=$datos_mama['per_identificacion'];
            $per_estadoMama=$datos_mama['per_estado'];
            $per_segundonombreMama=$datos_mama['per_segundonombre'];
            $per_fechanacimientoMama=$datos_mama['per_fechanacimiento'];
            $per_municipionacimientoMama=$datos_mama['per_municipionacimiento'];
            $dba_municipioresidenciaMama=$datos_mama['dba_municipioresidencia'];
            $dba_correoMama=$datos_mama['dba_correo'];
            $dba_telefonoMama=$datos_mama['dba_telefono'];
            $dba_celularMama=$datos_mama['dba_celular'];
            $dba_lugarexpedicionMama=$datos_mama['dba_celular'];
            $dba_direccionMama=$datos_mama['dba_direccion'];
            $per_nacionalidadMama=$datos_mama['per_nacionalidad'];
            $per_otranacionalidadMama=$datos_mama['per_otranacionalidad'];
            $dba_ocupacionMama=$datos_mama['dba_ocupacion'];
            $per_fotoMama=$datos_mama['per_foto'];
        }

        if($per_fechanacimientoMama){
            $fecha_actual = date('Y-m-d');
            
            $diferencia_fechas= abs(strtotime($fecha_actual) - strtotime($per_fechanacimientoMama));
            
            $edad_mama = floor($diferencia_fechas / (365*60*60*24));
        }
        else{
            echo $edad_mama=' ';
        }

        if($per_nacionalidadMama==1){
            $checkedColombianoMadre="checked";
            $checkedOtraNacionalidadMadre="";
            $nacionalidad_madre_colombiano="block";
            $nacionalidad_madre_otra="none";
            $nacionalidad_mama="";
            if($per_municipionacimientoMama>0){
                $dep_naciemientomama=$objRsMatricula->dep_nacimiento($per_municipionacimientoMama);
            }
            else{
                $dep_naciemientomama="";
            }
        }

        
        if($per_nacionalidadMama==0){
            $checkedColombianoMadre="";
            $checkedOtraNacionalidadMadres="checked";
            $nacionalidad_madre_colombiano="none";
            $nacionalidad_madre_otra="block";
            $nacionalidad_mama=$per_otranacionalidadMama;
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
        }
    }

?>
<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtIdentificacionMadre" class="font-weight-bold">Identificación* </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtIdentificacionMadre" value="<?php echo $per_identificacionMama; ?>" name="txtIdentificacionMadre" readonly>
            <div class="alert alert-danger alerta-forcliente" id="error_id_mama" role="alert"></div> 
            <input type="hidden" name="txtCodigoMadre" value="<?php echo $per_codigoMama;?>">
        </div>
    </div>
    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtNombreMadre" class="font-weight-bold">Primer Nombre *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtNombreMadre" name="txtNombreMadre" aria-describedby="textHelp" onchange="datosMadre()" data-rule-required="true" value="<?php echo $per_nombreMama; ?>" required>
            <div class="alert alert-danger alerta-forcliente" id="error_1er_nombre_mama" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtSegundoNombreMadre" class="font-weight-bold">Segundo Nombre </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtSegundoNombreMadre" name="txtSegundoNombreMadre" onchange="datosMadre()"  value="<?php echo $per_segundonombreMama; ?>">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            &nbsp;<label for="txtPrimerApellidoMadre" class="font-weight-bold">Primer Apellido *</label>
            &nbsp;<input type="text" class="form-control caja_texto_sizer" id="txtPrimerApellidoMadre" name="txtPrimerApellidoMadre" onchange="datosMadre()" value="<?php echo $per_primerapellidoMama; ?>" data-rule-required="true" required>
            <div class="alert alert-danger alerta-forcliente" id="error_1er_apellido_mama" role="alert"></div>               
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="textSegundoApellidoMadre" class="font-weight-bold">Segundo Apellido </label>
            <input type="text" class="form-control caja_texto_sizer" id="textSegundoApellidoMadre" onchange="datosMadre()" value="<?php echo $per_segundoapellidoMama; ?>" name="textSegundoApellidoMadre">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtFechaNacimientoMadre" class="font-weight-bold">Fecha de Nacimiento *</label>
            <input type="date" class="form-control caja_texto_sizer" id="txtFechaNacimientoMadre" name="txtFechaNacimientoMadre" aria-describedby="textHelp" data-rule-required="true" onchange="datosMadre()" value="<?php echo substr($per_fechanacimientoMama,0,10); ?>" required>
            <div class="alert alert-danger alerta-forcliente" id="error_fecha_nace_mama" role="alert"></div> 
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            <label for="radioNacionalidadMadre" class="font-weight-bold">Nacionalidad*</label>
            <br>
            <div class="form-check form-check-inline">
                &nbsp;<input class="form-check-input madreNacionalidad" type="radio" name="radioNacionalidadMadre"  id="radioNacionalidadMadreColombiana" onchange="datosMadre()"  value="1" <?php echo $checkedColombianoMadre; ?> required>
                <label class="form-check-label" for="radioNacionalidadMadreColombiana">&nbsp;Colombiana</label>
            </div>
            <div class="form-check form-check-inline">
                &nbsp;<input class="form-check-input madreNacionalidad" type="radio" name="radioNacionalidadMadre"  id="radioNacionalidadMadreOtra" onchange="datosMadre()" value="0" <?php echo $checkedOtraNacionalidadMadres; ?> required>
                <label class="form-check-label" for="radioNacionalidadMadreOtra">&nbsp;Otra</label>
            </div>
            <div class="alert alert-danger alerta-forcliente" id="error_nacionalidad_mama" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-2 mamaColombiano" style="display: <?php echo $nacionalidad_madre_colombiano; ?>">
        <div class="form-group">
            <label for="SelDepNacimientoMadre" class="font-weight-bold">Departamento de Nacimiento *</label>
            <select name="SelDepNacimientoMadre" id="SelDepNacimientoMadre"  class="form-control caja_texto_sizer" data-rule-required="true" required>
                <option value="0">Seleccione...</option>
                <?php
                    foreach ($select_departamento as $data_departamento) {
                        $dep_codigo=$data_departamento['dep_codigo'];
                        $dep_nombre=$data_departamento['dep_nombre'];
                        $dep_dane=$data_departamento['dep_dane'];

                        if($dep_naciemientomama==$dep_codigo){
                            $selected_departamentomama="selected";
                        }
                        else{
                            $selected_departamentomama="";
                        }
                ?>
                    <option value="<?php echo  $dep_codigo; ?>" data-codigodep="<?php echo $dep_dane; ?>" <?php echo $selected_departamentomama; ?> ><?php echo $dep_nombre; ?></option>
                <?php
                    }
                ?>
            </select>
            <div class="alert alert-danger alerta-forcliente" id="error_dep_nace_mama" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-2 mamaColombiano" style="display: <?php echo $nacionalidad_madre_colombiano; ?>">
        <div class="form-group">
            <label for="selMunNacimientoMadre" class="font-weight-bold">Municipio de Nacimiento *</label>
            <div class="munNaceMadre">
                <select name="selMunNacimientoMadre" id="selMunNacimientoMadre" onchange="datosMadre()" class="form-control caja_texto_sizer" data-rule-required="true" required>
                    <option value="0">Seleccione el Departamento...</option>
                    <?php
                    if($dep_naciemientomama>0){

                        $dataMunicipio=$objRsInscripcion->select_municipio_depa($dep_naciemientomama);
                        foreach ($dataMunicipio as $data_municipio) {
                            $mun_codigo=$data_municipio['mun_codigo'];
                            $mun_nombre=$data_municipio['mun_nombre'];

                            if($per_municipionacimientoMama==$mun_codigo){
                                $select_municipionaceMama="selected";
                            }
                            else{
                                $select_municipionaceMama="";
                            }
                    ?>
                        <option value="<?php echo  $mun_codigo; ?>" <?php echo $select_municipionaceMama; ?> ><?php echo $mun_nombre; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <div class="alert alert-danger alerta-forcliente" id="error_mun_nace_mama" role="alert"></div>
            </div>
            
        </div>
    </div>

    <div class="col-sm-4 mamOtraNacionalidad" style="display: <?php echo $nacionalidad_madre_otra; ?>">
        <div class="form-group">
            <label for="txtCualMadre" class="font-weight-bold">¿Cu&aacute;l *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCualMadre" name="txtCualMadre" aria-describedby="textHelp" onchange="datosMadre()" value="<?php echo $nacionalidad_mama; ?>" >
        </div>
    </div>

    <div class="col-sm-4 padding_left">
        <div class="form-group">
            <label for="txtOcupacionMadre" class="font-weight-bold">Profesi&oacute;n *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtOcupacionMadre" name="txtOcupacionMadre" aria-describedby="textHelp" onchange="datosMadre()" value="<?php echo $dba_ocupacionMama; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_ocupacionmadre" role="alert"></div>
        </div>
    </div>
</div>

<div class="row">
    
    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtEmpresaMadre" class="font-weight-bold">Empresa donde Trabaja </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtEmpresaMadre" name="txtEmpresaMadre" aria-describedby="textHelp" onchange="datosMadre()" value="<?php echo $dpa_empresaMama; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_empresamadre" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtTelefonoResidenciaMadre" class="font-weight-bold">Tel&eacute;fono *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtTelefonoResidenciaMadre" name="txtTelefonoResidenciaMadre" aria-describedby="textHelp" onchange="datosMadre()" value="<?php echo $dba_telefonoMama; ?>" >
        </div>
    </div>
    
    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtCelularMadre" class="font-weight-bold">N° Celular *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCelularMadre" name="txtCelularMadre" aria-describedby="textHelp" onchange="datosMadre()" value="<?php echo $dba_celularMama; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_celular_mama" role="alert"></div>
        </div>
    </div>

        <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtCargoMadre" class="font-weight-bold">Cargo  que Desempeña</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCargoMadre" name="txtCargoMadre" aria-describedby="textHelp" onchange="datosMadre()" value="<?php echo $dpa_cargoMama; ?>" >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4 padding_left">
        <div class="form-group">
            <label for="txtCorreoMadre" class="font-weight-bold">Correo Electrónico *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCorreoMadre" name="txtCorreoMadre" aria-describedby="textHelp" onchange="datosMadre()" value="<?php echo $dba_correoMama; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_email_mama" role="alert"></div>
        </div>
    </div> 
</div>
<script type="text/javascript">

    function datosMadre(){
        var formulario = $('#matriculaform')[0];
        var data_enviar = new FormData(formulario);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: 'cruddatosmamamatricula',
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