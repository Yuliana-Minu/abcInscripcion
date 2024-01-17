<?php 
    include('prcsos/prsna/fto.php');

    function quitar_tildes($cadena) {
        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹",",","%","Ñ","ñ");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E","","","N","n");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    }

    function quitar_signos($cadena) {
        $no_permitidas= array ("#",".","-","/","~","+","*","%",")","(","{","}","¿","?","=","@","|","°","¬","'","´","¨","^",":",";","<",">");
        $permitidas= array ("");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    }

    /*********Subir imagen *************/
    $archivo = $_FILES['files']['name'];
    $info = new SplFileInfo($archivo);
    $extension=$info->getExtension();

    if($archivo){
        $archivo = quitar_tildes($archivo);
        $archivo = quitar_signos($archivo);
        $archivo = strtolower($archivo);
        $archivo= str_replace(' ','',$archivo);
        $source = $_FILES['files']['tmp_name'];
        $target = "adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        $archivoNombre="adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        chmod('adjunto/persona/'.$archivo.".".$extension,0755);
        

        if(@move_uploaded_file($source, $target)) {
            $name_archivo=$archivoNombre;
        }
        else{
            $name_archivo="NA";
        }   
    }
    else{
        $name_archivo="NA";
    }

    $personaSistema = $_SESSION['idusuario'];
    $codigo_persona = $_REQUEST['codigo_persona'];


    $modificarfotopersona = new UpdteFoto();

    $modificarfotopersona->setPersonaFoto($codigo_persona);
    $modificarfotopersona->setFotoFoto($name_archivo);
    $modificarfotopersona->setPersonaSistema($personaSistema);

    if($name_archivo == 'NA'){
        echo "0";
    }
    else{
        if (file_exists($name_archivo)) {
            echo "1";
            echo "--> ".$modificarfotopersona->updateFoto();
        }
        else {
            echo "0";
        }
    }
    
?>