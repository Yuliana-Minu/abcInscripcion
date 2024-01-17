<?php
include('classPrsna.php');

class RsPersona extends Persona{

    private $cnxion;
    private $codigoPersona;

    public function __construct(){
        $this->cnxion = Dtbs::getInstance();
    }

    public function datos_basicos($per_codigo){

        $sql_datos_basicos="SELECT per_codigo, per_genero, per_fechanacimiento, 
                                   per_municipionacimiento, dba_codigo, dba_estadocivil, 
                                   dba_profesion, dba_rh, dba_direccion,
                                   dba_municipioresidencia, dba_correo, dba_telefono, 
                                   dba_celular
                              FROM principal.persona, principal.datos_basicos
                             WHERE per_codigo=dba_persona
                               AND per_codigo=$per_codigo;";

        $query_datos_basicos=$this->cnxion->ejecutar($sql_datos_basicos);

        while($data_datos_basicos=$this->cnxion->obtener_filas($query_datos_basicos)){
        $datadatos_basicos[]=$data_datos_basicos;
        }
        return $datadatos_basicos;
    }

    public function selectRh(){

        $sql_rh="SELECT rh_codigo, rh_nombre, rh_estado
                   FROM principal.rh
                  ORDER BY rh_nombre ASC;";

        $query_rh=$this->cnxion->ejecutar($sql_rh);

        while($data_rh=$this->cnxion->obtener_filas($query_rh)){
            $datarh[]=$data_rh;
        }
        return $datarh;

    }

    public function selectProfesion(){

        $sql_profesion="SELECT pro_codigo, pro_nombre, pro_estado
                          FROM principal.profesion
                         ORDER BY pro_nombre ASC;";

        $query_profesion=$this->cnxion->ejecutar($sql_profesion);

        while($data_profesion=$this->cnxion->obtener_filas($query_profesion)){
            $dataprofesion[]=$data_profesion;
        }
        return $dataprofesion;

    }

    public function selectDepartamento(){

        $sql_departamento="SELECT dep_codigo, dep_nombre, dep_dane
                             FROM principal.departamento
                             ORDER BY dep_nombre ASC;";

        $query_departamento=$this->cnxion->ejecutar($sql_departamento);

        while($data_departamento=$this->cnxion->obtener_filas($query_departamento)){
            $datadepartamento[]=$data_departamento;
        }
        return $datadepartamento;

    }

    public function selectMunicipio($departamento){

        $sql_municipio="SELECT mun_codigo, mun_nombre, dep_codigo, mun_dane
                          FROM principal.municipio
                          WHERE dep_codigo=$departamento
                         ORDER BY mun_nombre ASC;";

        $query_municipio=$this->cnxion->ejecutar($sql_municipio);

        while($data_municipio=$this->cnxion->obtener_filas($query_municipio)){
            $datamunicipio[]=$data_municipio;
        }
        return $datamunicipio;

    }


    public function selectEstadoCivil(){

        $sql_estadoCivil="SELECT eci_codigo, eci_nombre, eci_estado
                            FROM principal.estado_civil
                            ORDER BY eci_nombre ASC;";

        $query_estadoCivil=$this->cnxion->ejecutar($sql_estadoCivil);

        while($data_estadoCivil=$this->cnxion->obtener_filas($query_estadoCivil)){
            $dataestadoCivil[]=$data_estadoCivil;
        }
        return $dataestadoCivil;

    }

    

    public function selectPersonaPorCodigo($codigo_persona){
        $sql_persona="SELECT per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_genero, per_tipoidentificacion,
                             per_identificacion,  per_segundonombre, per_fechanacimiento, per_municipionacimiento,
                             dba_codigo,  dba_estadocivil, dba_profesion, 
                             dba_rh, dba_direccion, dba_municipioresidencia, dba_correo, 
                             dba_telefono, dba_celular, per_estado, dba_estrato
                        FROM principal.persona, principal.datos_basicos
                       WHERE per_codigo=dba_persona
                         AND per_codigo=$codigo_persona;";

        $query_persona=$this->cnxion->ejecutar($sql_persona);

        while($data_persona=$this->cnxion->obtener_filas($query_persona)){
        $dataPersona[]=$data_persona;
        }
        return $dataPersona;
    }

