<?php 
class Matricula{
    //Datos Estudiante
    private $fechaPreMariculaEstudiante;
    private $gradoIngresarEstudiante;

    private $codigoEstudiante;//
    private $tipoIdentificacionEstudiante;
    private $lugarExpedicionEstudiante;
    private $numeroIdentificacionEstudiante;
    private $primerNombreEstudiante;
    private $segundoNombreEstudiante;
    private $primerApellidoEstudiante;
    private $segundoApellidoEstudiante;
    private $municipioNaceEstudiante;
    private $fechaNacimientoEstudiante;
    private $telefonoEstudiante;
    private $direccionEstudiante;
    private $municipioResidenciaEstudiante;
    private $correoEstudiante;
    private $fotoEstudiante;
    private $nacionalidadEstudiante;
    private $otraNacionalidadEstudiante;

    private $celularEstudiante;
    private $epsEstudiante;
    private $rhEstudiante;
    private $estratoEstudiante;
    private $sisbenEstudiante;

    private $firmaEstudiante;


    //Informacion del Padre
    private $primerNombrePadre;
    private $segundoNombrePadre;
    private $primerApellidoPadre;
    private $segundoApellidoPadre;
    private $fechaNacimientoPadre;
    private $identificacionPadre;
    private $nacionalidadPadre;
    private $municipioPadre;
    private $cualNacionalidadPadre;
    private $correoPadre;
    private $ocupacionPadre;
    private $empresaPadre;
    private $cargoPadre;
    private $telefonoResidenciaPadre;
    private $celularPadre;
    private $fotoPadre;
    private $codigoPadre;

    private $firmaPadre;

    //Informacion de la Madre
    private $primerNombreMadre;
    private $segundoNombreMadre;
    private $primerApellidoMadre;
    private $segundoApellidoMadre;
    private $fechaNacimientoMadre;
    private $identificacionMadre;
    private $nacionalidadMadre;
    private $municipioMadre;
    private $cualNacionalidadMadre;
    private $correoMadre;
    private $ocupacionMadre;
    private $empresaMadre;
    private $cargoMadre;
    private $telefonoResidenciaMadre;
    private $celularMadre;
    private $fotoMadre;
    private $codigoMadre;

    private $firmaMadre;    

    //Informacion del Acudiente
    private $primerNombreAcudiente;
    private $segundoNombreAcudiente;
    private $primerApellidoAcudiente;
    private $segundoApellidoAcudiente;
    private $fechaNacimientoAcudiente;
    private $identificacionAcudiente;
    private $nacionalidadAcudiente;
    private $municipioAcudiente;
    private $cualNacionalidadAcudiente;
    private $correoAcudiente;
    private $ocupacionAcudiente;
    private $empresaAcudiente;
    private $cargoAcudiente;
    private $telefonoResidenciaAcudiente;
    private $celularAcudiente;
    private $fotoAcudiente;
    private $codigoAcudiente;

    private $firmaAcudiente;

    private $personaSistema;
    

  
    public function Matricula(){}

    public function getFechaPreMariculaEstudiante(){
        return $this->fechaPreMariculaEstudiante;
    }
    public function setFechaPreMariculaEstudiante($fechaPreMariculaEstudiante){
        $this->fechaPreMariculaEstudiante=$fechaPreMariculaEstudiante;
    }

    public function getGradoIngresarEstudiante(){
        return $this->gradoIngresarEstudiante;
    }
    public function setGradoIngresarEstudiante($gradoIngresarEstudiante){
        $this->gradoIngresarEstudiante=$gradoIngresarEstudiante;
    }

    public function getCodigoEstudiante(){
        return $this->codigoEstudiante;
    }
    public function setCodigoEstudiante($codigoEstudiante){
        $this->codigoEstudiante=$codigoEstudiante;
    }

    public function getPersonaSistema(){
        return $this->personaSistema;
    }
    public function setPersonaSistema($personaSistema){
        $this->personaSistema=$personaSistema;
    }

    public function getTipoIdentificacionEstudiante(){
        return $this->tipoIdentificacionEstudiante;
    }
    public function setTipoIdentificacionEstudiante($tipoIdentificacionEstudiante){
        $this->tipoIdentificacionEstudiante=$tipoIdentificacionEstudiante;
    }

