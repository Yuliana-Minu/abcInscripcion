<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtLugarExpedicion" class="font-weight-bold">Lugar de Expedici&oacute;n </label>
            <input type="text" class="form-control" id="txtLugarExpedicion" name="txtLugarExpedicion" aria-describedby="textHelp" value="<?php echo $per_nombre; ?>">
            <span class="help-block" id="error"></span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtNombre" class="font-weight-bold">Nombre *</label>
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
            <label for="textSegundoApellido" class="font-weight-bold">Segundo Apellido </label>
            <input type="text" class="form-control" id="txtSegundoApellido" value="<?php echo $per_segundoapellido; ?>" name="txtSegundoApellido">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="selEps" class="font-weight-bold">EPS  </label>
            <select name="selEps" id="selEps"  class="form-control" >
                <option value="0">Seleccione...</option>
                <?php
                    foreach ($dataEps as $data_eps) {
                        $eps_codigo=$data_eps['eps_codigo'];
                        $eps_descripcion=$data_eps['eps_descripcion'];

                        if($dba_rh==$eps_codigo){
                            $select_eps="selected";
                        }
                        else{
                            $select_eps="";
                        }
                ?>
                    <option value="<?php echo $eps_codigo; ?>" <?php echo $select_eps; ?> ><?php echo $eps_descripcion; ?></option>
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
            <label for="selRh" class="font-weight-bold">RH  </label>
            <select name="selRh" id="selRh"  class="form-control">
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
            <label for="txtEstrato" class="font-weight-bold">Estrato </label>
            <input type="text" class="form-control" id="txtEstrato" name="txtEstrato" value="<?php echo $dba_estrato; ?>" >
            <span class="help-block" id="error"></span>
        </div>
    </div> 

</div>
<div class="row">
    <div class="col-sm-6"> 
        <div class="form-group">
            <label for="radioSisben" class="font-weight-bold">¿Tiene Sisben?  </label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioSisben" id="radioSi" value="1" <?php echo $checkedM; ?> >
                <label class="form-check-label" for="radioSi">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioSisben" id="radioNo" value="2" <?php echo $checkedF; ?> >
                <label class="form-check-label" for="radioNo">No</label>
            </div>
            <span class="help-block" id="error"></span>
        </div>
    </div>

    <div class="col-sm-6"> 
        <div class="form-group">
            <label for="radioGenero" class="font-weight-bold">Genero  </label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioGenero" id="inlineRadio1" value="1" <?php echo $checkedM; ?> >
                <label class="form-check-label" for="inlineRadio1">Masculino</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioGenero" id="inlineRadio2" value="2" <?php echo $checkedF; ?> >
                <label class="form-check-label" for="inlineRadio2">Femenino</label>
            </div>
            <span class="help-block" id="error"></span>
        </div>
    </div>
    
</div>


<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtFechaNacimiento" class="font-weight-bold">Fecha de Nacimiento  </label>
            <input type="date" class="form-control" id="txtFechaNacimiento" name="txtFechaNacimiento" aria-describedby="textHelp" value="<?php echo substr($per_fechanacimiento,0,10); ?>" >
            <span class="help-block" id="error"></span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group edadcapa">
            <label for="txtEdad" class="font-weight-bold">Edad (años)  </label>
            <input type="number" class="form-control" id="txtEdad" name="txtEdad" aria-describedby="textHelp" value="<?php echo $edad; ?>" >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="SelDepNacimiento" class="font-weight-bold">Departamento de Nacimiento  </label>
            <select name="SelDepNacimiento" id="SelDepNacimiento"  class="form-control"  >
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
            <label for="selMunNacimiento" class="font-weight-bold">Municipio de Nacimiento  </label>
            <div class="munNace">
                <select name="selMunNacimiento" id="selMunNacimiento"  class="form-control" >
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
            <label for="txtDireccion" class="font-weight-bold">Direcci&oacute;n de Residencia  </label>
            <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" value="<?php echo $dba_direccion; ?>" aria-describedby="textHelp"  >
            <span class="help-block" id="error"></span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="SelDepResidencia" class="font-weight-bold">Departamento de Residencia  </label>
            <select name="SelDepResidencia" id="SelDepResidencia"  class="form-control" >
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
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="selMunResidencia" class="font-weight-bold">Municipio de Residencia  </label>
            <div class="munVive">
                <select name="selMunResidencia" id="selMunResidencia"  class="form-control" >
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
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtCorreo" class="font-weight-bold">Correo Personal </label>
            <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" aria-describedby="textHelp" value="<?php echo $dba_correo; ?>" >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtTelefonoFijo" class="font-weight-bold">Tel&eacute;fono Fijo </label>
            <input type="number" class="form-control" id="txtTelefonoFijo" name="txtTelefonoFijo" aria-describedby="textHelp" value="<?php echo $dba_telefono; ?>" >
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="txtCelularPersonal" class="font-weight-bold">Celular Personal </label>
            <input type="text" class="form-control" id="txtCelularPersonal" name="txtCelularPersonal" value="<?php echo $dba_celular; ?>" aria-describedby="textHelp" >
            <span class="help-block" id="error"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="radioEstado" class="font-weight-bold">Estado </label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioEstado"  id="radioActivo" value="1" <?php echo $checkedA; ?> >
                <label class="form-check-label" for="radioActivo">Activo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioEstado"  id="radioInactivo" value="0" <?php echo $checkedI; ?>>
                <label class="form-check-label" for="radioInactivo">Inactivo</label>
            </div>
            <span class="help-block" id="error"></span>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#SelDepNacimiento').change(function(){
        var dane_dpto=$(this).find(':selected').data('codigodep');
       // alert(dane_dpto);
        $.ajax({
            url:"munnacefuncionario",
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
            url:"munvivefuncionario",
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
</script>   