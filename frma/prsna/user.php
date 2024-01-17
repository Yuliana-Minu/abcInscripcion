<?php

  include('prcsos/prsna/rsPerfil.php');

  $rsperfil=new RsPerfil();

    $codigo_persona=$_REQUEST['codigo_persona'];
  

    $rs_usuario=$rsperfil->usuario($codigo_persona);

    $seccion=$_REQUEST['seccion'];

    if($seccion==1){
        $url_direccion="datapersona";
        $seccion_nombre="Persona";
        $perfil=0;
        $capa_url="#Persona";
    }

    if($seccion==2){
        $url_direccion="dtaadminstrativos";
        $seccion_nombre="Administrativo";
        $perfil=2;
        $capa_url="#Persona";
    }

    if($seccion==3){
        $url_direccion="dtadocente";
        $seccion_nombre="Docente";
        $perfil=3;
        $capa_url="#Persona";
    }

    if($seccion==4){
        $url_direccion="dtapadre";
        $seccion_nombre="Papitos";
        $perfil=4;
        $capa_url="#Padre";
    }

    if($seccion==5){
        $url_direccion="dtaninios";
        $seccion_nombre="Niñ@s";
        $perfil=5;
        $capa_url="#Ninio";
    }

    

  //echo "--- > ".$rs_usuario;

if($rs_usuario){
    $titulo="Modificación";
    $contra=0;
    $url_guardar="crudupdatepersonapefil";
    foreach($rs_usuario as $data_usuario){
        $use_codigo=$data_usuario['use_codigo'];
        $use_alias=$data_usuario['use_alias'];
    }    
}
else{
    $titulo="Registro";
    $contra=1;
    $url_guardar="crudregistropersonaperfil";
}
?>
<form id="usuarioform" role="form">
    <div class="modal-header fondo-titulo">
        <h3 class="modal-title"><?php echo $titulo." Usuario" ?></h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <p class="font-weight-bold">* Campos obligatorios</p>
        <!-- ******************** INICIO FORMULARIO ************************* -->
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="txtalias" class="font-weight-bold">Nombre Usuario *</label>
                    <input type="text" class="form-control" id="txtalias" name="txtalias" value="<?php echo $use_alias; ?>" aria-describedby="textHelp" data-rule-required="true" required>
                    <span class="help-block" id="error"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="txtPass" class="font-weight-bold">Contraseña *</label>
                    <input type="password" class="form-control" id="txtPass" name="txtPass" aria-describedby="textHelp" value="<?php echo $per_nombre; ?>">
                    <span class="help-block" id="error"></span>
                </div>
            </div>
        </div>
        <!--<div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="txtPassConfirmacion" class="font-weight-bold">Confirmaci&oacute;n de Contraseña *</label>
                    <input type="password" class="form-control" id="txtPassConfirmacion" name="txtPassConfirmacion" aria-describedby="textHelp" data-rule-required="true" value="<?php echo $per_nombre; ?>" required>
                    <span class="help-block" id="error"></span>
                </div>
            </div>
        </div>-->

        <strong>Perfiles</strong>
        <div class="row">
            <div class="col-sm-4">
                <div class="bg">
                    <div>
                    <?php
                        $perfiles=$rsperfil->selectPerfil();
                        if($perfiles){
                            foreach ($perfiles as $data_perfiles) {
                                $prf_codigo=$data_perfiles['prf_codigo'];
                                $prf_nombre=$data_perfiles['prf_nombre'];

                                
                                $checkedPerfil=$rsperfil->perfiles_persona($codigo_persona, $prf_codigo);
                                if($checkedPerfil==1){
                                    $chckdPrfil="checked";
                                }
                                else{
                                    $chckdPrfil="";
                                }
                                
                    ?>
                        <div class="chiller_cb"> 
                            <input id="perfil<?php echo $prf_codigo; ?>" name="perfil[]" type="checkbox" value="<?php echo $prf_codigo; ?>" data-rule-required="true" required <?php echo $chckdPrfil; ?>>
                            <label for="perfil<?php echo $prf_codigo; ?>"><?php echo $prf_nombre; ?></label>
                            <span></span>
                        </div>
                    <?php
                            
                            }//Foreach Menu
                        }//if Menu
                    ?>

                    </div>
                </div>

            </div>
        </div>
   
    </div>
    <div class="modal-footer">
      <input type="hidden" name="contra" id="contra" value="<?php echo $contra; ?>">
      <input type="hidden" name="user_codigo" id="user_codigo" value="<?php echo $use_codigo; ?>">
      <input type="hidden" name="codigoPersona" id="codigoPersona" value="<?php echo $codigo_persona; ?>">
      <input type="hidden" name="capa_url" id="capa_url" value="<?php echo $capa_url; ?>">
      <input type="hidden" name="url_direccion" id="url_direccion" value="<?php echo $url_direccion; ?>">
      <input type="hidden" name="url_proceso" id="url_proceso" value="<?php echo $url_guardar; ?>">
      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="far fa-times-circle"></i> Cerrar</button>
      <button type="submit" class="btn btn-danger btn-sm" onClick="validar_perfilPersona();"><i class="far fa-save"></i> Guardar</button>
    </div>
</form>

<script src="js/jquery.validate.min.js"></script>
<script src="vjs/registroPerfil.js"></script>