    public function getLugarExpedicionEstudiante(){
        return $this->lugarExpedicionEstudiante;
    }
    public function setLugarExpedicionEstudiante($lugarExpedicionEstudiante){
        $this->lugarExpedicionEstudiante=$lugarExpedicionEstudiante;
    }

    public function getNumeroIdentificacionEstudiante(){
        return $this->numeroIdentificacionEstudiante;
    }
    public function setNumeroIdentificacionEstudiante($numeroIdentificacionEstudiante){
        $this->numeroIdentificacionEstudiante=$numeroIdentificacionEstudiante;
    }

    public function getPrimerNombreEstudiante(){
        return $this->primerNombreEstudiante;
    }
    public function setPrimerNombreEstudiante($primerNombreEstudiante){
        $this->primerNombreEstudiante=$primerNombreEstudiante;
    }

    public function getSegundoNombreEstudiante(){
        return $this->segundoNombreEstudiante;
    }
    public function setSegundoNombreEstudiante($segundoNombreEstudiante){
        $this->segundoNombreEstudiante=$segundoNombreEstudiante;
    }

    public function getPrimerApellidoEstudiante(){
        return $this->primerApellidoEstudiante;
    }
    public function setPrimerApellidoEstudiante($primerApellidoEstudiante){
        $this->primerApellidoEstudiante=$primerApellidoEstudiante;
    }

    public function getSegundoApellidoEstudiante(){
        return $this->segundoApellidoEstudiante;
    }
    public function setSegundoApellidoEstudiante($segundoApellidoEstudiante){
        $this->segundoApellidoEstudiante=$segundoApellidoEstudiante;
    }

    public function getMunicipioNaceEstudiante(){
        return $this->municipioNaceEstudiante;
    }
    public function setMunicipioNaceEstudiante($municipioNaceEstudiante){
        $this->municipioNaceEstudiante=$municipioNaceEstudiante;
    }

    public function getFechaNacimientoEstudiante(){
        return $this->fechaNacimientoEstudiante;
    }
    public function setFechaNacimientoEstudiante($fechaNacimientoEstudiante){
        $this->fechaNacimientoEstudiante=$fechaNacimientoEstudiante;
    }

    public function getTelefonoEstudiante(){
        return $this->telefonoEstudiante;
    }
    public function setTelefonoEstudiante($telefonoEstudiante){
        $this->telefonoEstudiante=$telefonoEstudiante;
    }

    public function getDireccionEstudiante(){
        return $this->direccionEstudiante;
    }
    public function setDireccionEstudiante($direccionEstudiante){
        $this->direccionEstudiante=$direccionEstudiante;
    }

    public function getMunicipioResidenciaEstudiante(){
        return $this->municipioResidenciaEstudiante;
    }
    public function setMunicipioResidenciaEstudiante($municipioResidenciaEstudiante){
        $this->municipioResidenciaEstudiante=$municipioResidenciaEstudiante;
    }

    public function getCorreoEstudiante(){
        return $this->correoEstudiante;
    }
    public function setCorreoEstudiante($correoEstudiante){
        $this->correoEstudiante=$correoEstudiante;
    }

    public function getFotoEstudiante(){
        return $this->fotoEstudiante;
    }
    public function setFotoEstudiante($fotoEstudiante){
        $this->fotoEstudiante=$fotoEstudiante;
    }

    public function getNacionalidadEstudiante(){
        return $this->nacionalidadEstudiante;
    }
    public function setNacionalidadEstudiante($nacionalidadEstudiante){
        $this->nacionalidadEstudiante=$nacionalidadEstudiante;
    }

    public function getOtraNacionalidadEstudiante(){
        return $this->otraNacionalidadEstudiante;
    }
    public function setOtraNacionalidadEstudiante($otraNacionalidadEstudiante){
        $this->otraNacionalidadEstudiante=$otraNacionalidadEstudiante;
    }

    public function getCelularEstudiante(){
        return $this->celularEstudiante;
    }
    public function setCelularEstudiante($celularEstudiante){
        $this->celularEstudiante=$celularEstudiante;
    }

    public function getEpsEstudiante(){
        return $this->epsEstudiante;
    }
    public function setEpsEstudiante($epsEstudiante){
        $this->epsEstudiante=$epsEstudiante;
    }

