<?php

    $fecha_nacimiento=$_REQUEST['fechanacimiento'];
    //calcular la edad
    $fecha_actual = date('Y-m-d');

    // diferencia de las fechas
    $diferencia_fechas= abs(strtotime($fecha_actual) - strtotime($fecha_nacimiento));
    //echo "--->".$diferencia_fechas;
    $edad = floor($diferencia_fechas / (365*60*60*24));

?>
<label for="txtEdad" class="font-weight-bold">Edad (años) *</label>
<input type="number" class="form-control" id="txtEdad" name="txtEdad" aria-describedby="textHelp" value="<?php echo $edad; ?>" >