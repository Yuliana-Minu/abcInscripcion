<?php
    include('crud/rs/afldo/afldo.php');

    include('prcsos/prsna/rsPersona.php');

    $rspersona=new RsPersona();

    $dataTipoIdentificacion=$rspersona->selectTipoIdentificacion();
    $dataRh=$rspersona->selectRh();
    $dataEstadoCivil=$rspersona->selectEstadoCivil();
    $dataProfesion=$rspersona->selectProfesion();
    $dataDepartamento=$rspersona->selectDepartamento();

    $codigo_persona=$_REQUEST['codigo_persona'];

    $seccion=$_REQUEST['seccion'];

    if($seccion==1){
        $recargar="datapersona";
        $seccion_nombre="Persona";
        $perfil=0;
    }

    if($seccion==2){
        $recargar="dtaadminstrativos";
        $seccion_nombre="Administrativo";
        $perfil=2;
    }

    if($seccion==3){
        $recargar="dtadocente";
        $seccion_nombre="Docente";
        $perfil=3;
    }

if($codigo_persona){
    $titulo="Modificar";
  
    $rspersona=$rspersona->selectPersonaPorCodigo($codigo_persona);

    foreach($rspersona as $data_persona){
        $per_codigo=$data_persona['per_codigo'];
        $per_nombre=$data_persona['per_nombre'];
        $per_segundonombre=$data_persona['per_segundonombre'];
        $per_primerapellido=$data_persona['per_primerapellido'];
        $per_segundoapellido=$data_persona['per_segundoapellido'];
        $per_identificacion=$data_persona['per_identificacion'];
        $per_tipoidentificacion=$data_persona['per_tipoidentificacion'];
        $per_genero=$data_persona['per_genero'];
        $per_fechanacimiento=$data_persona['per_fechanacimiento'];
        $per_municipionacimiento=$data_persona['per_municipionacimiento'];
        $dba_estadocivil=$data_persona['dba_estadocivil'];
        $dba_profesion=$data_persona['dba_profesion'];
        $dba_rh=$data_persona['dba_rh'];
        $dba_direccion=$data_persona['dba_direccion'];
        $dba_municipioresidencia=$data_persona['dba_municipioresidencia'];
        $dba_correo=$data_persona['dba_correo'];
        $dba_telefono=$data_persona['dba_telefono'];
        $dba_celular=$data_persona['dba_celular'];
        $per_estado=$data_persona['per_estado'];
    }

    $fecha_nacimiento=substr($per_fechanacimiento,0,10);
    //calcular la edad
    $fecha_actual = date('Y-m-d');
    // diferencia de las fechas
    $diferencia_fechas= abs(strtotime($fecha_actual) - strtotime($fecha_nacimiento));
    //echo "--->".$diferencia_fechas;
    $edad = floor($diferencia_fechas / (365*60*60*24));
    
    if($per_estado==1){
        $checkedA="checked";
        $checkedI="";
    }
    if($per_estado==0) {
        $checkedA="";
        $checkedI="checked";
    }

    if($per_genero==1){
        $checkedM="checked";
        $checkedF="";
    }
    if($per_genero==2) {
        $checkedM="";
        $checkedF="checked";
    }


    $municipioNacimiento=$rsAfiliado->municipioDatos($per_municipionacimiento);

    foreach($municipioNacimiento as $mun_data){
        $mun_codigona=$mun_data['mun_codigo'];
        $mun_nombrena=$mun_data['mun_nombre'];
        $depCodeNa=$mun_data['dep_codigo'];
    }

    $depcodigoNace=$rsAfiliado->codigo_departamento($depCodeNa);



    $municipioResidencia=$rsAfiliado->municipioDatos($dba_municipioresidencia);

    foreach($municipioResidencia as $mun_data){
        $mun_codigore=$mun_data['mun_codigo'];
        $mun_nombrere=$mun_data['mun_nombre'];
        $depCodeRe=$mun_data['dep_codigo'];
    }

    $depcodigoVivi=$rsAfiliado->codigo_departamento($depCodeRe);

    $url_guardar="crudactualizarpersona";
    $accion="modificar";
    $titulo="Modificación Persona";
    $capa="#Persona";
}
else{
    $accion="guardar";
    $titulo="Registro";
    $url_guardar="crudregistropersona";
    $capa="#Persona";
}


?>
<form id="personaform" role="form">
    <div class="modal-header fondo-titulo">
        <h3 class="modal-title"><?php echo $titulo." ".$seccion_nombre; ?></h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <p class="font-weight-bold">* Campos obligatorios</p>
        <!-- ******************** INICIO FORMULARIO ************************* -->
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="selTipoIdentificacion" class="font-weight-bold">Tipo Identificaci&oacute;n *</label>
                    <select name="selTipoIdentificacion" id="selTipoIdentificacion"  class="form-control" data-rule-required="true" required>
                        <option value="0">Seleccione...</option>
                        <?php
                            foreach ($dataTipoIdentificacion as $tipoIdentificacion) {

                                $tid_codigo=$tipoIdentificacion['tid_codigo'];
                                $tid_nombre=$tipoIdentificacion['tid_nombre'];
                                $tid_referencia=$tipoIdentificacion['tid_referencia'];

                                if($per_tipoidentificacion==$tid_codigo){
                                $select_identificacion="selected";
                                }
                                else{
                                $select_identificacion="";
                                }
                        ?>
                            <option value="<?php echo  $tid_codigo; ?>" <?php echo $select_identificacion; ?> ><?php echo $tid_nombre; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <span class="help-block" id="error"></span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="txtIdentificacion" class="font-weight-bold">Número Identificación *</label>
                    <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" value="<?php echo $per_identificacion; ?>" aria-describedby="textHelp" data-rule-required="true" required>
                    <span class="help-block" id="error"></span>
                </div>
            </div>
        </div>
        <div class="partedos">
            <?php include('frma/objfrm/prsna/prsna.php'); ?>
        </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" id="capa" value="<?php echo $capa; ?>">
        <input type="hidden" id="accion" value="<?php echo $accion; ?>">
        <input type="hidden" id="perfil"  name="perfil" value="<?php echo $perfil; ?>">
        <input type="hidden" id="recargar" value="<?php echo $recargar; ?>">
        <input type="hidden" name="codigoPersona" id="codigoPersona" value="<?php echo $per_codigo; ?>">
        <input type="hidden" name="url" id="url" value="<?php echo $url_guardar; ?>">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="far fa-times-circle"></i> Cerrar</button>
        <button type="submit" class="btn btn-danger btn-sm" onClick="validar_formregistropersona();"><i class="far fa-save"></i> Guardar</button>
    </div>
</form>

<script src="js/jquery.validate.min.js"></script>
<script src="vjs/registroPersona.js"></script>