    public function getRhEstudiante(){
        return $this->rhEstudiante;
    }
    public function setRhEstudiante($rhEstudiante){
        $this->rhEstudiante=$rhEstudiante;
    }

    public function getEstratoEstudiante(){
        return $this->estratoEstudiante;
    }
    public function setEstratoEstudiante($estratoEstudiante){
        $this->estratoEstudiante=$estratoEstudiante;
    }

    public function getSisbenEstudiante(){
        return $this->sisbenEstudiante;
    }
    public function setSisbenEstudiante($sisbenEstudiante){
        $this->sisbenEstudiante=$sisbenEstudiante;
    }

    public function getFirmaEstudiante(){
        return $this->firmaEstudiante;
    }
    public function setFirmaEstudiante($firmaEstudiante){
        $this->firmaEstudiante=$firmaEstudiante;
    }
    //informacion del padre

    public function getPrimerNombrePadre(){
        return $this->primerNombrePadre;
    }
    public function setPrimerNombrePadre($primerNombrePadre){
        $this->primerNombrePadre=$primerNombrePadre;
    }

    public function getSegundoNombrePadre(){
        return $this->segundoNombrePadre;
    }
    public function setSegundoNombrePadre($segundoNombrePadre){
        $this->segundoNombrePadre=$segundoNombrePadre;
    }

    public function getPrimerApellidoPadre(){
        return $this->primerApellidoPadre;
    }
    public function setPrimerApellidoPadre($primerApellidoPadre){
        $this->primerApellidoPadre=$primerApellidoPadre;
    }

    public function getSegundoApellidoPadre(){
        return $this->segundoApellidoPadre;
    }
    public function setSegundoApellidoPadre($segundoApellidoPadre){
        $this->segundoApellidoPadre=$segundoApellidoPadre;
    }

    public function getFechaNacimientoPadre(){
        return $this->fechaNacimientoPadre;
    }
    public function setFechaNacimientoPadre($fechaNacimientoPadre){
        $this->fechaNacimientoPadre=$fechaNacimientoPadre;
    }

    public function getIdentificacionPadre(){
        return $this->identificacionPadre;
    }
    public function setIdentificacionPadre($identificacionPadre){
        $this->identificacionPadre=$identificacionPadre;
    }

    public function getNacionalidadPadre(){
        return $this->nacionalidadPadre;
    }
    public function setNacionalidadPadre($nacionalidadPadre){
        $this->nacionalidadPadre=$nacionalidadPadre;
    }

    public function getMunicipioPadre(){
        return $this->municipioPadre;
    }
    public function setMunicipioPadre($municipioPadre){
        $this->municipioPadre=$municipioPadre;
    }

    public function getCualNacionalidadPadre(){
        return $this->cualNacionalidadPadre;
    }
    public function setCualNacionalidadPadre($cualNacionalidadPadre){
        $this->cualNacionalidadPadre=$cualNacionalidadPadre;
    }

    public function getCorreoPadre(){
        return $this->correoPadre;
    }
    public function setCorreoPadre($correoPadre){
        $this->correoPadre=$correoPadre;
    }

    public function getOcupacionPadre(){
        return $this->ocupacionPadre;
    }
    public function setOcupacionPadre($ocupacionPadre){
        $this->ocupacionPadre=$ocupacionPadre;
    }

    public function getEmpresaPadre(){
        return $this->empresaPadre;
    }
    public function setEmpresaPadre($empresaPadre){
        $this->empresaPadre=$empresaPadre;
    }

    public function getCargoPadre(){
        return $this->cargoPadre;
    }
    public function setCargoPadre($cargoPadre){
        $this->cargoPadre=$cargoPadre;
    }

    public function getTelefonoResidenciaPadre(){
        return $this->telefonoResidenciaPadre;
    }
    public function setTelefonoResidenciaPadre($telefonoResidenciaPadre){
        $this->telefonoResidenciaPadre=$telefonoResidenciaPadre;
    }

    public function getCelularPadre(){
        return $this->celularPadre;
    }
    public function setCelularPadre($celularPadre){
        $this->celularPadre=$celularPadre;
    }

    public function getFotoPadre(){
        return $this->fotoPadre;
    }
    public function setFotoPadre($fotoPadre){
        $this->fotoPadre=$fotoPadre;
    }