    public function selectPadrePorCodigo($codigo_persona){

        $sql_selectPadrePorCodigo="SELECT per_codigo, per_nombre, per_primerapellido, 
                                          per_segundoapellido, per_genero, per_tipoidentificacion,
                                          per_identificacion,  per_segundonombre, dba_codigo,  
                                          dba_estadocivil, dba_rh, dba_direccion, 
                                          dba_municipioresidencia, dba_correo, dba_telefono,
                                          dba_celular, per_estado
                                     FROM principal.persona, principal.datos_basicos
                                    WHERE per_codigo=dba_persona
                                      AND per_codigo=$codigo_persona;";

        $query_selectPadrePorCodigo=$this->cnxion->ejecutar($sql_selectPadrePorCodigo);

        while($data_selectPadrePorCodigo=$this->cnxion->obtener_filas($query_selectPadrePorCodigo)){
        $dataselectPadrePorCodigo[]=$data_selectPadrePorCodigo;
        }
        return $dataselectPadrePorCodigo;
    }

    public function selectEps(){

        $sql_selectEps="SELECT eps_codigo, eps_descripcion, eps_estado
                          FROM principal.eps;";

        $query_selectEps=$this->cnxion->ejecutar($sql_selectEps);

        while($data_selectEps=$this->cnxion->obtener_filas($query_selectEps)){
            $dataselectEps[]=$data_selectEps;
        }
        return $dataselectEps;
    }

    public function municipioDatos($mun_codigo){

        $sql_municipioDatos="SELECT mun_codigo, mun_nombre, dep_codigo, mun_dane
                                FROM principal.municipio
                               WHERE mun_codigo=$mun_codigo;";

        $query_municipioDatos=$this->cnxion->ejecutar($sql_municipioDatos);

        while($data_municipioDatos=$this->cnxion->obtener_filas($query_municipioDatos)){
            $datamunicipioDatos[]=$data_municipioDatos;
        }
        return $datamunicipioDatos;
    }

    
    public function municipio_nombre($mun_codigo){

        $sql_municipio_nombre="SELECT mun_codigo, mun_nombre, dep_codigo, mun_dane
                                 FROM principal.municipio
                                WHERE mun_codigo=$mun_codigo;";

        $query_municipio_nombre=$this->cnxion->ejecutar($sql_municipio_nombre);

        $data_municipio_nombre=$this->cnxion->obtener_filas($query_municipio_nombre);

        $nombre_mun=$data_municipio_nombre['mun_nombre'];

        return $nombre_mun;
    }

    public function departamento_nombre($mun_codigo){

        $sql_departamento_nombre="SELECT DEP.dep_codigo, dep_nombre, dep_dane, mun_nombre
                                    FROM principal.departamento as DEP, principal.municipio AS MUN
                                   WHERE CAST(dep_dane AS BIGINT)=MUN.dep_codigo
                                     AND mun_codigo=$mun_codigo;";

        $query_departamento_nombre=$this->cnxion->ejecutar($sql_departamento_nombre);

        $data_departamento_nombre=$this->cnxion->obtener_filas($query_departamento_nombre);

        $nombre_dep=$data_departamento_nombre['dep_nombre'];

        return $nombre_dep;
    }

    public function nombre_rh($rh_codigo){

        $sql_nombre_rh="SELECT rh_codigo, rh_nombre, rh_estado
                          FROM principal.rh
                         WHERE rh_codigo=$rh_codigo;";

        $query_nombre_rh=$this->cnxion->ejecutar($sql_nombre_rh);

        $data_nombre_rh=$this->cnxion->obtener_filas($query_nombre_rh);

        $nombre_rh=$data_nombre_rh['rh_nombre'];

        return $nombre_rh;
    }

