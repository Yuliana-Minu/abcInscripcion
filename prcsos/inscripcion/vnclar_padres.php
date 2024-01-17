<?php
    include('prcsos/nscrpcion/classInscrpcion.php');
    class VinculacionPadres extends Inscripcion{
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

        public function buscar_existencia_persona($codigo_buscar){

            $sql_buscar_existencia_persona="SELECT per_codigo, per_nombre, per_primerapellido, 
                                                   per_segundoapellido, per_genero, 
                                                   per_tipoidentificacion, per_identificacion, 
                                                   per_segundonombre,  per_fechanacimiento
                                              FROM principal.persona
                                             INNER JOIN principal.datos_basicos ON per_codigo = dba_persona
                                               AND per_identificacion = '$codigo_buscar';";
    
            $query_buscar_existencia_persona=$this->cnxion->ejecutar($sql_buscar_existencia_persona);
    
            $data_buscar_existencia_persona=$this->cnxion->obtener_filas($query_buscar_existencia_persona);
    
            $per_codigo=$data_buscar_existencia_persona['per_codigo'];
    
            return $per_codigo;
        }

        public function perfil_padre($codigo_persona, $code_perfil){

            $sql_perfil_padre="SELECT COUNT(*) AS vald
                                 FROM principal.persona_tipopersona
                                WHERE ptp_tipopersona = $code_perfil
                                  AND ptp_persona = $codigo_persona;";
    
            $query_perfil_padre = $this->cnxion->ejecutar($sql_perfil_padre);
    
            $data_perfil_padre = $this->cnxion->obtener_filas($query_perfil_padre);
    
            $vald = $data_perfil_padre['vald'];
    
            return $vald;
        }

        public function validar_user($codigo_persona){

            $sql_validar_user="SELECT COUNT(*) AS valid_us
                                 FROM principal.usepersona
                                WHERE per_codigo = $codigo_persona;";
    
            $query_validar_user = $this->cnxion->ejecutar($sql_validar_user);
    
            $data_validar_user = $this->cnxion->obtener_filas($query_validar_user);
    
            $valid_us = $data_validar_user['valid_us'];
    
            return $valid_us;
        }

        public function validar_dtos_papa($codigo_persona){

            $sql_validar_dtos_papa="SELECT COUNT(*) AS valid_dp
                                      FROM principal.datos_papas
                                     WHERE dpa_papa = $codigo_persona;";
    
            $query_validar_dtos_papa = $this->cnxion->ejecutar($sql_validar_dtos_papa);
    
            $data_validar_dtos_papa = $this->cnxion->obtener_filas($query_validar_dtos_papa);
    
            $valid_dp = $data_validar_dtos_papa['valid_dp'];
    
            return $valid_dp;
        }

        function passwrd($paswd){
            $string=$paswd;
            $largo = strlen($paswd);
            $final_array = array();
            for($i = 0; $i < $largo; $i++)  {
               $caracter = $string[$i];
               array_push($final_array,$caracter);
            }
        
            for($arr=$largo; $arr >= 0; $arr--){
               $clave.=$final_array[$arr];
            }
        
            $pass=md5($clave);
            return $pass;
        }

        public function vinculacion(){
            
            $validar_existencia = $this->buscar_existencia_persona($this->getIdentificacionPadre());
            
            if($validar_existencia){

                if($this->getRol() == 1 || $this->getRol() == 2){
                    $code_perfil = 4;
                }
                else{
                    $code_perfil = 3;
                }
                $perfil_padre = $this->perfil_padre($validar_existencia, $code_perfil);
                if($perfil_padre == 0){

                    $codigo_perfil = date('YmdHis').rand(99,9999);

                    $sql_pdre_perfil = "INSERT INTO principal.persona_tipopersona(
                                                    ptp_codigo, ptp_tipopersona, 
                                                    ptp_persona, ptp_estado, 
                                                    ptp_fechacreo, ptp_fechamodifico, 
                                                    ptp_personacreo, 
                                                    ptp_personamodifico)
                                            VALUES ($codigo_perfil, $code_perfil, 
                                                    $validar_existencia, 1, 
                                                    NOW(), NOW(), 
                                                    ".$this->getCodigoEstudiante().", 
                                                    ".$this->getCodigoEstudiante().");";

                    //echo "<br> --- ".$sql_pdre_perfil;
                    $this->cnxion->ejecutar($sql_pdre_perfil);
                }

                $validar_dtos_papa = $this->validar_dtos_papa($validar_existencia);
                if($validar_dtos_papa == 0){
                    $codigo_dpp = date('YmdHis').rand(99,9999);

                    $sql_dtosppas = "INSERT INTO principal.datos_papas(
                                                dpa_codigo, dpa_papa,  
                                                dba_fechacreo, dba_fechamodifico, 
                                                dba_personacreo, dba_personamodifico)
                                        VALUES ($codigo_dpp, $validar_existencia, 
                                                NOW(), NOW(), 
                                                ".$this->getCodigoEstudiante().", ".$this->getCodigoEstudiante().");";     
                    //echo "<br> --- ".$sql_dtosppas;
                    $this->cnxion->ejecutar($sql_dtosppas);
                }
            
                $validar_user = $this->validar_user($validar_existencia);

                if($validar_user == 0){
                    $psswd = $this->getIdentificacionPadre();

                    $clavePersona = sha1($psswd);
            
                    $claveInsertar = $this->passwrd($clavePersona);
            
                    $use_codigo = date('YmdHis').rand(99,9999);
    
                    $insertUser="INSERT INTO principal.usepersona(
                                             use_codigo, per_codigo, use_pswd, 
                                             use_estado, use_fechacreo, use_alias)
                                     VALUES ($use_codigo, $validar_existencia, '".$claveInsertar."',
                                             '1', NOW(), NOW());";
                    //echo "<br> ---> ".$insertUser;                   
                    $this->cnxion->ejecutar($insertUser);            
                }

                $codigo_papa_ninio = date('YmdHis').rand(99,9999);

                $sql_ppa_ninio = "INSERT INTO principal.papas_ninios(
                                              pni_codigo, pni_papas, 
                                              pni_ninio, pni_fechacreo, 
                                              pni_fechamodifico, pni_personacreo, 
                                              pni_personamodifico, pni_tipo)
                                      VALUES ($codigo_papa_ninio, $validar_existencia, 
                                              ".$this->getCodigoEstudiante().", NOW(), 
                                              NOW(), ".$this->getCodigoEstudiante().", 
                                              ".$this->getCodigoEstudiante().", ".$this->getRol().");";
                //echo "<br> ---> ".$sql_ppa_ninio;
                $this->cnxion->ejecutar($sql_ppa_ninio);
            }
            else{
                $codigo_papa = date('YmdHis').rand(99,9999);

                $sql_persona = "INSERT INTO principal.persona(
                                            per_codigo, per_personacreo, 
                                            per_personamodifico, per_fechacreo, 
                                            per_fechamodifico, per_genero, 
                                            per_tipoidentificacion, per_identificacion, 
                                            per_estado, per_municipionacimiento)
                                    VALUES ($codigo_papa, '".$this->getCodigoEstudiante()."', 
                                            '".$this->getCodigoEstudiante()."', NOW(), 
                                            NOW(), '1', 
                                            1, '".$this->getIdentificacionPadre()."', 
                                            '1', 0);";
                //echo "<br> ----> ".$sql_persona;
                $this->cnxion->ejecutar($sql_persona);

                $codigo_dtos_basicos = date('YmdHis').rand(99,9999);

                $sql_datos_basicos = "INSERT INTO principal.datos_basicos(
                                                  dba_codigo, dba_persona, 
                                                  dba_estadocivil, dba_rh, 
                                                  dba_municipioresidencia, dba_telefono, 
                                                  dba_celular, dba_estado, 
                                                  dba_fechacreo, dba_fechamodifico, 
                                                  dba_personacreo, dba_personamodifico, 
                                                  dba_eps, dba_sisben,  
                                                  dba_estrato, dba_profesion)
                                          VALUES ($codigo_dtos_basicos, $codigo_papa, 
                                                  0, 0, 
                                                  0, '0', 
                                                  0, 1, 
                                                  NOW(), NOW(), 
                                                  ".$this->getCodigoEstudiante().", ".$this->getCodigoEstudiante().",
                                                  0, 0, 
                                                  0, 0);";

                $this->cnxion->ejecutar($sql_datos_basicos);
                //echo "<br> --> ".$sql_datos_basicos;

                $codigo_perfil = date('YmdHis').rand(99,9999);

                $sql_pdre_perfil = "INSERT INTO principal.persona_tipopersona(
                                                ptp_codigo, ptp_tipopersona, 
                                                ptp_persona, ptp_estado, 
                                                ptp_fechacreo, ptp_fechamodifico, 
                                                ptp_personacreo, 
                                                ptp_personamodifico)
                                        VALUES ($codigo_perfil, 4, 
                                                $codigo_papa, 1, 
                                                NOW(), NOW(), 
                                                ".$this->getCodigoEstudiante().", 
                                                ".$this->getCodigoEstudiante().");";

                $this->cnxion->ejecutar($sql_pdre_perfil);
                //echo "<br> -----> ".$sql_pdre_perfil;

                $psswd = $this->getIdentificacionPadre();

                $clavePersona = sha1($psswd);
        
                $claveInsertar = $this->passwrd($clavePersona);
        
                $use_codigo = date('YmdHis').rand(99,9999);

                $insertUser="INSERT INTO principal.usepersona(
                                         use_codigo, per_codigo, use_pswd, 
                                         use_estado, use_fechacreo, use_alias)
                                 VALUES ($use_codigo, $codigo_papa, '".$claveInsertar."',
                                         '1', NOW(), NOW());";
                //echo "<br> ---> ".$insertUser;                     
                $this->cnxion->ejecutar($insertUser);

                $codigo_papa_ninio = date('YmdHis').rand(99,9999);

                $sql_ppa_ninio = "INSERT INTO principal.papas_ninios(
                                              pni_codigo, pni_papas, 
                                              pni_ninio, pni_fechacreo, 
                                              pni_fechamodifico, pni_personacreo, 
                                              pni_personamodifico, pni_tipo)
                                      VALUES ($codigo_papa_ninio, $codigo_papa, 
                                              ".$this->getCodigoEstudiante().", NOW(), 
                                              NOW(), ".$this->getCodigoEstudiante().", 
                                              ".$this->getCodigoEstudiante().", ".$this->getRol().");";
                //echo "<br> ---> ".$sql_ppa_ninio;
                $this->cnxion->ejecutar($sql_ppa_ninio);

                $codigo_dpp = date('YmdHis').rand(99,9999);

                $sql_dtosppas = "INSERT INTO principal.datos_papas(
                                            dpa_codigo, dpa_papa,  
                                            dba_fechacreo, dba_fechamodifico, 
                                            dba_personacreo, dba_personamodifico)
                                    VALUES ($codigo_dpp, $codigo_papa, 
                                            NOW(), NOW(), 
                                            ".$this->getCodigoEstudiante().", ".$this->getCodigoEstudiante().");";     
                //echo "<br> --- ".$sql_dtosppas;
                $this->cnxion->ejecutar($sql_dtosppas);
            }

        }
    }
    
?>