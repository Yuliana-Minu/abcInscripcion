<?php 
include('crud/rs/afldo/afldo.php');
$depCodeNa=$_REQUEST['dane_dpto'];
$dataMunicipio=$rsAfiliado->selectMunicipio($depCodeNa);
?>
<select name="selMunNacimiento" id="selMunNacimiento"  class="form-control" data-rule-required="true" required>
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