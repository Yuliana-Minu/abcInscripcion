<?php 
    include('prcsos/nscrpcion/mtrculaPrcsos.php');

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

    //Datos Estudiante
    $txtCodigoEstudiante = $_REQUEST['txtCodigoEstudiante'];//
    $txtFechaPreMatricula = $_REQUEST['txtFechaPreMatricula'];
    $selGradoIngresar = $_REQUEST['selGradoIngresar'];//
    $selTipoIdentificacion = $_REQUEST['selTipoIdentificacion'];//
    $txtIdentificacion = htmlspecialchars(quitar_puntos_comas($_REQUEST['txtIdentificacionPadre']),ENT_QUOTES | ENT_HTML5);//
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
        $archivo = quitar_tildes($archivo);
        $archivo = strtolower($archivo);
        $archivo= str_replace(' ','_',$archivo);
        $source = $_FILES['txtFoto']['tmp_name'];
        $target = "adjunto/persona/".date('YmdHis')."_".$archivo;
        $nombretext=date('YmdHis')."_".$archivo;
        $archivoNombre="adjunto/persona/".date('YmdHis')."_".$archivo;
        chmod('adjunto/persona/'.$archivo,0750);
        
        //move_uploaded_file($source, $target);

        if(@move_uploaded_file($source, $target)) {
            //$result = 1;
            $txtFoto=$archivoNombre;
        }

        
    }
    else{
        $txtFoto="";
    }
    
    echo "Foto ---> ".$txtFoto;
    chmod("adjunto/persona", 0755);
    /************** Fin subir imagen **************/


    //Datos Padre
    $txtCodigoPadre = $_REQUEST['txtCodigoPadre'];
    $txtNombrePadre = htmlspecialchars($_REQUEST['txtNombrePadre'], ENT_QUOTES | ENT_HTML5);//
    $txtSegundoNombrePadre  = htmlspecialchars($_REQUEST['txtSegundoNombrePadre'], ENT_QUOTES | ENT_HTML5);//
    $txtPrimerApellidoPadre = htmlspecialchars($_REQUEST['txtPrimerApellidoPadre'], ENT_QUOTES | ENT_HTML5);//
    $textSegundoApellidoPadre = htmlspecialchars($_REQUEST['textSegundoApellidoPadre'], ENT_QUOTES | ENT_HTML5);//
    $txtIdentificacionPadre = htmlspecialchars(quitar_puntos_comas($_REQUEST['txtIdentificacionPadre']),ENT_QUOTES | ENT_HTML5);//
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
        $archivo = quitar_tildes($archivo);
        $archivo = strtolower($archivo);
        $archivo= str_replace(' ','_',$archivo);
        $source = $_FILES['txtFotoPapito']['tmp_name'];
        $target = "adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        $nombretext=date('YmdHis')."_".$archivo;
        $archivoNombre="adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        chmod('adjunto/persona/'.$archivo,0750);
         
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
    $txtIdentificacionMadre = quitar_puntos_comas($_REQUEST['txtIdentificacionMadre']);
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
        $archivo = quitar_tildes($archivo);
        $archivo = strtolower($archivo);
        $archivo= str_replace(' ','_',$archivo);
        $source = $_FILES['txtFotoMamita']['tmp_name'];
        $target = "adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        $nombretext=date('YmdHis')."_".$archivo;
        $archivoNombre="adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        chmod('adjunto/persona/'.$archivo,0750);
         
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
    $txtIdentificacionAcudiente = quitar_puntos_comas($_REQUEST['txtIdentificacionAcudiente']);
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
    $txtCorreoAcudiente= filter_var($_REQUEST['txtCorreoAcudiente'], FILTER_SANITIZE_EMAIL);


    $personaSistema=$_REQUEST['personaSistema'];
    

    /*********Subir imagen *************/
    $archivo =  $_FILES['txtFotoAcudiente']['name'];
    
    if($archivo){
        $archivo = quitar_tildes($archivo);
        $archivo = strtolower($archivo);
        $archivo= str_replace(' ','_',$archivo);
        $source = $_FILES['txtFotoAcudiente']['tmp_name'];
        $target = "adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        $nombretext=date('YmdHis')."_".$archivo;
        $archivoNombre="adjunto/persona/".date('YmdHis')."_".$archivo.".".$extension;
        chmod('adjunto/persona/'.$archivo,0750);
         
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

    $registromatriculaprocesos= new RgstroMtrculaPrcsos();

    $registromatriculaprocesos->setFechaPreMariculaEstudiante($txtFechaPreMatricula);
    $registromatriculaprocesos->setGradoIngresarEstudiante($selGradoIngresar);

    $registromatriculaprocesos->setCodigoEstudiante($txtCodigoEstudiante);
    $registromatriculaprocesos->setPersonaSistema($personaSistema);
    $registromatriculaprocesos->setTipoIdentificacionEstudiante($selTipoIdentificacion);//
    $registromatriculaprocesos->setLugarExpedicionEstudiante($txtLugarExpedicion);//
    $registromatriculaprocesos->setNumeroIdentificacionEstudiante($txtIdentificacion);//
    $registromatriculaprocesos->setPrimerNombreEstudiante($txtNombre);//
    $registromatriculaprocesos->setSegundoNombreEstudiante($txtSegundoNombre);//
    $registromatriculaprocesos->setPrimerApellidoEstudiante($txtPrimerApellido);//
    $registromatriculaprocesos->setSegundoApellidoEstudiante($txtSegundoApellido);//
    $registromatriculaprocesos->setMunicipioNaceEstudiante($selMunNacimiento);//
    $registromatriculaprocesos->setFechaNacimientoEstudiante($txtFechaNacimiento);//
    $registromatriculaprocesos->setTelefonoEstudiante($txtTelefono);//
    $registromatriculaprocesos->setDireccionEstudiante($txtDireccion);//
    $registromatriculaprocesos->setMunicipioResidenciaEstudiante($selMunResidencia);//
    $registromatriculaprocesos->setCorreoEstudiante($txtCorreo);//
    $registromatriculaprocesos->setFotoEstudiante($txtFoto);//
    $registromatriculaprocesos->setNacionalidadEstudiante($radioNacionalidadNinio);//
    $registromatriculaprocesos->setOtraNacionalidadEstudiante($txtCualNinio);
    $registromatriculaprocesos->setCelularEstudiante($txtCelular);//
    $registromatriculaprocesos->setEpsEstudiante($selEps);//
    $registromatriculaprocesos->setRhEstudiante($selRh);//
    $registromatriculaprocesos->setEstratoEstudiante($txtEstrato);//
    $registromatriculaprocesos->setSisbenEstudiante($radioSisben);//
    $registromatriculaprocesos->setFirmaEstudiante($file_name_ninio);

    //Datos padre

    $registromatriculaprocesos->setCodigoPadre($txtCodigoPadre);
    $registromatriculaprocesos->setPrimerNombrePadre($txtNombrePadre);
    $registromatriculaprocesos->setSegundoNombrePadre($txtSegundoNombrePadre);
    $registromatriculaprocesos->setPrimerApellidoPadre($txtPrimerApellidoPadre);
    $registromatriculaprocesos->setSegundoApellidoPadre($textSegundoApellidoPadre);
    $registromatriculaprocesos->setFechaNacimientoPadre($txtFechaNacimientoPadre);
    $registromatriculaprocesos->setIdentificacionPadre($txtIdentificacionPadre);
    $registromatriculaprocesos->setNacionalidadPadre($radioNacionalidadPadre);
    $registromatriculaprocesos->setMunicipioPadre($selMunNacimientoPadre);
    $registromatriculaprocesos->setCualNacionalidadPadre($txCualPadre);
    $registromatriculaprocesos->setCorreoPadre($txtCorreoPadre);
    $registromatriculaprocesos->setOcupacionPadre($txtOcupacionPadre);
    $registromatriculaprocesos->setEmpresaPadre($txtEmpresaPadre);
    $registromatriculaprocesos->setCargoPadre($txtCargoPadre);
    $registromatriculaprocesos->setTelefonoResidenciaPadre($txtTelefonoPadre);
    $registromatriculaprocesos->setCelularPadre($txtCelularPadre);
    $registromatriculaprocesos->setFotoPadre($txtFotoPapito);
    $registromatriculaprocesos->setFirmaPadre($file_name_padre);

    //Datos Madre
    $registromatriculaprocesos->setCodigoMadre($txtCodigoMadre);
    $registromatriculaprocesos->setPrimerNombreMadre($txtNombreMadre);
    $registromatriculaprocesos->setSegundoNombreMadre($txtSegundoNombreMadre);
    $registromatriculaprocesos->setPrimerApellidoMadre($txtPrimerApellidoMadre);
    $registromatriculaprocesos->setSegundoApellidoMadre($textSegundoApellidoMadre);
    $registromatriculaprocesos->setFechaNacimientoMadre($txtFechaNacimientoMadre);
    $registromatriculaprocesos->setIdentificacionMadre($txtIdentificacionMadre);
    $registromatriculaprocesos->setNacionalidadMadre($radioNacionalidadMadre);
    $registromatriculaprocesos->setMunicipioMadre($selMunNacimientoMadre);
    $registromatriculaprocesos->setCualNacionalidadMadre($txtCualMadre);
    $registromatriculaprocesos->setCorreoMadre($txtCorreoMadre);
    $registromatriculaprocesos->setOcupacionMadre($txtOcupacionMadre);
    $registromatriculaprocesos->setEmpresaMadre($txtEmpresaMadre);
    $registromatriculaprocesos->setCargoMadre($txtCargoMadre);
    $registromatriculaprocesos->setTelefonoResidenciaMadre($txtTelefonoResidenciaMadre);
    $registromatriculaprocesos->setCelularMadre($txtCelularMadre);
    $registromatriculaprocesos->setFotoMadre($txtFotoMamita);
    $registromatriculaprocesos->setFirmaMadre($file_name_madre);

    //Datos Acudiente
    $registromatriculaprocesos->setPrimerNombreAcudiente($txtNombreAcudiente);
    $registromatriculaprocesos->setSegundoNombreAcudiente($txtSegundoNombreAcudiente);
    $registromatriculaprocesos->setPrimerApellidoAcudiente($txtPrimerApellidoAcudiente);
    $registromatriculaprocesos->setSegundoApellidoAcudiente($textSegundoApellidoAcudiente);
    $registromatriculaprocesos->setFechaNacimientoAcudiente($txtFechaNacimientoAcudiente);
    $registromatriculaprocesos->setIdentificacionAcudiente($txtIdentificacionAcudiente);
    $registromatriculaprocesos->setNacionalidadAcudiente($radioNacionalidadAcudiente);
    $registromatriculaprocesos->setMunicipioAcudiente($selMunNacimientoAcudiente);
    $registromatriculaprocesos->setCualNacionalidadAcudiente($txtCualAcudiente);
    $registromatriculaprocesos->setCorreoAcudiente($txtCorreoAcudiente);
    $registromatriculaprocesos->setOcupacionAcudiente($txtOcupacionAcudiente);
    $registromatriculaprocesos->setEmpresaAcudiente($txtEmpresaAcudiente);
    $registromatriculaprocesos->setCargoAcudiente($txtCargoAcudiente);
    $registromatriculaprocesos->setTelefonoResidenciaAcudiente($txtTelefonoResidenciaAcudiente);
    $registromatriculaprocesos->setCelularAcudiente($txtCelularAcudiente);
    $registromatriculaprocesos->setFotoAcudiente($txtFotoAcudiente);
    $registromatriculaprocesos->setFirmaAcudiente($file_name);

    $registromatriculaprocesos->insert_matricula_pasos();


?>