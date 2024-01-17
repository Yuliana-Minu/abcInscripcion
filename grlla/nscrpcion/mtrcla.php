<style>
    #signArea{
        width:304px;
        margin: 50px auto;
    }
    #signAreaDos{
        width:304px;
        margin: 50px auto;
    }
    #signAreaTres{
        width:304px;
        margin: 50px auto;
    }
    #signAreaCuatro{
        width:304px;
        margin: 50px auto;
    }
    .sign-container {
        width: 60%;
        margin: auto;
    }
    .sign-preview {
        width: 150px;
        height: 50px;
        border: solid 1px #CFCFCF;
        margin: 10px 5px;
    }
    .tag-ingo {
        font-family: cursive;
        font-size: 12px;
        text-align: left;
        font-style: oblique;
    }
    .alert.alert-danger.alerta-forcliente{
        display: none;
        padding: 0;
        color: red ;
        font-weight: bold;
    }
</style>

<?php 
    $visibilidad_nacionalidades="none";
    $listado_grado=$objRsInscripcion->lista_grado();
    $select_departamento=$objRsInscripcion->select_departamento();
    $departamento_residencia=$objRsInscripcion->departamento_residencia();
    $parentesco=$objRsInscripcion->parentesco();

    $tipo_identificacion=$objRsMatricula->tipo_identificacion();

    $eps=$objRsMatricula->eps();

    $dataRh=$objRsMatricula->rh();

    $personaSistema = $_SESSION['idusuario'];

    $datos_estudiante=$objRsMatricula->datos_ninio($personaSistema);

    foreach($datos_estudiante as $data_datos_estudiante){
        $per_codigo=$data_datos_estudiante['per_codigo'];
        $per_nombre=$data_datos_estudiante['per_nombre'];
        $per_primerapellido=$data_datos_estudiante['per_primerapellido']; 
        $per_segundoapellido=$data_datos_estudiante['per_segundoapellido'];
        $per_personacreo=$data_datos_estudiante['per_personacreo'];
        $per_personamodifico=$data_datos_estudiante['per_personamodifico'];
        $per_fechacreo=$data_datos_estudiante['per_fechacreo'];
        $per_fechamodifico=$data_datos_estudiante['per_fechamodifico'];
        $per_genero=$data_datos_estudiante['per_genero'];
        $per_tipoidentificacion=$data_datos_estudiante['per_tipoidentificacion'];
        $per_identificacion=$data_datos_estudiante['per_identificacion'];
        $per_estado=$data_datos_estudiante['per_estado'];
        $per_segundonombre=$data_datos_estudiante['per_segundonombre'];
        $per_fechanacimiento=$data_datos_estudiante['per_fechanacimiento'];
        $per_municipionacimiento=$data_datos_estudiante['per_municipionacimiento'];
        $dba_municipioresidencia=$data_datos_estudiante['dba_municipioresidencia'];
        $dba_correo=$data_datos_estudiante['dba_correo'];
        $dba_telefono=$data_datos_estudiante['dba_telefono'];
        $dba_celular=$data_datos_estudiante['dba_celular'];
        $dba_lugarexpedicion=$data_datos_estudiante['dba_lugarexpedicion'];
        $dba_direccion=$data_datos_estudiante['dba_direccion'];
        $per_nacionalidad=$data_datos_estudiante['per_nacionalidad'];
        $per_otranacionalidad=$data_datos_estudiante['per_otranacionalidad'];
        $dba_eps=$data_datos_estudiante['dba_eps'];
        $dba_estrato=$data_datos_estudiante['dba_estrato'];
        $dba_sisben=$data_datos_estudiante['dba_sisben'];
        $dba_rh=$data_datos_estudiante['dba_rh'];
        $per_foto=$data_datos_estudiante['per_foto'];


    }

    $nombre_completo = $per_nombre." ".$per_segundonombre." ".$per_primerapellido." ".$per_segundoapellido;

    if($dba_sisben==1){
        $sisbenSi="checked";
        $sisbenNo="";
    }

    if($dba_sisben==0){
        $sisbenSi="";
        $sisbenNo="checked";
    }
    
    if($per_nacionalidad==1){
        $chequedColombianoNinio="checked";
        $chequedOtraNinio="";
        $nacionalidad_ninio_colombiano="block";
        $nacionalidad_ninio_otro="none";

    }

    if($per_nacionalidad==0){
        $chequedColombianoNinio="";
        $chequedOtraNinio="checked";
        $nacionalidad_ninio_colombiano="none";
        $nacionalidad_ninio_otro="block";
    }

    if($per_municipionacimiento>0){
        $dep_naciemiento=$objRsMatricula->dep_nacimiento($per_municipionacimiento);
    }
    else{
        $dep_naciemiento="";
    }

    if($dba_municipioresidencia>0){
        $dep_residencia=$objRsMatricula->dep_nacimiento($dba_municipioresidencia);
    }
    else{
        $dep_residencia="";
    }