    public function getCodigoPadre(){
        return $this->codigoPadre;
    }
    public function setCodigoPadre($codigoPadre){
        $this->codigoPadre=$codigoPadre;
    }


    public function getFirmaPadre(){
        return $this->firmaPadre;
    }
    public function setFirmaPadre($firmaPadre){
        $this->firmaPadre=$firmaPadre;
    }

    //informacion de la Madre

    public function getPrimerNombreMadre(){
        return $this->primerNombreMadre;
    }
    public function setPrimerNombreMadre($primerNombreMadre){
        $this->primerNombreMadre=$primerNombreMadre;
    }

    public function getSegundoNombreMadre(){
        return $this->segundoNombreMadre;
    }
    public function setSegundoNombreMadre($segundoNombreMadre){
        $this->segundoNombreMadre=$segundoNombreMadre;
    }

    public function getPrimerApellidoMadre(){
        return $this->primerApellidoMadre;
    }
    public function setPrimerApellidoMadre($primerApellidoMadre){
        $this->primerApellidoMadre=$primerApellidoMadre;
    }

    public function getSegundoApellidoMadre(){
        return $this->segundoApellidoMadre;
    }
    public function setSegundoApellidoMadre($segundoApellidoMadre){
        $this->segundoApellidoMadre=$segundoApellidoMadre;
    }

    public function getFechaNacimientoMadre(){
        return $this->fechaNacimientoMadre;
    }
    public function setFechaNacimientoMadre($fechaNacimientoMadre){
        $this->fechaNacimientoMadre=$fechaNacimientoMadre;
    }

    public function getIdentificacionMadre(){
        return $this->identificacionMadre;
    }
    public function setIdentificacionMadre($identificacionMadre){
        $this->identificacionMadre=$identificacionMadre;
    }

    public function getNacionalidadMadre(){
        return $this->nacionalidadMadre;
    }
    public function setNacionalidadMadre($nacionalidadMadre){
        $this->nacionalidadMadre=$nacionalidadMadre;
    }

    public function getMunicipioMadre(){
        return $this->municipioMadre;
    }
    public function setMunicipioMadre($municipioMadre){
        $this->municipioMadre=$municipioMadre;
    }

    public function getCualNacionalidadMadre(){
        return $this->cualNacionalidadMadre;
    }
    public function setCualNacionalidadMadre($cualNacionalidadMadre){
        $this->cualNacionalidadMadre=$cualNacionalidadMadre;
    }

    public function getCorreoMadre(){
        return $this->correoMadre;
    }
    public function setCorreoMadre($correoMadre){
        $this->correoMadre=$correoMadre;
    }

    public function getOcupacionMadre(){
        return $this->ocupacionMadre;
    }
    public function setOcupacionMadre($ocupacionMadre){
        $this->ocupacionMadre=$ocupacionMadre;
    }

    public function getEmpresaMadre(){
        return $this->empresaMadre;
    }
    public function setEmpresaMadre($empresaMadre){
        $this->empresaMadre=$empresaMadre;
    }

    public function getCargoMadre(){
        return $this->cargoMadre;
    }
    public function setCargoMadre($cargoMadre){
        $this->cargoMadre=$cargoMadre;
    }

    public function getTelefonoResidenciaMadre(){
        return $this->telefonoResidenciaMadre;
    }
    public function setTelefonoResidenciaMadre($telefonoResidenciaMadre){
        $this->telefonoResidenciaMadre=$telefonoResidenciaMadre;
    }

    public function getCelularMadre(){
        return $this->celularMadre;
    }
    public function setCelularMadre($celularMadre){
        $this->celularMadre=$celularMadre;
    }

    public function getFotoMadre(){
        return $this->fotoMadre;
    }
    public function setFotoMadre($fotoMadre){
        $this->fotoMadre=$fotoMadre;
    }

    public function getCodigoMadre(){
        return $this->codigoMadre;
    }
    public function setCodigoMadre($codigoMadre){
        $this->codigoMadre=$codigoMadre;
    }

    public function getFirmaMadre(){
        return $this->firmaMadre;
    }
    public function setFirmaMadre($firmaMadre){
        $this->firmaMadre=$firmaMadre;
    }

