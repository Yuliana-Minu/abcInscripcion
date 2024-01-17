<?php
    include('crud/rs/prsna/prsna.php');

    $per_codigo=$_REQUEST['per_codigo'];

    $datos_basicos=$objRsPersona->datos_basicos($per_codigo);

    if($datos_basicos){
        foreach($datos_basicos as $data_datos_basicos){
            $dba_codigo=$data_datos_basicos['dba_codigo'];
            $per_genero=$data_datos_basicos['per_genero'];
            $per_fechanacimiento=$data_datos_basicos['per_fechanacimiento'];
            $per_municipionacimiento=$data_datos_basicos['per_municipionacimiento'];
            $dba_estadocivil=$data_datos_basicos['dba_estadocivil'];
            $dba_profesion=$data_datos_basicos['dba_profesion'];
            $dba_rh=$data_datos_basicos['dba_rh'];
            $dba_direccion=$data_datos_basicos['dba_direccion'];
            $dba_municipioresidencia=$data_datos_basicos['dba_municipioresidencia'];
            $dba_correo=$data_datos_basicos['dba_correo'];
            $dba_telefono=$data_datos_basicos['dba_telefono'];
            $dba_celular=$data_datos_basicos['dba_celular'];
        }

        if($per_genero==1){
            $genero="Masculino";
        }
        else{
            $genero="Femenino";
        }

        if($per_municipionacimiento){
            $municipio_nacimiento=$objRsPersona->municipio_nombre($per_municipionacimiento);
            $departamento_nacimiento=$objRsPersona->departamento_nombre($per_municipionacimiento);
        }
        else{
            $municipio_nacimiento="";
            $departamento_nacimiento="";
        }

        if($dba_municipioresidencia){
            $municipio_residencia=$objRsPersona->municipio_nombre($dba_municipioresidencia);
            $departamento_residencia=$objRsPersona->departamento_nombre($dba_municipioresidencia);
        }

        if($rh){
            $rh_nombre=$objRsPersona->nombre_rh($dba_rh);
        }

        if($dba_profesion){
            $profesion_nombre=$objRsPersona->nombre_profesion($dba_profesion);
        }

        if($dba_estadocivil){
            $estado_civil=$objRsPersona->nombre_estado_civil($dba_estadocivil);
        }


    }

?>
<div class="row">
    <div class="col-12">
        <table class="table table-responsive table-bordered table-hover">
            <tr>
                <th>rh</th>
                <td><?php echo $rh_nombre; ?></td>
                <th>Estado Civil</th>
                <td><?php echo $estado_civil; ?></td>
                <th>Profesión</th>
                <td><?php echo $profesion_nombre; ?></td>
            </tr>
            <tr>
                <th>Genero</th>
                <td><?php echo $genero; ?></td>
                <th>Telefono Fijo</th>
                <td><?php echo $dba_telefono; ?></td>
                <th>Celular Personal</th>
                <td><?php echo $dba_celular; ?></td>
            </tr>
            <tr>                
                <th>Fecha Nacimiento</th>
                <td><?php echo substr($per_fechanacimiento,0,10); ?></td>
                <th>Departamento de Nacimiento</th>
                <td><?php echo $departamento_nacimiento; ?></td>
                <th>Municipio de Nacimiento</th>
                <td><?php echo $municipio_nacimiento; ?></td>
            </tr>
            <tr>
                <th>Departamento de Residencia</th>
                <td><?php echo $departamento_residencia; ?></td>
                <th>Municipio de Residencia</th>
                <td><?php echo $municipio_nacimiento; ?></td>
                <th>Direcci&oacute;n de Residencia</th>
                <td><?php echo $dba_direccion; ?></td>
            </tr>
            <tr>
                <th>Correo Personal</th>
                <td><?php echo $dba_correo; ?></td>
            </tr>
            
        </table>
    </div>
</div>
<div class="row">
     
</div>