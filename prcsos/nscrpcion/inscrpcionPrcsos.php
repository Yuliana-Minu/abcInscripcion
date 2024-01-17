<?php
include('classInscrpcion.php');

class RgstroInscrpcionPrcsos extends Inscripcion{
    
    private $updatePersona;
    private $updateDatosBasicos;
    private $insertDatosInscripcion;

    private $insertMama;
    private $insertDatosBasicosMama;
    private $insertDatosMama;
    private $insertMamaNinio;
    private $insertPerfilMama;

    private $insertPapa;
    private $insertDatosBasicosPapa;
    private $insertDatosPapa;
    private $insertPapaNinio;
    private $insertPerfilPapa;

    private $insertRecomendacion;
    private $insertMatrimonio;

    private $insertCursosPerdidos;

    private $codigoCursoPerdido;

    private $codigoInscripcion;

    private $codigoPapa;
    private $codigoDatosBasicosPapa;
    private $codigoDatosPapa;
    private $codigoPapaNinio;
    private $codigoPerfilPapa;

    private $codigoMama;
    private $codigoDatosBasicosMama;
    private $codigoDatosMama;
    private $codigoMamaNinio;
    private $codigoPerfilMama;


    private $codigoRecomendacion;

    private $codigoMatrimonio;




    public function __construct(){
        $this->cnxion = Dtbs::getInstance();

        $this->codigoInscripcion=date('YmdHis').rand(99,999);

        $this->codigoPapa=date('YmdHis').rand(99,999);
        $this->codigoDatosBasicosPapa=date('YmdHis').rand(99,999);
        $this->codigoDatosPapa=date('YmdHis').rand(99,999);
        $this->codigoPapaNinio=date('YmdHis').rand(99,999);
        $this->codigoPerfilPapa=date('YmdHis').rand(99,999);

        $this->codigoMama=date('YmdHis').rand(99,999);
        $this->codigoDatosBasicosMama=date('YmdHis').rand(99,999);
        $this->codigoDatosMama=date('YmdHis').rand(99,999);
        $this->codigoMamaNinio=date('YmdHis').rand(99,999);
        $this->codigoPerfilMama=date('YmdHis').rand(99,999);

        $this->codigoCursoPerdido=date('YmdHis').rand(99,999);

        $this->codigoRecomendacion=date('YmdHis').rand(99,999);


        $this->codigoMatrimonio=date('YmdHis').rand(99,999);
    }

    public function consulta_datos_inscripcion($codigo_ninio, $calendario_apertura){

        $sql_datos_inscricpion="SELECT COUNT(*) AS datainscripcion
                                  FROM principal.datos_inscripcion_ninio
                                WHERE din_ninio=$codigo_ninio
                                 AND dni_anio = $calendario_apertura;";

        $query_datos_inscricpion=$this->cnxion->ejecutar($sql_datos_inscricpion);

        $data_datos_inscricpion=$this->cnxion->obtener_filas($query_datos_inscricpion);

        $dataInscripcion=$data_datos_inscricpion['datainscripcion'];

        return $dataInscripcion;
    }

    public function ninio_padres($codigo_ninio, $parentesco, $buscar_papa){

        $sql_ninio_padres="SELECT pni_codigo, pni_papas, pni_ninio,pni_tipo 
                             FROM principal.papas_ninios
                            WHERE pni_ninio = $codigo_ninio
                              AND pni_tipo = $parentesco
                              AND pni_papas = $buscar_papa;";

        $query_ninio_padres=$this->cnxion->ejecutar($sql_ninio_padres);

        $data_ninio_padres=$this->cnxion->obtener_filas($query_ninio_padres);

        $pni_papas=$data_ninio_padres['pni_papas'];

        return $pni_papas;
    }

    public function datos_matrimonio($codigo_ninio){

        $sql_datos_matrimonio="SELECT dma_fechamatrimonio, dma_tipomatrimonio, 
                                      dma_cual, dma_vivenjuntos
                                 FROM principal.datos_matrimonio
                                WHERE dma_ninio=$codigo_ninio;";

        $query_datos_matrimonio=$this->cnxion->ejecutar($sql_datos_matrimonio);

        while($data_datos_matrimonio=$this->cnxion->obtener_filas($query_datos_matrimonio)){
            $datadatos_matrimonio[]=$data_datos_matrimonio;
        }
        return $datadatos_matrimonio;
    }

