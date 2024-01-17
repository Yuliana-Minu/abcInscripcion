<?php
    include('prcsos/matricula/dtosMama.php');

    function quitar_puntos_comas($cadena) {
        $no_permitidas= array (".",",");
        $permitidas= array ("&apos;");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    }

    $personaSistema = $_SESSION['idusuario'];
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

    $datosmadre = new dtosMadree();

    $datosmadre->setCodigoEstudiante($personaSistema);
    $datosmadre->setCodigoMadre($txtCodigoMadre);
    $datosmadre->setPrimerNombreMadre($txtNombreMadre);
    $datosmadre->setSegundoNombreMadre($txtSegundoNombreMadre);
    $datosmadre->setPrimerApellidoMadre($txtPrimerApellidoMadre);
    $datosmadre->setSegundoApellidoMadre($textSegundoApellidoMadre);
    $datosmadre->setFechaNacimientoMadre($txtFechaNacimientoMadre);
    $datosmadre->setIdentificacionMadre($txtIdentificacionMadre);
    $datosmadre->setNacionalidadMadre($radioNacionalidadMadre);
    $datosmadre->setMunicipioMadre($selMunNacimientoMadre);
    $datosmadre->setCualNacionalidadMadre($txtCualMadre);
    $datosmadre->setCorreoMadre($txtCorreoMadre);
    $datosmadre->setOcupacionMadre($txtOcupacionMadre);
    $datosmadre->setEmpresaMadre($txtEmpresaMadre);
    $datosmadre->setCargoMadre($txtCargoMadre);
    $datosmadre->setTelefonoResidenciaMadre($txtTelefonoResidenciaMadre);
    $datosmadre->setCelularMadre($txtCelularMadre);

    $datosmadre->info_mama();
?>