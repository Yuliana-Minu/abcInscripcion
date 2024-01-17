<?php 
class Inscripcion{
    //Datos Estudiante
    private $codigoEstudiante;
    private $numeroIdentificacionEstudiante;
    private $primerNombreEstudiante;
    private $segundoNombreEstudiante;
    private $primerApellidoEstudiante;
    private $segundoApellidoEstudiante;
    private $municipioNaceEstudiante;
    private $fechaNacimientoEstudiante;
    private $actualmenteViveConEstudiante;
    private $telefonoEstudiante;
    private $direccionEstudiante;
    private $municipioResidenciaEstudiante;
    private $correoEstudiante;
    private $tieneFamilarEstudiante; 
    private $parentescoEstudiante;
    private $gradoIngresarEstudiante;
    private $gradoActualEstudiante;
    private $enEstudiante;
    private $motivoRetiroEstudiante;
    private $fotoEstudiante;
    private $estudiosAnterioresEstudiante;

    private $nacionalidadEstudiante;
    private $otraNacionalidadEstudiante;

    //educacion Anterior 
    private $educacionAnterior;

    //Esduacion Añios Perdidos
    private $haPerdidoCurso;
    private $cualPerdio;

    //Informacion del Padre
    private $primerNombrePadre;
    private $segundoNombrePadre;
    private $primerApellidoPadre;
    private $segundoApellidoPadre;
    private $fechaNacimientoPadre;
    private $identificacionPadre;
    private $vivePadre;
    private $nivelEducativoPadre;
    private $correoPadre;
    private $ocupacionPadre;
    private $empresaPadre;
    private $cargoPadre;
    private $direccionOficinaPadre;
    private $telefonoOficinaPadre;
    private $direcionResidenciaPadre;
    private $telefonoResidenciaPadre;
    private $celularPadre;
    private $fotoPadre;
    private $codigoPapa;
    private $codigoMama;

    //Informacion de la Madre
    private $primerNombreMadre;
    private $segundoNombreMadre;
    private $primerApellidoMadre;
    private $segundoApellidoMadre;
    private $fechaNacimientoMadre;
    private $identificacionMadre;
    private $viveMadre;
    private $nivelEducativoMadre;
    private $correoMadre;
    private $ocupacionMadre;
    private $empresaMadre;
    private $cargoMadre;
    private $direccionOficinaMadre;
    private $telefonoOficinaMadre;
    private $direcionResidenciaMadre;
    private $telefonoResidenciaMadre;
    private $celularMadre;
    private $fotoMadre;
    

    //Matrimonio
    private $fechaMatrimonio;
    private $tipoMatrimonio;
    private $cualMatrimonio;
    private $vivenJuntosMatrimonio;


    //Recomendacion
    private $nombreRecomendacion;
    private $telefonoRecomendacion;
    private $celularRecomendacion;
    private $motivoRecomendacion;

    //Seguimiento
    private $segumientoNinio;
    private $cualSeguimientoNinio;

    private $personaSistema;
    private $rol;
    
    public function Inscripcion(){}

    public function getRol(){
        return $this->rol;
    }
    public function setRol($rol){
        $this->rol=$rol;
    }

    public function getCodigoPapa(){
        return $this->codigoPapa;
    }
    public function setCodigoPapa($codigoPapa){
        $this->codigoPapa=$codigoPapa;
    }
    
