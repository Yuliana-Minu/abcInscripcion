
<style>
    .alert.alert-danger.alerta-forcliente{
	display: none;
	padding: 0;
	color: red ;
	font-weight: bold;
}
</style>
<?php 
   
    $nacionalidad_ninio_colombiano="none";
    $nacionalidad_ninio_otro="none";

    $listado_grado=$objRsInscripcion->lista_grado();
    $select_departamento=$objRsInscripcion->select_departamento();
    $departamento_residencia=$objRsInscripcion->departamento_residencia();
    $parentesco=$objRsInscripcion->parentesco();

    $personaSistema = $_SESSION['idusuario'];

    $datos_estudiante=$objRsInscripcion->datos_estudiante($personaSistema);

    foreach($datos_estudiante as $data_datos_estudiante){
        $per_codigo = $data_datos_estudiante['per_codigo'];
        $per_nombre = $data_datos_estudiante['per_nombre'];
        $per_primerapellido = $data_datos_estudiante['per_primerapellido']; 
        $per_segundoapellido = $data_datos_estudiante['per_segundoapellido'];
        $per_personacreo = $data_datos_estudiante['per_personacreo'];
        $per_personamodifico = $data_datos_estudiante['per_personamodifico'];
        $per_fechacreo = $data_datos_estudiante['per_fechacreo'];
        $per_fechamodifico = $data_datos_estudiante['per_fechamodifico'];
        $per_genero = $data_datos_estudiante['per_genero'];
        $per_tipoidentificacion = $data_datos_estudiante['per_tipoidentificacion'];
        $per_identificacion = $data_datos_estudiante['per_identificacion'];
        $per_estado = $data_datos_estudiante['per_estado'];
        $per_segundonombre = $data_datos_estudiante['per_segundonombre'];
        $per_fechanacimiento = $data_datos_estudiante['per_fechanacimiento'];
        $per_municipionacimiento = $data_datos_estudiante['per_municipionacimiento'];
        $dba_municipioresidencia = $data_datos_estudiante['dba_municipioresidencia'];
        $dba_correo = $data_datos_estudiante['dba_correo'];
        $dba_telefono = $data_datos_estudiante['dba_telefono'];
        $dba_celular = $data_datos_estudiante['dba_celular'];
        $dba_lugarexpedicion = $data_datos_estudiante['dba_celular'];
        $dba_direccion = $data_datos_estudiante['dba_direccion'];
        $per_nacionalidad = $data_datos_estudiante['per_nacionalidad'];
        $per_otranacionalidad = $data_datos_estudiante['per_otranacionalidad'];
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
        $dataMunicipio=$objRsInscripcion->list_municipios($dep_naciemiento);
    }
    else{
        $dep_naciemiento=0;
        $dataMunicipio = array();
    }

    if($dba_municipioresidencia>0){
        $dep_residencia=$objRsMatricula->dep_nacimiento($dba_municipioresidencia);
        $dataMuncipioReside = $objRsInscripcion->list_municipios($dep_residencia);
    }
    else{
        $dep_residencia=0;
        $dataMuncipioReside = array();
    }

    if($per_fechanacimiento){
        $fecha_de_nacimiento = $per_fechanacimiento;
        $fecha_actual = date ("Y-m-d");

        // separamos en partes las fechas
        $form1 = explode ( "-", $fecha_de_nacimiento );
        $form2 = explode ( "-", $fecha_actual );

        $anos = $form2[0] - $form1[0]; // calculamos años
        $meses = $form2[1] - $form1[1];

        if($meses < 0){
            $anos = $anos - 1;
        }
        else{
            $anos = $anos;
        }
    }

    $list_datos_inscripcion = $objRsInscripcion->datos_inscripcion($per_codigo, $calendario_apertura);
    if($list_datos_inscripcion){
        foreach ($list_datos_inscripcion as $dtosInscripcion) {
            $din_codigo = $dtosInscripcion['din_codigo'];
            $din_ninio = $dtosInscripcion['din_ninio'];
            $din_vivecon = $dtosInscripcion['din_vivecon']; 
            $din_tienefamiliar = $dtosInscripcion['din_tienefamiliar']; 
            $din_parentesco = $dtosInscripcion['din_parentesco']; 
            $din_gradoingresar = $dtosInscripcion['din_gradoingresar']; 
            $din_gradoactual = $dtosInscripcion['din_gradoactual']; 
            $din_estudiaen = $dtosInscripcion['din_estudiaen']; 
            $din_motivoretiro = $dtosInscripcion['din_motivoretiro']; 
            $din_estudiosanteriores = $dtosInscripcion['din_estudiosanteriores'];             
        }

        if($din_estudiosanteriores == 1){
            $estuidioAnteriorSi = "";
            $estuidioAnteriorNo = "checked";
            $visibilidad_tabla_estudios = "block";
        }
        else{
            $estuidioAnteriorSi = "checked";
            $estuidioAnteriorNo = "";
            $visibilidad_tabla_estudios = "none";
        }

        if($din_tienefamiliar == 1){
            $checkedTieneFamilarSi = "checked";
            $checkedTieneFamilarNo = "";
        }
        else{
            $checkedTieneFamilarSi = "";
            $checkedTieneFamilarNo = "checked";
            $din_parentesco = 0;
        }
    }
    else{
        $estuidioAnteriorSi = "checked";
        $estuidioAnteriorNo = "";
        $visibilidad_tabla_estudios = "none";
    }