    public function datos_recomendacion($codigo_ninio, $calendario_apertura){

        $sql_datos_recomendacion="SELECT rec_nombre, rec_telefono, 
                                         rec_celular,rec_motivoeleccion
                                    FROM principal.recomendacion
                                    WHERE rec_ninio=$codigo_ninio
                                    AND rec_anio = $calendario_apertura;";

        $query_datos_recomendacion=$this->cnxion->ejecutar($sql_datos_recomendacion);

        while($data_datos_recomendacion=$this->cnxion->obtener_filas($query_datos_recomendacion)){
            $datadatos_recomendacion[]=$data_datos_recomendacion;
        }
        return $datadatos_recomendacion;
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
                                         WHERE per_identificacion = '$codigo_buscar';";

        $query_buscar_existencia_persona=$this->cnxion->ejecutar($sql_buscar_existencia_persona);

        $data_buscar_existencia_persona=$this->cnxion->obtener_filas($query_buscar_existencia_persona);

        $per_codigo=$data_buscar_existencia_persona['per_codigo'];

        return $per_codigo;
    }

    public function datos_padres_existencia($codigo_buscar){

        $sql_datos_padres_existencia="SELECT dpa_codigo, dpa_papa, dpa_vive, 
                                             dpa_cargo, dpa_empresa
                                        FROM principal.datos_papas
                                        WHERE dpa_papa = $codigo_buscar;";

        $query_datos_padres_existencia=$this->cnxion->ejecutar($sql_datos_padres_existencia);

        $data_datos_padres_existencia=$this->cnxion->obtener_filas($query_datos_padres_existencia);

        $dpa_codigo=$data_datos_padres_existencia['dpa_codigo'];

        return $dpa_codigo;
    }

    public function insertar_inscripcion_paso_paso(){

        $cambios = 0;

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

        $fecha_nacimiento=$this->getFechaNacimientoEstudiante();

        if($fecha_nacimiento){
            $condicion_nacimiento=", per_fechanacimiento='".$this->getFechaNacimientoEstudiante()."'";
        }
        else{
            $condicion_nacimiento="";
        }

        if($this->getFotoEstudiante()){
            $condicion_foto_estudiante=", per_foto='".$this->getFotoEstudiante()."'";
        }
        else{
            $condicion_foto_estudiante="";
        }
    
        $updatePersona="UPDATE principal.persona
                                SET per_nombre='".$this->getPrimerNombreEstudiante()."', 
                                    per_primerapellido='".$this->getPrimerApellidoEstudiante()."', 
                                    per_segundoapellido='".$this->getSegundoApellidoEstudiante()."', 
                                    per_personamodifico='".$this->getPersonaSistema()."', 
                                    per_fechamodifico=NOW(), per_identificacion='".$this->getNumeroIdentificacionEstudiante()."', 
                                    per_segundonombre='".$this->getSegundoNombreEstudiante()."', 
                                    per_municipionacimiento=".$this->getMunicipioNaceEstudiante().", 
                                    per_nacionalidad='".$this->getNacionalidadEstudiante()."', 
                                    per_otranacionalidad='".$this->getOtraNacionalidadEstudiante()."',
                                    per_tipoidentificacion=5
                                    $condicion_nacimiento
                                    $condicion_foto_estudiante
                                WHERE per_codigo=".$this->getCodigoEstudiante().";";

        $this->cnxion->ejecutar($updatePersona);

        $updateDatosBasicos="UPDATE principal.datos_basicos
                                        SET dba_estadocivil=0, dba_profesion=0,
                                        dba_direccion='".$this->getDireccionEstudiante()."', dba_municipioresidencia=".$this->getMunicipioResidenciaEstudiante().", 
                                        dba_correo='".$this->getCorreoEstudiante()."', dba_telefono='".$this->getTelefonoEstudiante()."', 
                                        dba_fechamodifico=NOW(), dba_personamodifico=".$this->getCodigoEstudiante().", dba_actualizacion=1
                                WHERE dba_persona=".$this->getCodigoEstudiante().";";

        $this->cnxion->ejecutar($updateDatosBasicos);

        ///Validacion Datos Inscripcion
        $codigo_estudiante=$this->getCodigoEstudiante();
        $datosInscripcionV=$this->consulta_datos_inscripcion($codigo_estudiante, $calendario_apertura);

        if($datosInscripcionV==0){

            $insertDatosInscripcion="INSERT INTO principal.datos_inscripcion_ninio(
                                                din_codigo, 
                                                din_ninio,
                                                din_fechacreo, 
                                                din_fechamodifico, 
                                                din_personacreo, 
                                                din_personamodifico,
                                                dni_anio)
                                        VALUES (".$this->codigoInscripcion.", 
                                                ".$this->getCodigoEstudiante().", 
                                                NOW(), 
                                                NOW(), 
                                                ".$this->getCodigoEstudiante().",
                                                ".$this->getCodigoEstudiante().",
                                                $calendario_apertura);";

            $this->cnxion->ejecutar($insertDatosInscripcion);
        }
        else{
            
            $tiene_familiar=$this->getTieneFamilarEstudiante();
            if($tiene_familiar){
                $familiar_tiene=$tiene_familiar;
            }
            else{
                $familiar_tiene=0;
            }

            $estudio_anterior=$this->getEstudiosAnterioresEstudiante();
            if($estudio_anterior){
                $anterior_estudio=$estudio_anterior;
            }
            else{
                $anterior_estudio=0;
            }

            $insertDatosInscripcion="UPDATE principal.datos_inscripcion_ninio
                                        SET din_vivecon='".$this->getActualmenteViveConEstudiante()."', 
                                            din_tienefamiliar=$familiar_tiene, 
                                            din_parentesco=".$this->getParentescoEstudiante().", 
                                            din_gradoingresar='".$this->getGradoIngresarEstudiante()."', 
                                            din_gradoactual='".$this->getGradoActualEstudiante()."', 
                                            din_estudiaen='".$this->getEnEstudiante()."', 
                                            din_motivoretiro='".$this->getMotivoRetiroEstudiante()."', 
                                            din_fechamodifico=NOW(),
                                            din_personamodifico=".$this->getCodigoEstudiante().", 
                                            din_estudiosanteriores=$anterior_estudio
                                        WHERE din_ninio=".$this->getCodigoEstudiante()."
                                         AND dni_anio = $calendario_apertura;";

            $this->cnxion->ejecutar($insertDatosInscripcion);
        }

