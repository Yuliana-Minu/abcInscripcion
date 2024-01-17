<?php
class Persona{
    private $codigoPersona;
    private $numeroIdentificacionPersona;
    private $tipoIdentificacionPersona;
    private $nombrePersona;
    private $primerApellidoPersona;
    private $segundoApellidoPersona;
    private $generoPersona;
    private $personaSistemaPersona;
    private $fechaSistemaPersona;
    private $estadoPersona;
    private $direccionPersona;
    private $telefonoPersona;
    private $correoPersona;

    private $segundoNombrePersona;
    private $rhPersona;
    private $estadoCivilPersona;
    private $profesionPersona;
    private $fechaNacimientoPersona;
    private $municipioNacimientoPersona;
    private $municipioResidenciaPersona;
    private $edadPersona;
    private $celularPersona;
    private $lugarExpedicionPersona;
    private $epsPersona;
    private $sisbenPersona;
    private $estratoPersona;

    private $perfil;

    public function Persona(){}

    public function getCodigoPersona(){
        return $this->codigoPersona;
    }
    public function setCodigoPersona($codigoPersona){
        $this->codigoPersona=$codigoPersona;
    }

    public function getNumeroIdentificacionPersona(){
        return $this->numeroIdenificacionPersona;
    }
    public function setNumeroIdentificacionPersona($numeroIdentificacionPersona){
        $this->numeroIdenificacionPersona=$numeroIdentificacionPersona;
    }
    public function getTipoIdentificacionPersona(){
        return $this->tipoIdentificacionPersona;
    }
    public function setTipoIdentificacionPersona($tipoIdentificacionPersona){
        $this->tipoIdentificacionPersona=$tipoIdentificacionPersona;
    }
    public function getNombrePersona(){
        return $this->nombrePersona;
    }
    public function setNombrePersona($nombrePersona){
        $this->nombrePersona=$nombrePersona;
    }
    public function getPrimerapellidoPersona(){
        return $this->primerApellidoPersona;
    }
    public function setPrimerApellidoPersona($primerApellidoPersona){
        $this->primerApellidoPersona=$primerApellidoPersona;
    }
    public function getSegundoApellidoPersona(){
        return $this->segundoApellidoPersona;
    }
    public function setSegundoApellidoPersona($segundoApellidoPersona){
        $this->segundoApellidoPersona=$segundoApellidoPersona;
    }
    public function getGeneroPersona(){
        return $this->generoPersona;
    }
    public function setGeneroPersona($generoPersona){
        $this->generoPersona=$generoPersona;
    }
    public function getPersonaSistema(){
        return $this->personaSistemaPersona;
    }
    public function setPersonaSistema($personaSistemaPersona){
        $this->personaSistemaPersona=$personaSistemaPersona;
    }
    public function getFechaSistemaPersona(){
        return $this->fechaSistemaPersona;
    }
    public function setFechaSistemaPersona($fechaSistemaPersona){
        $this->fechaSistemaPersona=$fechaSistemaPersona;
    }

    public function getEstadoPersona(){
        return $this->estadoPersona;
    }
    public function setEstadoPersona($estadoPersona){
        $this->estadoPersona=$estadoPersona;
    }

    public function getCorreoPersona(){
        return $this->correoPersona;
    }
    public function setCorreoPersona($correoPersona){
        $this->correoPersona=$correoPersona;
    }

    public function getSegundoNombrePersona(){
        return $this->segundoNombrePersona;
    }
    public function setSegundoNombrePersona($segundoNombrePersona){
        $this->segundoNombrePersona=$segundoNombrePersona;
    }

    public function getRhPersona(){
        return $this->rhPersona;
    }
    public function setRhPersona($rhPersona){
        $this->rhPersona=$rhPersona;
    }

    public function getEstadoCivilPersona(){
        return $this->estadoCivilPersona;
    }
    public function setEstadoCivilPersona($estadoCivilPersona){
        $this->estadoCivilPersona=$estadoCivilPersona;
    }

    public function getProfesionPersona(){
        return $this->profesionPersona;
    }
    public function setProfesionPersona($profesionPersona){
        $this->profesionPersona=$profesionPersona;
    }

    public function getFechaNacimientoPersona(){
        return $this->fechaNacimientoPersona;
    }
    public function setFechaNacimientoPersona($fechaNacimientoPersona){
        $this->fechaNacimientoPersona=$fechaNacimientoPersona;
    }

    public function getMunicipioNacimientoPersona(){
        return $this->municipioNacimientoPersona;
    }
    public function setMunicipioNacimientoPersona($municipioNacimientoPersona){
        $this->municipioNacimientoPersona=$municipioNacimientoPersona;
    }

    public function getMunicipioResidenciaPersona(){
        return $this->municipioResidenciaPersona;
    }
    public function setMunicipioResidenciaPersona($municipioResidenciaPersona){
        $this->municipioResidenciaPersona=$municipioResidenciaPersona;
    }

    public function getEdadPersona(){
        return $this->edadPersona;
    }
    public function setEdadPersona($edadPersona){
        $this->edadPersona=$edadPersona;
    }

    public function getDireccionPersona(){
        return $this->direccionPersona;
    }
    public function setDireccionPersona($direccionPersona){
        $this->direccionPersona=$direccionPersona;
    }

    public function getTelefonoPersona(){
        return $this->telefonoPersona;
    }
    public function setTelefonoPersona($telefonoPersona){
        $this->telefonoPersona=$telefonoPersona;
    }

    public function getCelularPersona(){
        return $this->celularPersona;
    }
    public function setCelularPersona($celularPersona){
        $this->celularPersona=$celularPersona;
    }

    public function getPerfil(){
        return $this->perfil;
    }
    public function setPerfil($perfil){
        $this->perfil=$perfil;
    }

    public function getLugarExpedicionPersona(){
        return $this->lugarExpedicionPersona;
    }
    public function setLugarExpedicionPersona($lugarExpedicionPersona){
        $this->lugarExpedicionPersona=$lugarExpedicionPersona;
    }

    public function getEpsPersona(){
        return $this->epsPersona;
    }
    public function setEpsPersona($epsPersona){
        $this->epsPersona=$epsPersona;
    }

    public function getSisbenPersona(){
        return $this->sisbenPersona;
    }
    public function setSisbenPersona($sisbenPersona){
        $this->sisbenPersona=$sisbenPersona;
    }

    public function getEstratoPersona(){
        return $this->estratoPersona;
    }
    public function setEstratoPersona($estratoPersona){
        $this->estratoPersona=$estratoPersona;
    }



}
?>