?>

<div class="row">
    <div class="col-sm-12 text-center">
        <h1 style="color: #0c438f;"><strong>GIMNASIO AMERICANO ABC</strong></h1>
        <h3 style="color: #0c438f;"><strong>FORMULARIO DE INSCRIPCI&Oacute;N</strong></h3>
        <input type="hidden" id="user" value="<?php echo $personaSistema;?>">
        <br>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h5 style="color: #0c438f;"><strong>INFORMACIÓN PERSONAL DEL ESTUDIANTE

        </strong></h5>
        
        <hr style="border: 2px solid red; ">
        <br>
    </div>
</div>
<form id="inscripcionform" role="form" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="txtIdentificacion" class="font-weight-bold">Identificaci&oacute;n*</label>
                <input type="text" class="form-control caja_texto_sizer" id="txtIdentificacion" name="txtIdentificacion" aria-describedby="textHelp" data-rule-required="true" value="<?php echo $per_identificacion; ?>" readonly>
                <input type="hidden" class="form-control caja_texto_sizer" id="per_codigo" name="per_codigo" value="<?php echo $per_codigo; ?>">
                <div class="alert alert-danger alerta-forcliente" id="error_identificacion" role="alert"></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="txtNombre" class="font-weight-bold">Primer Nombre*</label>
                <input type="text" class="form-control caja_texto_sizer" id="txtNombre" name="txtNombre" aria-describedby="textHelp" data-rule-required="true"  onchange="datosEstudiante()" value="<?php echo $per_nombre; ?>" required>
                <div class="alert alert-danger alerta-forcliente" id="error_1er_nombre" role="alert"></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="txtSegundoNombre" class="font-weight-bold">Segundo Nombre </label>
                <input type="text" class="form-control caja_texto_sizer" id="txtSegundoNombre" name="txtSegundoNombre"  onchange="datosEstudiante()" value="<?php echo $per_segundonombre; ?>">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="txtPrimerApellido" class="font-weight-bold">Primer Apellido*</label>
                <input type="text" class="form-control caja_texto_sizer" id="txtPrimerApellido" name="txtPrimerApellido" onchange="datosEstudiante()"  value="<?php echo $per_primerapellido; ?>" data-rule-required="true" required>
                <div class="alert alert-danger alerta-forcliente" id="error_1er_apellido" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="textSegundoApellido" class="font-weight-bold">Segundo Apellido </label>
                <input type="text" class="form-control caja_texto_sizer" id="txtSegundoApellido" onchange="datosEstudiante()"  value="<?php echo $per_segundoapellido; ?>" name="txtSegundoApellido">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="radioNacionalidadNinio" class="font-weight-bold">Nacionalidad*</label>
                <br>
                <div class="form-check form-check-inline">
                    &nbsp;<input class="form-check-input ninioNacionalidad" type="radio" name="radioNacionalidadNinio"  id="radioNacionalidadNinioColombiana"  onchange="datosEstudiante()"  value="1" <?php echo $chequedColombianoNinio; ?> required>
                    <label class="form-check-label" for="radioNacionalidadNinioColombiana">&nbsp;Colombiana</label>
                </div>
                <div class="form-check form-check-inline">
                    &nbsp;<input class="form-check-input ninioNacionalidad" type="radio" name="radioNacionalidadNinio"  id="radioNacionalidadNinioOtra" onchange="datosEstudiante()"  value="0" <?php echo $chequedOtraNinio; ?> required>
                    <label class="form-check-label" for="radioNacionalidadNinioOtra">&nbsp;Otra</label>
                </div>
                <div class="alert alert-danger alerta-forcliente" id="error_nacionalidad_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2 colombianoNacionalidad" style="display: <?php echo $nacionalidad_ninio_colombiano; ?>">
            <div class="form-group">
                <label for="SelDepNacimiento" class="font-weight-bold">Dep. de Nacimiento*</label>
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

        <div class="col-sm-2 colombianoNacionalidad"  style="display: <?php echo $nacionalidad_ninio_colombiano; ?>">
            <div class="form-group">
                <label for="selMunNacimiento" class="font-weight-bold">Mun. de Nacimiento*</label>
                <div class="munNace">
                    <select name="selMunNacimiento" id="selMunNacimiento"  class="form-control caja_texto_sizer"  onchange="datosEstudiante()" data-rule-required="true" required>
                        <option value="0">Seleccione el Departamento...</option>
                        <?php
                            
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
                        ?>
                    </select>
                
                </div>
                <div class="alert alert-danger alerta-forcliente" id="error_mun_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2 otraNacionalidad"  style="display: <?php echo $nacionalidad_ninio_otro; ?>">
            <div class="form-group">
                <label for="txCualNinio" class="font-weight-bold">¿Cu&aacute;l *</label>
                <input type="text" class="form-control caja_texto_sizer" id="txCualNinio" name="txCualNinio"  onchange="datosEstudiante()"  aria-describedby="textHelp" value="<?php echo $per_otranacionalidad; ?>" >
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="txtFechaNacimiento" class="font-weight-bold">Fecha de Nacimiento *</label>
                <input type="date" class="form-control caja_texto_sizer" id="txtFechaNacimiento" name="txtFechaNacimiento" aria-describedby="textHelp" data-rule-required="true"  onchange="datosEstudiante()" value="<?php echo substr($per_fechanacimiento,0,10); ?>" required>
                <div class="alert alert-danger alerta-forcliente" id="error_date_nacimiento_ninio" role="alert"></div>
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group edadcapa">
                <label for="txtEdad" class="font-weight-bold">Edad (años) </label>
                <input type="number" class="form-control caja_texto_sizer" id="txtEdad" name="txtEdad" aria-describedby="textHelp" value="<?php echo $anos; ?>" readonly>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="txtViveCon" class="font-weight-bold">Actualmente Vive Con *</label>
                <input type="text" class="form-control caja_texto_sizer" id="txtViveCon" name="txtViveCon" aria-describedby="textHelp"  onchange="datosEstudiante()"  value="<?php echo $din_vivecon; ?>" >
                <div class="alert alert-danger alerta-forcliente" id="error_vivecon_ninio" role="alert"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="txtTelefono" class="font-weight-bold">Teléfono* </label>
                <input type="number" class="form-control caja_texto_sizer" id="txtTelefono" name="txtTelefono" aria-describedby="textHelp"  onchange="datosEstudiante()" value="<?php echo $dba_telefono; ?>" >
                <div class="alert alert-danger alerta-forcliente" id="error_telefono" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="txtDireccion" class="font-weight-bold">Dirección y Barrio*</label>
                <input type="text" class="form-control caja_texto_sizer" id="txtDireccion" name="txtDireccion" aria-describedby="textHelp" onchange="datosEstudiante()"  value="<?php echo $dba_direccion; ?>" >
                <div class="alert alert-danger alerta-forcliente" id="error_direccion_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="SelDepResidencia" class="font-weight-bold">Dep. de Residencia*</label>
                <select name="SelDepResidencia" id="SelDepResidencia"  class="form-control caja_texto_sizer" data-rule-required="true" required>
                    <option value="0">Seleccione...</option>
                    <?php
                        foreach ($departamento_residencia as $data_depResidencia) {
                            $dep_codigo=$data_depResidencia['dep_codigo'];
                            $dep_nombre=$data_depResidencia['dep_nombre'];
                            $dep_dane=$data_depResidencia['dep_dane'];

                            if($dep_residencia == $dep_codigo){
                                $select_depResidencia="selected";
                            }
                            else{
                                $select_depResidencia="";
                            }
                    ?>
                        <option value="<?php echo $dep_codigo; ?>" <?php echo $select_depResidencia; ?> data-codigodep="<?php echo $dep_dane; ?>" ><?php echo $dep_nombre; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <div class="alert alert-danger alerta-forcliente" id="error_dep_residencia_ninio" role="alert"></div>
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="selMunResidencia" class="font-weight-bold">Mun. de Residencia*</label>
                <div class="munVive">
                    <select name="selMunResidencia" id="selMunResidencia"  class="form-control caja_texto_sizer" data-rule-required="true"  onchange="datosEstudiante()" required>
                        <option value="0">Seleccione el Departamento...</option>
                        <?php
                            foreach ($dataMuncipioReside as $data_municipio) {
                                $mun_codigo = $data_municipio['mun_codigo'];
                                $mun_nombre = $data_municipio['mun_nombre'];

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
                        ?>
                    </select>
            
                </div>
                <div class="alert alert-danger alerta-forcliente" id="error_mun_residencia_ninio" role="alert"></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="txtCorreo" class="font-weight-bold">E-mail del estudiante</label>
                <input type="email" class="form-control caja_texto_sizer" id="txtCorreo" name="txtCorreo" aria-describedby="textHelp"  onchange="datosEstudiante()" value="<?php echo $dba_correo; ?>" >
            </div>
        </div>
    </div>

    <div class="row"> 
        <div class="col-sm-2">
            <div class="form-group">
                <label for="radioFamiliar" class="font-weight-bold">Tiene Familiares en la Institución*</label>
                <br>
                <div class="form-check form-check-inline">
                    &nbsp;<input class="form-check-input" type="radio" name="radioFamiliar"  id="radioFamiliaSi"  onchange="datosEstudiante()" value="1" <?php echo $checkedTieneFamilarSi; ?> <?php echo $sololectura; ?> required>
                    <label class="form-check-label" for="radioFamiliaSi">&nbsp;Si</label>
                </div>
                <div class="form-check form-check-inline">
                    &nbsp;<input class="form-check-input" type="radio" name="radioFamiliar"  id="radioFamiliaNo" onchange="datosEstudiante()"  value="0" <?php echo $checkedTieneFamilarNo; ?> <?php echo $sololectura; ?> required>
                    <label class="form-check-label" for="radioFamiliaNo">&nbsp;No</label>
                </div>
                <div class="alert alert-danger alerta-forcliente" id="error_radioFamiliar_ninio" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="selParentesco" class="font-weight-bold">Parentesco</label>
                <select name="selParentesco" id="selParentesco"  class="form-control caja_texto_sizer"  onchange="datosEstudiante()"  data-rule-required="true" required>
                    <option value="0">Seleccione...</option>
                    <?php
                        foreach($parentesco as $data_parentesco){
                            $par_codigo=$data_parentesco['par_codigo'];
                            $par_nombre=$data_parentesco['par_nombre'];

                            if($din_parentesco == $par_codigo){
                                $selected_parentesco = "selected";
                            }
                            else{
                                $selected_parentesco = "";
                            }
                    ?>
                    <option value="<?php echo $par_codigo; ?>" <?php echo $selected_parentesco; ?>><?php echo $par_nombre; ?></option>
                    <?php 
                        }
                    ?>                 
                </select>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="selGradoIngresar" class="font-weight-bold">Grado a Ingresar *</label>
                <select name="selGradoIngresar" id="selGradoIngresar"  class="form-control caja_texto_sizer"  onchange="datosEstudiante()"  data-rule-required="true" required>
                    <option value="0">Seleccione...</option>
                    <?php 
                    if($listado_grado){
                        foreach($listado_grado as $data_listado_grado){
                            $gra_codigo=$data_listado_grado['gra_codigo'];
                            $gra_nombre=$data_listado_grado['gra_nombre'];

                            if($gra_codigo == $din_gradoingresar){
                                $selected_grado_ingresar = "selected";
                            }
                            else{
                                $selected_grado_ingresar = "";
                            }

                    ?>

                    <option value="<?php echo $gra_codigo; ?>" <?php echo $selected_grado_ingresar; ?>><?php echo $gra_nombre; ?></option>      
                    <?php 
                        }
                    }
                    ?>

                            
                </select>
                <div class="alert alert-danger alerta-forcliente" id="error_grado_ingresar" role="alert"></div>
            </div>
        </div>

        <div class="col-sm-3 padding_right">
            <div class="form-group">
                <label for="TxtGradoCursaba" class="font-weight-bold">Actualmente Cursa el Grado </label>
                <input type="text" class="form-control caja_texto_sizer" id="TxtGradoCursaba" name="TxtGradoCursaba" aria-describedby="textHelp"  onchange="datosEstudiante()" value="<?php echo $din_gradoactual; ?>" >
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="txtLugar" class="font-weight-bold">En </label>
                <input type="text" class="form-control caja_texto_sizer" id="txtLugar" name="txtLugar" aria-describedby="textHelp"  onchange="datosEstudiante()" value="<?php echo $din_estudiaen; ?>" >
            </div>
        </div>
    </div> 

    <div class="row"> 
        <div class="col-sm-3 padding_left">
            <div class="form-group">
                <label for="txtMotivoRetiro" class="font-weight-bold">Motivos del cambio de colegio </label>
                <input type="text" class="form-control caja_texto_sizer" id="txtMotivoRetiro" name="txtMotivoRetiro" aria-describedby="textHelp" onchange="datosEstudiante()" value="<?php echo $din_motivoretiro; ?>" >
            </div>
        </div>
                
        <div class="col-sm-9">
            <div class="form-group">
                <label for="radioTablaEstudios" class="font-weight-bold"> ¿Es su primera experiencia escolar?</label>
                <br>
                <div class="form-check form-check-inline">
                    &nbsp;<input class="form-check-input tablaEstudioVisibilidad" type="radio" name="radioTablaEstudios" id="radioActivo" value="0" onchange="datosEstudiante()" <?php echo $estuidioAnteriorSi; ?> required>
                    <label class="form-check-label" for="radioActivo">&nbsp;Si</label>
                </div>
                <div class="form-check form-check-inline">
                    &nbsp;<input class="form-check-input tablaEstudioVisibilidad" type="radio" name="radioTablaEstudios" id="radioInactivo" value="1" onchange="datosEstudiante()" <?php echo $estuidioAnteriorNo; ?> required>
                    <label class="form-check-label" for="radioInactivo">&nbsp;No</label>
                </div>
                <div class="alert alert-danger alerta-forcliente" id="error_radioTablaEstudios_ninio" role="alert"></div>            </div>
        </div>
    </div>

    <div class="row educacionTabla" style="display: <?php echo $visibilidad_tabla_estudios; ?>">
        <div class="col-sm-12">
            <h5 style="color: #0c438f;"><strong>EDUCACIÓN ANTERIOR DEL ESTUDIANTE</strong></h5>
            <hr style="border: 2px solid red; ">
        </div>
    </div>
    
    <div class="row educacionTabla" style="display: <?php echo $visibilidad_tabla_estudios; ?>">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-sm table-bordered table-striped tablaEstudiosAnteriores">
                        <tr>
                            <th style="width: 15%">Grado *</th>
                            <th style="width: 24%">Colegio *</th>
                            <th style="width: 18%">Dirección *</th>
                            <th style="width: 14%">Teléfono</th>
                            <th style="width: 15%">Ciudad</th>
                            <th style="width: 9%">Año *</th>
                            <td style="width: 5%">::</td>
                        </tr>
                        <?php
                            $list_dtos_estudios_anteriores = $objRsInscripcion->dtos_estudios_anteriores($per_codigo);
                            if($list_dtos_estudios_anteriores){
                                $numero_data = 0;
                                foreach($list_dtos_estudios_anteriores as $dat_info){
                                    $ean_codigo = $dat_info['ean_codigo'];
                                    $ean_grado = $dat_info['ean_grado'];
                                    $ean_colegio = $dat_info['ean_colegio'];
                                    $ean_direccion = $dat_info['ean_direccion'];
                                    $ean_telefono = $dat_info['ean_telefono'];
                                    $ean_ciudad = $dat_info['ean_ciudad'];
                                    $ean_year = $dat_info['ean_year'];

                                    if($numero_data == 0){
                                        $boton_tr = '<i class="fas fa-plus fa-lg" style="color: red" onclick="AgregarItems()"></i>';
                                    }
                                    else{
                                        $numero_elimina = "'".$numero_data."'";
                                        $boton_tr = '<i class="fas fa-minus fa-lg" style="color: red" onclick="eliminar_tr('.$numero_elimina.')"></i>';
                                    }
                        ?>
                        <tr class="trEstudio<?php echo $numero_data; ?>">
                            <td><input type="text" class="form-control caja_texto_sizer" name="nombre_grado[]" aria-describedby="textHelp" value="<?php echo $ean_grado; ?>" onblur="datosEstudiante()"></td>
                            <td><input type="text" class="form-control caja_texto_sizer" name="nombre_colegio[]" aria-describedby="textHelp" value="<?php echo $ean_colegio; ?>" onblur="datosEstudiante()"></td>
                            <td><input type="text" class="form-control caja_texto_sizer" name="nombre_direccion[]" aria-describedby="textHelp" value="<?php echo $ean_direccion; ?>" onblur="datosEstudiante()"></td>
                            <td><input type="number" class="form-control caja_texto_sizer" name="numero_telefono[]" aria-describedby="textHelp" value="<?php echo $ean_telefono; ?>" onblur="datosEstudiante()"></td>
                            <td><input type="text" class="form-control caja_texto_sizer" name="nombre_ciudad[]" aria-describedby="textHelp" value="<?php echo $ean_ciudad; ?>" onblur="datosEstudiante()"></td>
                            <td><input type="number" class="form-control caja_texto_sizer" name="numero_year[]" aria-describedby="textHelp" value="<?php echo $ean_year; ?>" onblur="datosEstudiante()"></td>
                            <td><?php echo $boton_tr; ?></td>
                        </tr>
                        <?php
                                    $numero_data++;
                                }
                            }
                            else{
                        ?>
                            <tr>
                                <td><input type="text" class="form-control caja_texto_sizer" name="nombre_grado[]" aria-describedby="textHelp" value="" onblur="datosEstudiante()"></td>
                                <td><input type="text" class="form-control caja_texto_sizer" name="nombre_colegio[]" aria-describedby="textHelp" value="" onblur="datosEstudiante()"></td>
                                <td><input type="text" class="form-control caja_texto_sizer" name="nombre_direccion[]" aria-describedby="textHelp" value="" onblur="datosEstudiante()"></td>
                                <td><input type="number" class="form-control caja_texto_sizer" name="numero_telefono[]" aria-describedby="textHelp" value="" onblur="datosEstudiante()"></td>
                                <td><input type="text" class="form-control caja_texto_sizer" name="nombre_ciudad[]" aria-describedby="textHelp" value="" onblur="datosEstudiante()"></td>
                                <td><input type="number" class="form-control caja_texto_sizer" name="numero_year[]" aria-describedby="textHelp" value="" onblur="datosEstudiante()"></td>
                                <td><i class="fas fa-plus fa-lg" style="color: red" onclick="AgregarItems()"></i></td>
                            </tr>
                        <?php
                            }
                        ?>                    
                    </table>
                    <script src="vjs/inscripcion/estudios_anteriores.js"></script>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">&nbsp;</div>
            </div>

            <?php
                $info_anio_perdido = $objRsInscripcion->info_anio_perdido($per_codigo);
                if($info_anio_perdido){
                    foreach ($info_anio_perdido as $dta_anio_perdio) {
                        $dcp_codigo = $dta_anio_perdio['dcp_codigo'];
                        $dcp_haperdido = $dta_anio_perdio['dcp_haperdido'];
                        $dcp_cual = $dta_anio_perdio['dcp_cual'];
                    }

                    if($dcp_haperdido == 1){
                        $checkedSiPerdio = "checked";
                        $checkedNoPerdio = "";
                    }
                    else{
                        $checkedSiPerdio = "";
                        $checkedNoPerdio = "checked";
                    }
                }
                else{
                    $checkedNoPerdio = "checked";
                }
            ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="radioRepetidoCurso" class="font-weight-bold">¿Ha repetido Cursos? *</label>
                        <br>
                        <div class="form-check form-check-inline">
                            &nbsp;<input class="form-check-input" type="radio" name="radioRepetidoCurso"  id="radioSiPerdio" value="1" <?php echo $checkedSiPerdio; ?> <?php echo $sololectura; ?> required onchange="datosEstudiante()">
                            <label class="form-check-label" for="radioSiPerdio">&nbsp;Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            &nbsp;<input class="form-check-input" type="radio" name="radioRepetidoCurso"  id="radioNoPerdio" value="0" <?php echo $checkedNoPerdio; ?> <?php echo $sololectura; ?> required onchange="datosEstudiante()">
                            <label class="form-check-label" for="radioNoPerdio">&nbsp;No</label>
                        </div>
                        <span class="help-block" id="error"></span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="txtCualPerdio" class="font-weight-bold">¿Cuál?</label>
                    <input type="text" class="form-control caja_texto_sizer" id="txtCualPerdio" name="txtCualPerdio" aria-describedby="textHelp" value="<?php echo $dcp_cual; ?>" onchange="datosEstudiante()">
                </div>
                
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    

    <div class="row educacionTabla"  style="display: <?php echo $visibilidad_tabla_estudios; ?>">
        <div class="col-sm-12 text-center">
            <h6><strong>¿En el colegio anterior recibió algún tipo de seguimiento y acompañamiento?</strong></h6>
        </div>
    </div>
    
    <div class="bg educacionTabla padding_left" style="display: <?php echo $visibilidad_tabla_estudios; ?>">
        <div>
            <div class="row">
            <?php
                $tipo_acompaniamiento=$objRsInscripcion->tipo_acompaniamiento();
                if($tipo_acompaniamiento){
                    foreach ($tipo_acompaniamiento as $data_tipo_acompaniamiento) {
                        $tac_codigo = $data_tipo_acompaniamiento['tac_codigo'];
                        $tac_nombre = $data_tipo_acompaniamiento['tac_nombre'];

                        $checked_segnmnto = $objRsInscripcion->check_acompaniamiento($per_codigo,$tac_codigo)
                        
            ?>
                <div class="col-sm-2">
                    <div class="chiller_cb"> 
                        <input id="acompaniamiento<?php echo $tac_codigo; ?>" name="acompaniamiento[]" type="checkbox" value="<?php echo $tac_codigo; ?>" data-rule-required="true" required onchange="datosEstudiante()" <?php echo $checked_segnmnto; ?>>
                        <label for="acompaniamiento<?php echo $tac_codigo; ?>"><?php echo $tac_nombre; ?></label>
                        <span></span>
                    </div>
                </div>
            <?php
                    
                    }//Foreach Menu
                }//if Menu

                $nombre_acompaniante = $objRsInscripcion->nombre_acompaniante($per_codigo);
            ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtCualSeguimiento" class="font-weight-bold">¿Cual?</label>
                        <input type="text" class="form-control caja_texto_sizer" id="txtCualSeguimiento" name="txtCualSeguimiento" aria-describedby="textHelp" value="<?php echo $nombre_acompaniante; ?>"  onchange="datosEstudiante()">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function datosEstudiante(){
            var formulario = $('#inscripcionform')[0];
            var data_enviar = new FormData(formulario);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: 'cruddatosestudianteinscripcion',
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
            include('papas/papa.php');
        }
    ?>

    <input type="hidden" id="papa_validar" value="<?php echo $validar_papa; ?>">
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>

    <div class="row">
        <div class="col-sm-12">
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
            include('papas/mama.php');
        }
    ?>
    <input type="hidden" id="mama_validar" value="<?php echo $validar_papa; ?>">
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>

    <?php
        $datos_matrimonio = $objRsInscripcion->datos_matrimonio($per_codigo);
        if($datos_matrimonio){
            foreach ($datos_matrimonio as $dat_mtrmonio) {
                $dma_codigo = $dat_mtrmonio['dma_codigo'];
                $dma_ninio = $dat_mtrmonio['dma_ninio'];
                $dma_fechamatrimonio = $dat_mtrmonio['dma_fechamatrimonio'];
                $dma_tipomatrimonio = $dat_mtrmonio['dma_tipomatrimonio'];
                $dma_cual = $dat_mtrmonio['dma_cual'];
                $dma_vivenjuntos = $dat_mtrmonio['dma_vivenjuntos'];
            }

            if($dma_tipomatrimonio == 1){
                $chequed_catolico = "checked";
                $chequed_civil = "";
                $chequed_otro = "";
                $dma_cual = "";
            }
            else if($dma_tipomatrimonio == 2){
                $chequed_catolico = "";
                $chequed_civil = "checked";
                $chequed_otro = "";
                $dma_cual = "";
            }
            else if($dma_tipomatrimonio == 3){
                $chequed_catolico = "";
                $chequed_civil = "";
                $chequed_otro = "checked";
                $dma_cual = $dma_cual;
            }
            else{
                $chequed_catolico = "";
                $chequed_civil = "";
                $chequed_otro = "";
                $dma_cual = "";
            }

            if($dma_vivenjuntos == 1){
                $chequed_viven_juntos = "checked";
                $chequed_no_viven_juntos = "";
            }
            else{
                $chequed_viven_juntos = "";
                $chequed_no_viven_juntos = "checked";
            }
        }

    ?>

    <div class="row">
        <div class="col-sm-12">
            <h5 style="color: #0c438f;"><strong>MATRIMONIO</strong></h5>
            <hr style="border: 2px solid red; ">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 padding_left">
            <div class="form-group">
                <label for="txtFechaMatrimonio" class="font-weight-bold">Fecha Matrimonio *</label>
                <input type="date" class="form-control caja_texto_sizer" id="txtFechaMatrimonio" name="txtFechaMatrimonio" aria-describedby="textHelp" value="<?php echo $dma_fechamatrimonio; ?>" onchange="datosEstudiante()">
                <div class="alert alert-danger alerta-forcliente" id="error_fechamatrimonio" role="alert"></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="radioMatrimonio" class="font-weight-bold">&nbsp;</label>
                <br>
                <div class="form-check form-check-inline">
                    &nbsp;&nbsp;<input class="form-check-input" type="radio" name="radioMatrimonio"  id="radioCatolicoMatrimonio" value="1" <?php echo $chequed_catolico; ?> required onchange="datosEstudiante()">
                    <label class="form-check-label" for="radioCatolicoMatrimonio">&nbsp;Cat&oacute;lico</label>
                </div>
                <div class="form-check form-check-inline">
                    &nbsp;&nbsp;<input class="form-check-input" type="radio" name="radioMatrimonio"  id="radioCivilMatrimonio" value="2" <?php echo $chequed_civil; ?> required onchange="datosEstudiante()">
                    <label class="form-check-label" for="radioCivilMatrimonio">&nbsp;Civil</label>
                </div>
                <div class="form-check form-check-inline">
                    &nbsp;&nbsp;<input class="form-check-input" type="radio" name="radioMatrimonio"  id="radioOtroMatrimonio" value="3" <?php echo $chequed_otro; ?> required onchange="datosEstudiante()">
                    <label class="form-check-label" for="radioOtroMatrimonio">&nbsp;Otro</label>
                </div>
                <div class="alert alert-danger alerta-forcliente" id="error_matrimonio" role="alert"></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="txtCualMatrimonio" class="font-weight-bold">¿Cuál?</label>
                <input type="text" class="form-control caja_texto_sizer" id="txtCualMatrimonio" name="txtCualMatrimonio" aria-describedby="textHelp" value="<?php echo $dma_cual; ?>" onchange="datosEstudiante()">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="radioVivenJuntos" class="font-weight-bold">&nbsp;&nbsp;Viven Juntos *</label>
                <br>
                <div class="form-check form-check-inline">
                    &nbsp;&nbsp;<input class="form-check-input" type="radio" name="radioVivenJuntos"  id="radioVivenJuntosSi" value="1" <?php echo $chequed_viven_juntos; ?> required onchange="datosEstudiante()">
                    <label class="form-check-label" for="radioVivenJuntosSi">&nbsp;Si</label>
                </div>
                <div class="form-check form-check-inline">
                    &nbsp;&nbsp;<input class="form-check-input" type="radio" name="radioVivenJuntos"  id="radioVivenJuntosNo" value="0" <?php echo $chequed_no_viven_juntos; ?> required onchange="datosEstudiante()">
                    <label class="form-check-label" for="radioVivenJuntosNo">&nbsp;No</label>
                </div>
                <div class="alert alert-danger alerta-forcliente" id="error_vivenjuntos" role="alert"></div>
            </div>
        </div>
    </div>
    
    <?php
        $list_recomendacion = $objRsInscripcion->datos_recomendacion($per_codigo, $calendario_apertura);
        if($list_recomendacion){
            foreach ($list_recomendacion as $dat_recomendacion) {
                $rec_codigo = $dat_recomendacion['rec_codigo'];
                $rec_ninio = $dat_recomendacion['rec_ninio'];
                $rec_nombre = $dat_recomendacion['rec_nombre']; 
                $rec_telefono = $dat_recomendacion['rec_telefono'];
                $rec_celular = $dat_recomendacion['rec_celular'];
                $rec_motivoeleccion = $dat_recomendacion['rec_motivoeleccion'];
            }
        }
    ?>
    <div class="row">
        <div class="col-sm-12">
            <h5 style="color: #0c438f;"><strong>¿QUIÉN LE RECOMENDÓ EL COLEGIO?</strong></h5>
            <hr style="border: 2px solid red; ">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="txtNombreCompletoRecomendo" class="font-weight-bold">Nombre y Apellidos Completos </label>
                <input type="text" class="form-control caja_texto_sizer" id="txtNombreCompletoRecomendo" name="txtNombreCompletoRecomendo" aria-describedby="textHelp" value="<?php echo $rec_nombre;?>" onchange="datosEstudiante()">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="txtTelefonoRecomendo" class="font-weight-bold">Tel&eacute;fono Residencia </label>
                <input type="text" class="form-control caja_texto_sizer" id="txtTelefonoRecomendo" name="txtTelefonoRecomendo" aria-describedby="textHelp" value="<?php echo $rec_telefono;?>" onchange="datosEstudiante()">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="txtCelularRecomendo" class="font-weight-bold">N° de Celular  </label>
                <input type="text" class="form-control caja_texto_sizer" id="txtCelularRecomendo" name="txtCelularRecomendo" aria-describedby="textHelp" value="<?php echo $rec_celular;?>" onchange="datosEstudiante()">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="txtMotivoEleccion" class="font-weight-bold">¿Por qué eligió al Gimnasio Americano ABC? </label>
                <textarea class="form-control caja_texto_sizer" id="txtMotivoEleccion" name="txtMotivoEleccion" rows="3" onchange="datosEstudiante()"><?php echo $rec_motivoeleccion;?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 justify-content-center align-items-center">
            <button type="button" class="btn btn-danger btn-lg btn-block" onclick="validar_formregistropersona();"><strong> <i class="far fa-save"></i> Guardar</strong></button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
</form>

    
<script src="vjs/registroInscripcion.js"></script>
<script type="text/javascript">
    $('.ninioNacionalidad').click(function(){
        var nacionalidadNinio=$('input:radio[name=radioNacionalidadNinio]:checked').val();
        if(nacionalidadNinio==1){
            $('.colombianoNacionalidad').fadeIn(1);
            $('.otraNacionalidad').fadeOut(1);
        }
        if(nacionalidadNinio==0){
            $('.colombianoNacionalidad').fadeOut(1);
            $('.otraNacionalidad').fadeIn(1);
        }
    });

    $('.tablaEstudioVisibilidad').click(function(){
        var estudioAnterior=$('input:radio[name=radioTablaEstudios]:checked').val();
        if(estudioAnterior==1){
            $('.educacionTabla').fadeIn(1);
        }
        if(estudioAnterior==0){
            $('.educacionTabla').fadeOut(1);
        }
    });

    $('#SelDepNacimiento').change(function(){
        var dane_dpto=$(this).find(':selected').data('codigodep');
       
        $.ajax({
            url:"munnaceninio",
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
       
        $.ajax({
            url:"munviveninio",
            type:"POST",
            data:"dane_dpto="+dane_dpto,
            async:true,

            success: function(message){
             $(".munVive").empty().append(message);
            }
        });
    });

    $('#txtFechaNacimiento').change(function(){
        var fechanacimiento=$('#txtFechaNacimiento').val();

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
</script>  
<script src="js/jquery.validate.min.js"></script>

