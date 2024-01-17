<?php 
    include('prcsos/nscrpcion/classMtrcla.php');
    class dtosMadree extends Matricula {
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

        public function info_mama(){
            if($this->getFechaNacimientoMadre()){
                $condicion_nacimientoMadre=", per_fechanacimiento='".$this->getFechaNacimientoMadre()."'";
            }
            else{
                $condicion_nacimientoMadre="";
            }

            if($this->getMunicipioMadre()){
                $munnacemadre=$this->getMunicipioMadre();
            }
            else{
                $munnacemadre=0;
            }

            $insertMama="UPDATE principal.persona
                            SET per_nombre='".$this->getPrimerNombreMadre()."', 
                                per_primerapellido='".$this->getPrimerApellidoMadre()."',
                                per_segundoapellido='".$this->getSegundoApellidoMadre()."', 
                                per_personamodifico= ".$this->getCodigoEstudiante().", 
                                per_fechamodifico=NOW(), 
                                per_segundonombre='".$this->getSegundoNombreMadre()."', 
                                per_municipionacimiento=$munnacemadre, 
                                per_nacionalidad='".$this->getNacionalidadMadre()."',
                                per_otranacionalidad='".$this->getCualNacionalidadMadre()."',
                                per_tipoidentificacion=1
                                $condicion_nacimientoMadre
                          WHERE per_codigo=".$this->getCodigoMadre().";";

                          echo "insert madrre ".$insertMama;
            $this->cnxion->ejecutar($insertMama);

            if($this->getCelularMadre()){
                $celularMadre=$this->getCelularMadre();
            }
            else{
                $celularMadre=0;
            }

            $insertDatosBasicosMama="UPDATE principal.datos_basicos
                                        SET dba_correo='".$this->getCorreoMadre()."', 
                                            dba_telefono='".$this->getTelefonoResidenciaMadre()."', 
                                            dba_celular=$celularMadre,  
                                            dba_fechamodifico=NOW(), 
                                            dba_personamodifico=".$this->getCodigoEstudiante().", 
                                            dba_ocupacion='".$this->getOcupacionMadre()."'
                                      WHERE dba_persona=".$this->getCodigoMadre().";";

            $this->cnxion->ejecutar($insertDatosBasicosMama);

            $datosMama = $this->datos_papas($this->getCodigoMadre());
            if($datosMama){
                $insertDatosMama="UPDATE principal.datos_papas
                                    SET dpa_cargo='".$this->getCargoMadre()."', 
                                        dpa_empresa='".$this->getEmpresaMadre()."', 
                                        dba_fechamodifico=NOW(), 
                                        dba_personamodifico=".$this->getCodigoEstudiante()."
                                WHERE dpa_papa=".$this->getCodigoMadre().";";

                $this->cnxion->ejecutar($insertDatosMama); 
            }
            else{
                $codigoDatosMama = date('YmdHis').rand(99,999);
                $insertDatosMama="INSERT INTO principal.datos_papas(
                                    dpa_codigo, dpa_papa, 
                                    dba_fechacreo, dba_fechamodifico, 
                                    dba_personacreo, dba_personamodifico)
                            VALUES ($codigoDatosMama, ".$this->getCodigoMadre().", 
                                    NOW(), NOW(), 
                                    ".$this->getCodigoEstudiante().", ".$this->getCodigoEstudiante().");";

                $this->cnxion->ejecutar($insertDatosMama);
            }
        }
    }
    
?>