<?php 
$per_codigo=$_REQUEST['per_codigo'];

include('crud/rs/afldo/afldo.php');

$datosAfiliado=$rsAfiliado->infoAfiliado($per_codigo);

foreach($datosAfiliado as $data_afiliado){
    $per_codigo=$data_afiliado['per_codigo'];
    $per_nombre=$data_afiliado['per_nombre'];
    $per_segundonombre=$data_afiliado['per_segundonombre'];
    $per_primerapellido=$data_afiliado['per_primerapellido'];
    $per_segundoapellido=$data_afiliado['per_segundoapellido'];
    $per_identificacion=$data_afiliado['per_identificacion'];
    $per_tipoidentificacion=$data_afiliado['per_tipoidentificacion'];
    $per_genero=$data_afiliado['per_genero'];
    $per_fechanacimiento=$data_afiliado['per_fechanacimiento'];
    $per_municipionacimiento=$data_afiliado['per_municipionacimiento'];
    $afi_fechaafiliacion=$data_afiliado['afi_fechaafiliacion'];
    $afi_peso=$data_afiliado['afi_peso'];
    $afi_estatura=$data_afiliado['afi_estatura'];
    $afi_observacion=$data_afiliado['afi_observacion'];
    $dba_estadocivil=$data_afiliado['dba_estadocivil'];
    $dba_profesion=$data_afiliado['dba_profesion'];
    $dba_rh=$data_afiliado['dba_rh'];
    $dba_direccion=$data_afiliado['dba_direccion'];
    $dba_municipioresidencia=$data_afiliado['dba_municipioresidencia'];
    $dba_correo=$data_afiliado['dba_correo'];
    $dba_telefono=$data_afiliado['dba_telefono'];
    $dba_celular=$data_afiliado['dba_celular'];

}

if($per_genero==1){
    $genero="Masculino";
}

if($per_genero==2){
    $genero="Femenino";
}

$fecha_actual = date('Y-m-d');

$diferencia_fechas= abs(strtotime($fecha_actual) - strtotime($per_fechanacimiento));

$edad = floor($diferencia_fechas / (365*60*60*24));

$tipo_identificacion=$rsAfiliado->nombre_tipide($per_tipoidentificacion);

$rh=$rsAfiliado->nombre_rh($dba_rh);

$profesion=$rsAfiliado->nombre_profesion($dba_profesion);

$nombre_estadocivil=$rsAfiliado->nombre_estadocivil($dba_estadocivil);


$municipioNacimiento=$rsAfiliado->municipioDatos($per_municipionacimiento);

foreach($municipioNacimiento as $mun_data){
    $mun_codigona=$mun_data['mun_codigo'];
    $mun_nombrena=$mun_data['mun_nombre'];
    $dep_codigona=$mun_data['dep_codigo'];

}

$depNa=$rsAfiliado->dep_nombre($dep_codigona);



$municipioResidencia=$rsAfiliado->municipioDatos($dba_municipioresidencia);

foreach($municipioResidencia as $mun_data){
    $mun_codigore=$mun_data['mun_codigo'];
    $mun_nombrere=$mun_data['mun_nombre'];
    $dep_codigore=$mun_data['dep_codigo'];

}

$depRe=$rsAfiliado->dep_nombre($dep_codigore);




?>
<div class="row">
    <div class="col-sm-12" style="padding-top: 10px; text-align: right; ">
        <button type="button" class="btn btn-danger btn-sm" onClick="editar('<?php echo $per_codigo; ?>');" title="Editar "><i class="fas fa-pen"></i></button>
    </div>
</div>
<div class="row">
    <div class="col-sm-12"></div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table">
            <tr>
                <th>Identificación</th>
                <td><?php echo $per_identificacion; ?></td>
                <th>Tipo Identificación</th>
                <td><?php echo $tipo_identificacion; ?></td>
            </tr>
            <tr>
                <th>Primer Nombre</th>
                <td><?php echo $per_nombre; ?></td>
                <th>Segundo Nombre</th>
                <td><?php echo $per_segundonombre; ?></td>
            </tr>
            <tr>
                <th>Primer Apellido</th>
                <td><?php echo $per_primerapellido; ?></td>
                <th>Segundo Apellido</th>
                <td><?php echo $per_segundoapellido; ?></td>
            </tr>
            <tr>        
                <th>Fecha Afiliación</th>
                <td><?php echo substr($afi_fechaafiliacion,0,10); ?></td>
                <th>Fecha Nacimiento</th>
                <td><?php echo substr($per_fechanacimiento,0,10); ?></td>
            </tr>
            <tr>
                <th>Departemento de Nacimiento</th>
                <td><?php echo $mun_nombrena;?></td>
                <th>Municipio de Nacimiento</th>
                <td><?php echo $depNa;?></td>
            </tr>
            <tr>
                <th>Genero</th>
                <td><?php echo $genero; ?></td>
                <th>RH</th>
                <td><?php echo $rh; ?></td>
            </tr>
            <tr>
                <th>Departemento de Residencia</th>
                <td><?php echo $depRe; ?></td>
                <th>Municipio de Residencia</th>
                <td><?php echo $mun_nombrere; ?></td>
            </tr>
            <tr>
                <th>Edad</th>
                <td><?php echo $edad; ?></td>
                <th>Dirección de Residencia</th>
                <td><?php echo $dba_direccion; ?></td>
            </tr>
            <tr>
                <th>Profesión</th>
                <td><?php echo $profesion; ?> </td>
                <th>Estado Civil</th>
                <td><?php echo $nombre_estadocivil; ?></td>
            </tr>
            <tr>
                <th>Correo</th>
                <td><?php echo $dba_correo;?></td>
                <th>Teléfono Fijo</th>
                <td><?php echo $dba_telefono;?></td>
            </tr>
            <tr>
                <th>Celular</th>
                <td><?php echo $dba_celular; ?></td>
                <th>Estatura</th>
                <td><?php echo $afi_estatura; ?></td>
            </tr>

            <tr>
                <th>Peso</th>
                <td><?php echo $afi_peso; ?></td>
                <th>Observación</th>
                <td><?php echo $afi_observacion; ?></td>
            </tr>


        </table>
    </div>
</div>

<script type="text/javascript">
    function editar(codigo_persona){
        var codigo_persona=codigo_persona;
        $('#frmModal').modal({
            keyboard: true
        });

        $.ajax({
            url:"formafiliado",
            type:"POST",
            data:"codigo_persona="+codigo_persona,
            async:true,

            success: function(message){
                $(".modal-content").empty().append(message);
            }
        });
    }
</script>