    public function nombre_profesion($profesion_codigo){

        $sql_nombre_profesion="SELECT pro_codigo, pro_nombre, pro_estado
                                 FROM principal.profesion
                                WHERE pro_codigo=$profesion_codigo;";

        $query_nombre_profesion=$this->cnxion->ejecutar($sql_nombre_profesion);

        $data_nombre_profesion=$this->cnxion->obtener_filas($query_nombre_profesion);

        $nombre_profesion=$data_nombre_profesion['pro_nombre'];

        return $nombre_profesion;
    }

    public function nombre_estado_civil($codigo_estadocivil){

        $sql_nombre_estado_civil="SELECT eci_codigo, eci_nombre, eci_estado
                                    FROM principal.estado_civil
                                   WHERE eci_codigo=$codigo_estadocivil";

        $query_nombre_estado_civil=$this->cnxion->ejecutar($sql_nombre_estado_civil);

        $data_nombre_estado_civil=$this->cnxion->obtener_filas($query_nombre_estado_civil);

        $nombre_estado_civil=$data_nombre_estado_civil['eci_nombre'];

        return $nombre_estado_civil;
    }

    public function usuario(){

        $sql_usuario="SELECT use_codigo, per_codigo, use_pswd, use_estado, 
                             use_alias
                        FROM principal.usepersona
                       WHERE per_codigo=".$this->getCodigoPersona().";";

        $query_usuario=$this->cnxion->ejecutar($sql_usuario);

        while($data_usuario=$this->cnxion->obtener_filas($query_usuario)){
            $datausuario[]=$data_usuario;
        }
        return $datausuario;
    }

    public function selectTipoIdentificacion(){

        $sql_tipoidentificacion=" SELECT tid_codigo, tid_nombre, tid_referencia
                                  FROM principal.tipo_identificacion
                                  ORDER BY tid_codigo ASC;";
        $query_tipoidentificacion=$this->cnxion->ejecutar($sql_tipoidentificacion);
        while($data_tipoidentificacion=$this->cnxion->obtener_filas($query_tipoidentificacion)){
            $dataTipoIdentificacion[]=$data_tipoidentificacion;
        }

        return $dataTipoIdentificacion;

    }

    public function selectPersona(){

        $sql_persona=" SELECT per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_segundonombre,
                              per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico,
                              per_genero, per_tipoidentificacion, per_identificacion, per_estado,tid_nombre
                         FROM principal.persona, principal.tipo_identificacion
                        WHERE tid_codigo=per_tipoidentificacion;";

        $query_persona=$this->cnxion->ejecutar($sql_persona);

        while($data_persona=$this->cnxion->obtener_filas($query_persona)){
        $dataPersona[]=$data_persona;
        }
        return $dataPersona;
    }

    public function dataPersona(){
        $rs_persona=$this->selectPersona();
        foreach ($rs_persona as $dataPersona) {
            $per_codigo=$dataPersona['per_codigo'];
            $per_nombre=$dataPersona['per_nombre'];
            $per_primerapellido=$dataPersona['per_primerapellido'];
            $per_segundoapellido=$dataPersona['per_segundoapellido'];
            $per_genero=$dataPersona['per_genero'];
            $per_tipoidentificacion=$dataPersona['per_tipoidentificacion'];
            $per_identificacion=$dataPersona['per_identificacion'];
            $tid_nombre=$dataPersona['tid_nombre'];
            $per_segundonombre=$dataPersona['per_segundonombre'];

            $nombrePersona=$per_nombre." ".$per_segundonombre." ".$per_primerapellido." ".$per_segundoapellido;

            if($per_genero==1){
                $genero="Masculino";
            }
            if($per_genero==2){
                $genero="Femenino";
            }

           

            $rsPersona[] = array('per_codigo'=> $per_codigo,
                               'per_nombre'=> $per_nombre,
                               'per_primerapellido'=> $per_primerapellido,
                               'per_segundoapellido'=> $per_segundoapellido,
                               'per_genero'=> $per_genero,
                               'per_tipoidentificacion'=> $per_tipoidentificacion,
                               'per_identificacion'=> $per_identificacion,
                               'genero'=> $genero,
                               'tid_nombre'=> $tid_nombre,
                               'nombrePersona'=>$nombrePersona,
                               );
        }
        $datPersonaJson=json_encode(array("data"=>$rsPersona));
        return $datPersonaJson;
    }