    public function getCodigoMama(){
        return $this->codigoMama;
    }
    public function setCodigoMama($codigoMama){
        $this->codigoMama=$codigoMama;
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

    

    public function getActualmenteViveConEstudiante(){
        return $this->actualmenteViveConEstudiante;
    }
    public function setActualmenteViveConEstudiante($actualmenteViveConEstudiante){
        $this->actualmenteViveConEstudiante=$actualmenteViveConEstudiante;
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

    public function getTieneFamilarEstudiante(){
        return $this->tieneFamilarEstudiante;
    }
    public function setTieneFamilarEstudiante($tieneFamilarEstudiante){
        $this->tieneFamilarEstudiante=$tieneFamilarEstudiante;
    }

    public function getParentescoEstudiante(){
        return $this->parentescoEstudiante;
    }
    public function setParentescoEstudiante($parentescoEstudiante){
        $this->parentescoEstudiante=$parentescoEstudiante;
    }

    public function getGradoIngresarEstudiante(){
        return $this->gradoIngresarEstudiante;
    }
    public function setGradoIngresarEstudiante($gradoIngresarEstudiante){
        $this->gradoIngresarEstudiante=$gradoIngresarEstudiante;
    }

    public function getGradoActualEstudiante(){
        return $this->gradoActualEstudiante;
    }
    public function setGradoActualEstudiante($gradoActualEstudiante){
        $this->gradoActualEstudiante=$gradoActualEstudiante;
    }

    public function getEnEstudiante(){
        return $this->enEstudiante;
    }
    public function setEnEstudiante($enEstudiante){
        $this->enEstudiante=$enEstudiante;
    }

    public function getMotivoRetiroEstudiante(){
        return $this->motivoRetiroEstudiante;
    }
    public function setMotivoRetiroEstudiante($motivoRetiroEstudiante){
        $this->motivoRetiroEstudiante=$motivoRetiroEstudiante;
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

    ///Educacion Anterior

    public function getEstudiosAnterioresEstudiante(){
        return $this->estudiosAnterioresEstudiante;
    }
    public function setEstudiosAnterioresEstudiante($estudiosAnterioresEstudiante){
        $this->estudiosAnterioresEstudiante=$estudiosAnterioresEstudiante;
    }

    public function getEducacionAnterior(){
        return $this->educacionAnterior;
    }
    public function setEducacionAnterior($educacionAnterior){
        $this->educacionAnterior=$educacionAnterior;
    }

    //Educacion Pedida

    public function getHaPerdidoCurso(){
        return $this->haPerdidoCurso;
    }
    public function setHaPerdidoCurso($haPerdidoCurso){
        $this->haPerdidoCurso=$haPerdidoCurso;
    }

    public function getCualPerdio(){
        return $this->cualPerdio;
    }
    public function setCualPerdio($cualPerdio){
        $this->cualPerdio=$cualPerdio;
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

    public function getVivePadre(){
        return $this->vivePadre;
    }
    public function setVivePadre($vivePadre){
        $this->vivePadre=$vivePadre;
    }

    public function getNivelEducativoPadre(){
        return $this->nivelEducativoPadre;
    }
    public function setNivelEducativoPadre($nivelEducativoPadre){
        $this->nivelEducativoPadre=$nivelEducativoPadre;
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

    public function getDireccionOficinaPadre(){
        return $this->direccionOficinaPadre;
    }
    public function setDireccionOficinaPadre($direccionOficinaPadre){
        $this->direccionOficinaPadre=$direccionOficinaPadre;
    }

    public function getTelefonoOficinaPadre(){
        return $this->telefonoOficinaPadre;
    }
    public function setTelefonoOficinaPadre($telefonoOficinaPadre){
        $this->telefonoOficinaPadre=$telefonoOficinaPadre;
    }

    public function getDirecionResidenciaPadre(){
        return $this->direcionResidenciaPadre;
    }
    public function setDirecionResidenciaPadre($direcionResidenciaPadre){
        $this->direcionResidenciaPadre=$direcionResidenciaPadre;
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

    public function getViveMadre(){
        return $this->viveMadre;
    }
    public function setViveMadre($viveMadre){
        $this->viveMadre=$viveMadre;
    }

    public function getNivelEducativoMadre(){
        return $this->nivelEducativoMadre;
    }
    public function setNivelEducativoMadre($nivelEducativoMadre){
        $this->nivelEducativoMadre=$nivelEducativoMadre;
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

    public function getDireccionOficinaMadre(){
        return $this->direccionOficinaMadre;
    }
    public function setDireccionOficinaMadre($direccionOficinaMadre){
        $this->direccionOficinaMadre=$direccionOficinaMadre;
    }

    public function getTelefonoOficinaMadre(){
        return $this->telefonoOficinaMadre;
    }
    public function setTelefonoOficinaMadre($telefonoOficinaMadre){
        $this->telefonoOficinaMadre=$telefonoOficinaMadre;
    }

    public function getDirecionResidenciaMadre(){
        return $this->direcionResidenciaMadre;
    }
    public function setDirecionResidenciaMadre($direcionResidenciaMadre){
        $this->direcionResidenciaMadre=$direcionResidenciaMadre;
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

    //Matrimonio 
    public function getFechaMatrimonio(){
        return $this->fechaMatrimonio;
    }
    public function setFechaMatrimonio($fechaMatrimonio){
        $this->fechaMatrimonio=$fechaMatrimonio;
    }

    public function getTipoMatrimonio(){
        return $this->tipoMatrimonio;
    }
    public function setTipoMatrimonio($tipoMatrimonio){
        $this->tipoMatrimonio=$tipoMatrimonio;
    }

    public function getCualMatrimonio(){
        return $this->cualMatrimonio;
    }
    public function setCualMatrimonio($cualMatrimonio){
        $this->cualMatrimonio=$cualMatrimonio;
    }

    public function getVivenJuntosMatrimonio(){
        return $this->vivenJuntosMatrimonio;
    }
    public function setVivenJuntosMatrimonio($vivenJuntosMatrimonio){
        $this->vivenJuntosMatrimonio=$vivenJuntosMatrimonio;
    }

    //Recomendacion
    public function getNombreRecomendacion(){
        return $this->nombreRecomendacion;
    }
    public function setNombreRecomendacion($nombreRecomendacion){
        $this->nombreRecomendacion=$nombreRecomendacion;
    }

    public function getTelefonoRecomendacion(){
        return $this->telefonoRecomendacion;
    }
    public function setTelefonoRecomendacion($telefonoRecomendacion){
        $this->telefonoRecomendacion=$telefonoRecomendacion;
    }

    public function getCelularRecomendacion(){
        return $this->celularRecomendacion;
    }
    public function setCelularRecomendacion($celularRecomendacion){
        $this->celularRecomendacion=$celularRecomendacion;
    }

    public function getMotivoRecomendacion(){
        return $this->motivoRecomendacion;
    }
    public function setMotivoRecomendacion($motivoRecomendacion){
        $this->motivoRecomendacion=$motivoRecomendacion;
    }


    //Seguimiento Ninio
    public function getSegumientoNinio(){
        return $this->segumientoNinio;
    }
    public function setSegumientoNinio($segumientoNinio){
        $this->segumientoNinio=$segumientoNinio;
    }

    public function getCualSeguimientoNinio(){
        return $this->cualSeguimientoNinio;
    }
    public function setCualSeguimientoNinio($cualSeguimientoNinio){
        $this->cualSeguimientoNinio=$cualSeguimientoNinio;
    }


}
?>