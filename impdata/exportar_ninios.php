<?php

set_time_limit(1800000000000);
ini_set('memory_limit', '-1');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*

require '../cnxn/cnfg_db.php';

require '../cnxn/cnf_class.php';


$cnxn_pag=Dtbs::getInstance();

*/
?>

<?php
//require_once 'PHPExcel/Classes/PHPExcel.php';
include('../Classes/PHPExcel.php');

$archivo = "excel/ninios.xlsx";
$inputFileType = PHPExcel_IOFactory::identify($archivo);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($archivo);
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
$registro=61;
$per_codigo=2;
/// Password
/*function passwrd($paswd){
    $string=$paswd;
    $largo = strlen($paswd);
    $final_array = array();
    for($i = 0; $i < $largo; $i++)  {
        $caracter = $string[$i];
        array_push($final_array,$caracter);
    }



    for($arr=$largo; $arr >= 0; $arr--){
        $clave.=$final_array[$arr];
    }

    $pass=md5($clave);
    return $pass;
}*/

for ($row = 2; $row <= $highestRow; $row++){
    $identificacion = $sheet->getCell("A".$row)->getValue();
    $fecha_nace = $sheet->getCell("B".$row)->getValue();
    $nombre = $sheet->getCell("C".$row)->getValue();
    $primer_apellido = $sheet->getCell("D".$row)->getValue();
    $segundo_apellido = $sheet->getCell("E".$row)->getValue();
    $genero = $sheet->getCell("F".$row)->getValue();
    $correo = $sheet->getCell("G".$row)->getValue();

    /*$clavePersona=sha1($identificacion);

    $claveInsertar=passwrd($clavePersona);*/

    $fecha_nacimiento = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($fecha_nace));

    if($genero=='F'){
        $per_genero=2;
    }
    else{
        $per_genero=1;
    }

    echo "----> ".$per_codigo;
/*
    $dba_codigo=$per_codigo*2;

    $tipo_persona=$per_codigo*3;

    $user=$per_codigo*4;

    $estado_ninio=$per_codigo*5;

    
   
 

    $sql_persona="INSERT INTO principal.persona(
                                per_codigo, per_nombre, per_primerapellido, 
                                per_segundoapellido, per_personacreo, per_personamodifico,
                                per_fechacreo, per_fechamodifico, per_genero, 
                                per_tipoidentificacion, per_identificacion, 
                                per_estado, per_aleatorio, per_fechanacimiento)
                            VALUES ($per_codigo, '$nombre', '$primer_apellido', 
                                   '$segundo_apellido', 1, 1, 
                                    NOW(), NOW(), '$per_genero', 
                                    6, '$identificacion', 
                                    '1', $per_codigo, '$fecha_nacimiento');";
    
    echo $sql_persona."<br><br>";
    
    
    $sql_datos_basicos="INSERT INTO principal.datos_basicos(
                                    dba_codigo, dba_persona, dba_correo,
                                    dba_estado, dba_fechacreo, dba_fechamodifico, 
                                    dba_personacreo, dba_personamodifico)
                            VALUES ($dba_codigo, $per_codigo, '$correo',
                                    1, NOW(), NOW(), 
                                    1, 1);";
    echo $sql_datos_basicos."<br><br>";

    $sql_perfil="INSERT INTO principal.persona_tipopersona(
                            ptp_codigo, ptp_tipopersona, ptp_persona, 
                            ptp_estado, ptp_fechacreo, ptp_fechamodifico, 
                            ptp_personacreo, ptp_personamodifico)
                    VALUES ($tipo_persona, 5, $per_codigo,
                            1, NOW(), NOW(),
                            1, 1);";
    echo $sql_perfil."<br><br>";


    $sql_user="INSERT INTO principal.usepersona(
                            use_codigo, per_codigo, use_pswd, 
                            use_estado, use_fechacreo, use_alias)
                    VALUES ($user, $per_codigo, '$claveInsertar',
                            '1', NOW(), '$identificacion');";
    echo $sql_user."<br><br>";

    $sql_estado_ninio="INSERT INTO principal.estado_ninio(
                                   eni_codigo, eni_ninio, eni_estado,
                                   eni_fechacreo, eni_fechamodifico,
                                   eni_personacreo, eni_personamodifico)
                           VALUES ($estado_ninio, $per_codigo, 2, 
                                    NOW(), NOW(), 
                                    1, 1);";

    echo $sql_estado_ninio."<br><br>";
    

    */

  
    $per_codigo++;
    $registro++;
  }
?>
