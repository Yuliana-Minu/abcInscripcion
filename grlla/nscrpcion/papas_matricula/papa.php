<?php
    $datos_papa=$objRsMatricula->datos_papa($personaSistema);
    if($datos_papa){
        foreach($datos_papa as $datos_papa){
            $per_codigoPapa=$datos_papa['per_codigo'];
            $per_nombrePapa=$datos_papa['per_nombre'];
            $per_primerapellidoPapa=$datos_papa['per_primerapellido']; 
            $per_segundoapellidoPapa=$datos_papa['per_segundoapellido'];
            $per_personacreoPapa=$datos_papa['per_personacreo'];
            $per_personamodificoPapa=$datos_papa['per_personamodifico'];
            $per_fechacreoPapa=$datos_papa['per_fechacreo'];
            $per_fechamodificoPapa=$datos_papa['per_fechamodifico'];
            $per_generoPapa=$data_datos_estudiante['per_genero'];
            $per_tipoidentificacionPapa=$datos_papa['per_tipoidentificacion'];
            $per_identificacionPapa=$datos_papa['per_identificacion'];
            $per_estadoPapa=$datos_papa['per_estado'];
            $per_segundonombrePapa=$datos_papa['per_segundonombre'];
            $per_fechanacimientoPapa=$datos_papa['per_fechanacimiento'];
            $per_municipionacimientoPapa=$datos_papa['per_municipionacimiento'];
            $dba_municipioresidenciaPapa=$datos_papa['dba_municipioresidencia'];
            $dba_correoPapa=$datos_papa['dba_correo'];
            $dba_telefonoPapa=$datos_papa['dba_telefono'];
            $dba_celularPapa=$datos_papa['dba_celular'];
            $dba_lugarexpedicionPapa=$datos_papa['dba_celular'];
            $dba_direccionPapa=$datos_papa['dba_direccion'];
            $per_nacionalidadPapa=$datos_papa['per_nacionalidad'];
            $per_otranacionalidadPapa=$datos_papa['per_otranacionalidad'];
            $dba_ocupacionPapa=$datos_papa['dba_ocupacion'];
            $per_fotoPapa=$datos_papa['per_foto'];
        }

        if($per_fechanacimientoPapa){
            $fecha_actual = date('Y-m-d');
            
            $diferencia_fechas= abs(strtotime($fecha_actual) - strtotime($per_fechanacimientoPapa));
            
            $edad_papa = floor($diferencia_fechas / (365*60*60*24));
        }
        else{
            echo $edad_papa=' ';
        }

        //echo "Nacionalidad Papa---> ".$per_nacionalidadPapa;

        if($per_nacionalidadPapa==1){
            $checkedColombianoPadre="checked";
            $checkedOtraNacionalidadPadres="";
            $nacionalidad_padre_colombiano="block";
            $nacionalidad_padre_otra="none";
            $nacionalidad_papa="";
            if($per_municipionacimientoPapa>0){
                $dep_naciemientopapa=$objRsMatricula->dep_nacimiento($per_municipionacimientoPapa);
            }
            else{
                $dep_naciemientopapa="";
            }
        }

        
        if($per_nacionalidadPapa==0){
            $checkedColombianoPadre="";
            $checkedOtraNacionalidadPadres="checked";
            $nacionalidad_padre_colombiano="none";
            $nacionalidad_padre_otra="block";
            $nacionalidad_papa=$per_otranacionalidadPapa;
        }

        $info_adicional_papito=$objRsInscripcion->info_adicional_papito($per_codigoPapa);
        
        if($info_adicional_papito){
            foreach($info_adicional_papito as $data_info_add_papa){
                $dpa_vivePapa=$data_info_add_papa['dpa_vive'];
                $dpa_cargoPapa=$data_info_add_papa['dpa_cargo'];
                $dpa_empresaPapa=$data_info_add_papa['dpa_empresa'];
                $dpa_direccionoficinaPapa=$data_info_add_papa['dpa_direccionoficina'];
                $dpa_telefonooficinaPapa=$data_info_add_papa['dpa_telefonooficina'];
                $dpa_niveleducativoPapa=$data_info_add_papa['dpa_niveleducativo'];
            }
        }
        

    }
