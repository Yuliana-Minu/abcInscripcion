<?php 
include('prcsos/afldo/registroAfiliado.php');

$selTipoIdentificacion=$_REQUEST['selTipoIdentificacion'];
$txtIdentificacion=$_REQUEST['txtIdentificacion'];
$txtFechaAfiliacion=$_REQUEST['txtFechaAfiliacion'];
$txtNombre=$_REQUEST['txtNombre'];
$txtSegundoNombre=$_REQUEST['txtSegundoNombre'];
$txtPrimerApellido=$_REQUEST['txtPrimerApellido'];
$txtSegundoApellido=$_REQUEST['txtSegundoApellido'];
$radioGenero=$_REQUEST['radioGenero'];
$selRh=$_REQUEST['selRh'];
$selEstadoCivil=$_REQUEST['selEstadoCivil'];
$selProfesion=$_REQUEST['selProfesion'];
$txtFechaNacimiento=$_REQUEST['txtFechaNacimiento'];
$selMunNacimiento=$_REQUEST['selMunNacimiento'];
$txtDireccion=$_REQUEST['txtDireccion'];
$selMunResidencia=$_REQUEST['selMunResidencia'];
$txtCorreo=$_REQUEST['txtCorreo'];
$txtTelefonoFijo=$_REQUEST['txtTelefonoFijo'];
$txtCelularPersonal=$_REQUEST['txtCelularPersonal'];
$txtEstatura=$_REQUEST['txtEstatura'];
$txtPeso=$_REQUEST['txtPeso'];
$txtObservaciones=$_REQUEST['txtObservaciones'];
$personaSistema = $_SESSION['idusuario'];

$registroAfiliado= new RgstroAfldo();

$registroAfiliado->setTipoIdeAfiliado($selTipoIdentificacion);
$registroAfiliado->setIdentificacionAfiliado($txtIdentificacion);
$registroAfiliado->setFechaAfliacionAfiliado($txtFechaAfiliacion);
$registroAfiliado->setPrimerNombreAfiliado($txtNombre);
$registroAfiliado->setSegundoNombreAfiliado($txtSegundoNombre);
$registroAfiliado->setPrimerApellidoAfiliado($txtPrimerApellido);
$registroAfiliado->setSegundoApellidoAfiliado($txtSegundoApellido);
$registroAfiliado->setGeneroAfiliado($radioGenero);
$registroAfiliado->setRhAfiliado($selRh);
$registroAfiliado->setEstadoCivilAfiliado($selEstadoCivil);
$registroAfiliado->setProfesionAfiliado($selProfesion);
$registroAfiliado->setFechaNacimientoAfiliado($txtFechaNacimiento);
$registroAfiliado->setMunicipioNacimientoAfiliado($selMunNacimiento);
$registroAfiliado->setMunicipioResidenciaAfiliado($selMunResidencia);
$registroAfiliado->setDireccionAfiliado($txtDireccion);
$registroAfiliado->setCorreoAfiliado($txtCorreo);
$registroAfiliado->setTelefonoAfiliado($txtTelefonoFijo);
$registroAfiliado->setCelularAfiliado($txtCelularPersonal);
$registroAfiliado->setEstaturaAfiliado($txtEstatura);
$registroAfiliado->setPesoAfiliado($txtPeso);
$registroAfiliado->setObservacionesAfiliado($txtObservaciones);
$registroAfiliado->setPersonaSistema($personaSistema);

echo $registroAfiliado->insert_afiliado();

?>