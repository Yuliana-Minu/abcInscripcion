<?php 
    include('prcsos/nscrpcion/rgstromtrcla.php');

    function quitar_tildes($cadena) {
        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹",",","%","Ñ","ñ");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E","","","N","n");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    }

    function quitar_puntos_comas($cadena) {
        $no_permitidas= array (".",",");
        $permitidas= array ("&apos;");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    }

    function quitar_signos($cadena) {
        $no_permitidas= array ("#",".","-","/","~","+","*","%",")","(","{","}","¿","?","=","@","|","°","¬","'","´","¨","^",":",";","<",">");
        $permitidas= array ("");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    }

    //Datos Estudiante
   $txtCodigoEstudiante = $_REQUEST['txtCodigoEstudiante'];//
    $txtFechaPreMatricula = $_REQUEST['txtFechaPreMatricula'];
    $selGradoIngresar = $_REQUEST['selGradoIngresar'];//
    $selTipoIdentificacion = $_REQUEST['selTipoIdentificacion'];//
    $txtIdentificacion =  htmlspecialchars(quitar_puntos_comas($_REQUEST['txtIdentificacion']), ENT_QUOTES | ENT_HTML5);//
    $txtLugarExpedicion = htmlspecialchars($_REQUEST['txtLugarExpedicion'], ENT_QUOTES | ENT_HTML5);//
    $txtNombre = htmlspecialchars($_REQUEST['txtNombre'], ENT_QUOTES | ENT_HTML5);//
    $txtSegundoNombre = htmlspecialchars($_REQUEST['txtSegundoNombre'], ENT_QUOTES | ENT_HTML5);//
    $txtPrimerApellido = htmlspecialchars($_REQUEST['txtPrimerApellido'], ENT_QUOTES | ENT_HTML5);//
    $txtSegundoApellido = htmlspecialchars($_REQUEST['txtSegundoApellido'], ENT_QUOTES | ENT_HTML5);//
    $radioNacionalidadNinio = $_REQUEST['radioNacionalidadNinio'];//
    $selMunNacimiento = $_REQUEST['selMunNacimiento'];//
    $txtCualNinio = htmlspecialchars($_REQUEST['txtCualNinio'], ENT_QUOTES | ENT_HTML5);//
    $txtFechaNacimiento = $_REQUEST['txtFechaNacimiento'];//
    $txtDireccion = htmlspecialchars($_REQUEST['txtDireccion'], ENT_QUOTES | ENT_HTML5);//
    $selMunResidencia = $_REQUEST['selMunResidencia'];//
    $txtTelefono = htmlspecialchars($_REQUEST['txtTelefono'], ENT_QUOTES | ENT_HTML5);//
    $txtCelular = htmlspecialchars($_REQUEST['txtCelular'], ENT_QUOTES | ENT_HTML5);//
    $txtCorreo = filter_var($_REQUEST['txtCorreo'], FILTER_SANITIZE_EMAIL);//
    $selEps = $_REQUEST['selEps'];//
    $selRh = $_REQUEST['selRh'];//
    $txtEstrato = htmlspecialchars($_REQUEST['txtEstrato'], ENT_QUOTES | ENT_HTML5);//
    $radioSisben = $_REQUEST['radioSisben'];//

    $firmaNinio=$_REQUEST['firmaNinio'];

    /*******Datos Firma Ninio */
    /*$resultninio = array();
    $imagedataninio = base64_decode($firmaNinio);
    $filenameninio = md5(date("dmYhisA"));
    //Location to where you want to created sign image
    $file_name_ninio = 'adjunto/firma/'.$filenameninio.'.png';
    file_put_contents($file_name_ninio,$imagedataninio);
    $resultninio['status'] = 1;
    $resultninio['file_name'] = $file_name_ninio;
    
    print_r($resultninio);*/

    /*********************** */
    

    /*********Subir imagen *************/
    $archivo =  $_FILES['txtFoto']['name'];

    if($archivo){
        $info = new SplFileInfo($archivo);
        $extension=$info->getExtension();

        $archivo = quitar_tildes($archivo);
        $archivo = quitar_signos($archivo);
        $archivo = strtolower($archivo);
        $archivo= str_replace(' ','_',$archivo);
        $source = $_FILES['txtFoto']['tmp_name'];
        $target = "adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        $nombretext=date('YmdHis')."_".$archivo.".".$extension;
        $archivoNombre="adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        chmod('adjunto/persona/'.$archivo.".".$extension,0755);
        
        //move_uploaded_file($source, $target);

        if(@move_uploaded_file($source, $target)) {
            //$result = 1;
            $txtFoto=$archivoNombre;
        }

        
    }
    else{
        $txtFoto="";
    }
    //echo "Foto ---> ".$txtFoto;
    chmod("adjunto/persona", 0755);
    /************** Fin subir imagen **************/


    //Datos Padre
    $txtCodigoPadre = $_REQUEST['txtCodigoPadre'];
    $txtNombrePadre = htmlspecialchars($_REQUEST['txtNombrePadre'], ENT_QUOTES | ENT_HTML5);//
    $txtSegundoNombrePadre  = htmlspecialchars($_REQUEST['txtSegundoNombrePadre'], ENT_QUOTES | ENT_HTML5);//
    $txtPrimerApellidoPadre = htmlspecialchars($_REQUEST['txtPrimerApellidoPadre'], ENT_QUOTES | ENT_HTML5);//
    $textSegundoApellidoPadre = htmlspecialchars($_REQUEST['textSegundoApellidoPadre'], ENT_QUOTES | ENT_HTML5);//
    $txtIdentificacionPadre =  htmlspecialchars(quitar_puntos_comas($_REQUEST['txtIdentificacionPadre']), ENT_QUOTES | ENT_HTML5);//
    $txtFechaNacimientoPadre = $_REQUEST['txtFechaNacimientoPadre'];//
    $radioNacionalidadPadre = $_REQUEST['radioNacionalidadPadre'];//
    $selMunNacimientoPadre = $_REQUEST['selMunNacimientoPadre'];//
    $txCualPadre = htmlspecialchars($_REQUEST['txCualPadre'], ENT_QUOTES | ENT_HTML5);//
    $txtOcupacionPadre = htmlspecialchars($_REQUEST['txtOcupacionPadre'], ENT_QUOTES | ENT_HTML5);//
    $txtEmpresaPadre = htmlspecialchars($_REQUEST['txtEmpresaPadre'], ENT_QUOTES | ENT_HTML5);//
    $txtTelefonoPadre = htmlspecialchars($_REQUEST['txtTelefonoPadre'], ENT_QUOTES | ENT_HTML5);
    $txtCelularPadre = htmlspecialchars($_REQUEST['txtCelularPadre'], ENT_QUOTES | ENT_HTML5);
    $txtCargoPadre = htmlspecialchars($_REQUEST['txtCargoPadre'], ENT_QUOTES | ENT_HTML5);
    $txtCorreoPadre = filter_var($_REQUEST['txtCorreoPadre'],FILTER_SANITIZE_EMAIL);
    
    
    /*********Subir imagen *************/
    $archivo =  $_FILES['txtFotoPapito']['name'];

    if($archivo){
        $info = new SplFileInfo($archivo);
        $extension=$info->getExtension();

        $archivo = quitar_tildes($archivo);
        $archivo = quitar_signos($archivo);
        $archivo = strtolower($archivo);
        $archivo= str_replace(' ','_',$archivo);
        $source = $_FILES['txtFotoPapito']['tmp_name'];
        $target = "adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        $nombretext=date('YmdHis')."_".$archivo.".".$extension;
        $archivoNombre="adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        chmod('adjunto/persona/'.$archivo.".".$extension,0750);
         
        if(@move_uploaded_file($source, $target)) {
            //$result = 1;
            $txtFotoPapito=$archivoNombre;
        }
         
    }
    else{
        $txtFotoPapito="";
    }
    /************** Fin subir imagen **************/

    $firmaPadre=$_REQUEST['firmaPadre'];

    /*******Datos Firma Padre */
    /*$resultpadre = array();
    $imagedatapadre = base64_decode($firmaPadre);
    $filenamepadre = md5(date("dmYhisA"));
    //Location to where you want to created sign image
    $file_name_padre = 'adjunto/firma/'.$filenamepadre.'.png';
    file_put_contents($file_name_padre,$imagedatapadre);
    $resultpadre['status'] = 1;
    $resultpadre['file_name'] = $file_name_padre;
    
    print_r($resultpadre);*/

    /*********************** */


    //Datos Madre
    $txtCodigoMadre = $_REQUEST['txtCodigoMadre'];
    $txtNombreMadre = htmlspecialchars($_REQUEST['txtNombreMadre'], ENT_QUOTES | ENT_HTML5);
    $txtSegundoNombreMadre = htmlspecialchars($_REQUEST['txtSegundoNombreMadre'], ENT_QUOTES | ENT_HTML5);
    $txtPrimerApellidoMadre = htmlspecialchars($_REQUEST['txtPrimerApellidoMadre'], ENT_QUOTES | ENT_HTML5);
    $textSegundoApellidoMadre = htmlspecialchars($_REQUEST['textSegundoApellidoMadre'], ENT_QUOTES | ENT_HTML5);
    $txtIdentificacionMadre = htmlspecialchars(quitar_puntos_comas($_REQUEST['txtIdentificacionMadre']), ENT_QUOTES | ENT_HTML5);
    $txtFechaNacimientoMadre = $_REQUEST['txtFechaNacimientoMadre'];
    $radioNacionalidadMadre = $_REQUEST['radioNacionalidadMadre'];
    $SelDepNacimientoMadre = $_REQUEST['SelDepNacimientoMadre'];
    $selMunNacimientoMadre = $_REQUEST['selMunNacimientoMadre'];
    $txtCualMadre = htmlspecialchars($_REQUEST['txtCualMadre'], ENT_QUOTES | ENT_HTML5);
    $txtOcupacionMadre = htmlspecialchars($_REQUEST['txtOcupacionMadre'], ENT_QUOTES | ENT_HTML5);
    $txtEmpresaMadre = htmlspecialchars($_REQUEST['txtEmpresaMadre'], ENT_QUOTES | ENT_HTML5);
    $txtTelefonoResidenciaMadre = htmlspecialchars($_REQUEST['txtTelefonoResidenciaMadre'], ENT_QUOTES | ENT_HTML5);
    $txtCelularMadre = htmlspecialchars($_REQUEST['txtCelularMadre'], ENT_QUOTES | ENT_HTML5);
    $txtCargoMadre = htmlspecialchars($_REQUEST['txtCargoMadre'], ENT_QUOTES | ENT_HTML5);
    $txtCorreoMadre = filter_var($_REQUEST['txtCorreoMadre'],FILTER_SANITIZE_EMAIL);
    
    
    /*********Subir imagen *************/
    $archivo =  $_FILES['txtFotoMamita']['name'];
    
    if($archivo){
        $info = new SplFileInfo($archivo);
        $extension=$info->getExtension();
        
        $archivo = quitar_tildes($archivo);
        $archivo = strtolower($archivo);
        $archivo= str_replace(' ','_',$archivo);
        $source = $_FILES['txtFotoMamita']['tmp_name'];
        $target = "adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        $nombretext=date('YmdHis')."_".$archivo.".".$extension;
        $archivoNombre="adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        chmod('adjunto/persona/'.$archivo.".".$extension,0750);
         
        if(@move_uploaded_file($source, $target)) {
            //$result = 1;
            $txtFotoMamita=$archivoNombre;
        }
    }
    else{
        $txtFotoMamita="";
    }
    chmod("adjunto/persona", 0755);
    /************** Fin subir imagen **************/

    $firmaMadre=$_REQUEST['firmaMadre'];

    /*******Datos Firma Madre */
    /*$resultmadre = array();
    $imagedatamadre = base64_decode($firmaMadre);
    $filenamemadre = md5(date("dmYhisA"));
    //Location to where you want to created sign image
    $file_name_madre = 'adjunto/firma/'.$filenamemadre.'.png';
    file_put_contents($file_name_madre,$imagedatamadre);
    $resultmadre['status'] = 1;
    $resultmadre['file_name'] = $file_name_madre;
    
    print_r($resultmadre);*/

    /*********************** */

    //Datos Acudiente
    $txtNombreAcudiente = htmlspecialchars($_REQUEST['txtNombreAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtSegundoNombreAcudiente = htmlspecialchars($_REQUEST['txtSegundoNombreAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtPrimerApellidoAcudiente = htmlspecialchars($_REQUEST['txtPrimerApellidoAcudiente'],ENT_QUOTES | ENT_HTML5);
    $textSegundoApellidoAcudiente = htmlspecialchars($_REQUEST['textSegundoApellidoAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtIdentificacionAcudiente = htmlspecialchars(quitar_puntos_comas($_REQUEST['txtIdentificacionAcudiente']),ENT_QUOTES | ENT_HTML5);
    $txtFechaNacimientoAcudiente = $_REQUEST['txtFechaNacimientoAcudiente'];
    $radioNacionalidadAcudiente = $_REQUEST['radioNacionalidadAcudiente'];
    $SelDepNacimientoAcudiente = $_REQUEST['SelDepNacimientoAcudiente'];
    $selMunNacimientoAcudiente = $_REQUEST['selMunNacimientoAcudiente'];
    $txtCualAcudiente = htmlspecialchars($_REQUEST['txtCualAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtOcupacionAcudiente = htmlspecialchars($_REQUEST['txtOcupacionAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtEmpresaAcudiente = htmlspecialchars($_REQUEST['txtEmpresaAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtTelefonoResidenciaAcudiente = htmlspecialchars($_REQUEST['txtTelefonoResidenciaAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtCelularAcudiente = htmlspecialchars($_REQUEST['txtCelularAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtCargoAcudiente = htmlspecialchars($_REQUEST['txtCargoAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtCorreoAcudiente= filter_var($_REQUEST['txtCorreoAcudiente'],FILTER_SANITIZE_EMAIL);

    $personaSistema=$_REQUEST['personaSistema'];
    

    /*********Subir imagen *************/
    $archivo =  $_FILES['txtFotoAcudiente']['name'];
    
    if($archivo){
        $info = new SplFileInfo($archivo);
        $extension=$info->getExtension();

        $archivo = quitar_tildes($archivo);
        $archivo = quitar_signos($archivo);
        $archivo = strtolower($archivo);
        $archivo= str_replace(' ','_',$archivo);
        $source = $_FILES['txtFotoAcudiente']['tmp_name'];
        $target = "adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        $nombretext=date('YmdHis')."_".$archivo.".".$extension;
        $archivoNombre="adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        chmod('adjunto/persona/'.$archivo.".".$extension,0750);
         
        if(@move_uploaded_file($source, $target)) {
            //$result = 1;
            $txtFotoAcudiente=$archivoNombre;
        }
 
         
    }
    else{
        
        $txtFotoAcudiente="";
    }
    chmod("adjunto/persona", 0755);
    /************** Fin subir imagen **************/

    $firmaAcudiente=$_REQUEST['firmaAcudiente'];
    /*******Datos Firma Acudiente */
   /* $result = array();
    $imagedata = base64_decode($firmaAcudiente);
    $filename = md5(date("dmYhisA"));
    //Location to where you want to created sign image
    $file_name = 'adjunto/firma/'.$filename.'.png';
    file_put_contents($file_name,$imagedata);
    $result['status'] = 1;
    $result['file_name'] = $file_name;
    
    print_r($result);*/

    /*********************** */


    /******** DATOS ESTUDIANTE *******/

    $registromatricula= new RgstroMtrcula();

    $registromatricula->setFechaPreMariculaEstudiante($txtFechaPreMatricula);
    $registromatricula->setGradoIngresarEstudiante($selGradoIngresar);

    $registromatricula->setCodigoEstudiante($txtCodigoEstudiante);
    $registromatricula->setPersonaSistema($personaSistema);
    $registromatricula->setTipoIdentificacionEstudiante($selTipoIdentificacion);//
    $registromatricula->setLugarExpedicionEstudiante($txtLugarExpedicion);//
    $registromatricula->setNumeroIdentificacionEstudiante($txtIdentificacion);//
    $registromatricula->setPrimerNombreEstudiante($txtNombre);//
    $registromatricula->setSegundoNombreEstudiante($txtSegundoNombre);//
    $registromatricula->setPrimerApellidoEstudiante($txtPrimerApellido);//
    $registromatricula->setSegundoApellidoEstudiante($txtSegundoApellido);//
    $registromatricula->setMunicipioNaceEstudiante($selMunNacimiento);//
    $registromatricula->setFechaNacimientoEstudiante($txtFechaNacimiento);//
    $registromatricula->setTelefonoEstudiante($txtTelefono);//
    $registromatricula->setDireccionEstudiante($txtDireccion);//
    $registromatricula->setMunicipioResidenciaEstudiante($selMunResidencia);//
    $registromatricula->setCorreoEstudiante($txtCorreo);//
    $registromatricula->setFotoEstudiante($txtFoto);//
    $registromatricula->setNacionalidadEstudiante($radioNacionalidadNinio);//
    $registromatricula->setOtraNacionalidadEstudiante($txtCualNinio);
    $registromatricula->setCelularEstudiante($txtCelular);//
    $registromatricula->setEpsEstudiante($selEps);//
    $registromatricula->setRhEstudiante($selRh);//
    $registromatricula->setEstratoEstudiante($txtEstrato);//
    $registromatricula->setSisbenEstudiante($radioSisben);//
    $registromatricula->setFirmaEstudiante($file_name_ninio);

    //Datos padre

    $registromatricula->setCodigoPadre($txtCodigoPadre);
    $registromatricula->setPrimerNombrePadre($txtNombrePadre);
    $registromatricula->setSegundoNombrePadre($txtSegundoNombrePadre);
    $registromatricula->setPrimerApellidoPadre($txtPrimerApellidoPadre);
    $registromatricula->setSegundoApellidoPadre($textSegundoApellidoPadre);
    $registromatricula->setFechaNacimientoPadre($txtFechaNacimientoPadre);
    $registromatricula->setIdentificacionPadre($txtIdentificacionPadre);
    $registromatricula->setNacionalidadPadre($radioNacionalidadPadre);
    $registromatricula->setMunicipioPadre($selMunNacimientoPadre);
    $registromatricula->setCualNacionalidadPadre($txCualPadre);
    $registromatricula->setCorreoPadre($txtCorreoPadre);
    $registromatricula->setOcupacionPadre($txtOcupacionPadre);
    $registromatricula->setEmpresaPadre($txtEmpresaPadre);
    $registromatricula->setCargoPadre($txtCargoPadre);
    $registromatricula->setTelefonoResidenciaPadre($txtTelefonoPadre);
    $registromatricula->setCelularPadre($txtCelularPadre);
    $registromatricula->setFotoPadre($txtFotoPapito);
    $registromatricula->setFirmaPadre($file_name_padre);

    //Datos Madre
    $registromatricula->setCodigoMadre($txtCodigoMadre);
    $registromatricula->setPrimerNombreMadre($txtNombreMadre);
    $registromatricula->setSegundoNombreMadre($txtSegundoNombreMadre);
    $registromatricula->setPrimerApellidoMadre($txtPrimerApellidoMadre);
    $registromatricula->setSegundoApellidoMadre($textSegundoApellidoMadre);
    $registromatricula->setFechaNacimientoMadre($txtFechaNacimientoMadre);
    $registromatricula->setIdentificacionMadre($txtIdentificacionMadre);
    $registromatricula->setNacionalidadMadre($radioNacionalidadMadre);
    $registromatricula->setMunicipioMadre($selMunNacimientoMadre);
    $registromatricula->setCualNacionalidadMadre($txtCualMadre);
    $registromatricula->setCorreoMadre($txtCorreoMadre);
    $registromatricula->setOcupacionMadre($txtOcupacionMadre);
    $registromatricula->setEmpresaMadre($txtEmpresaMadre);
    $registromatricula->setCargoMadre($txtCargoMadre);
    $registromatricula->setTelefonoResidenciaMadre($txtTelefonoResidenciaMadre);
    $registromatricula->setCelularMadre($txtCelularMadre);
    $registromatricula->setFotoMadre($txtFotoMamita);
    $registromatricula->setFirmaMadre($file_name_madre);

    //Datos Acudiente
    $registromatricula->setPrimerNombreAcudiente($txtNombreAcudiente);
    $registromatricula->setSegundoNombreAcudiente($txtSegundoNombreAcudiente);
    $registromatricula->setPrimerApellidoAcudiente($txtPrimerApellidoAcudiente);
    $registromatricula->setSegundoApellidoAcudiente($textSegundoApellidoAcudiente);
    $registromatricula->setFechaNacimientoAcudiente($txtFechaNacimientoAcudiente);
    $registromatricula->setIdentificacionAcudiente($txtIdentificacionAcudiente);
    $registromatricula->setNacionalidadAcudiente($radioNacionalidadAcudiente);
    $registromatricula->setMunicipioAcudiente($selMunNacimientoAcudiente);
    $registromatricula->setCualNacionalidadAcudiente($txtCualAcudiente);
    $registromatricula->setCorreoAcudiente($txtCorreoAcudiente);
    $registromatricula->setOcupacionAcudiente($txtOcupacionAcudiente);
    $registromatricula->setEmpresaAcudiente($txtEmpresaAcudiente);
    $registromatricula->setCargoAcudiente($txtCargoAcudiente);
    $registromatricula->setTelefonoResidenciaAcudiente($txtTelefonoResidenciaAcudiente);
    $registromatricula->setCelularAcudiente($txtCelularAcudiente);
    $registromatricula->setFotoAcudiente($txtFotoAcudiente);
    $registromatricula->setFirmaAcudiente($file_name);

    $registromatricula->insert_matricula();


?>