?>


<div class="row">
    <div class="col-sm-12 text-center">
        <h2 style="color: #0c438f;"><strong>GIMNASIO AMERICANO ABC</strong></h2>
        <h4 style="color: #0c438f;"><strong>FORMULARIO DE MATRICULA</strong></h4>
        <input type="hidden" id="user" value="<?php echo $personaSistema;?>">
        <br>
    </div>
</div>


<form id="matriculaform" role="form" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <h5 style="color: #0c438f;"><strong>DATOS DE LA MATRICULA</strong></h5>
            <hr style="border: 2px solid red; ">
        </div>
    </div>
    <?php
        $datos_matricula=$objRsMatricula->datos_matricula($per_codigo, $calendario_apertura);
        if($datos_matricula){
            foreach($datos_matricula as $data_datos_matricula){
               $dma_codigo=$data_datos_matricula['dma_codigo'];
               $dma_fechamatricula=$data_datos_matricula['dma_fechamatricula'];
               $dma_gradoingresar=$data_datos_matricula['dma_gradoingresar'];
               
            }
            $fecha_matricula=$dma_fechamatricula;
        }
        else{
            $fecha_matricula=date('Y-m-d');
        }
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="txtFechaPreMatricula" class="font-weight-bold">Fecha *</label>
                <input type="date" class="form-control caja_texto_sizer" id="txtFechaPreMatricula" name="txtFechaPreMatricula" aria-describedby="textHelp" data-rule-required="true" value="<?php echo $fecha_matricula; ?>" onchange="datosEstudiante()" required>
                <input type="hidden" class="form-control caja_texto_sizer" id="txtCodigoEstudiante" name="txtCodigoEstudiante" value="<?php echo $per_codigo; ?>">
                <div class="alert alert-danger alerta-forcliente" id="error_fecha_matricula" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="selGradoIngresar" class="font-weight-bold">Grado a Ingresar *</label>
                <select name="selGradoIngresar" id="selGradoIngresar"  class="form-control caja_texto_sizer" onchange="datosEstudiante()" data-rule-required="true" required>
                    <option value="0">Seleccione...</option>
                    <?php 
                    if($listado_grado){
                        foreach($listado_grado as $data_listado_grado){
                            $gra_codigo=$data_listado_grado['gra_codigo'];
                            $gra_nombre=$data_listado_grado['gra_nombre'];

                            if($gra_codigo==$dma_gradoingresar){
                                $selected_grado="selected";
                            }
                            else{
                                $selected_grado="";
                            }
                    ?>
                    <option value="<?php echo $gra_codigo; ?>" <?php echo $selected_grado; ?>><?php echo $gra_nombre; ?></option>      
                    <?php 
                        }
                    }
                    ?>
                </select>
                <div class="alert alert-danger alerta-forcliente" id="error_grado_ingresar" role="alert"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h6 style="color: #0c438f;"><strong>INFORMACIÓN PERSONAL DEL ESTUDIANTE</strong></h6>
            <hr style="border: 2px solid red; ">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="txtIdentificacion" class="font-weight-bold">No. de Identidad *</label>
                <input type="text" class="form-control caja_texto_sizer" id="txtIdentificacionN" name="txtIdentificacion" aria-describedby="textHelp" data-rule-required="true" value="<?php echo $per_identificacion; ?>" onchange="ingreso_pasos()" readonly>
                <input type="hidden" class="form-control caja_texto_sizer" id="per_codigo" name="per_codigo" value="<?php echo $per_codigo; ?>">
                <div class="alert alert-danger alerta-forcliente" id="error_identificacion" role="alert"></div>
            </div>
        </div>
        <div class="col-sm-3 padding_left">
            <div class="form-group">
                <label for="selTipoIdentificacion" class="font-weight-bold">tipo de Identificaci&oacute;n *</label>
                <select name="selTipoIdentificacion" id="selTipoIdentificacion"  class="form-control caja_texto_sizer" onchange="datosEstudiante()" data-rule-required="true" required>
                    <option value="0">Seleccione...</option>
                    <?php 
                    if($tipo_identificacion){
                        foreach($tipo_identificacion as $data_tipo_identificacion){
                            $tid_codigo=$data_tipo_identificacion['tid_codigo'];
                            $tid_nombre=$data_tipo_identificacion['tid_nombre'];

                            if($per_tipoidentificacion==$tid_codigo){
                                $selected_tipide="selected";
                            }
                            else{
                                $selected_tipide="";
                            }
                    ?>
                    <option value="<?php echo $tid_codigo; ?>" <?php echo $selected_tipide; ?>><?php echo $tid_nombre; ?></option>      
                    <?php 
                        }
                    }
                    ?>      
                </select>
                <div class="alert alert-danger alerta-forcliente" id="error_tipo_id" role="alert"></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="txtLugarExpedicion" class="font-weight-bold">Lugar de Expedici&oacute;n </label>
                <input type="text" class="form-control caja_texto_sizer" id="txtLugarExpedicion" name="txtLugarExpedicion" aria-describedby="textHelp" value="<?php echo $dba_lugarexpedicion; ?>" onchange="datosEstudiante()">
                <div class="alert alert-danger alerta-forcliente" id="error_lugarExpedicion" role="alert"></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="txtNombre" class="font-weight-bold">Primer Nombre *</label>
                <input type="text" class="form-control caja_texto_sizer" id="txtNombre" name="txtNombre" aria-describedby="textHelp" data-rule-required="true" value="<?php echo $per_nombre; ?>" onchange="datosEstudiante()" required>
                <div class="alert alert-danger alerta-forcliente" id="error_1er_nombre" role="alert"></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="txtSegundoNombre" class="font-weight-bold">Segundo Nombre </label>
                <input type="text" class="form-control caja_texto_sizer" id="txtSegundoNombre" name="txtSegundoNombre" value="<?php echo $per_segundonombre; ?>" onchange="datosEstudiante()" >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3 padding_left">
            <div class="form-group">
                <label for="txtPrimerApellido" class="font-weight-bold">Primer Apellido *</label>
                <input type="text" class="form-control caja_texto_sizer" id="txtPrimerApellido" name="txtPrimerApellido" value="<?php echo $per_primerapellido; ?>" onchange="datosEstudiante()"  data-rule-required="true" required>
                <div class="alert alert-danger alerta-forcliente" id="error_1er_apellido" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-3 padding_left">
            <div class="form-group">
                <label for="textSegundoApellido" class="font-weight-bold">Segundo Apellido </label>
                <input type="text" class="form-control caja_texto_sizer" id="txtSegundoApellido" value="<?php echo $per_segundoapellido; ?>" onchange="datosEstudiante()" name="txtSegundoApellido">
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="radioNacionalidadNinio" class="font-weight-bold">Nacionalidad</label>
                <br>
                <div class="form-check form-check-inline">
                    &nbsp;<input class="form-check-input ninioNacionalidad" type="radio" name="radioNacionalidadNinio"  id="radioNacionalidadNinioColombiana" onchange="datosEstudiante()" value="1" <?php echo $chequedColombianoNinio; ?>  required>
                    <label class="form-check-label" for="radioNacionalidadNinioColombiana">&nbsp;Colombiana</label>
                </div>
                <div class="form-check form-check-inline">
                    &nbsp;<input class="form-check-input ninioNacionalidad" type="radio" name="radioNacionalidadNinio"  id="radioNacionalidadNinioOtra" onchange="datosEstudiante()" value="0" <?php echo $chequedOtraNinio; ?> required>
                    <label class="form-check-label" for="radioNacionalidadNinioOtra">&nbsp;Otra</label>
                </div>
               
                <div class="alert alert-danger alerta-forcliente" id="error_nacionalidad_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2 ninioColombiano" style="display: <?php echo $nacionalidad_ninio_colombiano; ?>">
            <div class="form-group">
                <label for="SelDepNacimiento" class="font-weight-bold">Dep. de Nacimiento *</label>
                <select name="SelDepNacimiento" id="SelDepNacimiento"  class="form-control caja_texto_sizer" data-rule-required="true" required>
                    <option value="0">Seleccione...</option>
                    <?php
                        foreach ($select_departamento as $data_departamento) {
                            $dep_codigo=$data_departamento['dep_codigo'];
                            $dep_nombre=$data_departamento['dep_nombre'];
                            $dep_dane=$data_departamento['dep_dane'];

                            if($dep_naciemiento==$dep_codigo){
                                $selected_departamento="selected";
                            }
                            else{
                                $selected_departamento="";
                            }
                    ?>
                        <option value="<?php echo  $dep_codigo; ?>" data-codigodep="<?php echo $dep_dane; ?>" <?php echo $selected_departamento; ?> ><?php echo $dep_nombre; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <div class="alert alert-danger alerta-forcliente" id="error_dep_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2 ninioColombiano" style="display: <?php echo $nacionalidad_ninio_colombiano; ?>">
            <div class="form-group">
                <label for="selMunNacimiento" class="font-weight-bold">Mun. de Nacimiento *</label>
                <div class="munNace">
                    <select name="selMunNacimiento" id="selMunNacimiento" onchange="datosEstudiante()"  class="form-control caja_texto_sizer" data-rule-required="true" required>
                        <?php
                        if($dep_naciemiento){
                        ?>
                        <option value="0">Seleccione el Municipio..</option>
                        <?php 

                            $dataMunicipio=$objRsInscripcion->select_municipio_depa($dep_naciemiento);
                            foreach ($dataMunicipio as $data_municipio) {
                                $mun_codigo=$data_municipio['mun_codigo'];
                                $mun_nombre=$data_municipio['mun_nombre'];

                                if($per_municipionacimiento==$mun_codigo){
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
                        else{
                        ?>
                            <option value="0">Seleccione el Departamento...</option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>
                <div class="alert alert-danger alerta-forcliente" id="error_mun_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2 ninioOtraNacionalidad" style="display: <?php echo $nacionalidad_ninio_otro; ?>">
            <div class="form-group">
                <label for="txtCualNinio" class="font-weight-bold">¿Cu&aacute;l? *</label>
                <input type="text" class="form-control caja_texto_sizer" id="txtCualNinio" name="txtCualNinio" aria-describedby="textHelp" onchange="datosEstudiante()" value="" >
                <div class="alert alert-danger alerta-forcliente" id="error_nacionalidad_ninio" role="alert"></div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="txtFechaNacimiento" class="font-weight-bold">Fecha de Nacimiento *</label>
                <input type="date" class="form-control caja_texto_sizer" id="txtFechaNacimiento" name="txtFechaNacimiento" aria-describedby="textHelp" data-rule-required="true" onchange="datosEstudiante()" value="<?php echo substr($per_fechanacimiento,0,10); ?>" required>
               
                <div class="alert alert-danger alerta-forcliente" id="error_date_nacimiento_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="txtDireccion" class="font-weight-bold">Dirección y Barrio</label>
                <input type="text" class="form-control caja_texto_sizer" id="txtDireccion" name="txtDireccion" aria-describedby="textHelp" onchange="datosEstudiante()" value="<?php echo $dba_direccion; ?>" >
                <div class="alert alert-danger alerta-forcliente" id="error_direccion_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="SelDepResidencia" class="font-weight-bold">Dep. de Residencia</label>
                <select name="SelDepResidencia" id="SelDepResidencia"  class="form-control caja_texto_sizer" data-rule-required="true" required>
                    <option value="0">Seleccione...</option>
                    <?php
                        foreach ($departamento_residencia as $data_depResidencia) {
                            $dep_codigo=$data_depResidencia['dep_codigo'];
                            $dep_nombre=$data_depResidencia['dep_nombre'];
                            $dep_dane=$data_depResidencia['dep_dane'];

                            if($dep_residencia==$dep_codigo){
                                $select_depResidencia="selected";
                            }
                            else{
                                $select_depResidencia="";
                            }
                    ?>
                        <option value="<?php echo  $dep_codigo; ?>" <?php echo $select_depResidencia; ?> data-codigodep="<?php echo $dep_dane; ?>" ><?php echo $dep_nombre; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <div class="alert alert-danger alerta-forcliente" id="error_dep_residencia_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="selMunResidencia" class="font-weight-bold">Mun. de Residencia</label>
                <div class="munVive">
                    <select name="selMunResidencia" id="selMunResidencia"  class="form-control caja_texto_sizer" onchange="datosEstudiante()" data-rule-required="true" required>
                        <?php
                            if($dep_residencia){
                        ?>
                        <option value="0">Seleccione el Municipio...</option>
                        <?php
                            $dataMunicipio=$objRsInscripcion->select_municipio_depa($dep_residencia);
                            foreach ($dataMunicipio as $data_municipio) {
                                $mun_codigo=$data_municipio['mun_codigo'];
                                $mun_nombre=$data_municipio['mun_nombre'];

                                if($dba_municipioresidencia==$mun_codigo){
                                    $select_munResidencia="selected";
                                }
                                else{
                                    $select_munResidencia="";
                                }
                        ?>
                            <option value="<?php echo  $mun_codigo; ?>" <?php echo $select_munResidencia; ?>><?php echo $mun_nombre; ?></option>
                        <?php
                            }
                        }
                        else{
                        ?>
                        <option value="0">Seleccione el Departamento...</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>               
                <div class="alert alert-danger alerta-forcliente" id="error_mun_residencia_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2" >
            <div class="form-group">
                <label for="txtTelefono" class="font-weight-bold">Teléfono </label>
                <input type="text" class="form-control caja_texto_sizer" id="txtTelefono" name="txtTelefono" aria-describedby="textHelp" onchange="datosEstudiante()" value="<?php echo $dba_telefono; ?>" >
                <div class="alert alert-danger alerta-forcliente" id="error_telefono" role="alert"></div>
            </div>
        </div>
    </div>

    <div class="row">       
        <div class="col-sm-3 padding_left">
            <div class="form-group">
                <label for="txtCelular" class="font-weight-bold">Celular </label>
                <input type="text" class="form-control caja_texto_sizer" id="txtCelular" name="txtCelular" aria-describedby="textHelp" onchange="datosEstudiante()" value="<?php echo $dba_celular; ?>" >
                <div class="alert alert-danger alerta-forcliente" id="error_celular" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-3 padding_left">
            <div class="form-group">
                <label for="txtCorreo" class="font-weight-bold">E-mail del estudiante</label>
                <input type="email" class="form-control caja_texto_sizer" id="txtCorreo" name="txtCorreo" aria-describedby="textHelp" onchange="datosEstudiante()" value="<?php echo $dba_correo; ?>" >
                <div class="alert alert-danger alerta-forcliente" id="error_email_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="selEps" class="font-weight-bold">Eps *</label>
                <select name="selEps" id="selEps"  class="form-control caja_texto_sizer" onchange="datosEstudiante()" data-rule-required="true" required>
                    <option value="0">Seleccione...</option>
                    <?php 
                    if($eps){
                        foreach($eps as $data_eps){
                            $eps_codigo=$data_eps['eps_codigo'];
                            $eps_descripcion=$data_eps['eps_descripcion'];

                            if($dba_eps==$eps_codigo){
                                $selected_eps="selected";
                            }
                            else{
                                $selected_eps="";
                            }
                    ?>
                    <option value="<?php echo $eps_codigo; ?>" <?php echo $selected_eps; ?>><?php echo $eps_descripcion; ?></option>      
                    <?php 
                        }
                    }
                    ?>                            
                </select>
                <div class="alert alert-danger alerta-forcliente" id="error_eps_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="selRh" class="font-weight-bold">RH  </label>
                <select name="selRh" id="selRh"  onchange="datosEstudiante()" class="form-control caja_texto_sizer">
                    <option value="0">Seleccione...</option>
                    <?php
                        foreach ($dataRh as $data_rh) {
                            $rh_codigo=$data_rh['rh_codigo'];
                            $rh_nombre=$data_rh['rh_nombre'];

                            if($dba_rh==$rh_codigo){
                                $select_rh="selected";
                            }
                            else{
                                $select_rh="";
                            }
                    ?>
                        <option value="<?php echo $rh_codigo; ?>" <?php echo $select_rh; ?> ><?php echo $rh_nombre; ?></option>
                    <?php
                        }
                    ?>
                </select>               
                <div class="alert alert-danger alerta-forcliente" id="error_rh_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="txtEstrato" class="font-weight-bold">Estrato </label>
                <input type="number" class="form-control caja_texto_sizer" id="txtEstrato" name="txtEstrato" aria-describedby="textHelp" onchange="datosEstudiante()" value="<?php echo $dba_estrato; ?>" >
                <div class="alert alert-danger alerta-forcliente" id="error_estrato" role="alert"></div>
            </div>
        </div>
    </div>

    <div class="row">        
        <div class="col-sm-3 padding_left">
            <div class="form-group">
                <label for="radioSisben" class="font-weight-bold">Tiene Sisben</label>
                <br>
                <div class="form-check form-check-inline">
                    &nbsp;<input class="form-check-input" type="radio" name="radioSisben"  id="radioSisbenSi" onchange="datosEstudiante()" value="1" <?php echo $sisbenSi; ?> required>
                    <label class="form-check-label" for="radioSisbenSi">&nbsp;Si</label>
                </div>
                <div class="form-check form-check-inline">
                    &nbsp;<input class="form-check-input" type="radio" name="radioSisben"  id="radioSisbenNo" onchange="datosEstudiante()" value="0" <?php echo $sisbenNo; ?> required>
                    <label class="form-check-label" for="radioSisbenNo">&nbsp;No</label>
                </div>               
                <div class="alert alert-danger alerta-forcliente" id="error_sisben_ninio" role="alert"></div>
            </div>
        </div>     
    </div>

    <script type="text/javascript">
        function datosEstudiante(){
            var formulario = $('#matriculaform')[0];
            var data_enviar = new FormData(formulario);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: 'cruddatosestudiantematricula',
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

    <div class="row">
        <div class="col-sm-12">
            <h5 style="color: #0c438f;"><strong>INFORMACIÓN DEL PADRE</strong></h5>
            <hr style="border: 2px solid red; ">
        </div>
    </div>
    <?php 
        $validar_papa = $objRsInscripcion->validar_papa($personaSistema, 1);
        if($validar_papa == 0){
            include('papas/validar_papa.php');
        }
        else{
            include('papas_matricula/papa.php');
        }  
    ?>
    
   
    <div class="row">
        <div class="col-sm-12">
            <input type="hidden" id="validar_papa" value="<?php echo $validar_papa;?>">
            <h5 style="color: #0c438f;"><strong>INFORMACIÓN DE LA MADRE</strong></h5>
            <hr style="border: 2px solid red; ">
        </div>
    </div>

    <?php
        $validar_mama = $objRsInscripcion->validar_papa($personaSistema, 2);
        if($validar_mama == 0){
            include('papas/validar_mama.php');
        }
        else{
            include('papas_matricula/mama.php');
        }
    ?>

    <div class="row">
        <div class="col-sm-12">
            <input type="hidden" id="validar_mama" value="<?php echo $validar_mama;?>">
            <h5 style="color: #0c438f;"><strong>INFORMACI&Oacute;N DEL ACUDIENTE</strong></h5>
            <hr style="border: 2px solid red; ">
        </div>
    </div>
    
    <?php 
        $validar_acudiente = $objRsInscripcion->validar_papa($personaSistema, 3);
        if($validar_acudiente == 0){
            include('papas_matricula/validar_acudiente.php');
        }
        else{
            include('papas_matricula/acudiente.php');
        }
    ?>

    <div class="row">
   
        <div class="col-sm-12 align-self-center text-center">
            <input type="hidden" id="validar_acudiente" value="<?php echo $validar_acudiente;?>">
            <input type="hidden" id="firmaPadre" name="firmaPadre" value="">
            <input type="hidden" id="firmaMadre" name="firmaMadre" value="">
            <input type="hidden" id="firmaAcudiente" name="firmaAcudiente" value="">
            <input type="hidden" id="firmaNinio" name="firmaNinio" value="">
            <button type="button" class="btn btn-danger btn-lg btn-block" onclick="validar_prematricula();"><i class="far fa-save"></i> Guardar</button>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
</form>

    
<script src="vjs/registroMatricula.js"></script>
<script type="text/javascript">
    function ingreso_pasos(){
        var user=$('#txtIdentificacion').val();
        var formulario = $('#matriculaform')[0];
        var data_enviar = new FormData(formulario);
    
        //alert(data_enviar);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: 'matriculaporpasos',
            data: data_enviar,
            cache: false,
            contentType: false,
            processData: false, 
            success: function (data, status) {
                //alert("Hello");
                //window.location.replace('procesoninio?'+user);
            },
            error: function (e) {
                //alert("Error en el Proceso");
            }
        });
    }

   /* $("#btnSaveSign").click(function(e){
        html2canvas([document.getElementById('sign-pad')], {
            onrendered: function (canvas) {
                var canvas_img_data = canvas.toDataURL('image/png');
                var img_datapadre = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");

                //alert("imagen uno "+img_datapadre);
                $('#firmaPadre').val(img_datapadre);
                
            }
        });

        html2canvas([document.getElementById('sign-pad-dos')], {
            onrendered: function (canvas) {
                var canvas_img_data = canvas.toDataURL('image/png');
                var img_datamadre = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");

                //alert("imagen dos "+img_datamadre);
                $('#firmaMadre').val(img_datamadre);
                
            }
        });

        html2canvas([document.getElementById('sign-pad-tres')], {
            onrendered: function (canvas) {
                var canvas_img_data = canvas.toDataURL('image/png');
                var img_dataacudiente = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");

                //alert("imagen tres "+img_dataacudiente);
                $('#firmaAcudiente').val(img_dataacudiente);
                
            }
        });

        html2canvas([document.getElementById('sign-pad-cuatro')], {
            onrendered: function (canvas) {
                var canvas_img_data = canvas.toDataURL('image/png');
                var img_dataninio = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");

                //alert("imagen cuatro "+img_dataninio);
                $('#firmaNinio').val(img_dataninio);
                
            }
        });
    });
    $(document).ready(function() {
        $('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:94});
        $('#signAreaDos').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:94});
        $('#signAreaTres').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:94});
        $('#signAreaCuatro').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:94});
        
        $("#clear").on('click', function () {
            $('#firmaPadre').val('');
            $('#firmaMadre').val('');
            $('#firmaAcudiente').val('');
            $('#firmaNinio').val('');
            $.ajax({
                url:"camposvacio",
                type:"POST",
                data:"data",
                async:true,

                success: function(message){
                    $(".signArea").empty().append(message);
                }
            });

            $.ajax({
                url:"campovaciodos",
                type:"POST",
                data:"data",
                async:true,

                success: function(message){
                    $(".signAreaDos").empty().append(message);
                }
            });

            $.ajax({
                url:"campovaciotres",
                type:"POST",
                data:"data",
                async:true,

                success: function(message){
                    $(".signAreaTres").empty().append(message);
                }
            });

            $.ajax({
                url:"campovaciocuatro",
                type:"POST",
                data:"data",
                async:true,

                success: function(message){
                    $(".signAreaCuatro").empty().append(message);
                }
            });


        });
        
    });

    
*/

    
    $('.ninioNacionalidad').click(function(){
        var nacionalidadNinio=$('input:radio[name=radioNacionalidadNinio]:checked').val();
        //alert(nacionalidadNinio);
        if(nacionalidadNinio==1){
            $('.ninioColombiano').fadeIn(1);
            $('.ninioOtraNacionalidad').fadeOut(1);
        }
        if(nacionalidadNinio==0){
            $('.ninioColombiano').fadeOut(1);
            $('.ninioOtraNacionalidad').fadeIn(1);
        }
    });

    $('.padreNacionalidad').click(function(){
        var nacionalidadNinio=$('input:radio[name=radioNacionalidadPadre]:checked').val();
        if(nacionalidadNinio==1){
            $('.papaColombiano').fadeIn(1);
            $('.papaOtraNacionalidad').fadeOut(1);
        }
        if(nacionalidadNinio==0){
            $('.papaColombiano').fadeOut(1);
            $('.papaOtraNacionalidad').fadeIn(1);
        }
    });

    $('.madreNacionalidad').click(function(){
        var nacionalidadNinio=$('input:radio[name=radioNacionalidadMadre]:checked').val();
        if(nacionalidadNinio==1){
            $('.mamaColombiano').fadeIn(1);
            $('.mamOtraNacionalidad').fadeOut(1);
        }
        if(nacionalidadNinio==0){
            $('.mamaColombiano').fadeOut(1);
            $('.mamOtraNacionalidad').fadeIn(1);
        }
    });


    $('.acudienteNacionalidad').click(function(){
        var nacionalidadNinio=$('input:radio[name=radioNacionalidadAcudiente]:checked').val();
        if(nacionalidadNinio==1){
            $('.acudienteColombiano').fadeIn(1);
            $('.acudienteOtroNacionalidad').fadeOut(1);
        }
        if(nacionalidadNinio==0){
            $('.acudienteColombiano').fadeOut(1);
            $('.acudienteOtroNacionalidad').fadeIn(1);
        }
    });

    $('#SelDepNacimiento').change(function(){
        var dane_dpto=$(this).find(':selected').data('codigodep');
       // alert(dane_dpto);
        $.ajax({
            url:"municipioninio",
            type:"POST",
            data:"dane_dpto="+dane_dpto,
            async:true,

            success: function(message){
            $(".munNace").empty().append(message);
            }
        });
    });


    $('#SelDepResidencia').change(function(){
        var dane_dpto=$(this).find(':selected').data('codigodep');
       // alert(dane_dpto);
        $.ajax({
            url:"municipioresidencianinio",
            type:"POST",
            data:"dane_dpto="+dane_dpto,
            async:true,

            success: function(message){
             $(".munVive").empty().append(message);
            }
        });
    });

    $('#SelDepNacimientoPadre').change(function(){
        var dane_dpto=$(this).find(':selected').data('codigodep');
       // alert(dane_dpto);
        $.ajax({
            url:"municipiopadre",
            type:"POST",
            data:"dane_dpto="+dane_dpto,
            async:true,

            success: function(message){
             $(".munNacePadre").empty().append(message);
            }
        });
    });


    $('#SelDepNacimientoMadre').change(function(){
        var dane_dpto=$(this).find(':selected').data('codigodep');
       // alert(dane_dpto);
        $.ajax({
            url:"municipiomadre",
            type:"POST",
            data:"dane_dpto="+dane_dpto,
            async:true,

            success: function(message){
             $(".munNaceMadre").empty().append(message);
            }
        });
    });

    $('#SelDepNacimientoAcudiente').change(function(){
        var dane_dpto=$(this).find(':selected').data('codigodep');
       // alert(dane_dpto);
        $.ajax({
            url:"municipioacudiente",
            type:"POST",
            data:"dane_dpto="+dane_dpto,
            async:true,

            success: function(message){
             $(".munNaceAcudiente").empty().append(message);
            }
        });
    });


    $('#txtFechaNacimiento').change(function(){
        var fechanacimiento=$('#txtFechaNacimiento').val();
        //alert(fechanacimiento);

        $.ajax({
            url:"edad",
            type:"POST",
            data:"fechanacimiento="+fechanacimiento,
            async:true,

            success: function(message){
                $(".edadcapa").empty().append(message);
            }
        });
    });

    $('#txtFoto').change(function(){
        foto_ninio=$('#txtFoto').val();
        //alert(foto_ninio);
        $('#foto_ninio').val(foto_ninio);
    });
    $('#txtFotoPapito').change(function(){
        foto_pp=$('#txtFotoPapito').val();
        //alert(foto_pp);
        $('#foto_papa').val(foto_pp);
    });
    $('#txtFotoMamita').change(function(){
        foto_mm=$('#txtFotoMamita').val();
        //alert(foto_mm);
        $('#foto_mama').val(foto_mm);
    });
    $('#txtFotoAcudiente').change(function(){
        foto_acu=$('#txtFotoAcudiente').val();
        //alert(foto_acu);
        $('#foto_acudiente').val(foto_acu);
    });

  

</script>  



<script src="js/jquery.validate.min.js"></script>

