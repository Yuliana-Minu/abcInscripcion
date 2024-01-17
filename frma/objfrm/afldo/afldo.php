<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtFechaAfiliacion" class="font-weight-bold">Fecha de Afiliaci&oacute;n *</label>
            <input type="date" class="form-control" id="txtFechaAfiliacion" name="txtFechaAfiliacion" aria-describedby="textHelp" data-rule-required="true" value="<?php echo substr($afi_fechaafiliacion,0,10); ?>" required>
            <span class="help-block" id="error"></span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtNombre" class="font-weight-bold">Primer Nombre *</label>
            <input type="text" class="form-control" id="txtNombre" name="txtNombre" aria-describedby="textHelp" data-rule-required="true" value="<?php echo $per_nombre; ?>" required>
            <span class="help-block" id="error"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtSegundoNombre" class="font-weight-bold">Segundo Nombre </label>
            <input type="text" class="form-control" id="txtSegundoNombre" name="txtSegundoNombre" value="<?php echo $per_segundonombre; ?>">
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
            <label for="txtSegundoApellido" class="font-weight-bold">Segundo Apellido </label>
            <input type="text" class="form-control" id="txtSegundoApellido" name="txtSegundoApellido" value="<?php echo $per_segundoapellido; ?>">
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
            <label for="selRh" class="font-weight-bold">RH *</label>
            <select name="selRh" id="selRh"  class="form-control" data-rule-required="true" required>
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
            <span class="help-block" id="error"></span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="selEstadoCivil" class="font-weight-bold">Estado Civil *</label>
            <select name="selEstadoCivil" id="selEstadoCivil"  class="form-control" data-rule-required="true" required>
                <option value="0">Seleccione...</option>
                <?php
                    foreach ($dataEstadoCivil as $data_estadoCivil) {
                        $eci_codigo=$data_estadoCivil['eci_codigo'];
                        $eci_nombre=$data_estadoCivil['eci_nombre'];

                        if($dba_estadocivil==$eci_codigo){
                            $select_estadoCivil="selected";
                        }
                        else{
                            $select_estadoCivil="";
                        }
                ?>
                    <option value="<?php echo  $eci_codigo; ?>" <?php echo $select_estadoCivil; ?> ><?php echo $eci_nombre; ?></option>
                <?php
                    }
                ?>
            </select>
            <span class="help-block" id="error"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="selProfesion" class="font-weight-bold">Profesi&oacute;n *</label>
            <select name="selProfesion" id="selProfesion"  class="form-control" data-rule-required="true" required>
                <option value="0">Seleccione...</option>
                <?php
                    foreach ($dataProfesion as $data_profesion) {
                        $pro_codigo=$data_profesion['pro_codigo'];
                        $pro_nombre=$data_profesion['pro_nombre'];

                        if($dba_profesion==$pro_codigo){
                            $select_profesion="selected";
                        }
                        else{
                            $select_profesion="";
                        }
                ?>
                    <option value="<?php echo  $pro_codigo; ?>" <?php echo $select_profesion; ?> ><?php echo $pro_nombre; ?></option>
                <?php
                    }
                ?>
            </select>
            <span class="help-block" id="error"></span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtFechaNacimiento" class="font-weight-bold">Fecha de Nacimiento *</label>
            <input type="date" class="form-control" id="txtFechaNacimiento" name="txtFechaNacimiento" aria-describedby="textHelp" data-rule-required="true" value="<?php echo substr($per_fechanacimiento,0,10); ?>" required>
            <span class="help-block" id="error"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="SelDepNacimiento" class="font-weight-bold">Departamento de Nacimiento *</label>
            <select name="SelDepNacimiento" id="SelDepNacimiento"  class="form-control" data-rule-required="true" required>
                <option value="0">Seleccione...</option>
                <?php
                    foreach ($dataDepartamento as $data_departamento) {
                        $dep_codigo=$data_departamento['dep_codigo'];
                        $dep_nombre=$data_departamento['dep_nombre'];
                        $dep_dane=$data_departamento['dep_dane'];

                        if($depcodigoNace==$dep_codigo){
                            $select_departamento="selected";
                        }
                        else{
                            $select_departamento="";
                        }
                ?>
                    <option value="<?php echo  $dep_codigo; ?>" data-codigodep="<?php echo $dep_dane; ?>" <?php echo $select_departamento; ?> ><?php echo $dep_nombre; ?></option>
                <?php
                    }
                ?>
            </select>
            <span class="help-block" id="error"></span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="selMunNacimiento" class="font-weight-bold">Municipio de Nacimiento *</label>
            <div class="munNace">
                <select name="selMunNacimiento" id="selMunNacimiento"  class="form-control" data-rule-required="true" required>
                    <option value="0">Seleccione el Departamento...</option>
                    <?php
                     if($accion=="modificar"){

                        $dataMunicipio=$rsAfiliado->selectMunicipio($depCodeNa);
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
                    ?>
                </select>
            
            </div>
            <span class="help-block" id="error"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtEdad" class="font-weight-bold">Edad (años) *</label>
            <input type="number" class="form-control" id="txtEdad" name="txtEdad" aria-describedby="textHelp" value="" >
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtDireccion" class="font-weight-bold">Direcci&oacute;n de Residencia *</label>
            <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" value="<?php echo $dba_direccion; ?>" aria-describedby="textHelp" data-rule-required="true" required>
            <span class="help-block" id="error"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="SelDepResidencia" class="font-weight-bold">Departamento de Residencia *</label>
            <select name="SelDepResidencia" id="SelDepResidencia"  class="form-control" data-rule-required="true" required>
                <option value="0">Seleccione...</option>
                <?php
                    foreach ($dataDepartamento as $data_depResidencia) {
                        $dep_codigo=$data_depResidencia['dep_codigo'];
                        $dep_nombre=$data_depResidencia['dep_nombre'];
                        $dep_dane=$data_depResidencia['dep_dane'];

                        if($depcodigoVivi==$dep_codigo){
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
            <span class="help-block" id="error"></span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="selMunResidencia" class="font-weight-bold">Municipio de Residencia *</label>
            <div class="munVive">
                <select name="selMunResidencia" id="selMunResidencia"  class="form-control" data-rule-required="true" required>
                    <option value="0">Seleccione el Departamento...</option>
                    <?php
                        if($accion=="modificar"){

                        $dataMunicipio=$rsAfiliado->selectMunicipio($depCodeRe);
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
                    ?>
                </select>
           
            </div>
            <span class="help-block" id="error"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtCorreo" class="font-weight-bold">Correo Personal </label>
            <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" aria-describedby="textHelp" value="<?php echo $dba_correo; ?>" >
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtTelefonoFijo" class="font-weight-bold">Tel&eacute;fono Fijo </label>
            <input type="number" class="form-control" id="txtTelefonoFijo" name="txtTelefonoFijo" aria-describedby="textHelp" value="<?php echo $dba_telefono; ?>" >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtCelularPersonal" class="font-weight-bold">Celular Personal*</label>
            <input type="text" class="form-control" id="txtCelularPersonal" name="txtCelularPersonal" value="<?php echo $dba_celular; ?>" aria-describedby="textHelp" data-rule-required="true" required>
            <span class="help-block" id="error"></span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtEstatura" class="font-weight-bold">Estatura (cm) *</label>
            <input type="number" class="form-control" id="txtEstatura" name="txtEstatura" value="<?php echo $afi_estatura; ?>" aria-describedby="textHelp" data-rule-required="true" required>
            <span class="help-block" id="error"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtPeso" class="font-weight-bold">Peso (kg)*</label>
            <input type="number" class="form-control" id="txtPeso" name="txtPeso" value="<?php echo $afi_peso; ?>" aria-describedby="textHelp" data-rule-required="true" required>
            <span class="help-block" id="error"></span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtObservaciones" class="font-weight-bold">Observaciones</label>
            <textarea name="txtObservaciones" id="txtObservaciones" class="form-control" aria-describedby="textHelp"><?php echo $afi_observacion; ?></textarea>
        </div>
    </div>
</div>

<!--<div class="row">
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
</div>-->

<script type="text/javascript">
    $('#SelDepNacimiento').change(function(){
        var dane_dpto=$(this).find(':selected').data('codigodep');
       // alert(dane_dpto);
        $.ajax({
            url:"munucipioafiliado",
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
            url:"munrecide",
            type:"POST",
            data:"dane_dpto="+dane_dpto,
            async:true,

            success: function(message){
            $(".munVive").empty().append(message);
            }
        });
    });
</script>