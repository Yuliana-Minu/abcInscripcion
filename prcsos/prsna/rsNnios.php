<?php 
class RsNinios{


    public function __construct(){
        $this->cnxion = Dtbs::getInstance();
    }
    
    public function ninios_inscripcion(){

        $sql_ninios_inscripcion="SELECT per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_segundonombre,
                                        per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico,
                                        per_genero, per_tipoidentificacion, per_identificacion, per_estado,
                                        tid_nombre, eni_estado, eni_estadoproceso
                                   FROM principal.persona, principal.tipo_identificacion, principal.persona_tipopersona, principal.estado_ninio
                                  WHERE tid_codigo=per_tipoidentificacion
                                    AND per_codigo=ptp_persona
                                    AND per_codigo=eni_ninio
                                    AND ptp_estado=1
                                    AND ptp_tipopersona=5
                                    AND eni_estado=1";

        $query_ninios_inscripcion=$this->cnxion->ejecutar($sql_ninios_inscripcion);

        while($data_ninios_inscripcion=$this->cnxion->obtener_filas($query_ninios_inscripcion)){
            $dataninios_inscripcion[]=$data_ninios_inscripcion;
        }
        return $dataninios_inscripcion;
    }

    public function dataNiniosInscripcion(){
        $rs_niniosinscripcion=$this->ninios_inscripcion();
        foreach ($rs_niniosinscripcion as $data_inscripcion_ninios) {
            $per_codigo=$data_inscripcion_ninios['per_codigo'];
            $per_nombre=$data_inscripcion_ninios['per_nombre'];
            $per_primerapellido=$data_inscripcion_ninios['per_primerapellido'];
            $per_segundoapellido=$data_inscripcion_ninios['per_segundoapellido'];
            $per_genero=$data_inscripcion_ninios['per_genero'];
            $per_tipoidentificacion=$data_inscripcion_ninios['per_tipoidentificacion'];
            $per_identificacion=$data_inscripcion_ninios['per_identificacion'];
            $tid_nombre=$data_inscripcion_ninios['tid_nombre'];
            $per_segundonombre=$data_inscripcion_ninios['per_segundonombre'];
            $eni_estadoproceso=$data_inscripcion_ninios['eni_estadoproceso'];

            if($eni_estadoproceso==1){
                $imagen_semaforo="img/verde.png";
            }
            else{
                $imagen_semaforo="img/rojo.png";
            }

            $nombrePersona=$per_nombre." ".$per_segundonombre." ".$per_primerapellido." ".$per_segundoapellido;

            if($per_genero==1){
                $genero="Masculino";
            }
            if($per_genero==2){
                $genero="Femenino";
            }

        
            $rsNiniosInscripcion[] = array('per_codigo'=> $per_codigo,
                                           'per_nombre'=> $per_nombre,
                                           'per_primerapellido'=> $per_primerapellido,
                                           'per_segundoapellido'=> $per_segundoapellido,
                                           'per_genero'=> $per_genero,
                                           'per_tipoidentificacion'=> $per_tipoidentificacion,
                                           'per_identificacion'=> $per_identificacion,
                                           'genero'=> $genero,
                                           'tid_nombre'=> $tid_nombre,
                                           'nombrePersona'=>$nombrePersona,
                                           'imagen_semaforo'=>$imagen_semaforo
                                        );
        }
        $datNiniosInscripcionJson=json_encode(array("data"=>$rsNiniosInscripcion));
        return $datNiniosInscripcionJson;
    }

    public function ninios_matricula(){

        $sql_ninios_matricula="SELECT tid_codigo, tid_nombre, tid_referencia
                                    FROM principal.tipo_identificacion;";

        $query_ninios_matricula=$this->cnxion->ejecutar($sql_ninios_matricula);

        while($data_ninios_matricula=$this->cnxion->obtener_filas($query_ninios_matricula)){
            $dataninios_matricula[]=$data_ninios_matricula;
        }
        return $dataninios_matricula;
    }
}

?>