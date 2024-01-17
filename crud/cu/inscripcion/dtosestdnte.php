<?php 
    include('prcsos/inscripcion/dtosEstdnte.php');

    $per_codigo = $_REQUEST['per_codigo'];
    $txtIdentificacion = str_replace('.','',$_REQUEST['txtIdentificacion']);
    $txtNombre = htmlspecialchars($_REQUEST['txtNombre'], ENT_QUOTES | ENT_HTML5);
    $txtSegundoNombre = htmlspecialchars($_REQUEST['txtSegundoNombre'], ENT_QUOTES | ENT_HTML5);
    $txtPrimerApellido = htmlspecialchars($_REQUEST['txtPrimerApellido'], ENT_QUOTES | ENT_HTML5);
    $txtSegundoApellido = htmlspecialchars($_REQUEST['txtSegundoApellido'], ENT_QUOTES | ENT_HTML5);
    $selMunNacimiento = $_REQUEST['selMunNacimiento'];
    $txtFechaNacimiento = $_REQUEST['txtFechaNacimiento'];
    $txtViveCon = htmlspecialchars($_REQUEST['txtViveCon'], ENT_QUOTES | ENT_HTML5);
    $txtTelefono = htmlspecialchars($_REQUEST['txtTelefono'], ENT_QUOTES | ENT_HTML5);
    $txtDireccion = htmlspecialchars($_REQUEST['txtDireccion'], ENT_QUOTES | ENT_HTML5);
    $selMunResidencia = $_REQUEST['selMunResidencia'];
    $txtCorreo = htmlspecialchars($_REQUEST['txtCorreo'], ENT_QUOTES | ENT_HTML5);
    $radioFamiliar = $_REQUEST['radioFamiliar'];
    $selParentesco = $_REQUEST['selParentesco'];
    $selGradoIngresar = $_REQUEST['selGradoIngresar'];
    $TxtGradoCursaba = htmlspecialchars($_REQUEST['TxtGradoCursaba'], ENT_QUOTES | ENT_HTML5);
    $txtLugar = htmlspecialchars($_REQUEST['txtLugar'], ENT_QUOTES | ENT_HTML5);
    $txtMotivoRetiro = htmlspecialchars($_REQUEST['txtMotivoRetiro'], ENT_QUOTES | ENT_HTML5);
    $radioNacionalidadNinio  =  $_REQUEST['radioNacionalidadNinio'];
    $txCualNinio = htmlspecialchars($_REQUEST['txCualNinio'], ENT_QUOTES | ENT_HTML5);
    $radioTablaEstudios=$_REQUEST['radioTablaEstudios'];

    $array_datos_estudios_anteriores = array();

    if($radioTablaEstudios == 1){
        $nombre_grado = $_REQUEST['nombre_grado'];
        $nombre_colegio = $_REQUEST['nombre_colegio'];
        $nombre_direccion = $_REQUEST['nombre_direccion'];
        $numero_telefono = $_REQUEST['numero_telefono'];
        $nombre_ciudad = $_REQUEST['nombre_ciudad'];
        $numero_year = $_REQUEST['numero_year'];

        $radioRepetidoCurso = $_REQUEST['radioRepetidoCurso'];
        $txtCualPerdio = $_REQUEST['txtCualPerdio'];

        $radioRepetidoCurso = $_REQUEST['radioRepetidoCurso'];
        if($radioRepetidoCurso == 1){
            $perdio = 1;
            $cualPerdio = $_REQUEST['txtCualPerdio'];
        }
        else{
            $perdio = 0;
            $cualPerdio = "";
        }

        $acompaniamiento = $_REQUEST['acompaniamiento'];

        $array_acompaniamiento = array();
        if($acompaniamiento){
            for ($list_acomp=0; $list_acomp < count($acompaniamiento); $list_acomp++) { 
                $codigo_acpmpaniamien = $acompaniamiento[$list_acomp];

                if($codigo_acpmpaniamien == 4){
                    $descripcion = $_REQUEST['txtCualSeguimiento'];
                }
                else{
                    $descripcion = "";
                }

                $array_acompaniamiento[] = array('codigo_acpmpaniamien'=> $codigo_acpmpaniamien,
                                                 'descripcion'=> $descripcion
                                            );
            }
        }

        $array_estudios = array();

        $cantidad_datos = count($nombre_grado);
        for ($lst_estda=0; $lst_estda < $cantidad_datos; $lst_estda++) { 
           $array_estudios[] = array('grado'=> htmlspecialchars($nombre_grado[$lst_estda], ENT_QUOTES | ENT_HTML5),
                                    'colegio'=> htmlspecialchars($nombre_colegio[$lst_estda], ENT_QUOTES | ENT_HTML5),
                                    'direccion'=> htmlspecialchars($nombre_direccion[$lst_estda], ENT_QUOTES | ENT_HTML5),
                                    'telefono'=> $numero_telefono[$lst_estda],
                                    'ciudad'=> htmlspecialchars($nombre_ciudad[$lst_estda], ENT_QUOTES | ENT_HTML5),
                                    'anio'=> $numero_year[$lst_estda]
                                );
        }

        $array_datos_estudios_anteriores[] = array('perdio'=> $perdio,
                                                   'cualPerdio'=> htmlspecialchars($cualPerdio, ENT_QUOTES | ENT_HTML5),
                                                   'acompaniamieto'=> $array_acompaniamiento,
                                                   'estudios_anteriores'=> $array_estudios
                                                );

    }

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

    if($txtFechaMatrimonio){
        $txtFechaMatrimonio = $txtFechaMatrimonio;
    }
    else{
        $txtFechaMatrimonio = date('Y-m-d');
    }

    $txtNombreCompletoRecomendo=htmlspecialchars($_REQUEST['txtNombreCompletoRecomendo'], ENT_QUOTES | ENT_HTML5);
    $txtTelefonoRecomendo=htmlspecialchars($_REQUEST['txtTelefonoRecomendo'], ENT_QUOTES | ENT_HTML5);
    $txtCelularRecomendo=htmlspecialchars($_REQUEST['txtCelularRecomendo'], ENT_QUOTES | ENT_HTML5);
    $txtMotivoEleccion=htmlspecialchars($_REQUEST['txtMotivoEleccion'], ENT_QUOTES | ENT_HTML5);


    $registrodatosestudiante = new dtosEstdnte();

    $registrodatosestudiante->setCodigoEstudiante($per_codigo);
    $registrodatosestudiante->setNumeroIdentificacionEstudiante($txtIdentificacion);
    $registrodatosestudiante->setPrimerNombreEstudiante($txtNombre);
    $registrodatosestudiante->setSegundoNombreEstudiante($txtSegundoNombre);
    $registrodatosestudiante->setPrimerApellidoEstudiante($txtPrimerApellido);
    $registrodatosestudiante->setSegundoApellidoEstudiante($txtSegundoApellido);
    $registrodatosestudiante->setMunicipioNaceEstudiante($selMunNacimiento);
    $registrodatosestudiante->setFechaNacimientoEstudiante($txtFechaNacimiento);
    $registrodatosestudiante->setActualmenteViveConEstudiante($txtViveCon);
    $registrodatosestudiante->setTelefonoEstudiante($txtTelefono);
    $registrodatosestudiante->setDireccionEstudiante($txtDireccion);
    $registrodatosestudiante->setMunicipioResidenciaEstudiante($selMunResidencia);
    $registrodatosestudiante->setCorreoEstudiante($txtCorreo);
    $registrodatosestudiante->setTieneFamilarEstudiante($radioFamiliar);
    $registrodatosestudiante->setParentescoEstudiante($selParentesco);
    $registrodatosestudiante->setGradoIngresarEstudiante($selGradoIngresar);
    $registrodatosestudiante->setGradoActualEstudiante($TxtGradoCursaba);
    $registrodatosestudiante->setEnEstudiante($txtLugar);
    $registrodatosestudiante->setMotivoRetiroEstudiante($txtMotivoRetiro);
    $registrodatosestudiante->setNacionalidadEstudiante($radioNacionalidadNinio);
    $registrodatosestudiante->setOtraNacionalidadEstudiante($txCualNinio);
    $registrodatosestudiante->setEstudiosAnterioresEstudiante($radioTablaEstudios);
    $registrodatosestudiante->setEducacionAnterior($array_datos_estudios_anteriores);

    $registrodatosestudiante->setFechaMatrimonio($txtFechaMatrimonio);
    $registrodatosestudiante->setTipoMatrimonio($radioMatrimonio);
    $registrodatosestudiante->setCualMatrimonio($txtCualMatrimonio);
    $registrodatosestudiante->setVivenJuntosMatrimonio($radioVivenJuntos);

    $registrodatosestudiante->setNombreRecomendacion($txtNombreCompletoRecomendo);
    $registrodatosestudiante->setTelefonoRecomendacion($txtTelefonoRecomendo);
    $registrodatosestudiante->setCelularRecomendacion($txtCelularRecomendo);
    $registrodatosestudiante->setMotivoRecomendacion($txtMotivoEleccion);

    $registrodatosestudiante->dtosInscripcion();
?>