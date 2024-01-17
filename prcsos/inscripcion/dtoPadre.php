<?php
    include('prcsos/nscrpcion/classInscrpcion.php');
    class dtosPapas extends Inscripcion{
        private $cnxion;

        public function __construct(){
            $this->cnxion = Dtbs::getInstance();
        }

        public function dtaPapa(){
            
            $fecha_nacimiento_padre=$this->getFechaNacimientoPadre();

            if($fecha_nacimiento_padre){//Se valida que venga la fecha de Nacimiento
                $padre_fecha_nacimiento=", per_fechanacimiento='$fecha_nacimiento_padre'";
            }
            else{
                $padre_fecha_nacimiento="";
            } 

            $actualizarPapa="UPDATE principal.persona
                                SET per_nombre='".$this->getPrimerNombrePadre()."', 
                                    per_segundonombre='".$this->getSegundoNombrePadre()."',
                                    per_primerapellido='".$this->getPrimerApellidoPadre()."', 
                                    per_segundoapellido='".$this->getSegundoApellidoPadre()."', 
                                    per_personamodifico='".$this->getPersonaSistema()."', 
                                    per_fechamodifico=NOW(), 
                                    per_tipoidentificacion=1
                                    $padre_fecha_nacimiento
                              WHERE per_codigo=".$this->getCodigoPapa().";";
            
            $this->cnxion->ejecutar($actualizarPapa);

            $celular_papito=$this->getCelularPadre();
            if($celular_papito){
                $celular_papito=$this->getCelularPadre();
            }
            else{
                $celular_papito=0;
            }

            $updateDatosBasicosPapa="UPDATE principal.datos_basicos
                                        SET dba_direccion='".$this->getDirecionResidenciaPadre()."', 
                                            dba_correo='".$this->getCorreoPadre()."',
                                            dba_telefono='".$this->getTelefonoResidenciaPadre()."', 
                                            dba_celular=$celular_papito, 
                                            dba_fechamodifico=NOW(),
                                            dba_personamodifico=".$this->getPersonaSistema().",
                                            dba_ocupacion='".$this->getOcupacionPadre()."'
                                      WHERE dba_persona = ".$this->getCodigoPapa().";";
            
            $this->cnxion->ejecutar($updateDatosBasicosPapa);

            $updateDatosPapa="UPDATE principal.datos_papas
                                SET dpa_vive='".$this->getVivePadre()."', 
                                    dpa_cargo='".$this->getCargoPadre()."', 
                                    dpa_empresa='".$this->getEmpresaPadre()."', 
                                    dpa_direccionoficina='".$this->getDireccionOficinaPadre()."', 
                                    dpa_telefonooficina='".$this->getTelefonoOficinaPadre()."', 
                                    dpa_niveleducativo='".$this->getNivelEducativoPadre()."', 
                                    dba_fechamodifico=NOW(), 
                                    dba_personamodifico=".$this->getPersonaSistema()."
                              WHERE dpa_papa=".$this->getCodigoPapa().";";
            
            $this->cnxion->ejecutar($updateDatosPapa);

        }
    }
    
?>