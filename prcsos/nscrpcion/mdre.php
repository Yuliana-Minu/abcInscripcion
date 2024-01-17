<?php 
    include('classInscrpcion.php');
    class VldacionMdre extends Inscripcion{
        private $codigoMama;
        private $codigoDatosBasicosMama;
        private $codigoDatosMama;
        private $codigoMamaNinio;

        public function __construct(){
            $this->cnxion = Dtbs::getInstance();
            $this->codigoPapa=date('YmdHis').rand(99,999);
            $this->codigoDatosBasicosMama=date('YmdHis').rand(99,999);
            $this->codigoDatosMama=date('YmdHis').rand(99,999);
            $this->codigoMamaNinio=date('YmdHis').rand(99,999);
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

        public function buscar_existencia_persona($codigo_buscar){

            $sql_buscar_existencia_persona="SELECT per_codigo, per_nombre, per_primerapellido, 
                                                   per_segundoapellido, per_genero, 
                                                   per_tipoidentificacion, per_identificacion, 
                                                   per_segundonombre,  per_fechanacimiento
                                              FROM principal.persona, principal.datos_basicos
                                             WHERE per_codigo=dba_persona
                                               AND per_identificacion = '$codigo_buscar';";
    
            $query_buscar_existencia_persona=$this->cnxion->ejecutar($sql_buscar_existencia_persona);
    
            $data_buscar_existencia_persona=$this->cnxion->obtener_filas($query_buscar_existencia_persona);
    
            $per_codigo=$data_buscar_existencia_persona['per_codigo'];
    
            return $per_codigo;
        }


        public function datos_madre_existencia($codigo_persona){

            $sql_datos_madre_existencia="SELECT dpa_codigo, dpa_papa, dpa_vive, 
                                                 dpa_cargo, dpa_empresa, dpa_direccionoficina, 
                                                 dpa_telefonooficina, dpa_niveleducativo
                                            FROM principal.datos_papas
                                           WHERE dpa_papa = $codigo_persona;";
                                        
            $query_datos_madre_existencia=$this->cnxion->ejecutar($sql_datos_madre_existencia);

            while($data_datos_madre_existencia=$this->cnxion->obtener_filas($query_datos_madre_existencia)){
                $datadatos_madre_existencia[]=$data_datos_madre_existencia;
            }
            return $datadatos_madre_existencia;
        }

        public function datos_persona($codigo_persona){

            $sql_datos_persona="SELECT per_codigo, per_nombre, per_segundonombre, 
                                       per_primerapellido, per_segundoapellido, 
                                       per_identificacion, per_estado, 
                                       per_fechanacimiento, per_foto,
                                       dba_codigo, dba_persona,
                                       dba_correo, dba_telefono, 
                                       dba_celular, dba_estado,
                                       dba_ocupacion, dba_direccion
                                  FROM principal.persona, principal.datos_basicos
                                 WHERE per_codigo = dba_persona
                                   AND per_codigo = $codigo_persona;";
    
            $query_datos_persona=$this->cnxion->ejecutar($sql_datos_persona);
    
            while($data_datos_persona=$this->cnxion->obtener_filas($query_datos_persona)){
                $datadatos_persona[]=$data_datos_persona;
            }
            return $datadatos_persona;
        }

        public function ninio_padres($codigo_ninio, $parentesco){

            $sql_ninio_padres="SELECT pni_codigo, pni_papas, pni_ninio, pni_tipo 
                                 FROM principal.papas_ninios
                                WHERE pni_ninio = $codigo_ninio
                                  AND pni_tipo = $parentesco;";
    
            $query_ninio_padres=$this->cnxion->ejecutar($sql_ninio_padres);
    
            $data_ninio_padres=$this->cnxion->obtener_filas($query_ninio_padres);
    
            $pni_papas=$data_ninio_padres['pni_papas'];
    
            return $pni_papas;
        }
                
        public function info_mama(){

            $calendario_apertura = $this->calendario_apertura();

            $updateEstado="UPDATE principal.estado_ninio
                              SET eni_fechamodifico=NOW(), 
                                  eni_personamodifico=".$this->getCodigoEstudiante().", 
                                  eni_estadoproceso=2,
                                  eni_estadodatos=1
                            WHERE eni_estado = 1
                              AND eni_ninio=".$this->getCodigoEstudiante()."
                              AND eni_calendario = $calendario_apertura;";

            $this->cnxion->ejecutar($updateEstado);

            $identificacion = $this->getIdentificacionMadre();

            $buscar_si_existe = $this->buscar_existencia_persona($identificacion);

            if($buscar_si_existe){

                $dtos_persona = $this->datos_persona($buscar_si_existe);
                foreach ($dtos_persona as $dta_prsna) {
                    $per_codigo = $dta_prsna['per_codigo'];
                    $per_nombre = $dta_prsna['per_nombre'];
                    $per_segundonombre = $dta_prsna['per_segundonombre'];
                    $per_primerapellido = $dta_prsna['per_primerapellido'];
                    $per_segundoapellido = $dta_prsna['per_segundoapellido'];
                    $per_identificacion = $dta_prsna['per_identificacion'];
                    $per_estado = $dta_prsna['per_estado'];
                    $per_fechanacimiento = $dta_prsna['per_fechanacimiento'];
                    $per_foto = $dta_prsna['per_foto'];
                    $dba_correo = $dta_prsna['dba_correo'];
                    $dba_telefono = $dta_prsna['dba_telefono'];
                    $dba_celular = $dta_prsna['dba_celular'];
                    $dba_estado = $dta_prsna['dba_estado'];
                    $dba_ocupacion = $dta_prsna['dba_ocupacion'];
                    $dba_direccion = $dta_prsna['dba_direccion'];
                }

                if($per_fechanacimiento){
                    $fecha_nacimiento = substr($per_fechanacimiento,0,10);
                }
                else{
                    $fecha_nacimiento = "";
                }
                
                $dtos_padres_existencia = $this->datos_madre_existencia($buscar_si_existe);

                if($dtos_padres_existencia){
                    foreach ($dtos_padres_existencia as $dta_pdre_exstncia) {
                        $dpa_codigo = $dta_pdre_exstncia['dpa_codigo'];
                        $dpa_papa = $dta_pdre_exstncia['dpa_papa'];
                        $dpa_vive = $dta_pdre_exstncia['dpa_vive']; 
                        $dpa_cargo = $dta_pdre_exstncia['dpa_cargo']; 
                        $dpa_empresa = $dta_pdre_exstncia['dpa_empresa'];
                        $dpa_direccionoficina = $dta_pdre_exstncia['dpa_direccionoficina'];
                        $dpa_telefonooficina = $dta_pdre_exstncia['dpa_telefonooficina'];
                        $dpa_niveleducativo = $dta_pdre_exstncia['dpa_niveleducativo'];
                    }
                }
                else{
                    $sql_insert_data_padre = "INSERT INTO principal.datos_papas(
                                                          dpa_codigo, 
                                                          dpa_papa, 
                                                          dba_fechacreo, 
                                                          dba_fechamodifico, 
                                                          dba_personacreo, 
                                                          dba_personamodifico)
                                                   VALUES (".$this->codigoDatosMama.", 
                                                           $buscar_si_existe, 
                                                           NOW(), 
                                                           NOW(), 
                                                           ".$this->getCodigoEstudiante().", 
                                                           ".$this->getCodigoEstudiante().");";

                    $this->cnxion->ejecutar($sql_insert_data_padre);

                    $dpa_vive = "";
                    $dpa_cargo = "";
                    $dpa_empresa = "";
                    $dpa_direccionoficina = "";
                    $dpa_telefonooficina = "";
                    $dpa_niveleducativo = "";
                }

                if($per_fechanacimiento){
                    $fecha_actual = date('Y-m-d');
                    
                    $diferencia_fechas= abs(strtotime($fecha_actual) - strtotime($per_fechanacimientoPapa));
                    
                    $edad_mama = floor($diferencia_fechas / (365*60*60*24));
                }
                else{
                    $edad_mama = 0;
                }

                $rsDtosPapa[] = array('per_nombre'=> $per_nombre,
                                      'per_segundonombre'=> $per_segundonombre,
                                      'per_primerapellido'=> $per_primerapellido,
                                      'per_segundoapellido'=> $per_segundoapellido,
                                      'per_fechanacimiento'=> $fecha_nacimiento,
                                      'per_foto'=> $per_foto,
                                      'dpa_vive'=> $dpa_vive,
                                      'dpa_cargo'=> $dpa_cargo,
                                      'dpa_empresa'=> $dpa_empresa,
                                      'dpa_direccionoficina'=> $dpa_direccionoficina,
                                      'dpa_telefonooficina'=> $dpa_telefonooficina,
                                      'dpa_niveleducativo'=> $dpa_niveleducativo,
                                      'edad_mama'=> $edad_mama,
                                      'dba_correo' => $dba_correo,
                                      'dba_telefono'=> $dba_telefono,
                                      'dba_celular'=> $dba_celular,
                                      'dba_estado'=> $dba_estado,
                                      'dba_ocupacion'=> $dba_ocupacion,
                                      'dba_direccion'=> $dba_direccion,
                                      'status'=> '200',
                                      'sms'=> "Data Existente"
                                    );

                $dtaPersonaJson=json_encode($rsDtosPapa);


                $papa_nininio = $this->ninio_padres($this->getCodigoEstudiante(), 2);

                if($papa_nininio ==""){
                    $insertMamaNinio="INSERT INTO principal.papas_ninios(
                                            pni_codigo, pni_papas, 
                                            pni_ninio, pni_fechacreo, 
                                            pni_fechamodifico, pni_personacreo, 
                                            pni_personamodifico, pni_tipo)
                                    VALUES (".$this->codigoMamaNinio.", ".$buscar_si_existe.", 
                                            ".$this->getCodigoEstudiante().", NOW(), 
                                            NOW(), ".$this->getCodigoEstudiante().", 
                                            ".$this->getCodigoEstudiante().", 2);";

                    $this->cnxion->ejecutar($insertMamaNinio);
                }
                else{
                    if($buscar_si_existe == $papa_nininio){

                    }
                    else{
                        $cambioMamaNinio="UPDATE principal.papas_ninios 
                                             SET pni_papas = $buscar_si_existe,
                                                 pni_personamodifico = ".$this->getCodigoEstudiante().",
                                                 pni_fechamodifico = NOW()
                                           WHERE pni_tipo = 2
                                             AND pni_ninio = ".$this->getCodigoEstudiante().";";

                        $this->cnxion->ejecutar($cambioMamaNinio);
                    }
                }


                
            }
            else {

                $insertMama="INSERT INTO principal.persona(
                                         per_codigo,
                                         per_identificacion,
                                         per_personacreo, 
                                         per_personamodifico, 
                                         per_fechacreo, 
                                         per_fechamodifico, 
                                         per_genero, 
                                         per_estado,
                                         per_tipoidentificacion)
                                 VALUES (".$this->codigoPapa.", 
                                         '$identificacion',
                                         '".$this->getCodigoEstudiante()."', 
                                         '".$this->getCodigoEstudiante()."', 
                                         NOW(),
                                         NOW(), 
                                         '1', 
                                         '1',
                                         1);";

                $this->cnxion->ejecutar($insertMama);

                $insertDatosBasicosMama="INSERT INTO principal.datos_basicos(
                                                     dba_codigo, 
                                                     dba_persona, 
                                                     dba_estado, 
                                                     dba_fechacreo, 
                                                     dba_fechamodifico, 
                                                     dba_personacreo, 
                                                     dba_personamodifico)
                                             VALUES (".$this->codigoDatosBasicosMama.", 
                                                     ".$this->codigoPapa.",  
                                                     1,  
                                                     NOW(), 
                                                     NOW(), 
                                                     ".$this->getCodigoEstudiante().", 
                                                     ".$this->getCodigoEstudiante().");";

               
                $this->cnxion->ejecutar($insertDatosBasicosMama);

                $insertDatosMama="INSERT INTO principal.datos_papas(
                                              dpa_codigo, 
                                              dpa_papa, 
                                              dba_fechacreo, 
                                              dba_fechamodifico,
                                              dba_personacreo, 
                                              dba_personamodifico)
                                      VALUES (".$this->codigoDatosMama.", 
                                              ".$this->codigoPapa.",
                                              NOW(), 
                                              NOW(), 
                                              ".$this->getCodigoEstudiante().", 
                                              ".$this->getCodigoEstudiante().");";

              
                $this->cnxion->ejecutar($insertDatosMama);

                $insertMamaNinio="INSERT INTO principal.papas_ninios(
                                              pni_codigo, pni_papas, 
                                              pni_ninio, pni_fechacreo, 
                                              pni_fechamodifico, pni_personacreo, 
                                              pni_personamodifico, pni_tipo)
                                      VALUES (".$this->codigoMamaNinio.", ".$this->codigoPapa.", 
                                              ".$this->getCodigoEstudiante().", NOW(), 
                                              NOW(), ".$this->getCodigoEstudiante().", 
                                              ".$this->getCodigoEstudiante().", 2);";

                $this->cnxion->ejecutar($insertMamaNinio);
                $rsDtsPersonaS[] = array('status'=> '201',
                                         'sms'=> "No habia Registro"
                                        );

                $dtaPersonaJson=json_encode($rsDtsPersonaS);
            }
            return $dtaPersonaJson;
        }




    }
?>