<?php 
include('prcsos/afldo/updateAfiliado.php');

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
$per_codigo=$_REQUEST['per_codigo'];

$updateAfiliado= new UpdteAfldo();

$updateAfiliado->setCodigoPersona($per_codigo);
$updateAfiliado->setTipoIdeAfiliado($selTipoIdentificacion);
$updateAfiliado->setIdentificacionAfiliado($txtIdentificacion);
$updateAfiliado->setFechaAfliacionAfiliado($txtFechaAfiliacion);
$updateAfiliado->setPrimerNombreAfiliado($txtNombre);
$updateAfiliado->setSegundoNombreAfiliado($txtSegundoNombre);
$updateAfiliado->setPrimerApellidoAfiliado($txtPrimerApellido);
$updateAfiliado->setSegundoApellidoAfiliado($txtSegundoApellido);
$updateAfiliado->setGeneroAfiliado($radioGenero);
$updateAfiliado->setRhAfiliado($selRh);
$updateAfiliado->setEstadoCivilAfiliado($selEstadoCivil);
$updateAfiliado->setProfesionAfiliado($selProfesion);
$updateAfiliado->setFechaNacimientoAfiliado($txtFechaNacimiento);
$updateAfiliado->setMunicipioNacimientoAfiliado($selMunNacimiento);
$updateAfiliado->setMunicipioResidenciaAfiliado($selMunResidencia);
$updateAfiliado->setDireccionAfiliado($txtDireccion);
$updateAfiliado->setCorreoAfiliado($txtCorreo);
$updateAfiliado->setTelefonoAfiliado($txtTelefonoFijo);
$updateAfiliado->setCelularAfiliado($txtCelularPersonal);
$updateAfiliado->setEstaturaAfiliado($txtEstatura);
$updateAfiliado->setPesoAfiliado($txtPeso);
$updateAfiliado->setObservacionesAfiliado($txtObservaciones);
$updateAfiliado->setPersonaSistema($personaSistema);

echo $updateAfiliado->update_afiliado();

?>