        ////Datos  Matrimonio

        $datos_matrimonio=$this->datos_matrimonio($codigo_estudiante);

        if($datos_matrimonio){

            $fecha_matrimonio=$this->getFechaMatrimonio();
            if($fecha_matrimonio){
                $matri_fecha=", dma_fechamatrimonio='$fecha_matrimonio'";
            }
            else{
                $matri_fecha="";
            }

            $insertMatrimonio="UPDATE principal.datos_matrimonio
                                  SET dma_tipomatrimonio='".$this->getTipoMatrimonio()."', 
                                      dma_cual='".$this->getCualMatrimonio()."', 
                                      dma_vivenjuntos='".$this->getVivenJuntosMatrimonio()."', 
                                      dma_fechamodifico=NOW(),
                                      dma_personamodifico=$codigo_estudiante
                                      $matri_fecha
                                WHERE dma_ninio=$codigo_estudiante;";

            $this->cnxion->ejecutar($insertMatrimonio);
        }
        else{
            $insertMatrimonio="INSERT INTO  principal.datos_matrimonio(
                                            dma_codigo, dma_ninio, 
                                            dma_fechacreo, dma_fechamodifico, 
                                            dma_personacreo, dma_personamodifico)
                                    VALUES (".$this->codigoMatrimonio.", ".$this->getCodigoEstudiante().",
                                            NOW(), NOW(), 
                                            ".$this->getCodigoEstudiante().", ".$this->getCodigoEstudiante().");";

            $this->cnxion->ejecutar($insertMatrimonio);
        }


        ///Datos Recomendacion
        $datos_recomendacion=$this->datos_recomendacion($codigo_estudiante, $calendario_apertura);
        if($datos_recomendacion){
            
            $insertRecomendacion="UPDATE principal.recomendacion
                                     SET rec_nombre='".$this->getNombreRecomendacion()."', 
                                         rec_telefono='".$this->getTelefonoRecomendacion()."', 
                                         rec_celular='".$this->getCelularRecomendacion()."', 
                                         rec_fechamodifico=NOW(), 
                                         rec_personamodifico=".$this->getCodigoEstudiante().", 
                                         rec_motivoeleccion='".$this->getMotivoRecomendacion()."'
                                   WHERE rec_ninio=".$this->getCodigoEstudiante()."
                                     AND rec_anio = $calendario_apertura;";

            $this->cnxion->ejecutar($insertRecomendacion);
        }
        else{
            $insertRecomendacion="INSERT INTO principal.recomendacion(
                                              rec_codigo, rec_ninio, 
                                              rec_fechacreo, rec_fechamodifico, 
                                              rec_personacreo, rec_personamodifico, rec_anio)
                                       VALUES (".$this->codigoRecomendacion.", ".$this->getCodigoEstudiante().", 
                                               NOW(),  NOW(), 
                                               ".$this->getCodigoEstudiante().", ".$this->getCodigoEstudiante().", $calendario_apertura);";
                    
            $this->cnxion->ejecutar($insertRecomendacion);

        }

        return $cambios;

    }
        
}
?>