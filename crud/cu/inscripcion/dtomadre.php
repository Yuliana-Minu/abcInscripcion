<?php
    include('prcsos/inscripcion/dtoMadre.php');

    $personaSistema =  $_SESSION['idusuario'];
    $txtNombreMadre = htmlspecialchars($_REQUEST['txtNombreMadre'], ENT_QUOTES | ENT_HTML5);
    $txtSegundoNombreMadre = htmlspecialchars($_REQUEST['txtSegundoNombreMadre'], ENT_QUOTES | ENT_HTML5);
    $txtPrimerApellidoMadre = htmlspecialchars($_REQUEST['txtPrimerApellidoMadre'], ENT_QUOTES | ENT_HTML5);
    $textSegundoApellidoMadre = htmlspecialchars($_REQUEST['textSegundoApellidoMadre'], ENT_QUOTES | ENT_HTML5);
    $txtFechaNacimientoMadre = htmlspecialchars($_REQUEST['txtFechaNacimientoMadre'], ENT_QUOTES | ENT_HTML5);
    $radioViveMadre = $_REQUEST['radioViveMadre'];
    $txtNivelEducativoMadre = htmlspecialchars($_REQUEST['txtNivelEducativoMadre'], ENT_QUOTES | ENT_HTML5);
    $txtCorreoMadre = htmlspecialchars($_REQUEST['txtCorreoMadre'], ENT_QUOTES | ENT_HTML5);
    $txtOcupacionMadre = htmlspecialchars($_REQUEST['txtOcupacionMadre'], ENT_QUOTES | ENT_HTML5);
    $txtEmpresaMadre = htmlspecialchars($_REQUEST['txtEmpresaMadre'], ENT_QUOTES | ENT_HTML5);
    $txtCargoMadre = htmlspecialchars($_REQUEST['txtCargoMadre'], ENT_QUOTES | ENT_HTML5);
    $txtDireccionOficinaMadre = htmlspecialchars($_REQUEST['txtDireccionOficinaMadre'], ENT_QUOTES | ENT_HTML5);
    $txtTelefonoOficinaMadre = $_REQUEST['txtTelefonoOficinaMadre'];
    $txtDireccionResidenciaMadre = htmlspecialchars($_REQUEST['txtDireccionResidenciaMadre'], ENT_QUOTES | ENT_HTML5);
    $txtTelefonoResidenciaMadre = $_REQUEST['txtTelefonoResidenciaMadre'];
    $txtCelularMadre = $_REQUEST['txtCelularMadre'];
    $codigoMamaNinio  =  $_REQUEST['codigoMamaNinio'];
    
    $rgstrosdatosmama  =  new dtosMama();

    $rgstrosdatosmama->setPersonaSistema($personaSistema);
    $rgstrosdatosmama->setPrimerNombreMadre($txtNombreMadre);//
    $rgstrosdatosmama->setSegundoNombreMadre($txtSegundoNombreMadre);
    $rgstrosdatosmama->setPrimerApellidoMadre($txtPrimerApellidoMadre);
    $rgstrosdatosmama->setSegundoApellidoMadre($textSegundoApellidoMadre);
    $rgstrosdatosmama->setFechaNacimientoMadre($txtFechaNacimientoMadre);
    $rgstrosdatosmama->setViveMadre($radioViveMadre);//
    $rgstrosdatosmama->setNivelEducativoMadre($txtNivelEducativoMadre);
    $rgstrosdatosmama->setCorreoMadre($txtCorreoMadre);//
    $rgstrosdatosmama->setOcupacionMadre($txtOcupacionMadre);//
    $rgstrosdatosmama->setEmpresaMadre($txtEmpresaMadre);//
    $rgstrosdatosmama->setCargoMadre($txtCargoMadre);//
    $rgstrosdatosmama->setDireccionOficinaMadre($txtDireccionOficinaMadre);
    $rgstrosdatosmama->setTelefonoOficinaMadre($txtTelefonoOficinaMadre);
    $rgstrosdatosmama->setDirecionResidenciaMadre($txtDireccionResidenciaMadre);
    $rgstrosdatosmama->setTelefonoResidenciaMadre($txtTelefonoResidenciaMadre);
    $rgstrosdatosmama->setCelularMadre($txtCelularMadre);
    $rgstrosdatosmama->setCodigoMama($codigoMamaNinio);

    $rgstrosdatosmama->dtaMama();
?>