?>
<div class="row">
    <div class="col-sm-2 padding_left">
        <div class="form-group">
            <label for="txtIdentificacionPadre" class="font-weight-bold">Identificación </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtIdentificacionPadre" value="<?php echo $per_identificacionPapa;?>" name="txtIdentificacionPadre" readonly>
            <div class="alert alert-danger alerta-forcliente" id="error_id_papa" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtNombrePadre" class="font-weight-bold">Primer Nombre*</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtNombrePadre" name="txtNombrePadre" aria-describedby="textHelp" data-rule-required="true" onchange="datosPadre()" value="<?php echo $per_nombrePapa;?>" required>
            <input type="hidden" name="txtCodigoPadre" value="<?php echo $per_codigoPapa;?>">
            <div class="alert alert-danger alerta-forcliente" id="error_nombre_papa" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2 ">
        <div class="form-group">
            <label for="txtSegundoNombrePadre" class="font-weight-bold">Segundo Nombre </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtSegundoNombrePadre" name="txtSegundoNombrePadre" onchange="datosPadre()" value="<?php echo $per_segundonombrePapa;?>">
        </div>
    </div>
    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtPrimerApellidoPadre" class="font-weight-bold">Primer Apellido*</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtPrimerApellidoPadre" name="txtPrimerApellidoPadre" onchange="datosPadre()" value="<?php echo $per_primerapellidoPapa;?>" data-rule-required="true" required>
            <div class="alert alert-danger alerta-forcliente" id="error_1er_apellido_papa" role="alert"></div>
        </div>
    </div>
    <div class="col-sm-2 padding_left">
        <div class="form-group">
            <label for="textSegundoApellidoPadre" class="font-weight-bold">Segundo Apellido </label>
            <input type="text" class="form-control caja_texto_sizer" id="textSegundoApellidoPadre" onchange="datosPadre()" value="<?php echo $per_segundoapellidoPapa;?>" name="textSegundoApellidoPadre">
        </div>
    </div>    
</div>

