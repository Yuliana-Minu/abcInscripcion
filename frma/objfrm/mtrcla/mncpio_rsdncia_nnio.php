<?php 
include('crud/rs/nscrpcion/mtrcla.php');

$depCodeNa=$_REQUEST['dane_dpto'];
$dataMunicipio=$objRsMatricula->select_municipio($depCodeNa);
?>
<select name="selMunResidencia" id="selMunResidencia" onchange="datosEstudiante()"  class="form-control caja_texto_sizer" data-rule-required="true" required>
    <option value="0">Seleccione...</option>
    <?php
        foreach ($dataMunicipio as $data_municipio) {
            $mun_codigo=$data_municipio['mun_codigo'];
            $mun_nombre=$data_municipio['mun_nombre'];
    ?>
        <option value="<?php echo  $mun_codigo; ?>" ><?php echo $mun_nombre; ?></option>
    <?php
        }
    ?>
</select>