    public function adminstrativo(){

        $sql_adminstrativo="SELECT per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_segundonombre,
                                   per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico,
                                   per_genero, per_tipoidentificacion, per_identificacion, per_estado,tid_nombre
                              FROM principal.persona, principal.tipo_identificacion, principal.persona_tipopersona
                            WHERE tid_codigo=per_tipoidentificacion
                              AND per_codigo=ptp_persona
                              AND ptp_estado=1
                              AND ptp_tipopersona=2;";

        $query_adminstrativo=$this->cnxion->ejecutar($sql_adminstrativo);

        while($data_adminstrativo=$this->cnxion->obtener_filas($query_adminstrativo)){
        $dataadminstrativo[]=$data_adminstrativo;
        }
        return $dataadminstrativo;
    }

    public function dataAdministrativo(){
        $rs_administrativo=$this->adminstrativo();
       
        foreach ($rs_administrativo as $data_adminstrativo) {
            $per_codigo=$data_adminstrativo['per_codigo'];
            $per_nombre=$data_adminstrativo['per_nombre'];
            $per_primerapellido=$data_adminstrativo['per_primerapellido'];
            $per_segundoapellido=$data_adminstrativo['per_segundoapellido'];
            $per_genero=$data_adminstrativo['per_genero'];
            $per_tipoidentificacion=$data_adminstrativo['per_tipoidentificacion'];
            $per_identificacion=$data_adminstrativo['per_identificacion'];
            $tid_nombre=$data_adminstrativo['tid_nombre'];
            $per_segundonombre=$data_adminstrativo['per_segundonombre'];

            $nombrePersona=$per_nombre." ".$per_segundonombre." ".$per_primerapellido." ".$per_segundoapellido;

            if($per_genero==1){
                $genero="Masculino";
            }
            if($per_genero==2){
                $genero="Femenino";
            }

           

            $rsAdminstrativo[] = array('per_codigo'=> $per_codigo,
                               'per_nombre'=> $per_nombre,
                               'per_primerapellido'=> $per_primerapellido,
                               'per_segundoapellido'=> $per_segundoapellido,
                               'per_genero'=> $per_genero,
                               'per_tipoidentificacion'=> $per_tipoidentificacion,
                               'per_identificacion'=> $per_identificacion,
                               'genero'=> $genero,
                               'tid_nombre'=> $tid_nombre,
                               'nombrePersona'=>$nombrePersona,
                               );
        }
        $datAdminstrativoJson=json_encode(array("data"=>$rsAdminstrativo));
        return $datAdminstrativoJson;
    }

    public function docente(){

        $sql_docente="SELECT per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_segundonombre,
                                   per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico,
                                   per_genero, per_tipoidentificacion, per_identificacion, per_estado,tid_nombre
                              FROM principal.persona, principal.tipo_identificacion, principal.persona_tipopersona
                            WHERE tid_codigo=per_tipoidentificacion
                              AND per_codigo=ptp_persona
                              AND ptp_estado=1
                              AND ptp_tipopersona=3;";

        $query_docente=$this->cnxion->ejecutar($sql_docente);

        while($data_docente=$this->cnxion->obtener_filas($query_docente)){
            $datadocente[]=$data_docente;
        }
        return $datadocente;
    }

