<?php

  include('crud/rs/afldo/afldo.php');

  $dataTipoIdentificacion=$rsAfiliado->selectTipoIdentificacion();
  $dataRh=$rsAfiliado->selectRh();
  $dataEstadoCivil=$rsAfiliado->selectEstadoCivil();
  $dataProfesion=$rsAfiliado->selectProfesion();
  $dataDepartamento=$rsAfiliado->selectDepartamento();

  $codigo_persona=$_REQUEST['codigo_persona'];
  $titulo="";

if($codigo_persona){
    $titulo="Modificar";
    $accion="modificar";

    $rsAfiliadoForm=$rsAfiliado->infoAfiliado($codigo_persona);

    foreach($rsAfiliadoForm as $data_afiliadoform){
        $per_codigo=$data_afiliadoform['per_codigo'];
        $per_nombre=$data_afiliadoform['per_nombre'];
        $per_segundonombre=$data_afiliadoform['per_segundonombre'];
        $per_primerapellido=$data_afiliadoform['per_primerapellido'];
        $per_segundoapellido=$data_afiliadoform['per_segundoapellido'];
        $per_identificacion=$data_afiliadoform['per_identificacion'];
        $per_tipoidentificacion=$data_afiliadoform['per_tipoidentificacion'];
        $per_genero=$data_afiliadoform['per_genero'];
        $per_fechanacimiento=$data_afiliadoform['per_fechanacimiento'];
        $per_municipionacimiento=$data_afiliadoform['per_municipionacimiento'];
        $afi_fechaafiliacion=$data_afiliadoform['afi_fechaafiliacion'];
        $afi_peso=$data_afiliadoform['afi_peso'];
        $afi_estatura=$data_afiliadoform['afi_estatura'];
        $afi_observacion=$data_afiliadoform['afi_observacion'];
        $dba_estadocivil=$data_afiliadoform['dba_estadocivil'];
        $dba_profesion=$data_afiliadoform['dba_profesion'];
        $dba_rh=$data_afiliadoform['dba_rh'];
        $dba_direccion=$data_afiliadoform['dba_direccion'];
        $dba_municipioresidencia=$data_afiliadoform['dba_municipioresidencia'];
        $dba_correo=$data_afiliadoform['dba_correo'];
        $dba_telefono=$data_afiliadoform['dba_telefono'];
        $dba_celular=$data_afiliadoform['dba_celular'];
    
    }
    
    if($per_estado=='1'){
        $checkedA="checked";
        $checkedI="";
    }
    if($per_estado=='0') {
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

    $capa=".afiiadoacordeon".$per_codigo;
    $recargar="infoafiliado?per_codigo=".$per_codigo;
    $url_guardar="crudupdateafiliado";
}
else{
    $recargar="dtanuevoafiliado?";
    $titulo="Registro Afiliado";
    $url_guardar="crudregistroafiliado";
    $accion="guardar";
}


?>
<form id="afiliadoform" role="form">
    <div class="modal-header fondo-titulo">
        <h3 class="modal-title"><?php echo $titulo; ?></h3>
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
                <label for="crudregistroafiliado" class="font-weight-bold">Tipo Identificaci&oacute;n *</label>
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
    <div class="partedosformulario">
        <?php
            //if($accion=="modificar"){
                include('frma/objfrm/afldo/afldo.php');
            //}
        ?>
    </div>
    
    
   
    

    </div>
    <div class="modal-footer">
      <input type="hidden" id="capa" value="<?php echo $capa; ?>">
      <input type="hidden" id="accion" value="<?php echo $accion; ?>">
      <input type="hidden" id="recargar" value="<?php echo $recargar; ?>">
      <input type="hidden" name="per_codigo" id="per_codigo" value="<?php echo $per_codigo; ?>">
      <input type="hidden" name="url" id="url" value="<?php echo $url_guardar; ?>">
      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="far fa-times-circle"></i> Cerrar</button>
      <button type="submit" class="btn btn-danger btn-sm" onClick="validar_afiliado();"><i class="far fa-save"></i> Guardar</button>
    </div>
</form>

<script src="js/jquery.validate.min.js"></script>
<script src="vjs/registroAfiliado.js"></script>
