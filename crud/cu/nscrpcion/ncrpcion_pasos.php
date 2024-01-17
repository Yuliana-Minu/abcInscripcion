<?php 
    include('prcsos/nscrpcion/inscrpcionPrcsos.php');

    

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
   
    //Datos Estudiante
    $per_codigo=$_REQUEST['per_codigo'];
    $txtIdentificacion=str_replace('.','',$_REQUEST['txtIdentificacion']);
    $txtNombre=htmlspecialchars($_REQUEST['txtNombre'], ENT_QUOTES | ENT_HTML5);
    $txtSegundoNombre=htmlspecialchars($_REQUEST['txtSegundoNombre'], ENT_QUOTES | ENT_HTML5);
    $txtPrimerApellido=htmlspecialchars($_REQUEST['txtPrimerApellido'], ENT_QUOTES | ENT_HTML5);
    $txtSegundoApellido=htmlspecialchars($_REQUEST['txtSegundoApellido'], ENT_QUOTES | ENT_HTML5);
    $selMunNacimiento=$_REQUEST['selMunNacimiento'];
    $txtFechaNacimiento=$_REQUEST['txtFechaNacimiento'];
    $txtSegundoApellido=htmlspecialchars($_REQUEST['txtSegundoApellido'], ENT_QUOTES | ENT_HTML5);
    $txtViveCon=htmlspecialchars($_REQUEST['txtViveCon'], ENT_QUOTES | ENT_HTML5);
    $txtTelefono=htmlspecialchars($_REQUEST['txtTelefono'], ENT_QUOTES | ENT_HTML5);
    $txtDireccion=htmlspecialchars($_REQUEST['txtDireccion'], ENT_QUOTES | ENT_HTML5);
    $selMunResidencia=$_REQUEST['selMunResidencia'];
    $txtCorreo=htmlspecialchars($_REQUEST['txtCorreo'], ENT_QUOTES | ENT_HTML5);
    $radioFamiliar=$_REQUEST['radioFamiliar'];
    $selParentesco=$_REQUEST['selParentesco'];
    $selGradoIngresar=$_REQUEST['selGradoIngresar'];
    $TxtGradoCursaba=htmlspecialchars($_REQUEST['TxtGradoCursaba'], ENT_QUOTES | ENT_HTML5);
    $txtLugar=htmlspecialchars($_REQUEST['txtLugar'], ENT_QUOTES | ENT_HTML5);
    $txtMotivoRetiro=htmlspecialchars($_REQUEST['txtMotivoRetiro'], ENT_QUOTES | ENT_HTML5);

    $radioNacionalidadNinio = $_REQUEST['radioNacionalidadNinio'];
    $txCualNinio=$_REQUEST['txCualNinio'];

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
    
   // echo "Foto ---> ".$txtFoto;
    chmod("adjunto/persona", 0755);
     /************** Fin subir imagen **************/

    //Datos Tabla Estudios Anteriores
    $radioTablaEstudios=$_REQUEST['radioTablaEstudios'];

    $nombre_grado=$_REQUEST['nombre_grado'];
    $nombre_colegio=$_REQUEST['nombre_colegio'];
    $nombre_direccion=$_REQUEST['nombre_direccion'];
    $numero_telefono=$_REQUEST['numero_telefono'];
    $nombre_ciudad=$_REQUEST['nombre_ciudad'];
    $numero_year=$_REQUEST['numero_year'];

    $array_estudios_anteriores= array();

    for($i=0;$i<10;$i++){
    
        if($nombre_grado[$i]){
            $array_estudios_anteriores[] = array('nombre_grado'=>htmlspecialchars($nombre_grado[$i], ENT_QUOTES | ENT_HTML5),
                                                 'nombre_colegio'=>htmlspecialchars($nombre_colegio[$i], ENT_QUOTES | ENT_HTML5),
                                                 'nombre_direccion'=>htmlspecialchars($nombre_direccion[$i], ENT_QUOTES | ENT_HTML5),
                                                 'numero_telefono'=>htmlspecialchars($numero_telefono[$i], ENT_QUOTES | ENT_HTML5),
                                                 'nombre_ciudad'=>htmlspecialchars($nombre_ciudad[$i], ENT_QUOTES | ENT_HTML5),
                                                 'numero_year'=>htmlspecialchars($numero_year[$i], ENT_QUOTES | ENT_HTML5)
                                            );
        }

        
    }

    $radioRepetidoCurso=$_REQUEST['radioRepetidoCurso'];
    $txtCualPerdio=htmlspecialchars($_REQUEST['txtCualPerdio'], ENT_QUOTES | ENT_HTML5);

    //informacion del padre
    $txtNombrePadre=htmlspecialchars($_REQUEST['txtNombrePadre'], ENT_QUOTES | ENT_HTML5);
    $txtSegundoNombrePadre=htmlspecialchars($_REQUEST['txtSegundoNombrePadre'], ENT_QUOTES | ENT_HTML5);
    $txtPrimerApellidoPadre=htmlspecialchars($_REQUEST['txtPrimerApellidoPadre'], ENT_QUOTES | ENT_HTML5);
    $textSegundoApellidoPadre=htmlspecialchars($_REQUEST['textSegundoApellidoPadre'], ENT_QUOTES | ENT_HTML5);
    $txtFechaNacimientoPadre=$_REQUEST['txtFechaNacimientoPadre'];
    $radioVivePadre=$_REQUEST['radioVivePadre'];
    $txtNivelEducativoPadre=htmlspecialchars($_REQUEST['txtNivelEducativoPadre'], ENT_QUOTES | ENT_HTML5);
    $txtCorreoPadre=htmlspecialchars($_REQUEST['txtCorreoPadre'], ENT_QUOTES | ENT_HTML5);
    $txtOcupacionPadre=htmlspecialchars($_REQUEST['txtOcupacionPadre'], ENT_QUOTES | ENT_HTML5);
    $txtEmpresaPadre=htmlspecialchars($_REQUEST['txtEmpresaPadre'], ENT_QUOTES | ENT_HTML5);
    $txtCargoPadre=htmlspecialchars($_REQUEST['txtCargoPadre'], ENT_QUOTES | ENT_HTML5);
    $txtDireccionOficinaPadre=htmlspecialchars($_REQUEST['txtDireccionOficinaPadre'], ENT_QUOTES | ENT_HTML5);
    $txtTelefonoOficinaPadre=htmlspecialchars($_REQUEST['txtTelefonoOficinaPadre'], ENT_QUOTES | ENT_HTML5);
    $txtDireccionResidencia=htmlspecialchars($_REQUEST['txtDireccionResidencia'], ENT_QUOTES | ENT_HTML5);
    $txtTelefonoResidencia=$_REQUEST['txtTelefonoResidencia'];
    $txtCelularPadre=$_REQUEST['txtCelularPadre'];
    $fotoPapito=$_REQUEST['txtFotoPapito'];

    $txtIdentificacionPadre=str_replace('.','',$_REQUEST['txtIdentificacionPadre']);

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

    //informacion de la Madre
    $txtNombreMadre=htmlspecialchars($_REQUEST['txtNombreMadre'], ENT_QUOTES | ENT_HTML5);
    $txtSegundoNombreMadre=htmlspecialchars($_REQUEST['txtSegundoNombreMadre'], ENT_QUOTES | ENT_HTML5);
    $txtPrimerApellidoMadre=htmlspecialchars($_REQUEST['txtPrimerApellidoMadre'], ENT_QUOTES | ENT_HTML5);
    $textSegundoApellidoMadre=htmlspecialchars($_REQUEST['textSegundoApellidoMadre'], ENT_QUOTES | ENT_HTML5);
    $txtFechaNacimientoMadre=htmlspecialchars($_REQUEST['txtFechaNacimientoMadre'], ENT_QUOTES | ENT_HTML5);
    $radioViveMadre=$_REQUEST['radioViveMadre'];
    $txtNivelEducativoMadre=htmlspecialchars($_REQUEST['txtNivelEducativoMadre'], ENT_QUOTES | ENT_HTML5);
    $txtCorreoMadre=htmlspecialchars($_REQUEST['txtCorreoMadre'], ENT_QUOTES | ENT_HTML5);
    $txtOcupacionMadre=htmlspecialchars($_REQUEST['txtOcupacionMadre'], ENT_QUOTES | ENT_HTML5);
    $txtEmpresaMadre=htmlspecialchars($_REQUEST['txtEmpresaMadre'], ENT_QUOTES | ENT_HTML5);
    $txtCargoMadre=htmlspecialchars($_REQUEST['txtCargoMadre'], ENT_QUOTES | ENT_HTML5);
    $txtDireccionOficinaMadre=htmlspecialchars($_REQUEST['txtDireccionOficinaMadre'], ENT_QUOTES | ENT_HTML5);
    $txtTelefonoOficinaMadre=$_REQUEST['txtTelefonoOficinaMadre'];
    $txtDireccionResidenciaMadre=htmlspecialchars($_REQUEST['txtDireccionResidenciaMadre'], ENT_QUOTES | ENT_HTML5);
    $txtTelefonoResidenciaMadre=$_REQUEST['txtTelefonoResidenciaMadre'];
    $txtCelularMadre=$_REQUEST['txtCelularMadre'];
    $fotoMamita=$_REQUEST['txtFotoMamita'];

    $txtIdentificacionMadre=str_replace('.','',$_REQUEST['txtIdentificacionMadre']);

    /*********Subir imagen *************/
    $archivo =  $_FILES['txtFotoMamita']['name'];
    
    if($archivo){
        $info = new SplFileInfo($archivo);
        $extension=$info->getExtension();

        $archivo = quitar_tildes($archivo);
        $archivo = quitar_signos($archivo);
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
    /************** Fin subir imagen **************/

    //echo "fotos ---> ".$txtFoto." - ".$txtFotoPapito." ".$txtFotoMamita;

    ///Matrimonio
    $txtFechaMatrimonio=$_REQUEST['txtFechaMatrimonio'];
    $radioMatrimonio=$_REQUEST['radioMatrimonio'];
    $txtCualMatrimonio=htmlspecialchars($_REQUEST['txtCualMatrimonio'], ENT_QUOTES | ENT_HTML5);
    $radioVivenJuntos=htmlspecialchars($_REQUEST['radioVivenJuntos'], ENT_QUOTES | ENT_HTML5);

    if($radioVivenJuntos){
        $radioVivenJuntos = $radioVivenJuntos;
    }
    else{
        $radioVivenJuntos = 0;
    }


    //Quien le recomendo el colegio 
    $txtNombreCompletoRecomendo=htmlspecialchars($_REQUEST['txtNombreCompletoRecomendo'], ENT_QUOTES | ENT_HTML5);
    $txtTelefonoRecomendo=htmlspecialchars($_REQUEST['txtTelefonoRecomendo'], ENT_QUOTES | ENT_HTML5);
    $txtCelularRecomendo=htmlspecialchars($_REQUEST['txtCelularRecomendo'], ENT_QUOTES | ENT_HTML5);
    $txtMotivoEleccion=htmlspecialchars($_REQUEST['txtMotivoEleccion'], ENT_QUOTES | ENT_HTML5);

    $personaSistema = $_SESSION['idusuario'];

    //Seguimienti Ninio
    $acompaniamiento=htmlspecialchars($_REQUEST['acompaniamiento'], ENT_QUOTES | ENT_HTML5);
    $txtCualSeguimiento=htmlspecialchars($_REQUEST['txtCualSeguimiento'], ENT_QUOTES | ENT_HTML5);
    

    $registroinscripcionpasos = new RgstroInscrpcionPrcsos();

    $registroinscripcionpasos->setPersonaSistema($personaSistema);

    //Datos Estudiante
    $registroinscripcionpasos->setCodigoEstudiante($per_codigo);//
    $registroinscripcionpasos->setNumeroIdentificacionEstudiante($txtIdentificacion);//
    $registroinscripcionpasos->setPrimerNombreEstudiante($txtNombre);//
    $registroinscripcionpasos->setSegundoNombreEstudiante($txtSegundoNombre);//
    $registroinscripcionpasos->setPrimerApellidoEstudiante($txtPrimerApellido);//
    $registroinscripcionpasos->setSegundoApellidoEstudiante($txtSegundoApellido);//
    $registroinscripcionpasos->setMunicipioNaceEstudiante($selMunNacimiento);//
    $registroinscripcionpasos->setFechaNacimientoEstudiante($txtFechaNacimiento);//
    $registroinscripcionpasos->setActualmenteViveConEstudiante($txtViveCon);//
    $registroinscripcionpasos->setTelefonoEstudiante($txtTelefono);//
    $registroinscripcionpasos->setDireccionEstudiante($txtDireccion);//
    $registroinscripcionpasos->setMunicipioResidenciaEstudiante($selMunResidencia);//
    $registroinscripcionpasos->setCorreoEstudiante($txtCorreo);//
    $registroinscripcionpasos->setTieneFamilarEstudiante($radioFamiliar);//
    $registroinscripcionpasos->setParentescoEstudiante($selParentesco);//
    $registroinscripcionpasos->setGradoIngresarEstudiante($selGradoIngresar);//
    $registroinscripcionpasos->setGradoActualEstudiante($TxtGradoCursaba);
    $registroinscripcionpasos->setEnEstudiante($txtLugar);//
    $registroinscripcionpasos->setMotivoRetiroEstudiante($txtMotivoRetiro);//
    $registroinscripcionpasos->setFotoEstudiante($txtFoto);//
    $registroinscripcionpasos->setNacionalidadEstudiante($radioNacionalidadNinio);
    $registroinscripcionpasos->setOtraNacionalidadEstudiante($txCualNinio);

    //Datos Estudio anterior
    $registroinscripcionpasos->setEstudiosAnterioresEstudiante($radioTablaEstudios);

    $registroinscripcionpasos->setEducacionAnterior($array_estudios_anteriores);//
    
    //Datos Anio Perdido
    $registroinscripcionpasos->setHaPerdidoCurso($radioRepetidoCurso);
    $registroinscripcionpasos->setCualPerdio($txtCualPerdio);

    //Informacion del Padre
    $registroinscripcionpasos->setPrimerNombrePadre($txtNombrePadre);//
    $registroinscripcionpasos->setSegundoNombrePadre($txtSegundoNombrePadre);//
    $registroinscripcionpasos->setPrimerApellidoPadre($txtPrimerApellidoPadre);//
    $registroinscripcionpasos->setSegundoApellidoPadre($textSegundoApellidoPadre);//
    $registroinscripcionpasos->setFechaNacimientoPadre($txtFechaNacimientoPadre);
    $registroinscripcionpasos->setVivePadre($radioVivePadre);//
    $registroinscripcionpasos->setNivelEducativoPadre($txtNivelEducativoPadre);//
    $registroinscripcionpasos->setCorreoPadre($txtCorreoPadre);//
    $registroinscripcionpasos->setOcupacionPadre($txtOcupacionPadre);//
    $registroinscripcionpasos->setEmpresaPadre($txtEmpresaPadre);//
    $registroinscripcionpasos->setCargoPadre($txtCargoPadre);//
    $registroinscripcionpasos->setDireccionOficinaPadre($txtDireccionOficinaPadre);//
    $registroinscripcionpasos->setTelefonoOficinaPadre($txtTelefonoOficinaPadre);//
    $registroinscripcionpasos->setDirecionResidenciaPadre($txtDireccionResidencia);//
    $registroinscripcionpasos->setTelefonoResidenciaPadre($txtTelefonoResidencia);//
    $registroinscripcionpasos->setCelularPadre($txtCelularPadre);//
    $registroinscripcionpasos->setFotoPadre($txtFotoPapito);//
    $registroinscripcionpasos->setIdentificacionPadre($txtIdentificacionPadre);

    //Informacion de la Madre
    $registroinscripcionpasos->setPrimerNombreMadre($txtNombreMadre);//
    $registroinscripcionpasos->setSegundoNombreMadre($txtSegundoNombreMadre);
    $registroinscripcionpasos->setPrimerApellidoMadre($txtPrimerApellidoMadre);
    $registroinscripcionpasos->setSegundoApellidoMadre($textSegundoApellidoMadre);
    $registroinscripcionpasos->setFechaNacimientoMadre($txtFechaNacimientoMadre);
    $registroinscripcionpasos->setViveMadre($radioViveMadre);//
    $registroinscripcionpasos->setNivelEducativoMadre($txtNivelEducativoMadre);
    $registroinscripcionpasos->setCorreoMadre($txtCorreoMadre);//
    $registroinscripcionpasos->setOcupacionMadre($txtOcupacionMadre);//
    $registroinscripcionpasos->setEmpresaMadre($txtEmpresaMadre);//
    $registroinscripcionpasos->setCargoMadre($txtCargoMadre);//
    $registroinscripcionpasos->setDireccionOficinaMadre($txtDireccionOficinaMadre);
    $registroinscripcionpasos->setTelefonoOficinaMadre($txtTelefonoOficinaMadre);
    $registroinscripcionpasos->setDirecionResidenciaMadre($txtDireccionResidenciaMadre);
    $registroinscripcionpasos->setTelefonoResidenciaMadre($txtTelefonoResidenciaMadre);
    $registroinscripcionpasos->setCelularMadre($txtCelularMadre);
    $registroinscripcionpasos->setFotoMadre($txtFotoMamita);
    $registroinscripcionpasos->setIdentificacionMadre($txtIdentificacionMadre);

    //Matrimonio 
    $registroinscripcionpasos->setFechaMatrimonio($txtFechaMatrimonio);
    $registroinscripcionpasos->setTipoMatrimonio($radioMatrimonio);
    $registroinscripcionpasos->setCualMatrimonio($txtCualMatrimonio);
    $registroinscripcionpasos->setVivenJuntosMatrimonio($radioVivenJuntos);

    //Quien le recomendo el colegio
    $registroinscripcionpasos->setNombreRecomendacion($txtNombreCompletoRecomendo);
    $registroinscripcionpasos->setTelefonoRecomendacion($txtTelefonoRecomendo);
    $registroinscripcionpasos->setCelularRecomendacion($txtCelularRecomendo);
    $registroinscripcionpasos->setMotivoRecomendacion($txtMotivoEleccion);

    //Acompañiamiento 
    $registroinscripcionpasos->setSegumientoNinio($acompaniamiento);
    $registroinscripcionpasos->setCualSeguimientoNinio($txtCualSeguimiento);


    echo $registroinscripcionpasos->insertar_inscripcion_paso_paso();
?>