    public function dataDocente(){
        $rs_docente=$this->docente();
        foreach ($rs_docente as $data_adminstrativo) {
            $per_codigo=$data_adminstrativo['per_codigo'];
            $per_nombre=$data_adminstrativo['per_nombre'];
            $per_primerapellido=$data_adminstrativo['per_primerapellido'];
            $per_segundoapellido=$data_adminstrativo['per_segundoapellido'];
            $per_genero=$data_adminstrativo['per_genero'];
            $per_tipoidentificacion=$data_adminstrativo['per_tipoidentificacion'];
            $per_identificacion=$data_adminstrativo['per_identificacion'];
            $tid_nombre=$data_adminstrativo['tid_nombre'];
            $per_segundonombre=$data_adminstrativo['per_segundonombre'];

            $nombrePersona=$per_nombre." ".$per_segundonombre." ".$per_primerapellido." ".$per_segundoapellido;

            if($per_genero==1){
                $genero="Masculino";
            }
            if($per_genero==2){
                $genero="Femenino";
            }

           

            $rsAdminstrativo[] = array('per_codigo'=> $per_codigo,
                               'per_nombre'=> $per_nombre,
                               'per_primerapellido'=> $per_primerapellido,
                               'per_segundoapellido'=> $per_segundoapellido,
                               'per_genero'=> $per_genero,
                               'per_tipoidentificacion'=> $per_tipoidentificacion,
                               'per_identificacion'=> $per_identificacion,
                               'genero'=> $genero,
                               'tid_nombre'=> $tid_nombre,
                               'nombrePersona'=>$nombrePersona,
                               );
        }
        $datAdminstrativoJson=json_encode(array("data"=>$rsAdminstrativo));
        return $datAdminstrativoJson;
    }

    public function padre(){

        $sql_padre="SELECT per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_segundonombre,
                           per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico,
                           per_genero, per_tipoidentificacion, per_identificacion, per_estado,tid_nombre
                      FROM principal.persona, principal.tipo_identificacion, principal.persona_tipopersona
                     WHERE tid_codigo=per_tipoidentificacion
                       AND per_codigo=ptp_persona
                       AND ptp_estado=1
                       AND ptp_tipopersona=4;";

        $query_padre=$this->cnxion->ejecutar($sql_padre);

        while($data_padre=$this->cnxion->obtener_filas($query_padre)){
            $datapadre[]=$data_padre;
        }
        return $datapadre;
    }

    public function dataPadre(){
        $rs_padre=$this->padre();
        foreach ($rs_padre as $data_padre) {
            $per_codigo=$data_padre['per_codigo'];
            $per_nombre=$data_padre['per_nombre'];
            $per_primerapellido=$data_padre['per_primerapellido'];
            $per_segundoapellido=$data_padre['per_segundoapellido'];
            $per_genero=$data_padre['per_genero'];
            $per_tipoidentificacion=$data_padre['per_tipoidentificacion'];
            $per_identificacion=$data_padre['per_identificacion'];
            $tid_nombre=$data_padre['tid_nombre'];
            $per_segundonombre=$data_padre['per_segundonombre'];

            $nombrePersona=$per_nombre." ".$per_segundonombre." ".$per_primerapellido." ".$per_segundoapellido;

            if($per_genero==1){
                $genero="Masculino";
            }
            if($per_genero==2){
                $genero="Femenino";
            }

           

            $rsPadre[] = array('per_codigo'=> $per_codigo,
                               'per_nombre'=> $per_nombre,
                               'per_primerapellido'=> $per_primerapellido,
                               'per_segundoapellido'=> $per_segundoapellido,
                               'per_genero'=> $per_genero,
                               'per_tipoidentificacion'=> $per_tipoidentificacion,
                               'per_identificacion'=> $per_identificacion,
                               'genero'=> $genero,
                               'tid_nombre'=> $tid_nombre,
                               'nombrePersona'=>$nombrePersona,
                               );
        }
        $datPadreJson=json_encode(array("data"=>$rsPadre));
        return $datPadreJson;
    }

    public function ninios(){

        $sql_ninios="SELECT per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_segundonombre,
                           per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico,
                           per_genero, per_tipoidentificacion, per_identificacion, per_estado,tid_nombre
                      FROM principal.persona, principal.tipo_identificacion, principal.persona_tipopersona
                     WHERE tid_codigo=per_tipoidentificacion
                       AND per_codigo=ptp_persona
                       AND ptp_estado=1
                       AND ptp_tipopersona=5;";

        $query_ninios=$this->cnxion->ejecutar($sql_ninios);

        while($data_ninios=$this->cnxion->obtener_filas($query_ninios)){
            $dataninios[]=$data_ninios;
        }
        return $dataninios;
    }

