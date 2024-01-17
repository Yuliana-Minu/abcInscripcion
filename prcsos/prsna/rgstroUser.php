<?php
include('classUser.php');
class RgsrtoUser  extends User{

    private $insertUser;
    private $codigoUser;


    public function __construct(){
        $this->cnxion = Dtbs::getInstance();
        $this->codigoUser=date('YmdHis').rand(99,999);
    }

    public function insertUser(){

        $insertUser="
            INSERT INTO principal.persona(
                               per_codigo, per_nombre, per_primerapellido, per_segundoapellido,
                               per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico,
                               per_genero, per_tipoidentificacion, per_identificacion, per_estado)
                               VALUES (, '".$this->getNombrePersona()."','".$this->getPrimerapellidoPersona()."','".$this->getSegundoApellidoPersona()."',
                               '".$this->getPersonaSistema()."','".$this->getPersonaSistema()."',NOW(),NOW(),'".$this->getGeneroPersona()."','".$this->getTipoIdentificacionPersona()."',
                               '".$this->getNumeroIdentificacionPersona()."','".$this->getEstadoPersona()."');";

        $this->cnxion->ejecutar($insertUser);


        return $insertUser;
    }
}
?>
