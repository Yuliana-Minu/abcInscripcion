<?php 
    include('prcsos/nscrpcion/classMtrcla.php');
    class dtosPadree extends Matricula {
        private $cnxion;

        public function __construct(){
            $this->cnxion = Dtbs::getInstance();
        }
        
        public function calendario_apertura(){

            $sql_calendario_apertura="SELECT MAX(ama_vigencia) AS vigencia_matricula
                                        FROM academico.apertura_matricula
                                       WHERE ama_estado = 1;";
    
            $query_calendario_apertura=$this->cnxion->ejecutar($sql_calendario_apertura);
    
            $data_calendario_apertura=$this->cnxion->obtener_filas($query_calendario_apertura);
    
            $vigencia_matricula=$data_calendario_apertura['vigencia_matricula'];
    
            return $vigencia_matricula;
        }

        public function datos_matricula_ninio($codigo_ninio, $calendario_apertura){

            $sql_datos_matricula_ninio="SELECT dma_codigo, dma_ninio, dma_estado
                                          FROM principal.datos_matricula
                                         WHERE dma_ninio = $codigo_ninio
                                           AND dma_anio = $calendario_apertura";
    
            $query_datos_matricula_ninio=$this->cnxion->ejecutar($sql_datos_matricula_ninio);
    
            $data_datos_matricula_ninio=$this->cnxion->obtener_filas($query_datos_matricula_ninio);
    
            $dma_codigo = $data_datos_matricula_ninio['dma_codigo'];
    
            return $dma_codigo;
        }

        public function datos_papas($codigo_papas){

            $sql_datos_papas=" SELECT dpa_codigo, dpa_papa, dpa_vive, 
                                      dpa_cargo, dpa_empresa, dpa_direccionoficina, 
                                      dpa_telefonooficina, dpa_niveleducativo 
                                 FROM principal.datos_papas
                                WHERE dpa_papa = $codigo_papas";
    
            $query_datos_papas=$this->cnxion->ejecutar($sql_datos_papas);
    
            while($data_datos_papas=$this->cnxion->obtener_filas($query_datos_papas)){
                $datadatos_papas[]=$data_datos_papas;
            }
            return $datadatos_papas;
        }

        public function info_papa(){
            if($this->getFechaNacimientoPadre()){
                $condicion_fechanacimiento=", per_fechanacimiento='".$this->getFechaNacimientoPadre()."'";
            }
            else{
                $condicion_fechanacimiento="";
            }

            if($this->getMunicipioPadre()){
                $munnacepadre=$this->getMunicipioPadre();
            }
            else{
                $munnacepadre=0;
            }

            $insertPapa="UPDATE principal.persona
                            SET per_nombre='".$this->getPrimerNombrePadre()."', 
                                per_primerapellido='".$this->getPrimerApellidoPadre()."',
                                per_segundoapellido='".$this->getSegundoApellidoPadre()."', 
                                per_personamodifico= ".$this->getCodigoEstudiante().", 
                                per_fechamodifico=NOW(), 
                                per_segundonombre='".$this->getSegundoNombrePadre()."', 
                                per_municipionacimiento=$munnacepadre,                                  
                                per_nacionalidad='".$this->getNacionalidadPadre()."', 
                                per_otranacionalidad='".$this->getCualNacionalidadPadre()."',
                                per_tipoidentificacion=1
                                $condicion_fechanacimiento
                         WHERE per_codigo=".$this->getCodigoPadre().";";

            $this->cnxion->ejecutar($insertPapa);

            if($this->getCelularPadre()){
                $celular_papa=$this->getCelularPadre();
            }
            else{
                $celular_papa=0;
            }

            $insertDatosBasicosPapa="UPDATE principal.datos_basicos
                                        SET dba_correo='".$this->getCorreoPadre()."', 
                                            dba_telefono='".$this->getTelefonoResidenciaPadre()."', 
                                            dba_celular=".$celular_papa.",  
                                            dba_fechamodifico=NOW(), 
                                            dba_personamodifico=".$this->getCodigoEstudiante().", 
                                            dba_ocupacion='".$this->getOcupacionPadre()."'
                                      WHERE dba_persona=".$this->getCodigoPadre().";";

            $this->cnxion->ejecutar($insertDatosBasicosPapa);

            $datosPapa = $this->datos_papas($this->getCodigoPadre());
            if($datosPapa){

                $insertDatosPapa="UPDATE principal.datos_papas
                                     SET dpa_cargo='".$this->getCargoPadre()."', 
                                         dpa_empresa='".$this->getEmpresaPadre()."', 
                                         dba_fechamodifico=NOW(), 
                                         dba_personamodifico=".$this->getCodigoEstudiante()."
                                   WHERE dpa_papa=".$this->getCodigoPadre().";";
                $this->cnxion->ejecutar($insertDatosPapa);
            }
            else{
                $codigoDatosPapa = date('YmdHis').rand(99,999);
                $insertDatosPapa="INSERT INTO principal.datos_papas(
                                              dpa_codigo, dpa_papa, 
                                              dba_fechacreo, dba_fechamodifico, 
                                              dba_personacreo, dba_personamodifico)
                                      VALUES ($codigoDatosPapa, ".$this->getCodigoPadre().", 
                                              NOW(), NOW(), 
                                              ".$this->getCodigoEstudiante().", ".$this->getCodigoEstudiante().");";

                $this->cnxion->ejecutar($insertDatosPapa);
            }
        }
    }
    
?>