    public function dataNinios(){
        $rs_ninios=$this->ninios();
        foreach ($rs_ninios as $data_ninios) {
            $per_codigo=$data_ninios['per_codigo'];
            $per_nombre=$data_ninios['per_nombre'];
            $per_primerapellido=$data_ninios['per_primerapellido'];
            $per_segundoapellido=$data_ninios['per_segundoapellido'];
            $per_genero=$data_ninios['per_genero'];
            $per_tipoidentificacion=$data_ninios['per_tipoidentificacion'];
            $per_identificacion=$data_ninios['per_identificacion'];
            $tid_nombre=$data_ninios['tid_nombre'];
            $per_segundonombre=$data_ninios['per_segundonombre'];

            $nombrePersona=$per_nombre." ".$per_segundonombre." ".$per_primerapellido." ".$per_segundoapellido;

            if($per_genero==1){
                $genero="Masculino";
            }
            if($per_genero==2){
                $genero="Femenino";
            }

        
            $rsNinios[] = array('per_codigo'=> $per_codigo,
                               'per_nombre'=> $per_nombre,
                               'per_primerapellido'=> $per_primerapellido,
                               'per_segundoapellido'=> $per_segundoapellido,
                               'per_genero'=> $per_genero,
                               'per_tipoidentificacion'=> $per_tipoidentificacion,
                               'per_identificacion'=> $per_identificacion,
                               'genero'=> $genero,
                               'tid_nombre'=> $tid_nombre,
                               'nombrePersona'=>$nombrePersona,
                               );
        }
        $datNiniosJson=json_encode(array("data"=>$rsNinios));
        return $datNiniosJson;
    }
    
    public function nombre_persona($codigo_persona){

        $sql_nombre_persona="SELECT per_codigo, per_nombre, per_segundonombre, 
                                    per_primerapellido, per_segundoapellido
                                FROM principal.persona
                            WHERE per_codigo = $codigo_persona;";

        $query_nombre_persona=$this->cnxion->ejecutar($sql_nombre_persona);

        $data_nombre_persona=$this->cnxion->obtener_filas($query_nombre_persona);

        $per_nombre=$data_nombre_persona['per_nombre'];
        $per_segundonombre=$data_nombre_persona['per_segundonombre'];
        $per_primerapellido=$data_nombre_persona['per_primerapellido'];
        $per_segundoapellido=$data_nombre_persona['per_segundoapellido'];

        $people=$per_nombre." ".$per_segundonombre." ".$per_primerapellido." ".$per_segundoapellido;

        return $people;
    }
    
    public function foto_persona($codigo_persona){

        $sql_nombre_persona="SELECT per_codigo, per_foto
                               FROM principal.persona
                              WHERE per_codigo = $codigo_persona;";

        $query_nombre_persona=$this->cnxion->ejecutar($sql_nombre_persona);

        $data_nombre_persona=$this->cnxion->obtener_filas($query_nombre_persona);

        $per_foto=$data_nombre_persona['per_foto'];

        return $per_foto;
    }

    public function foto_descarga($codigo_ninio){

        $sql_foto_descarga="SELECT per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_identificacion
                              FROM principal.persona
                             WHERE per_codigo = '$codigo_ninio';";

        $query_foto_descarga=$this->cnxion->ejecutar($sql_foto_descarga);

        $data_foto_descarga=$this->cnxion->obtener_filas($query_foto_descarga);

        $per_identificacion=$data_foto_descarga['per_identificacion'];
        $per_nombre=$data_foto_descarga['per_nombre'];
        $per_primerapellido=$data_foto_descarga['per_primerapellido'];

        $nmbre_fto = strtoupper($per_identificacion."_".$per_nombre.$per_primerapellido);

        $nmbre_fto=str_replace(' ','',$nmbre_fto);

        return $nmbre_fto;
    }

}
?>
