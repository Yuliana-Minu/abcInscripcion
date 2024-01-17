<?php 
include('prcsos/nscrpcion/rsInscrpcion.php');

$objRsInscripcion = new RsInscripcion();

$depCodeNa=$_REQUEST['dane_dpto'];
$dataMunicipio=$objRsInscripcion->municipio_residencia($depCodeNa);
?>
<select name="selMunResidencia" id="selMunResidencia"  class="form-control caja_texto_sizer" data-rule-required="true" onchange="datosEstudiante()" required>
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