    //informacion del Acudiente
    public function getCodigoAcudiente(){
        return $this->codigoAcudiente;
    }
    public function setCodigoAcudiente($codigoAcudiente){
        $this->codigoAcudiente=$codigoAcudiente;
    }

    public function getPrimerNombreAcudiente(){
        return $this->primerNombreAcudiente;
    }
    public function setPrimerNombreAcudiente($primerNombreAcudiente){
        $this->primerNombreAcudiente=$primerNombreAcudiente;
    }

    public function getSegundoNombreAcudiente(){
        return $this->segundoNombreAcudiente;
    }
    public function setSegundoNombreAcudiente($segundoNombreAcudiente){
        $this->segundoNombreAcudiente=$segundoNombreAcudiente;
    }

    public function getPrimerApellidoAcudiente(){
        return $this->primerApellidoAcudiente;
    }
    public function setPrimerApellidoAcudiente($primerApellidoAcudiente){
        $this->primerApellidoAcudiente=$primerApellidoAcudiente;
    }

    public function getSegundoApellidoAcudiente(){
        return $this->segundoApellidoAcudiente;
    }
    public function setSegundoApellidoAcudiente($segundoApellidoAcudiente){
        $this->segundoApellidoAcudiente=$segundoApellidoAcudiente;
    }

    public function getFechaNacimientoAcudiente(){
        return $this->fechaNacimientoAcudiente;
    }
    public function setFechaNacimientoAcudiente($fechaNacimientoAcudiente){
        $this->fechaNacimientoAcudiente=$fechaNacimientoAcudiente;
    }

    public function getIdentificacionAcudiente(){
        return $this->identificacionAcudiente;
    }
    public function setIdentificacionAcudiente($identificacionAcudiente){
        $this->identificacionAcudiente=$identificacionAcudiente;
    }

    public function getNacionalidadAcudiente(){
        return $this->nacionalidadAcudiente;
    }
    public function setNacionalidadAcudiente($nacionalidadAcudiente){
        $this->nacionalidadAcudiente=$nacionalidadAcudiente;
    }

    public function getMunicipioAcudiente(){
        return $this->municipioAcudiente;
    }
    public function setMunicipioAcudiente($municipioAcudiente){
        $this->municipioAcudiente=$municipioAcudiente;
    }

    public function getCualNacionalidadAcudiente(){
        return $this->cualNacionalidadAcudiente;
    }
    public function setCualNacionalidadAcudiente($cualNacionalidadAcudiente){
        $this->cualNacionalidadAcudiente=$cualNacionalidadAcudiente;
    }

    public function getCorreoAcudiente(){
        return $this->correoAcudiente;
    }
    public function setCorreoAcudiente($correoAcudiente){
        $this->correoAcudiente=$correoAcudiente;
    }

    public function getOcupacionAcudiente(){
        return $this->ocupacionAcudiente;
    }
    public function setOcupacionAcudiente($ocupacionAcudiente){
        $this->ocupacionAcudiente=$ocupacionAcudiente;
    }

    public function getEmpresaAcudiente(){
        return $this->empresaAcudiente;
    }
    public function setEmpresaAcudiente($empresaAcudiente){
        $this->empresaAcudiente=$empresaAcudiente;
    }

    public function getCargoAcudiente(){
        return $this->cargoAcudiente;
    }
    public function setCargoAcudiente($cargoAcudiente){
        $this->cargoAcudiente=$cargoAcudiente;
    }

    public function getTelefonoResidenciaAcudiente(){
        return $this->telefonoResidenciaAcudiente;
    }
    public function setTelefonoResidenciaAcudiente($telefonoResidenciaAcudiente){
        $this->telefonoResidenciaAcudiente=$telefonoResidenciaAcudiente;
    }

    public function getCelularAcudiente(){
        return $this->celularAcudiente;
    }
    public function setCelularAcudiente($celularAcudiente){
        $this->celularAcudiente=$celularAcudiente;
    }

    public function getFotoAcudiente(){
        return $this->fotoAcudiente;
    }
    public function setFotoAcudiente($fotoAcudiente){
        $this->fotoAcudiente=$fotoAcudiente;
    }

    public function getFirmaAcudiente(){
        return $this->firmaAcudiente;
    }
    public function setFirmaAcudiente($firmaAcudiente){
        $this->firmaAcudiente=$firmaAcudiente;
    }


 


}
?>