<?php

  include('crud/rs/admin/ctgria_lbral.php');
  $rspersona=new RsPersona();

  $dataTipoIdentificacion=$rspersona->selectTipoIdentificacion();
  $codigo_persona=$_REQUEST['codigo_persona'];

if($codigo_persona){
    $titulo="Modificar";
    $rspersona->setCodigoPersona($codigo_persona);
    $rspersona=$rspersona->selectPersonaPorCodigo();

    foreach($rspersona as $dataPersona){
        $per_codigo=$dataPersona['per_codigo'];
        $per_nombre=$dataPersona['per_nombre'];
        $per_primerapellido=$dataPersona['per_primerapellido'];
        $per_segundoapellido=$dataPersona['per_segundoapellido'];
        $per_genero=$dataPersona['per_genero'];
        $per_tipoidentificacion=$dataPersona['per_tipoidentificacion'];
        $per_identificacion=$dataPersona['per_identificacion'];
        $per_estado=$dataPersona['per_estado'];
        $per_rol=$dataPersona['per_rol'];
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
    $url_guardar="crudactualizarpersona";
}
else{
    $titulo="Registro";
    $url_guardar="crudregistropersona";
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
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="txtNombre" class="font-weight-bold">Nombre *</label>
                <input type="text" class="form-control" id="txtNombre" name="txtNombre" aria-describedby="textHelp" data-rule-required="true" value="<?php echo $per_nombre; ?>" required>
                <span class="help-block" id="error"></span>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="txtPrimerApellido" class="font-weight-bold">Primer Apellido *</label>
                <input type="text" class="form-control" id="txtPrimerApellido" name="txtPrimerApellido" value="<?php echo $per_primerapellido; ?>" data-rule-required="true" required>
                <span class="help-block" id="error"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6"> 
            <div class="form-group">
                <label for="textSegundoApellido" class="font-weight-bold">Segundo Apellido </label>
                <input type="text" class="form-control" id="txtSegundoApellido" value="<?php echo $per_segundoapellido; ?>" name="txtSegundoApellido">
            </div>
        </div>
        <div class="col-sm-6"> 
            <div class="form-group">
                <label for="radioGenero" class="font-weight-bold">Genero *</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioGenero" id="inlineRadio1" value="1" <?php echo $checkedM; ?> <?php echo $sololectura; ?> required>
                    <label class="form-check-label" for="inlineRadio1">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioGenero" id="inlineRadio2" value="2" <?php echo $checkedF; ?> <?php echo $sololectura; ?> required>
                    <label class="form-check-label" for="inlineRadio2">Femenino</label>
                </div>
                <span class="help-block" id="error"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="radioEstado" class="font-weight-bold">Estado *</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioEstado"  id="radioActivo" value="1" <?php echo $checkedA; ?> <?php echo $sololectura; ?> required>
                    <label class="form-check-label" for="radioActivo">Activo</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioEstado"  id="radioInactivo" value="0" <?php echo $checkedI; ?> <?php echo $sololectura; ?> required>
                    <label class="form-check-label" for="radioInactivo">Inactivo</label>
                </div>
                <span class="help-block" id="error"></span>
            </div>
        </div>
    </div>
    
   
    

    </div>
    <div class="modal-footer">
      <input type="hidden" name="codigoPersona" id="codigoPersona" value="<?php echo $per_codigo; ?>">
      <input type="hidden" name="url" id="url" value="<?php echo $url_guardar; ?>">
      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="far fa-times-circle"></i> Cerrar</button>
      <button type="submit" class="btn btn-danger btn-sm" onClick="validar_formregistropersona();"><i class="far fa-save"></i> Guardar</button>
    </div>
</form>

<script src="js/jquery.validate.min.js"></script>
<script src="vjs/registroPersona.js"></script>
