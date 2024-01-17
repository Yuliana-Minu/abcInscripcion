<?php
include('classPrsna.php');
class UpdtePrsna extends Persona{

    private $updatePersona;


    public function __construct(){
        $this->cnxion = Dtbs::getInstance();
    }

    public function updatePersona(){

        $updatePersona="UPDATE principal.persona
                            SET per_nombre='".$this->getNombrePersona()."', per_primerapellido='".$this->getPrimerapellidoPersona()."', 
                                per_segundoapellido='".$this->getSegundoApellidoPersona()."', per_personamodifico='".$this->getPersonaSistema()."',
                                per_fechamodifico=NOW(), per_genero='".$this->getGeneroPersona()."', 
                                per_tipoidentificacion=".$this->getTipoIdentificacionPersona().", per_identificacion='".$this->getNumeroIdentificacionPersona()."',
                                per_segundonombre='".$this->getSegundoNombrePersona()."', per_fechanacimiento='".$this->getFechaNacimientoPersona()."', 
                                per_municipionacimiento=".$this->getMunicipioNacimientoPersona()."
                        WHERE  per_codigo=".$this->getCodigoPersona().";";

        $this->cnxion->ejecutar($updatePersona);

        $updateDatosBasicos="UPDATE principal.datos_basicos
                                SET dba_estadocivil=".$this->getEstadoCivilPersona().", dba_profesion=".$this->getProfesionPersona().", dba_rh=".$this->getRhPersona().",
                                    dba_direccion='".$this->getDireccionPersona()."', dba_municipioresidencia=".$this->getMunicipioResidenciaPersona().", dba_correo='".$this->getCorreoPersona()."', 
                                    dba_telefono='".$this->getTelefonoPersona()."', dba_celular=".$this->getCelularPersona().", dba_fechamodifico=NOW(),
                                    dba_personamodifico=".$this->getPersonaSistema()."
                            WHERE dba_persona=".$this->getCodigoPersona().";";

        $this->cnxion->ejecutar($updateDatosBasicos);

        $updateAfiliado="UPDATE afiliado.afiliado
                            SET afi_fechamodifico=NOW(), afi_personamodifico=".$this->getPersonaSistema()."
                        WHERE afi_persona=".$this->getCodigoPersona().";";

        $this->cnxion->ejecutar($updateAfiliado);


        return $updatePersona." <br><br> ".$updateDatosBasicos." <br><br> ".$updateAfiliado;
    }
}
?>