<div class="row">    
    <div class="col-sm-2">
        <div class="form-group">
            <label for="txtFechaNacimientoPadre" class="font-weight-bold">Fecha de Nacimiento *</label>
            <input type="date" class="form-control caja_texto_sizer" id="txtFechaNacimientoPadre" name="txtFechaNacimientoPadre" aria-describedby="textHelp" data-rule-required="true" onchange="datosPadre()"  value="<?php echo substr($per_fechanacimientoPapa,0,10); ?>" required>
            <div class="alert alert-danger alerta-forcliente" id="error_fecha_nace_papa" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            <label for="radioNacionalidadPadre" class="font-weight-bold">Nacionalidad</label>
            <br>
            <div class="form-check form-check-inline">
                &nbsp;<input class="form-check-input padreNacionalidad" type="radio" name="radioNacionalidadPadre"  id="radioNacionalidadPadreColombiana" onchange="datosPadre()"  value="1" <?php echo $checkedColombianoPadre; ?> required>
                <label class="form-check-label" for="radioNacionalidadPadreColombiana">&nbsp;Colombiana</label>
            </div>
            <div class="form-check form-check-inline">
                &nbsp;<input class="form-check-input padreNacionalidad" type="radio" name="radioNacionalidadPadre"  id="radioNacionalidadPadreOtra" onchange="datosPadre()"  value="0" <?php echo $checkedOtraNacionalidadPadres; ?> required>
                <label class="form-check-label" for="radioNacionalidadPadreOtra">&nbsp;Otra</label>
            </div>
            
            <div class="alert alert-danger alerta-forcliente" id="error_nacionalidad_papa" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-2 papaColombiano" style="display: <?php echo $nacionalidad_padre_colombiano; ?>">
        <div class="form-group">
            <label for="SelDepNacimientoPadre" class="font-weight-bold">Departamento de Nacimiento *</label>
            <select name="SelDepNacimientoPadre" id="SelDepNacimientoPadre"  class="form-control caja_texto_sizer" data-rule-required="true" required>
                <option value="0">Seleccione...</option>
                <?php
                    foreach ($select_departamento as $data_departamento) {
                        $dep_codigo=$data_departamento['dep_codigo'];
                        $dep_nombre=$data_departamento['dep_nombre'];
                        $dep_dane=$data_departamento['dep_dane'];

                        if($dep_naciemientopapa==$dep_codigo){
                            $selected_departamentoPadre="selected";
                        }
                        else{
                            $selected_departamentoPadre="";
                        }
                ?>
                    <option value="<?php echo  $dep_codigo; ?>" data-codigodep="<?php echo $dep_dane; ?>" <?php echo $selected_departamentoPadre; ?> ><?php echo $dep_nombre; ?></option>
                <?php
                    }
                ?>
            </select>
            
            <div class="alert alert-danger alerta-forcliente" id="error_dep_nace_papa" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-2 papaColombiano" style="display: <?php echo $nacionalidad_padre_colombiano; ?>">
        <div class="form-group">
            <label for="selMunNacimientoPadre" class="font-weight-bold">Municipio de Nacimiento *</label>
            <div class="munNacePadre">
                <select name="selMunNacimientoPadre" id="selMunNacimientoPadre"  onchange="datosPadre()"  class="form-control caja_texto_sizer" data-rule-required="true" required>
                    <option value="0">Seleccione el Departamento...</option>
                    <?php
                    if($dep_naciemientopapa>0){

                        $dataMunicipio=$objRsInscripcion->select_municipio_depa($dep_naciemientopapa);
                        foreach ($dataMunicipio as $data_municipio) {
                            $mun_codigo=$data_municipio['mun_codigo'];
                            $mun_nombre=$data_municipio['mun_nombre'];

                            if($per_municipionacimientoPapa==$mun_codigo){
                                $select_municipioPapa="selected";
                            }
                            else{
                                $select_municipioPapa="";
                            }
                    ?>
                        <option value="<?php echo  $mun_codigo; ?>" <?php echo $select_municipioPapa; ?> ><?php echo $mun_nombre; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            
            </div>
            
            <div class="alert alert-danger alerta-forcliente" id="error_mun_nace_papa" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-4 papaOtraNacionalidad" style="display: <?php echo $nacionalidad_padre_otra; ?>">
        <div class="form-group">
            <label for="txCualPadre" class="font-weight-bold">¿Cu&aacute;l *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txCualPadre" name="txCualPadre" aria-describedby="textHelp" onchange="datosPadre()" value="<?php echo $nacionalidad_papa;?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_cual_nacionalidad_papa" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="txtOcupacionPadre" class="font-weight-bold">Profesi&oacute;n </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtOcupacionPadre" name="txtOcupacionPadre" aria-describedby="textHelp" onchange="datosPadre()" value="<?php echo $dba_ocupacionPapa; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_ocupacionpadre" role="alert"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtEmpresaPadre" class="font-weight-bold">Empresa donde Trabaja</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtEmpresaPadre" name="txtEmpresaPadre" aria-describedby="textHelp" onchange="datosPadre()" value="<?php echo $dpa_empresaPapa; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_empresaPadre" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtTelefonoPadre" class="font-weight-bold">Tel&eacute;fono </label>
            <input type="text" class="form-control caja_texto_sizer" id="txtTelefonoPadre" name="txtTelefonoPadre" aria-describedby="textHelp" onchange="datosPadre()" value="<?php echo $dba_telefonoPapa; ?>" >
        </div>
    </div>

    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtCelularPadre" class="font-weight-bold">N° Celular *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCelularPadre" name="txtCelularPadre" aria-describedby="textHelp" onchange="datosPadre()" value="<?php echo $dba_celularPapa; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_celular_papa" role="alert"></div>
        </div>
    </div>

    <div class="col-sm-3 padding_left">
        <div class="form-group">
            <label for="txtCargoPadre" class="font-weight-bold">Cargo que Desampeña</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCargoPadre" name="txtCargoPadre" aria-describedby="textHelp" onchange="datosPadre()" value="<?php echo $dpa_cargoPapa; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_cargopadre" role="alert"></div>
        </div>
    </div>
</div>
<div class="row"> 
    <div class="col-sm-4 padding_left">
        <div class="form-group">
            <label for="txtCorreoPadre" class="font-weight-bold">Correo Electrónico *</label>
            <input type="text" class="form-control caja_texto_sizer" id="txtCorreoPadre" name="txtCorreoPadre" aria-describedby="textHelp" onchange="datosPadre()" value="<?php echo $dba_correoPapa; ?>" >
            <div class="alert alert-danger alerta-forcliente" id="error_correopadre" role="alert"></div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function datosPadre(){
        var formulario = $('#matriculaform')[0];
        var data_enviar = new FormData(formulario);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: 'cruddatospapamatricula',
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