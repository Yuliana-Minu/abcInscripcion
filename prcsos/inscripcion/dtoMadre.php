<?php
    include('prcsos/nscrpcion/classInscrpcion.php');
    class dtosMama extends Inscripcion{
        private $cnxion;

        public function __construct(){
            $this->cnxion = Dtbs::getInstance();
        }
 
        public function dtaMama(){
            
            $fecha_nacimiento_madre=$this->getFechaNacimientoMadre();

            if($fecha_nacimiento_madre){//Se valida que venga la fecha de Nacimiento
                $madre_fecha_nacimiento=", per_fechanacimiento='$fecha_nacimiento_madre'";
            }
            else{
                $madre_fecha_nacimiento="";
            } 

            $actualizarMama="UPDATE principal.persona
                                SET per_nombre='".$this->getPrimerNombreMadre()."', 
                                    per_segundonombre='".$this->getSegundoNombreMadre()."',
                                    per_primerapellido='".$this->getPrimerApellidoMadre()."', 
                                    per_segundoapellido='".$this->getSegundoApellidoMadre()."', 
                                    per_personamodifico='".$this->getPersonaSistema()."', 
                                    per_fechamodifico=NOW(), 
                                    per_tipoidentificacion=1
                                    $madre_fecha_nacimiento
                              WHERE per_codigo=".$this->getCodigoMama().";";
            
            $this->cnxion->ejecutar($actualizarMama);

            $celular_mamita=$this->getCelularMadre();
            if($celular_mamita){
                $celular_mamita=$this->getCelularMadre();
            }
            else{
                $celular_mamita=0;
            }

            $updateDatosBasicosMama="UPDATE principal.datos_basicos
                                        SET dba_direccion='".$this->getDirecionResidenciaMadre()."', 
                                            dba_correo='".$this->getCorreoMadre()."',
                                            dba_telefono='".$this->getTelefonoResidenciaMadre()."', 
                                            dba_celular=$celular_mamita, 
                                            dba_fechamodifico=NOW(),
                                            dba_personamodifico=".$this->getPersonaSistema().",
                                            dba_ocupacion='".$this->getOcupacionMadre()."'
                                      WHERE dba_persona = ".$this->getCodigoMama().";";
            
            $this->cnxion->ejecutar($updateDatosBasicosMama);

            $updateDatosMama="UPDATE principal.datos_papas
                                SET dpa_vive='".$this->getViveMadre()."', 
                                    dpa_cargo='".$this->getCargoMadre()."', 
                                    dpa_empresa='".$this->getEmpresaMadre()."', 
                                    dpa_direccionoficina='".$this->getDireccionOficinaMadre()."', 
                                    dpa_telefonooficina='".$this->getTelefonoOficinaMadre()."', 
                                    dpa_niveleducativo='".$this->getNivelEducativoMadre()."', 
                                    dba_fechamodifico=NOW(), 
                                    dba_personamodifico=".$this->getPersonaSistema()."
                              WHERE dpa_papa=".$this->getCodigoMama().";";
            
            $this->cnxion->ejecutar($updateDatosMama);

        }
    }
    
?>